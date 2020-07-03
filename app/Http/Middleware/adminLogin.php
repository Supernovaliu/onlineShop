<?php

namespace App\Http\Middleware;

use Closure;

class adminLogin
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
        // judge if logged
        if (session('onlineShopAdminUserInfo')) {

            return $next($request);
        }else{
            return redirect('admin/login');
        }

    }
}
