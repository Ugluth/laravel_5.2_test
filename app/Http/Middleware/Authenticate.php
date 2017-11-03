<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\EloquentUserProvider;

use App\Admin;
use App\User;

class Authenticate
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
        if (empty($guard)) {

        } else if ($guard === 'app') {
            config('auth.defaults.guard', 'app');
            config('auth.defaults.passwords', 'users');

            $user_provider = new EloquentUserProvider(app('hash'), User::class);
            app()->auth->setProvider($user_provider);

        } else if ($guard === 'admin') {
            config('auth.defaults.guard', 'admin');
            config('auth.defaults.passwords', 'admins');

            $user_provider = new EloquentUserProvider(app('hash'), Admin::class);
            app()->auth->setProvider($user_provider);
        }

        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('login');
            }
        }

        return $next($request);
    }
}
