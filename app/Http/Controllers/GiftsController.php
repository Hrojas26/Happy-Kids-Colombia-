<?php

namespace App\Http\Controllers;

use App\Models\Gifts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GiftsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gifts = Gifts::where('state', 1)->get();

        if ($gifts->isEmpty()) {
            $message = 'No hay regalos disponibles en este momento.';
        } else {
            $message = null;
        }

        return view('page.bonos', ['gifts' => $gifts, 'message' => $message]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
             // Validar los datos del formulario
             $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'urlimage' => 'required|string',
                'expirationDate' => 'required|date',
            ]);

            // Crear un nuevo regalo
            $gift = new Gifts();
            $gift->name = $request->input('name');
            $gift->description = $request->input('description');
            $gift->urlimage = $request->input('urlimage');
            $gift->company =auth()->user()->id;
            $gift->state = 1;
            $gift->expirationDate = $request->input('expirationDate');
            $gift->save();
            // Redireccionar a alguna página después de crear el regalo (por ejemplo, a la lista de regalos)
            return redirect()->route('gifts.all')->with('success', 'Gift created successfully.');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            $companyId = Auth::user()->id;
            $gifts = Gifts::where('company', $companyId)->get();
            return redirect()->route('dashboard')->with('gifts', $gifts);
        } else {
            return view('page.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Gifts $gifts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gifts $gifts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gifts $gifts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gifts $gifts)
    {
        //
    }
}
