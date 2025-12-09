<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (strpos($request->getPathInfo(), 'admin') !== false) {
            if (! $request->expectsJson()) {
                return route('login');
            }
        }
        else{
            if (! $request->expectsJson()) {
                return route('member.login-view');
            }
        }
    }
}
