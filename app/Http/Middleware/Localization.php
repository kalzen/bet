<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Stevebauman\Location\Facades\Location;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // $this->getCurrentLocale();
        $locale = Session::get('locale');
        // $locale = null;
        if($locale == null){
            $locale = $this->getCurrentLocale()??'en';
        }
        Session::put('locale', $locale);
        App::setLocale($locale);
        return $next($request);
    }

    public function getCurrentLocale()
    {
        return null;
        $ip = request()->ip();
        if (request()->hasHeader('CF-Connecting-IP')) {
            $ip = request()->header('CF-Connecting-IP');
            // dd('cloudflare deleteced');
        } else {
            // Fallback to regular IP detection
        }
        // dd($ip);

        // If using localhost, replace with a public IP for testing
        if ($ip === '127.0.0.1') {
            $ip = '104.28.254.74'; // Example IP for testing
        }

        $response = Http::get("ipinfo.io/{$ip}?token=" . env('IPINFO_TOKEN'));

        dd($response);
        if ($response->successful()) {
            $locationData = $response->json();
            dd($locationData);
            $countryCode = $locationData['country'] ?? 'US'; // Default to US if country is not found

            // Map country codes to locales (this is an example, customize as needed)
            $locale = $countryCode === 'VN' ? 'vi' : 'en';
            // Set the locale for the app
            // app()->setLocale($locale);
        } else {
            return null;
        }
        return null;
    }
}
