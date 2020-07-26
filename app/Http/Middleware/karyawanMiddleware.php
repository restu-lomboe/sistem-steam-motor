<?php

namespace App\Http\Middleware;

use Closure;

class karyawanMiddleware
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
        if(\Auth::user()->isAdmin() == 1 || \Auth::user()->isKaryawan() == 2){
            return $next($request);
        }

        abort(403, 'Halaman Ini Hanya Bisa Diakses oleh Admin dan Karyawan');
    }
}
