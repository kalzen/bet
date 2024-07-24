<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.booker.form');
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
            $booker = Booker::create($request->only(['name','image', 'sale_text', 'url']));
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
        return view('admin.booker.form',compact('record'));
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
        //
        DB::beginTransaction();
        try {
            $booker = Booker::find($id);
            $booker->update($request->only(['name','image', 'sale_text', 'url', 'content']));
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
