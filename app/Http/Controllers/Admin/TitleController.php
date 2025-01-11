<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\CreateTitleRequest;
use App\Http\Requests\UpdateTitleRequest;
use App\Http\Controllers\Controller;
use App\Models\AssignedTitle;
use App\Models\Lang;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

// use App\Models\User;

class TitleController extends Controller
{
    protected $routeList;

    public function __construct()
    {
        $this->routeList = include base_path('config/assignables.php');
    }

    public function index(Request $request)
    {
        $query = AssignedTitle::whereNull('lang_parent_id')->latest();
        $records = $query->paginate();
        $routeList = $this->routeList;
        return view('admin.title.index', compact('records', 'routeList'));
    }

    public function create()
    {
        $langs = Lang::all();
        $formLangs = $langs;
        $modalLangs = $langs;
        $routeList = $this->routeList;
        $query = AssignedTitle::whereNull('lang_parent_id')->latest()->get();
        // exclude route keys found in $query[all records]->route_name
        $routeList = array_diff_key($routeList, array_flip($query->pluck('route_name')->toArray()));
        // dd($routeList);
        // $categories = Category::query()->whereNull('parent_id')->whereNull('lang_parent_id')->orderBy('name', 'asc')->get();
        // return view('admin.title.form', compact('categories', 'modalLangs', 'formLangs'));
        return view('admin.title.form', compact('modalLangs', 'formLangs', 'routeList'));
    }

    public function removeBind(Request $request)
    {
        $record = AssignedTitle::find($request->id);
        $record->lang_parent_id = null;
        $record->save();
        return response()->json(['success' => true, 'message' => 'Đã loại bỏ ràng buộc.']);
    }

    public function lang(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'route_name' => 'nullable|max:255',
            'lang_id' => 'required|integer',
            'lang_parent_id' => 'required|integer'
        ]);
        $parentPost = AssignedTitle::find($request->lang_parent_id);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }
        try {
            DB::beginTransaction();
            $post = AssignedTitle::create(
                [
                    'lang_id' => $request->lang_id,
                    'lang_parent_id' => $request->lang_parent_id,
                    'status' => $request->status ?? $parentPost->status,
                    'content' => $request->content ?? $parentPost->content,
                    'title' => $request->title ?? $parentPost->title,
                    'route_name' => $parentPost->route_name
                ]
            );
            // $post->tags()->sync(collect(explode(', ', $request->tags))->map(function ($item) {
            //      return Tag::updateOrCreate(['name' => $item]);
            // })->pluck('id'));
            // $post->images()->create(['url' => $request->image]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Đã xảy ra lỗi.' . $th->getMessage()]);
        }
        return view('admin.shared.select-lang', [
            'record' => AssignedTitle::find($request->lang_parent_id)
        ]);
    }


    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            // Schema::create('assigned_contents', function (Blueprint $table) {
            //     $table->id();
            //     $table->unsignedBigInteger('lang_parent_id')->nullable()->default(null);
            //     $table->unsignedBigInteger('lang_id')->nullable()->default(null);
            //     $table->string('route_name', 255)->unique();
            //     $table->text('content')->nullable();
            //     $table->unsignedInteger('status')->nullable()->default(AssignedTitle::STATUS_ACTIVE);
            //     $table->timestamps();
            // });
            // $post = AssignedTitle::create($request->only(['title', 'description', 'content', 'status', 'is_promotion', 'keyword', 'lang_id']));
            $routeName = $request->route_name;
            $allPosts = AssignedTitle::whereNull('lang_parent_id')->latest();
            // if found route_name matches in any of the post in $allPosts, return error and not adding more
            $foundPost = $allPosts->where('route_name', $routeName)->first();
            if ($foundPost) {
                DB::rollback();
                return redirect()->route('admin.title.index')->with('error', $this->routeList[$routeName]['name'] .' đã được gắn bài viết rồi, vui lòng chỉnh sửa nội dung hoặc xoá và tạo lại.');
                dd('ok');
            }
            $post = AssignedTitle::create($request->only(['route_name', 'content', 'title', 'status', 'lang_id']));
            // $post->categories()->sync($request->category_id);
            // $post->tags()->sync(collect(explode(', ', $request->tags))->map(function ($item) {
            //     return Tag::updateOrCreate(['name' => $item]);
            // })->pluck('id'));
            // $post->images()->create(['url' => $request->image]);
            DB::commit();
            return redirect()->route('admin.title.index')->with('message', 'Thêm mới thành công');
        } catch (Exception $ex) {
            DB::rollback();
            return back()->withInput();
        }
    }

    public function show($id) {}

    public function edit($id)
    {
        // $langs = Lang::all();
        // $categories = Category::query()->whereNull('parent_id')->whereNull('lang_parent_id')->orderBy('name', 'asc')->get();
        $record = AssignedTitle::find($id);
        if($record == null){
            return redirect()->route('admin.title.index');
        }
        $formLangs = SharedHelper::getExcludedFormLangs($record);
        $modalLangs = SharedHelper::getExcludedModalLangs($record);
        $routeList = $this->routeList;
        $query = AssignedTitle::whereNull('lang_parent_id')->where('route_name', '!=', $record->route_name)->latest()->get();
        $routeList = array_diff_key($routeList, array_flip($query->pluck('route_name')->toArray()));
        $document = new \DOMDocument();
        libxml_use_internal_errors(true);
        $document->loadHTML($record->content??'<div></div>');
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

        return view('admin.title.form', compact('record', 'success', 'issue', 'inlinks', 'formLangs','modalLangs', 'routeList'));
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $post = AssignedTitle::find($id);
            // $post->update($request->only(['title', 'description', 'content', 'status', 'is_promotion', 'keyword', 'lang_id']));
            $post->update($request->only(['route_name', 'content', 'title', 'status', 'lang_id']));
            $childs = $post->langChildren??null;
            // dd($childs);
            if ($childs){
                // also update all the child
                foreach ($childs as $child){
                    $child->update($request->only(['route_name','status',]));
                }
            }
            DB::commit();
            return redirect()->route('admin.title.index')->with('message', 'Cập nhật thành công');
        } catch (Exception $ex) {
            DB::rollback();
            return back()->withInput();
        }
    }

    public function destroy($id)
    {
        $record = AssignedTitle::find($id);
        if ($record) {
            AssignedTitle::where('lang_parent_id', $id)->delete();
            $record->delete();
        }
        return response()->json(['success' => true, 'message' => 'Xóa thành công']);
    }
}
