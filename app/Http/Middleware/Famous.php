<?php

namespace App\Http\Middleware;

use Closure;

class Famous
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
        if (auth('api')->user()->type == 'famous') {
            return $next($request);
        }
        $response = ['success' => false];
            $response['data'] = trans('error.not famous');
        return response()->json($response , 404);
      }
}
