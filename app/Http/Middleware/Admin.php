<?php

namespace App\Http\Middleware;

use Closure;
use App\Notification;
use App\Setting;
use Auth;

class Admin
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
        \View::share('notifications', Auth::user()->notifications()->orderBy('created_at','asc')->take(8)->get());
        return $next($request);
    }
}
