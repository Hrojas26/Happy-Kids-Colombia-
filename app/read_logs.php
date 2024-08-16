protected function authenticated(Request $request, $user)
{
    if ($user->state === 0) {
        // Registro de información para depuración
        Log::info('User state is 0. Logging out.');

        Auth::logout();
        return redirect()->route('login')->with('error', 'Se encuentra en proceso de activación');
    }
    else if ($user->state === 1) {
        if($user->rol === 'persona'){
            return redirect()->route('home');
        } else if($user->rol === 'empresa'){
            return redirect()->route('gifts.all');
        } else if($user->rol === 'admin'){
            return redirect()->route('user.all');
        }
    } else {
        Auth::logout(); // Invalida la sesión
        return redirect()->route('login')->with('error', 'Tu cuenta está desactivada.');
    }
}
