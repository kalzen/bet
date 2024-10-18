<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Lang;
use App\Models\Tag;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    

    public function index(Request $request)
    {
        $records = Category::whereNull('lang_parent_id')->orderBy('name','asc')->paginate();
        return view('admin.category.index',compact('records'));
    }
    
    public function create()
    {
        $formLangs = Lang::all();
        $modalLangs = $formLangs;
        $categories = Category::query()->whereNull('parent_id')->orderBy('name','asc')->paginate();
        return view('admin.category.form',compact('categories','formLangs','modalLangs'));
    }

    public function lang(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'lang_id' => 'required|integer',
            'lang_parent_id' => 'required|integer'
            ]);
        $parentCategory = Category::find($request->lang_parent_id);
            
        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }
        $category = Category::create(
            [
            'lang_id' => $request->lang_id,
            'lang_parent_id' => $request->lang_parent_id,
            'name' => $request->name ?? $parentCategory->name,
            // 'slug' => $request->slug ?? $parentCategory->slug,
            'description' => $request->description ?? $parentCategory->description,
            ]
        );
        
        return view('admin.shared.select-lang',[
            'record'=> Category::find($request->lang_parent_id)
        ]);
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'parent_id' => 'nullable|integer',
            'lang_id' => 'required|integer',
        ]);
 
        if ($validator->fails()) {
            return back()->withInput();
        }
        $category = Category::create($request->only(['name','description','content','parent_id','lang_id']));
        $category->tags()->createMany(collect(explode(', ',$request->tags))->map(function($item){return ['name'=>$item];}));
        if ($request->image) {
            $category->image()->updateOrCreate(['url' => $request->image]);
        }
        return redirect()->route('admin.category.index')->with('message', 'Thêm mới thành công');
    }
    
    public function show($id)
    {
        
    }
    
    public function edit($id)
    {
        $record = Category::find($id);
        $formLangs = SharedHelper::getExcludedFormLangs($record);
        $modalLangs = SharedHelper::getExcludedModalLangs($record);
        $categories = Category::query()->whereNull('parent_id')->whereNull('lang_parent_id')->orderBy('name','asc')->paginate();
        return view('admin.category.form',compact('categories','record','formLangs','modalLangs'));
    }
    
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->update($request->only(['name','description','content','parent_id','lang_id']));
        $ids = collect(explode(', ',$request->tags))->map(function($item){return Tag::updateOrCreate(['name'=>$item]);})->pluck('id');
        $category->tags()->sync($ids);
        if ($request->image) {
            $category->image()->updateOrCreate(['url' => $request->image]);
        }
        return redirect()->route('admin.category.index')->with('message', 'Cập nhật thành công');
    }
    
    public function destroy($id)
    {
        $record = Category::find($id);
        if ($record) {
            Category::where('lang_parent_id', $id)->delete();
            Category::where('parent_id', $id)->delete();
            $record->delete();
        }
        return response()->json(['success'=>true,'message'=>'Xóa thành công']);
    }
}
