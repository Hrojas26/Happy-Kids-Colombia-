<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donation;
use RealRashid\SweetAlert\Facades\Alert;


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

       if($donation->save()){
            $message = 'Donación creada';
       } else{
            $message = 'Error al moneto de crear la donación, comunicarce con el administrador';
       }
        return view('page.donaRegalo', ['message' => $message]);
    }
}
