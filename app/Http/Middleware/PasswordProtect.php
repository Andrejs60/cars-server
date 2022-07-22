<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PasswordProtect
{
    /**
     * Make sure incoming request has password body property that matches
     * value stored in environment variable.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->input("password") !== env("CARS_PASSWORD")) {
            return response()->json(["message"=> "Invalid password"],401);
        }
        return $next($request);
    }
}
