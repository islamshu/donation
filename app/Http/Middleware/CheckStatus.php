<?php

namespace App\Http\Middleware;

use Closure;
use App\Providers\SweetAlertServiceProvider;

class CheckStatus
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
        if(auth()->check()){
            if(auth()->user()->status == 1){
                return $next($request);
            }
            alert()->error('Error',trans('Your Account Not Active"'));
            return redirect()->route('homepage_index');
        }
        alert()->error('Error',trans('You need to login'));
        return redirect()->route('homepage_index');

    }
}
