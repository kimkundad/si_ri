<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\setting;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
      $setting_id = 1;
      $setting = setting::find($setting_id);
      $data['setting'] = $setting;

        if (Auth::guard($guard)->check()) {
            return redirect('/', $data);
        }

        return $next($request);
    }
}
