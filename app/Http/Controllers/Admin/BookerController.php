<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booker;
use App\Models\BookerCategory;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Illuminate\Support\Str;

class BookerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $query = Booker::latest();
        $records = $query->paginate();
        return view('admin.booker.index', compact('records'));
    }

    public function category(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'parent_id' => 'nullable|integer'
        ]);
 
        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }
        $created = BookerCategory::create($validator->validated());
        return view('admin.shared.select-category',[
            'categories'=>BookerCategory::query()->whereNull('parent_id')->orderBy('name','asc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = BookerCategory::query()->whereNull('parent_id')->orderBy('name','asc')->get();
        return view('admin.booker.form',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        DB::beginTransaction();
        try {
            $is_hot = $request->has('is_hot') ? 1 : 0;
            $booker = Booker::create($request->only(['name','image', 'sale_text', 'url','content','description']));
            $booker->categories()->sync($request->category_id);
            $booker->update(['is_hot' => $is_hot]);
            DB::commit();
            return redirect()->route('admin.booker.index')->with('message', 'Thêm mới thành công');
        } catch(Exception $ex) {
            DB::rollback();
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booker  $booker
     * @return \Illuminate\Http\Response
     */
    public function show(Booker $booker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booker  $booker
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $record = Booker::find($id);
        $categories = BookerCategory::query()->whereNull('parent_id')->orderBy('name','asc')->get();
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
        if ($words < 300)
        {
            $issue= $issue.'<li class=""><b>Độ dài văn bản:</b> Văn bản chứa '.$words.' từ. Số lượng từ quá ít so với mức tối thiểu 300 từ. Hãy thêm nội dung.</li>';
        }
        else
        {
            $success=$success.'<li><b>Độ dài văn bản:</b> Văn bản chứa '.$words.' từ. Rất tốt!</li>';
        }
        foreach ($img as $image)
        {
            if (!$image->getAttribute('alt'))
            {
                $alt = 0;
            }
        }
        if ($alt)
        {
            $success=$success.'<li><b>Thuộc tính alt của các Ảnh:</b> Rất tốt!</li>';
        }
        else
        {
             $issue= $issue.'<li><b>Thuộc tính alt của các Ảnh:</b> Còn ảnh chưa có thẻ alt! Cần bổ sung</li>';
        }
        foreach ($a as $link)
        {
            if (strpos($link->getAttribute('href'),'hocvienielts.edu.vn'))
            {
                $inlinks = 1;
            }
            else 
            {
                $outlinks = 1;
            }
        }
        if ($inlinks)
        {
            $success=$success.'<li><b>Các đường dẫn nội bộ:</b> Bạn đã có đủ các đường dẫn nội bộ. Rất tốt!</li>';
        }
        else
        {
            $issue= $issue.'<li class="issue_internallinks"><b>Các đường dẫn nội bộ:</b> Cần thêm link nội bộ tới chính trang của bạn!</li>';
        }
        if ($outlinks)
        {
            $success=$success. '<li class="issue_outlinks"><b>Các đường dẫn ra ngoài trang:</b> Rất tốt!</li>';
        }
        else
        {
            $issue=$issue.'<li class="issue_outlinks"><b>Các đường dẫn ra ngoài trang:</b> Cần thêm link dẫn tới trang ngoài!</li>';
        }

        return view('admin.booker.form',compact('categories','record', 'success', 'issue'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booker  $booker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $booker = Booker::find($id);
            $is_hot = $request->has('is_hot') ? 1 : 0;
            $booker->update($request->only(['name','image', 'sale_text', 'url', 'content','description']));
            $booker->categories()->sync($request->category_id);
            $booker->update(['is_hot' => $is_hot]);
            DB::commit();
            return redirect()->route('admin.booker.index')->with('message', 'Cập nhật thành công');
        }catch(Exception $ex) {
            DB::rollback();
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booker  $booker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booker $booker)
    {
        //
        $booker->delete();
        return response()->json(['success' => true, 'message' => 'Booker deleted successfully.']);
    }
}
