<?php

namespace App\Http\Controllers;

use App\Models\Gifts;
use Illuminate\Http\Request;
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
    public function create()
    {
        //
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
