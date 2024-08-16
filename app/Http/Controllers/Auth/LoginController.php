<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->state === 0) {
            Auth::logout();
            return redirect()->route('login')->with('error', 'no puede iniciar sesion, su empresa primero debe ser activada por el administrador');
        }
        else if ($user->state === 1) {
            if($user->rol ==='persona'){
                return redirect()->route('home');
            }else if($user->rol ==='empresa'){
                return redirect()->route('gifts.all');
            }
            else if($user->rol ==='admin'){
                return redirect()->route('user.all');
            }
        } else  {
            Auth::logout(); // Invalida la sesión
            return redirect()->route('login')->with('error', 'Tu cuenta está desactivada.');
        }
    }
}


