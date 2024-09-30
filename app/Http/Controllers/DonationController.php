<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\StateDonation;
use App\Models\UserToys;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;


class DonationController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required|string',
            'dateCollection' => 'required|date',
            'timeCollection' => 'required|date_format:H:i',
            'numberToys' => 'required|integer',
            'observations' => 'nullable|string',
        ]);

        $userId = Auth::id();

        $donation = new Donation([
            'address' => $request->input('address'),
            'dateCollection' => $request->input('dateCollection'),
            'timeCollection' => $request->input('timeCollection'),
            'numberToys' => $request->input('numberToys'),
            'observations' => $request->input('observations'),
            'user_id' => $userId,
        ]);

        $message = 'Error al momento de crear la donación, comunicarse con el administrador';

        if ($donation->save()) {

            $stateDonation = new StateDonation([
                'user_id' => $userId,
                'donation_id' => $donation->id,
                'status' => 'en_recogida',
            ]);
            $stateDonation->save();

            // Buscar si existe una entrada para este usuario en la tabla user_toys
            $userToy = UserToys::where('user_id', $userId)->first();

            if ($userToy) {
                // Si existe, sumar el número de juguetes recibidos al número existente
                $userToy->received_toys += $donation->numberToys;
            } else {
                // Si no existe, crear una nueva entrada con el número de juguetes recibidos
                $userToy = new UserToys([
                    'received_toys' => $donation->numberToys,
                    'user_id' => $userId,
                ]);
            }

            // Guardar la entrada actualizada o nueva en la base de datos
            if ($userToy->save()) {
                $message = 'Donación creada y juguetes registrados correctamente';
            }
        }
    // Redireccionar a la página de agradecimiento con un mensaje de éxito
        return view('page.gracias', ['message' => $message]);
    }

    public function updateStatus(Request $request, $donationId)
    {

        $stateDonation = StateDonation::where('donation_id', $donationId)->first();
        if ($stateDonation) {
            $stateDonation->status = $request->status;
            $stateDonation->save();
            return redirect()->back()->with('success', 'Estado de la donación actualizado correctamente.');
        } else {
            return redirect()->back()->with('error', 'No se pudo encontrar el estado de la donación.');
        }
    }


}
