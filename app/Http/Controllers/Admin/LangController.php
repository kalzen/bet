<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lang;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class LangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Lang::withTrashed()->latest();
        $records = $query->paginate();
        return view('admin.lang.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $langs = Lang::all();
        return view('admin.lang.form', compact('langs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'locale' => 'required|unique:langs,locale'
        ],[
            'locale.unique' => 'Mã vùng này đã tồn tại'
        ]);

        DB::beginTransaction();
        try {
            $lang = Lang::create($request->only( ['name','locale'] ));
            DB::commit();
            return redirect()->route('admin.lang.index')->with('message', 'Thêm mới thành công');
        } catch(Exception $ex) {
            dd( 'got error: ' . $ex->getMessage() );
            DB::rollback();
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lang  $lang
     * @return \Illuminate\Http\Response
     */
    public function show(Lang $lang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lang  $lang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $record = Lang::find($id);
        return view('admin.lang.form',compact('record'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lang  $lang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lang $lang)
    {
        $id = $lang->id;
        DB::beginTransaction();
        try {
            $code = Lang::find($id);
            $code->update($request->all());
            DB::commit();
            return redirect()->route('admin.lang.index')->with('message', 'Cập nhật thành công');
        }catch(Exception $ex) {
            DB::rollback();
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lang  $lang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lang $lang)
    {
        try {
        $lang->delete();
        return response()->json(['success' => true, 'message' => 'Đã xóa ngôn ngữ thành công.']);
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1451) {
                return response()->json(['success' => false, 'message' => 'Không thể xóa ngôn ngữ đang được sử dụng trên trang.'], 422);
    }
            return response()->json(['success' => false, 'message' => 'Không thể xóa ngôn ngữ này.'], 500);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Hiện không thể xóa ngôn ngữ này.'], 500);
        }
    }
    
    /**
     * Restore the specified soft-deleted language.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request)
    {
        $lang = Lang::withTrashed()->find($request->id);
        try {
            $lang->restore();
            return response()->json(['success' => true, 'message' => 'Đã khôi phục ngôn ngữ thành công.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Không thể khôi phục ngôn ngữ này.']);
        }
    }
}

