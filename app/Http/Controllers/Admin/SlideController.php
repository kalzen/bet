<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubmitSlideRequest;
use App\Models\Lang;
use App\Models\Slide;
use App\Models\Tag;
use Illuminate\Support\Facades\Validator;
use Log;
use DB;

class SlideController extends Controller
{
    
    public function index(Request $request)
    {
        $query = Slide::whereNull('lang_parent_id')->orderBy('ordering','asc');
        $records = $query->paginate();
        return view('admin.slide.index',compact('records'));
    }
    
    public function create()
    {
        $langs = Lang::all();
        $formLangs = $langs;
        $modalLangs = $langs;
        return view('admin.slide.form',compact('langs','formLangs','modalLangs'));
    }

    public function lang(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'lang_id' => 'required|integer',
            'lang_parent_id' => 'required|integer'
            ]);
        $parentSlide = Slide::find($request->lang_parent_id);
            
        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }
        $created = Slide::create(
            [
            'lang_id' => $request->lang_id,
            'lang_parent_id' => $request->lang_parent_id,
            'name' => $request->name ?? $parentSlide->name,
            'button_url_1' => $request->button_url_1 ?? $parentSlide->button_url_1,
            'button_url_2' => $request->button_url_2 ?? $parentSlide->button_url_2,
            'button_name_1' => $request->button_name_1 ?? $parentSlide->button_name_1,
            'button_name_2' => $request->button_name_2 ?? $parentSlide->button_name_2,
            ]
        );
        return view('admin.shared.select-lang',[
            'record'=> Slide::find($request->lang_parent_id)
        ]);
    }

    public function store(SubmitSlideRequest $request)
    {
        DB::beginTransaction();
        try {
            request()->merge(['ordering'=>$request->ordering??0]);
            Slide::create($request->only(['name','button_name_1','button_name_2', 'button_url_1','button_url_2','ordering','lang_id']));
            DB::commit();
            return redirect()->route('admin.slide.index')->with('message', 'Thêm mới thành công');
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
        $record = Slide::find($id);
        $formLangs = SharedHelper::getExcludedFormLangs($record);
        $modalLangs = SharedHelper::getExcludedModalLangs($record);
        
        return view('admin.slide.form',compact('record','formLangs','modalLangs'));
    }
    
    public function update(SubmitSlideRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $slide = Slide::find($id);
            request()->merge(['ordering'=>$request->ordering??$slide->ordering]);
            $slide->update($request->only(['name','button_name_1','button_name_2', 'button_url_1','button_url_2','ordering','lang_id']));
            DB::commit();
            return redirect()->route('admin.slide.index')->with('message', 'Cập nhật thành công');
        }catch(Exception $ex) {
            DB::rollback();
            return back()->withInput();
        }
    }
    
    public function destroy($id)
    {
        $record = Slide::find($id);
        if ($record) {
            Slide::where('lang_parent_id', $id)->delete();
            $record->delete();
        }
        return response()->json(['success'=>true,'message'=>'Xóa thành công']);
    }
    
}
