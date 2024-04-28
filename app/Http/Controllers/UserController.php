<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function all()
    {
        $users = User::all(); // Obtener todos los usuarios desde la base de datos
        return view('page.empresa.dashboard', ['users' => $users]);

    }



}
