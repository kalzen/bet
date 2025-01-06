<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class Redirector
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
        // dd('stop');
        // $locale = Session::get('locale', config('app.locale'))??'en';
        // if ($locale == 'en'){
            Session::put('locale', 'en');
            App::setLocale('en');
            return $next($request);
        // }
        // dd($locale,$request,$path = $request->path());
        // Extract the request path
        $path = $request->path();

        // Check if the path already includes the locale prefix
        if (!$this->startsWithLocale($path, $locale)) {
            // Construct the new URL with the locale prefix
            $newUrl = $this->prependLocaleToPath($locale, $path);

            // Redirect to the new URL
            return Redirect::to($newUrl);
        }

        return Redirect::to("/$locale");
    }

    /**
     * Check if the path starts with the locale.
     *
     * @param string $path
     * @param string $locale
     * @return bool
     */
    private function startsWithLocale($path, $locale)
    {
        $segments = explode('/', $path);
        return isset($segments[0]) && $segments[0] === $locale;
    }

    /**
     * Prepend the locale to the path.
     *
     * @param string $locale
     * @param string $path
     * @return string
     */
    private function prependLocaleToPath($locale, $path)
    {
        return url($locale . '/' . ltrim($path, '/'));
    }
}
