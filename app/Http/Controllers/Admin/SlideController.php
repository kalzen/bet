<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubmitSlideRequest;
use App\Models\Slide;
use App\Models\Tag;
use Illuminate\Support\Facades\Validator;
use Log;
use DB;

class SlideController extends Controller
{
    public function index(Request $request)
    {
        $query = Slide::orderBy('ordering','asc');
        $records = $query->paginate();
        return view('admin.slide.index',compact('records'));
    }
    
    public function create()
    {
        return view('admin.slide.form');
    }

    public function store(SubmitSlideRequest $request)
    {
        DB::beginTransaction();
        try {
            request()->merge(['ordering'=>$request->ordering??0]);
            Slide::create($request->only(['name','button_name_1','button_name_2', 'button_url_1','button_url_2','ordering']));
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
        return view('admin.slide.form',compact('record'));
    }
    
    public function update(SubmitSlideRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $slide = Slide::find($id);
            request()->merge(['ordering'=>$request->ordering??$slide->ordering]);
            $slide->update($request->only(['name','button_name_1','button_name_2', 'button_url_1','button_url_2','ordering']));
            DB::commit();
            return redirect()->route('admin.slide.index')->with('message', 'Cập nhật thành công');
        }catch(Exception $ex) {
            DB::rollback();
            return back()->withInput();
        }
    }
    
    public function destroy($id)
    {
        Slide::find($id)->delete();
        return response()->json(['success'=>true,'message'=>'Xóa thành công']);
    }
    
}
