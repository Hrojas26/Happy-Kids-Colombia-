<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GiftUser;
use App\Models\Gifts;
use App\Models\UserToys;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class GiftUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $userId = Auth::id();
        $giftId = $request->input('id');

        // Verificar si ya existe una entrada para el usuario y el regalo
        $existingEntry = GiftUser::where('user_id', $userId)
                              ->where('gift_id', $giftId)
                              ->exists();

        if ($existingEntry) {
            return redirect()->route('gifts.index')->with('error', 'Ya has reclamado este bono anteriormente.');
        }

        $request->validate([
            'id' => 'required|exists:gifts,id',
        ]);


        $userToy = UserToys::where('user_id', $userId)->first();
        if ($userToy) {
            // Calcular la diferencia entre received_toys y redeemed_toys
            $diferencia = $userToy->received_toys - $userToy->redeemed_toys;
            if ($diferencia >= 10) {
                // Actualizar redeemed_toys agregando 10
                $userToy->redeemed_toys += 10;
                $userToy->save();

                $giftUser = new GiftUser([
                    'gift_id' => $giftId,
                    'user_id' => $userId,
                    'state' => 1, // Asignar el estado adecuado
                ]);

                if ($giftUser->save()) {
                    // Actualizar el estado del regalo a 2
                    $gift = Gifts::find($giftId);
                    if ($gift) {
                        $gift->state = 2;
                        $gift->save();
                    }
                    $asunto = 'Codigo del bono';
                    $mensaje = 'Has reclamado un bono con el siguiente código de canje:'.$gift->codigobono;
                    $emailUsuario = Auth::user()->email;

                    $resultadoEnvio = Mail::raw($mensaje, function($message) use ($emailUsuario, $asunto) {
                    $message->to($emailUsuario)->subject($asunto);
                    });
                return redirect()->route('gifts.index')->with('success', 'El bono se reclamó exitosamente.');
                }
            }
            else {
                    // Mostrar un mensaje indicando que no hay suficientes juguetes para reclamar el bono
                    return redirect()->route('gifts.index')->with('error', 'No tienes suficientes juguetes para reclamar el bono.');
                }
        }
        else {
            return redirect()->route('gifts.index')->with('error', 'Error al momento de reclamar');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(GiftUser $giftUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GiftUser $giftUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GiftUser $giftUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GiftUser $giftUser)
    {
        //
    }
}
