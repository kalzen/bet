<?php

namespace App\Http\Controllers;

use App\Models\Lang;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

class LocaleController extends Controller
{
    public function setLocale($locale)
    {
        // dd($locale);
        $setLocale = '';
        $currentLocale = Session::get('locale', config('app.locale'));
        $langs = Lang::all();
        $lang = $langs->where('locale', $locale)->first();
        
        if ($lang) {
            $locale = $lang->locale;
            // dd($locale);
            App::setLocale($locale);
            Session::put('locale', $locale);
            $setLocale = $locale;
        } else {
            Session::get('locale', config('app.locale'));
        }
        
        // if ($langs->isEmpty()) {
        //     if ($locale === 'vi' || $locale === 'en') {
        //         Session::put('locale', $locale);
        //     } else {
        //         Session::put('locale', 'en');
        //     }
        //     Session::get('locale', config('app.locale'));
        //     App::setLocale($locale);
        // }
        // get previous route name?
        $targetUrl = redirect()->back()->getTargetUrl();
        if ($locale == 'en'){
            if (strpos($targetUrl, '/'.$currentLocale.'/') !== false) {
                $targetUrl = str_replace('/'.$currentLocale.'/', '/', $targetUrl);
            } else if (strpos($targetUrl, '/' . $currentLocale) !== false && substr($targetUrl, -1) !== '/') {
                $targetUrl = str_replace('/'.$currentLocale, '/', $targetUrl);
            }
            // dd('en: '.$targetUrl);
            return redirect($targetUrl);
        }
        // dd($targetUrl,);
        if (strpos($targetUrl, '/'.$currentLocale.'/') !== false) {
            $targetUrl = str_replace('/'.$currentLocale.'/', '/'.$locale.'/', $targetUrl);
        } else if (strpos($targetUrl, '/' . $currentLocale) !== false && substr($targetUrl, -1) !== '/') {
            $targetUrl = str_replace('/'.$currentLocale, '/'.$locale, $targetUrl);
        } else {
            $targetUrl = str_replace('https://'.$_SERVER['HTTP_HOST'], 'https://'.$_SERVER['HTTP_HOST'].'/'.$locale, $targetUrl);
            // remove double slash
            // $targetUrl = str_replace('//', '/', $targetUrl);
            // dd ($targetUrl);
        }
        return redirect($targetUrl);
    }
}
