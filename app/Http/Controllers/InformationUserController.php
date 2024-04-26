<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\StateDonation;
use App\Models\Gifts;
use App\Models\GiftUser;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;


class InformationUserController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // Obtener todas las donaciones del usuario actual
        $donations = Donation::where('user_id', $userId)->get();

        // Obtener el estado de cada donación
        $donationStatuses = StateDonation::whereIn('donation_id', $donations->pluck('id'))->get();

// Sumar la cantidad de juguetes entregados
$deliveredDonationsCount = $donationStatuses->where('status', 'entregado')
                                      ->map(function ($donationStatus) {
                                          return $donationStatus->donation->numberToys;
                                      })
                                      ->sum();

        // Sumar el total de juguetes donados
        $totalToys = $donations->sum('numberToys');
        $gifts = [];

        // Obtener los bonos reclamados por el usuario
        $userGifts = GiftUser::where('user_id', $userId)
                             ->with('gift') // Cargar la relación con el modelo Gift
                             ->get();

        if ($userGifts->isEmpty()) {
            // Si el usuario no tiene bonos reclamados, muestra un mensaje
            $message = 'No tiene bonos reclamados.';
        } else {
            // Si el usuario tiene bonos reclamados, pasa los resultados a la vista
            $gifts = $userGifts->pluck('gift'); // Obtener solo los datos de las gifts
            $message = null;
        }

        return view('page.informacionUser', compact('donations', 'totalToys', 'donationStatuses', 'deliveredDonationsCount', 'gifts', 'message'));
  }

public function gifts()
{
    return $this->belongsToMany(Gift::class)->withPivot('state');
}
}
