<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DefaultLocale
{
    public function handle(Request $request, Closure $next)
    {
        $locale = session('locale', config('app.locale'));
        
        if ($locale !== config('app.locale')) {
            return redirect()->to('/' . $locale . $request->getRequestUri());
        }

        return $next($request);
    }
}
