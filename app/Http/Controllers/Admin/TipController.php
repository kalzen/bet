<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class TipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $query = Tip::latest();
        $records = $query->paginate();
        return view('admin.tip.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
      //  $record =[];
        return view('admin.tip.form');
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
            'name_team_1' => 'required|string',
            'logo_team_1' => 'required|string',
            'name_team_2' => 'required|string',
            'logo_team_2' => 'required|string',
            'score_team_1' => 'required|integer',
            'score_team_2' => 'required|integer',
            'home_bet' => 'nullable|string',
            'home_bet_rate' => 'nullable|string',
            'draw_bet' => 'nullable|string',
            'draw_bet_rate' => 'nullable|string',
            'guest_bet' => 'nullable|string',
            'guest_bet_rate' => 'nullable|string',
            'recommend' => 'nullable|string',
            'recommend_rate' => 'nullable|string',
            'date' => 'required|date',
        ], [
            'name_team_1.required' => 'Tên đội bóng 1 là bắt buộc',
            'logo_team_1.required' => 'Logo đội bóng 1 là bắt buộc',
            'name_team_2.required' => 'Tên đội bóng 2 là bắt buộc',
            'logo_team_2.required' => 'Logo đội bóng 2 là bắt buộc',
            'score_team_1.required' => 'Điểm số đội bóng 1 là bắt buộc',
            'score_team_1.integer' => 'Điểm số đội bóng 1 phải là số',
            'score_team_2.required' => 'Điểm số đội bóng 2 là bắt buộc',
            'score_team_2.integer' => 'Điểm số đội bóng 2 phải là số',
            'date.required' => 'Ngày là bắt buộc',
            ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
            
        DB::beginTransaction();
        try {
            $tip = Tip::create($request->except(['_token']));
            DB::commit();
            return redirect()->route('admin.tip.index')->with('message', 'Thêm mới thành công');
        } catch(Exception $ex) {
            DB::rollback();
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tip  $tip
     * @return \Illuminate\Http\Response
     */
    public function show(Tip $tip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tip  $tip
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $record = Tip::find($id);
        return view('admin.tip.form',compact('record'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tip  $tip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name_team_1' => 'required|string',
            'logo_team_1' => 'required|string',
            'name_team_2' => 'required|string',
            'logo_team_2' => 'required|string',
            'score_team_1' => 'required|integer',
            'score_team_2' => 'required|integer',
            'home_bet' => 'nullable|string',
            'home_bet_rate' => 'nullable|string',
            'draw_bet' => 'nullable|string',
            'draw_bet_rate' => 'nullable|string',
            'guest_bet' => 'nullable|string',
            'guest_bet_rate' => 'nullable|string',
            'recommend' => 'nullable|string',
            'recommend_rate' => 'nullable|string',
            'date' => 'required|date',
        ], [
            'name_team_1.required' => 'Tên đội bóng 1 là bắt buộc',
            'logo_team_1.required' => 'Logo đội bóng 1 là bắt buộc',
            'name_team_2.required' => 'Tên đội bóng 2 là bắt buộc',
            'logo_team_2.required' => 'Logo đội bóng 2 là bắt buộc',
            'score_team_1.required' => 'Điểm số đội bóng 1 là bắt buộc',
            'score_team_1.integer' => 'Điểm số đội bóng 1 phải là số',
            'score_team_2.required' => 'Điểm số đội bóng 2 là bắt buộc',
            'score_team_2.integer' => 'Điểm số đội bóng 2 phải là số',
            'date.required' => 'Ngày là bắt buộc',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        DB::beginTransaction();
        try {
            $tip = Tip::find($id);
            $tip->update($request->except(['_token']));
            DB::commit();
            return redirect()->route('admin.tip.index')->with('message', 'Cập nhật thành công');
        }catch(Exception $ex) {
            DB::rollback();
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tip  $tip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tip $tip)
    {
        //
    }
}
