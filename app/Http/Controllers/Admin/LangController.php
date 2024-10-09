<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lang;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LangController extends Controller
{
    private $locales;

    public function __construct()
    {
        $this->locales = include base_path('config/locales.php');
    }

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
     * Exclude languages from the config locales
     *
     * @param Collection $exclude
     * @param array $original
     * @return array
     */
    private function excludeLangs($exclude, $original)
    {
        $config_locales = $original;
        $twoCharKeys = array_map(function ($key) {
            return substr($key, 0, 2);
        }, array_keys($config_locales));
        foreach ($exclude as $values) {
            $foundIndex = array_search($values->locale, $twoCharKeys);
            if ($foundIndex !== false) {
                $originalKey = array_keys($config_locales)[$foundIndex];
                unset($config_locales[$originalKey]);
            }
        }
        return $config_locales;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $langs = Lang::all();
        $locales = $this->excludeLangs($langs,$this->locales);
        return view('admin.lang.form', compact('locales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $locale = $request->get('locale');
        $localeKey = array_search($locale, array_keys($this->locales));
        if ($localeKey !== false) {
            $localeKey = array_keys($this->locales)[$localeKey];
        } else {
            return back()->withErrors(['locale' => 'Mã vùng không hợp lệ, vui lòng chọn ở trên'])->withInput();
        }

        $locale = substr($locale, 0, 2);
        $name = $this->locales[$localeKey];

        $validator = Validator::make(
            ['locale' => $locale],
            [
                'locale' => 'required|unique:langs,locale'
            ],
            [
                'locale.unique' => 'Mã vùng này đã tồn tại'
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();
        try {
            $lang = Lang::create([
                'name' => $name,
                'locale' => $locale
            ]);
            DB::commit();
            return redirect()->route('admin.lang.index')->with('message', 'Thêm mới thành công');
        } catch (Exception $ex) {
            dd('got error: ' . $ex->getMessage());
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
        $langs = Lang::where('locale', '!=', $record->locale)->get();
        $locales = $this->excludeLangs($langs,$this->locales);
        $twoCharKeys = array_map(function ($key) {
            return substr($key, 0, 2);
        }, array_keys($this->locales));
        $foundIndex = array_search($record->locale, $twoCharKeys);
        $originalKey = array_keys($this->locales)[$foundIndex];
        return view('admin.lang.form', compact('record','locales','originalKey'));
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
        $locale = $request->get('locale');
        $localeKey = array_search($locale, array_keys($this->locales));
        if ($localeKey !== false) {
            $localeKey = array_keys($this->locales)[$localeKey];
        } else {
            return back()->withErrors(['locale' => 'Mã vùng không hợp lệ, vui lòng chọn ở trên'])->withInput();
        }
        $locale = substr($locale, 0, 2);
        $name = $this->locales[$localeKey];

        DB::beginTransaction();
        try {
            $code = Lang::find($id);
            $code->update([
                'name' => $name,
                'locale' => $locale
            ]);
            DB::commit();
            return redirect()->route('admin.lang.index')->with('message', 'Cập nhật thành công');
        } catch (Exception $ex) {
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
                return response()->json(['success' => false, 'message' => 'Không thể xóa ngôn ngữ đang được sử dụng trên trang.']);
            }
            return response()->json(['success' => false, 'message' => 'Không thể xóa ngôn ngữ này.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Hiện không thể xóa ngôn ngữ này.']);
        }
    }

    public function forceDestroy(Request $request)
    {
        try {
            $lang = Lang::withTrashed()->findOrFail($request->id);
            $lang->forceDelete();
            return response()->json(['success' => true, 'message' => 'Đã xóa ngôn ngữ thành công.']);
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1451) {
                return response()->json(['success' => false, 'message' => 'Không thể xóa ngôn ngữ đang được sử dụng trên trang.']);
            }
            return response()->json(['success' => false, 'message' => 'Không thể xóa ngôn ngữ này.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Hiện không thể xóa ngôn ngữ này.']);
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
