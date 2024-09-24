<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Donation;
use App\Models\Gifts;
use App\Models\StateDonation;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function all()
    {
        $users = User::all(); // Obtener todos los usuarios desde la base de datos
        $gifts = Gifts::where('state', 1)->get();
        $donationStatuses = StateDonation::with('donation')->get();

        return view('page.empresa.dashboard', ['users' => $users, 'donationes' => $donationStatuses, 'gifts' => $gifts]);
    }

    public function saveUserEdit(Request $request)
    {
        // Obtener datos del usuario
        $id = $request->input('id');
        $name = $request->input('name');
        $email = $request->input('email');
        $state = $request->input('state');
        $rol = $request->input('rol');

        // Buscar el usuario por su ID
        $user = User::find($id);

        // Verificar si el usuario existe
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Usuario no encontrado'], 404);
        }

        // Actualizar los campos del usuario
        $user->name = $name;
        $user->email = $email;
        $user->state =  $state;
        $user->rol = $rol;

        // Guardar los cambios en la base de datos
        try {
            $user->save();
            $users = User::all();
            return response()->json(['success' => true, 'users' => $users]);
        } catch (\Exception $e) {
            // Manejar cualquier error durante el guardado
            return response()->json(['success' => false, 'message' => 'Error al guardar los cambios'], 500);
        }
    }
}