<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookerCategory;
use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Facades\Validator;

class BookerCategoryController extends Controller
{
    public function index(Request $request)
    {
        $records = BookerCategory::query()->orderBy('name','asc')->paginate();
        return view('admin.bookerCategory.index',compact('records'));
    }
    
    public function create()
    {
        $categories = BookerCategory::query()->whereNull('parent_id')->orderBy('name','asc')->paginate();
        return view('admin.bookerCategory.form',compact('categories'));
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'parent_id' => 'nullable|integer'
        ]);
 
        if ($validator->fails()) {
            return back()->withInput();
        }
        $category = BookerCategory::create($request->only(['name','description','parent_id']));
        $category->tags()->createMany(collect(explode(', ',$request->tags))->map(function($item){return ['name'=>$item];}));
        if ($request->image) {
            $category->image()->updateOrCreate(['url' => $request->image]);
        }
        return redirect()->route('admin.booker_category.index')->with('message', 'Thêm mới thành công');
    }
    
    public function show($id)
    {
        
    }
    
    public function edit($id)
    {
        $record = BookerCategory::find($id);
        $categories = BookerCategory::query()->whereNull('parent_id')->orderBy('name','asc')->paginate();
        return view('admin.bookerCategory.form',compact('categories','record'));
    }
    
    public function update(Request $request, $id)
    {
        $category = BookerCategory::find($id);
        $category->update($request->only(['name','description','parent_id']));
        $ids = collect(explode(', ',$request->tags))->map(function($item){return Tag::updateOrCreate(['name'=>$item]);})->pluck('id');
        $category->tags()->sync($ids);
        if ($request->image) {
            $category->image()->updateOrCreate(['url' => $request->image]);
        }
        return redirect()->route('admin.booker_category.index')->with('message', 'Cập nhật thành công');
    }
    
    public function destroy($id)
    {
        BookerCategory::find($id)->delete();
        return response()->json(['success'=>true,'message'=>'Xóa thành công']);
    }
}
