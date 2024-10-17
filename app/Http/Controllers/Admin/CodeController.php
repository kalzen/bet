<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Code;
use App\Models\Booker;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;

class CodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $query = Code::latest();
        $records = $query->paginate();
        return view('admin.code.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $bookers = Booker::whereNull('lang_parent_id')->get();
        return view('admin.code.form', compact('bookers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:32',
            'booker_id' => 'required|integer'
        ],[
            'booker_id.required' => 'Vui lòng chọn booker!'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();
        try {
            $code = Code::create($request->only(['name', 'booker_id']));
            DB::commit();
            return redirect()->route('admin.code.index')->with('message', 'Thêm mới thành công');
        } catch (Exception $ex) {
            DB::rollback();
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Code  $code
     * @return \Illuminate\Http\Response
     */
    public function show(Code $code)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Code  $code
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $record = Code::find($id);
        $bookers = Booker::whereNull('lang_parent_id')->get();
        return view('admin.code.form', compact('record', 'bookers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Code  $code
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Code $code)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:32',
            'booker_id' => 'required|integer'
        ],[
            'booker_id.required' => 'Vui lòng chọn booker!'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        DB::beginTransaction();
        try {
            $code->update($request->only(['name', 'booker_id']));
            DB::commit();
            return redirect()->route('admin.code.index')->with('message', 'Cập nhật thành công');
        } catch (\Exception $ex) {
            dd('error');
            DB::rollback();
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Code  $code
     * @return \Illuminate\Http\Response
     */
    public function destroy(Code $code)
    {
        //
        $code->delete();
        return response()->json(['success' => true, 'message' => 'Code deleted successfully.']);
    }
}
