<?php

namespace App\Http\Middleware;

use Closure;
use App\Setting;

class Front
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $setting = Setting::first();
        \View::share('setting', $setting);
        app()->instance('theme', $setting->theme);
        return $next($request);
    }
}
