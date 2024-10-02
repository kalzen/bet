<?php

namespace App\Http\Controllers;

use App\Models\Lang;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

class LocaleController extends Controller
{
    public function setLocale($locale)
    {
        $langs = Lang::all();
        $lang = $langs->where('locale', $locale)->first();
        
        if ($lang) {
            $locale = $lang->locale;
            App::setLocale($locale);
            Session::put('locale', $locale);
        } else {
           Session::get('locale', config('app.locale'));
        }
        
        if ($langs->isEmpty()) {
            if ($locale === 'vi' || $locale === 'en') {
                Session::put('locale', $locale);
            } else {
                Session::put('locale', 'en');
            }
            Session::get('locale', config('app.locale'));
            App::setLocale($locale);
        }
        return redirect()->back();
    }
}
