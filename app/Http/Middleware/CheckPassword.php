<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPassword
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->api_password != '5WhSLrdFrutylUlDWhd43YGDiyg34pys4RGMId2rVOiAxyoeiVhoTCu8dOmVJc5K') {
            return response()->json(['message'=>'Unauthenticated.']);
        }

        return $next($request);
    }
}
