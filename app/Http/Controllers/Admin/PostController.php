<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubmitPostRequest;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Lang;
use Illuminate\Support\Facades\Validator;
use Log;
use DB;
use Illuminate\Support\Facades\App;
use Sunra\PhpSimple\HtmlDomParser;
use Illuminate\Support\Str;

class PostController extends Controller
{
    private $sharedHelper;
    public function __construct()
    {
        $this->sharedHelper = app(SharedHelper::class);
    }
    public function index(Request $request)
    {
        $query = Post::whereNull('lang_parent_id')->latest();
        $records = $query->paginate();
        return view('admin.post.index', compact('records'));
    }

    public function create()
    {
        $langs = Lang::all();
        $formLangs = $langs;
        $modalLangs = $langs;
        $categories = Category::query()->whereNull('parent_id')->orderBy('name', 'asc')->get();
        return view('admin.post.form', compact('categories', 'modalLangs', 'formLangs'));
    }

    public function removeBind(Request $request)
    {

        $record = Post::find($request->id);
        $record->lang_parent_id = null;
        $record->save();

        return response()->json(['success' => true, 'message' => 'Đã loại bỏ ràng buộc.']);
    }

    public function lang(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'nullable|max:255',
            'lang_id' => 'required|integer',
            'lang_parent_id' => 'required|integer'
        ]);
        $parentPost = Post::find($request->lang_parent_id);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }
        try {
            DB::beginTransaction();
            $post = Post::create(
                [
                    'lang_id' => $request->lang_id,
                    'lang_parent_id' => $request->lang_parent_id,
                    'title' => $request->title ?? $parentPost->title,
                    'keyword' => $request->keyword ?? $parentPost->keyword,
                    'status' => $request->status ?? $parentPost->status,
                    'content' => $request->content ?? $parentPost->content,
                    'description' => $request->description ?? $parentPost->description,
                    'is_promotion' => $parentPost->is_promotion
                ]
            );
            $post->tags()->sync(collect(explode(', ', $request->tags))->map(function ($item) {
                return Tag::updateOrCreate(['name' => $item]);
            })->pluck('id'));
            $post->images()->create(['url' => $request->image]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Đã xảy ra lỗi.']);
        }
        return view('admin.shared.select-lang', [
            'record' => Post::find($request->lang_parent_id)
        ]);
    }

    public function category(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'parent_id' => 'nullable|integer'
        ], [
            'name.required' => 'Tên là bắt buộc'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }
        $created = Category::create($validator->validated());
        return view('admin.shared.select-category', [
            'categories' => Category::query()->whereNull('parent_id')->orderBy('name', 'asc')->get()
        ]);
    }

    public function store(SubmitPostRequest $request)
    {
        DB::beginTransaction();
        try {
            $post = Post::create($request->only(['title', 'description', 'content', 'status', 'is_promotion', 'keyword', 'lang_id']));
            $post->categories()->sync($request->category_id);
            $post->tags()->sync(collect(explode(', ', $request->tags))->map(function ($item) {
                return Tag::updateOrCreate(['name' => $item]);
            })->pluck('id'));
            $post->images()->create(['url' => $request->image]);
            DB::commit();
            return redirect()->route('admin.post.index')->with('message', 'Thêm mới thành công');
        } catch (Exception $ex) {
            DB::rollback();
            return back()->withInput();
        }
    }

    public function show($id) {}

    public function edit($id)
    {
        // $langs = Lang::all();
        $categories = Category::query()->whereNull('parent_id')->orderBy('name', 'asc')->get();
        $record = Post::find($id);
        if($record == null){
            return redirect()->route('admin.post.index');
        }
        $formLangs = $this->sharedHelper->getExcludedFormLangs($record);
        $modalLangs = $this->sharedHelper->getExcludedModalLangs($record);

        $document = new \DOMDocument();
        libxml_use_internal_errors(true);
        $document->loadHTML($record->content);
        libxml_clear_errors();
        $a = $document->getElementsByTagName('a');
        $img = $document->getElementsByTagName('img');
        $alt = 1;
        $inlinks = 0;
        $outlinks = 0;
        $issue = '';
        $success = '';
        $words = Str::of(strip_tags($record->content))->wordCount();
        //dd($words);
        if ($words < 300) {
            $issue = $issue . '<li class=""><b>Độ dài văn bản:</b> Văn bản chứa ' . $words . ' từ. Số lượng từ quá ít so với mức tối thiểu 300 từ. Hãy thêm nội dung.</li>';
        } else {
            $success = $success . '<li><b>Độ dài văn bản:</b> Văn bản chứa ' . $words . ' từ. Rất tốt!</li>';
        }
        foreach ($img as $image) {
            if (!$image->getAttribute('alt')) {
                $alt = 0;
            }
        }
        if ($alt) {
            $success = $success . '<li><b>Thuộc tính alt của các Ảnh:</b> Rất tốt!</li>';
        } else {
            $issue = $issue . '<li><b>Thuộc tính alt của các Ảnh:</b> Còn ảnh chưa có thẻ alt! Cần bổ sung</li>';
        }
        foreach ($a as $link) {
            if (strpos($link->getAttribute('href'), 'hocvienielts.edu.vn')) {
                $inlinks = 1;
            } else {
                $outlinks = 1;
            }
        }
        if ($inlinks) {
            $success = $success . '<li><b>Các đường dẫn nội bộ:</b> Bạn đã có đủ các đường dẫn nội bộ. Rất tốt!</li>';
        } else {
            $issue = $issue . '<li class="issue_internallinks"><b>Các đường dẫn nội bộ:</b> Cần thêm link nội bộ tới chính trang của bạn!</li>';
        }
        if ($outlinks) {
            $success = $success . '<li class="issue_outlinks"><b>Các đường dẫn ra ngoài trang:</b> Rất tốt!</li>';
        } else {
            $issue = $issue . '<li class="issue_outlinks"><b>Các đường dẫn ra ngoài trang:</b> Cần thêm link dẫn tới trang ngoài!</li>';
        }
        // $dom = HtmlDomParser::str_get_html($record->content);
        //check inlinks
        // $content = $record->content;

        return view('admin.post.form', compact('categories', 'record', 'success', 'issue', 'inlinks', 'formLangs','modalLangs'));
    }

    public function update(SubmitPostRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $post = Post::find($id);
            $post->update($request->only(['title', 'description', 'content', 'status', 'is_promotion', 'keyword', 'lang_id']));
            $post->categories()->sync($request->category_id);
            $post->tags()->sync(collect(explode(', ', $request->tags))->map(function ($item) {
                return Tag::updateOrCreate(['name' => $item]);
            })->pluck('id'));
            $post->images()->first()->update(['url' => $request->image]);
            DB::commit();
            return redirect()->route('admin.post.index')->with('message', 'Cập nhật thành công');
        } catch (Exception $ex) {
            DB::rollback();
            return back()->withInput();
        }
    }

    public function destroy($id)
    {
        $record = Post::find($id);
        if ($record) {
            Post::where('lang_parent_id', $id)->delete();
            $record->delete();
        }
        return response()->json(['success' => true, 'message' => 'Xóa thành công']);
    }
}
