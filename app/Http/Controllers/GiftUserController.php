<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GiftUser;
use App\Models\Gifts;
use App\Models\UserToys;
use App\Models\StateDonation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class GiftUserController extends Controller
{
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

        // Verificar si el usuario tiene donaciones en el estado 'en_recogida'
        $donacionesPendientes = StateDonation::where('user_id', $userId)
                                             ->where('status', 'en_recogida')
                                             ->count();

        // Si no hay donaciones pendientes en estado 'en_recogida', el usuario puede reclamar el bono
        if ($donacionesPendientes === 0) {
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

                        // Enviar el código del bono al correo del usuario
                        $asunto = 'Código del bono';
                        $mensaje = 'Has reclamado un bono con el siguiente código de canje: ' . $gift->codigobono . ' y puedes canjearlo en la tienda que se encuentra en la siguiente dirección:' . $gift->direccionEmpresa;


                        
                        $emailUsuario = Auth::user()->email;

                        Mail::raw($mensaje, function($message) use ($emailUsuario, $asunto) {
                            $message->to($emailUsuario)->subject($asunto);
                        });

                        return redirect()->route('gifts.index')->with('success', 'El bono se reclamó exitosamente.');
                    }
                } else {
                    return redirect()->route('gifts.index')->with('error', 'No tienes suficientes juguetes para reclamar el bono.');
                }
            } else {
                return redirect()->route('gifts.index')->with('error', 'Error al momento de reclamar.');
            }
        } else {
            return redirect()->route('gifts.index')->with('error', 'Tus donaciones aún no han sido validadas por el administrador.');
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
