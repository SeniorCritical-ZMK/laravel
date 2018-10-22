<?php

namespace App\Modules\Internal\app\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;

class InternalAuth
{
    protected $auth;

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next, ...$types)
    {
        if (auth()->check() === false) {
            return redirect()->route('internal::login');
        }

        foreach ($types as $key => $type) {
            if (auth()->user()->type == $type) {
                return $next($request);
                break;
            }
        }
        auth()->logout();
        return redirect()->route('internal::login');
    }
}
