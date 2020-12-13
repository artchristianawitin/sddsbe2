<?php

namespace app\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class AuthenticateAccess{
    /**
     * Handle an incoming request.
     * @param \Illuminate\Http\Request $request
     * @param \Closure
     * @return mixed
     */
    public function handle($request, Closure $next){
        $validSecrets = explode(',',env('ACCEPTED_SECRETS'));

        if(in_array($request->header('Authorization'),$validSecrets)){
            return $next($request);
        }

        abort(Response::HTTP_UNAUTHORIZED);
    }
}



// namespace App\Http\Middleware;

// use Closure;

// class ExampleMiddleware
// {
//     /**
//      * Handle an incoming request.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \Closure  $next
//      * @return mixed
//      */
//     public function handle($request, Closure $next)
//     {
//         return $next($request);
//     }
// }
