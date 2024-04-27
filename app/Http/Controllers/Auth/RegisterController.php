<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'tipo' => 'required|string|in:persona,empresa',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $dat = 0;

        if ($data['tipo'] == 'persona') {
            $dat = 1;
        }else{
            $asunto = 'Activar usuario';
            $mensaje = 'la empresa ' . $data['name'] . ' debe ser activada';
            $emailUsuario = env('MAIL_TO_ADDRESS'); // Obtiene la dirección de correo electrónico del archivo .env

            $resultadoEnvio = Mail::raw($mensaje, function($message) use ($emailUsuario, $asunto) {
                $message->to($emailUsuario)->subject($asunto);
            });
            if ($resultadoEnvio) {
                echo "El correo electrónico se envió correctamente.";
            } else {
                echo "Hubo un problema al enviar el correo electrónico.";
            }
          }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'state' => $dat,
            'rol' => $data['tipo'],
        ]);

    }
}
