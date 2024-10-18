<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubmitMenuRequest;
use App\Models\Lang;
use App\Models\Menu;
use App\Models\Tag;
use Illuminate\Support\Facades\Validator;
use Log;
use DB;

class MenuController extends Controller
{
    
    public function index(Request $request)
    {
        $query = Menu::whereNull('lang_parent_id')->latest();
        $records = $query->paginate();
        return view('admin.menu.index',compact('records'));
    }
    
    public function create()
    {
        $formLangs = Lang::all();
        $modalLangs = $formLangs;
        $categories = Menu::query()->whereNull('parent_id')->orderBy('name','asc')->paginate();
        return view('admin.menu.form',compact('categories','formLangs','modalLangs'));
    }

    public function lang(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'lang_id' => 'required|integer',
            'lang_parent_id' => 'required|integer'
            ]);
        $parentMenu = Menu::find($request->lang_parent_id);
            
        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }
        $created = Menu::create(
            [
            'lang_id' => $request->lang_id,
            'lang_parent_id' => $request->lang_parent_id,
            'name' => $request->name ?? $parentMenu->name,
            'url' => $request->url ?? $parentMenu->url,
            'ordering' => $request->ordering ?? $parentMenu->ordering,
            ]
        );
        return view('admin.shared.select-lang',[
            'record'=> Menu::find($request->lang_parent_id)
        ]);
    }
    
    public function store(SubmitMenuRequest $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'parent_id' => 'nullable|integer',
            'ordering' => 'required|integer',
            'lang_id' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return back()->withInput();
        }
        DB::beginTransaction();
        try {
            $menu = Menu::create($request->only(['name','url','image','ordering','parent_id','lang_id']));
            DB::commit();
            return redirect()->route('admin.menu.index')->with('message', 'Thêm mới thành công');
        } catch(Exception $ex) {
            DB::rollback();
            return back()->withInput();
        }
    }
    
    public function show($id)
    {
        
    }
    
    public function edit($id)
    {
        $record = Menu::find($id);
        $formLangs = SharedHelper::getExcludedFormLangs($record);
        $modalLangs = SharedHelper::getExcludedModalLangs($record);
        $categories = Menu::query()->whereNull('parent_id')->whereNull('lang_parent_id')->orderBy('name','asc')->paginate();
        return view('admin.menu.form',compact('record','categories','formLangs','modalLangs'));
    }
    
    public function update(SubmitMenuRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $menu = Menu::find($id);
            $menu->update($request->only(['name','url','image','ordering','parent_id','lang_id']));
            DB::commit();
            return redirect()->route('admin.menu.index')->with('message', 'Cập nhật thành công');
        }catch(Exception $ex) {
            DB::rollback();
            return back()->withInput();
        }
    }
    
    public function destroy($id)
    {
        $record = Menu::find($id);
        if ($record) {
            Menu::where('lang_parent_id', $id)->delete();
            Menu::where('parent_id', $id)->delete();
            $record->delete();
        }
        return response()->json(['success'=>true,'message'=>'Xóa thành công']);
    }
    
}
