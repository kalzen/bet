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
            $uri = $request->getRequestUri();
            $defaultRouteName = $request->route()->getName();
            
            // If route is default.*, redirect to localized version
            if (strpos($defaultRouteName, 'default.') === 0) {
                $localizedRouteName = str_replace('default.', '', $defaultRouteName);
                return redirect()->route($localizedRouteName, array_merge(
                    ['locale' => $locale],
                    $request->route()->parameters()
                ));
            }
            
            return redirect()->to('/' . $locale . $uri);
        }

        return $next($request);
    }
}
