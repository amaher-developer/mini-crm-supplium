<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;

class Lang
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $old_lang = request()->session()->get('lang');
        if ( !request()->is('admin') && !request()->is('admin/*')) {
            if (!in_array(request()->segment(1),explode(',', env('SYSTEM_LANG')))) {
                request()->session()->put('lang', env('DEFAULT_LANG'));
                app()->setLocale(request()->session()->get('lang'));
                if (request()->segment(1) == null) {
                    return redirect(request()->url() . '/'.env('DEFAULT_LANG'));
                } else {
                    return redirect(preg_replace('/' . request()->segment(1) . '/', env('DEFAULT_LANG').'/' . request()->segment(1), strtolower(request()->url()), 1));
                }
            }
            request()->session()->put('lang', request()->segment(1));

            app()->setLocale(request()->session()->get('lang'));
            View::share('language', request()->segment(1));
            View::share('lang', request()->segment(1));
            return $next($request);
        }
    }

}
