<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class cekPayment
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
        $payment = Auth::user()->bayar_pendaftaran;
        if ($payment === 0) {
            return redirect(route('payment'));
        } else {
            return $next($request);
        }
    }
}
