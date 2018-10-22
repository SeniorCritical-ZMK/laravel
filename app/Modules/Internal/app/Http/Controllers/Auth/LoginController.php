<?php

namespace App\Modules\Internal\App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\RedirectsUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function show()
    {
        return view('internal::auth.login');
    }

    public function redirectPath()
    {
        if (auth()->user()->type==='internal') {
            return route('internal::dashboard');
        } else {
            auth()->logout();
            return route('internal::login');
        }
    }
}
