<?php

namespace App\Http\Middleware;

use Closure;

class ApiKey
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
        if ($request->api_key !== env('API_KEY')) {
            return response()->json([
                'result' => 'error',
                'message' => 'authentication_error',
            ]);
        }

        return $next($request);
    }
}
