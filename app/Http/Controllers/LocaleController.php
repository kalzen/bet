<?php

namespace App\Http\Controllers;

use App\Models\Lang;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

class LocaleController extends Controller
{
    public function setLocale($locale)
    {
        $lang = Lang::where('locale', $locale)->first();
        if ($locale && $lang) {
            $locale = $lang->locale;
            App::setLocale($locale);
            Session::put('locale', $locale);
        }
        // return redirect()->back();
        return 'current lang set: '.App::getLocale();
    }
}
