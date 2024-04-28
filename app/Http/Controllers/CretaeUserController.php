<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class CretaeUserController extends Controller
{
   /**
     * Crea un nuevo usuario a partir de una solicitud HTTP.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createUsuario(Request $request)
    {
        // Validar la solicitud HTTP si es necesario

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'tipo' => 'required|string', // Asegúrate de ajustar las reglas de validación según tu necesidad
        ]);

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
          }

        // Crea el usuario sin autenticarlo automáticamente
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'state' => $dat,
            'rol' => $data['tipo'],
        ]);

        // Puedes hacer algo más con el usuario creado aquí, si es necesario

        // Devuelve una respuesta, vista, o realiza una redirección según tu lógica de aplicación
        return view('page.index');
    }
}
