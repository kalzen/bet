<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Config;
use DB;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function index()
    {
        $config = Config::all()->keyBy('name');
        return view('admin.setting.index',compact('config'));
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required',
            'facebook' => 'required|url',
        ], [
            'image.required' => 'Vui lòng chọn hình ảnh.',
            'facebook.required' => 'Vui lòng nhập Link.',
            'facebook.url' => 'Vui lòng nhập URL/link hợp lệ'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        DB::beginTransaction();
        try {

            if ($request->image) {
                Config::where('name','logo')->update(['value'=>$request->image]);
            }
            // if ($request->hotline) {
            //     Config::where('name','hotline')->update(['value'=>$request->hotline]);
            // }
            // if ($request->address) {
            //     Config::where('name','address')->update(['value'=>$request->address]);
            // }
            if ($request->email) {
                Config::where('name','email')->update(['value'=>$request->email]);
            }
            // if ($request->image) {
            //     Config::where('name','about_title')->update(['value'=>$request->about_title]);
            // }
            // if ($request->hotline) {
            //     Config::where('name','about_content')->update(['value'=>$request->about_content]);
            // }
            // if ($request->address) {
            //     Config::where('name','about_image')->update(['value'=>$request->about_image]);
            // }
            // if ($request->email) {
            //     Config::where('name','about_video')->update(['value'=>$request->about_video]);
            // }
            // if ($request->image) {
            //     Config::where('name','contact_title')->update(['value'=>$request->contact_title]);
            // }
            if ($request->facebook) {
                Config::where('name','facebook')->update(['value'=>$request->facebook]);
            }
            // if ($request->address) {
            //     Config::where('name','instagram')->update(['value'=>$request->instagram]);
            // }
            // if ($request->email) {
            //     Config::where('name','youtube')->update(['value'=>$request->youtube]);
            // }
            DB::commit();
            return redirect()->route('admin.setting.index')->with('message', 'Cập nhật thành công');
        }catch(Exception $ex) {
            DB::rollback();
            return back()->withInput();
        }
    }
}
