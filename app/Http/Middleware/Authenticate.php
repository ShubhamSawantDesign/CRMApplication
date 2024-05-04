<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Alert;
use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    protected function authenticate($request, array $guards)
    {
        if ($this->auth->guard('admin')->check()) {
            if ( Auth::guard('admin')->User()->user_role == 'admin') {
                return $this->auth->shouldUse('admin');
            }
            else
            {
                Alert::warning('You Dont Have Access to this Section');
            }
        }
        else
        {
            Alert::warning('You Need to Login To Access This Section');
        }
        
        $this->unauthenticated($request, ['admin']);
    }
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('admin-login');
    }
}
