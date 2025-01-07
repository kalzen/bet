<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lang;
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
        $query = Tip::whereNull('lang_parent_id')->latest();
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
        $formLangs = Lang::all();
        $modalLangs = $formLangs;
        return view('admin.tip.form',compact('formLangs','modalLangs'));
    }

    public function lang(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'lang_id' => 'required|integer',
            'lang_parent_id' => 'required|integer'
            ]);
        $parentTip = Tip::find($request->lang_parent_id);
            
        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }
        $created = Tip::create(
            [
            'lang_id' => $request->lang_id,
            'lang_parent_id' => $request->lang_parent_id,
            'name_team_1' => $request->name_team_1 ?? $parentTip->name_team_1,
            'logo_team_1' => $request->logo_team_1 ?? $parentTip->logo_team_1,
            'name_team_2' => $request->name_team_2 ?? $parentTip->name_team_2,
            'logo_team_2' => $request->logo_team_2 ?? $parentTip->logo_team_2,
            'score_team_1' => $request->score_team_1 ?? $parentTip->score_team_1,
            'score_team_2' => $request->score_team_2 ?? $parentTip->score_team_2,
            'home_bet' => $request->home_bet ?? $parentTip->home_bet,
            'home_bet_rate' => $request->home_bet_rate ?? $parentTip->home_bet_rate,
            'draw_bet' => $request->draw_bet ?? $parentTip->draw_bet,
            'draw_bet_rate' => $request->draw_bet_rate ?? $parentTip->draw_bet_rate,
            'guest_bet' => $request->guest_bet ?? $parentTip->guest_bet,
            'guest_bet_rate' => $request->guest_bet_rate ?? $parentTip->guest_bet_rate,
            'recommend' => $request->recommend ?? $parentTip->recommend,
            'recommend_rate' => $request->recommend_rate ?? $parentTip->recommend_rate,
            'date' => $request->date ?? $parentTip->date,
            ]
        );
        return view('admin.shared.select-lang',[
            'record'=> Tip::find($request->lang_parent_id)
        ]);
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
            'parent_id' => 'nullable|integer',
            'lang_id' => 'required|integer',
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
            'lang_id.required' => 'Ngon ngữ là bắt buộc',
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
        $formLangs = SharedHelper::getExcludedFormLangs($record);
        $modalLangs = SharedHelper::getExcludedModalLangs($record);
        return view('admin.tip.form',compact('record','formLangs','modalLangs'));
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
    public function destroy($id)
    {
        $record = Tip::find($id);
        if ($record) {
            Tip::where('lang_parent_id', $id)->delete();
            $record->delete();
        }
        return response()->json(['success'=>true,'message'=>'Xóa thành công']);
    }
}
