<?php

namespace App\Http\Controllers;

use App\Models\Gifts;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Ramsey\Uuid\Type\Integer;

class GiftsController extends Controller
{
    /**
     * Muestra la lista de bonos disponibles.
     */
    public function index()
    {
        $gifts = Gifts::where('state', 1)->get();

        if ($gifts->isEmpty()) {
            $message = '';
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
            'codigoBono' => 'required|string',
            'urlimage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validación de la imagen
            'expirationDate' => 'required|date',
            'direccionEmpresa' => 'required|string',
        ]);

        $imagenNombre = time() . '.' . $request->urlimage->extension(); // Nombre único para la imagen
        $request->urlimage->move(public_path('storage/images/'), $imagenNombre);
        $urlImagen = URL::to('/') . '/storage/images/' . $imagenNombre;

        // Crear un nuevo regalo
        $gift = new Gifts();
        $gift->name = $request->input('name');
        $gift->description = $request->input('description');
        $gift->urlimage = $urlImagen;
        $gift->company = auth()->user()->id;
        $gift->codigobono = $request->input('codigoBono');
        $gift->state = 1;
        $gift->expirationDate = $request->input('expirationDate');
        $gift->direccionEmpresa = $request->input('direccionEmpresa'); // Asigna la dirección
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
    public function update(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $description = $request->input('description');
        $state = $request->input('state');
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'state' => 'required|integer',
            //'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validación de la imagen

        ]);
        $gift = Gifts::find($id);
        if (!$gift) {
            return response()->json(['success' => false, 'message' => 'Bono no encontrado'], 404);
        }
        Log::error($request);
        /* $imagenNombre = time() . '.' . $request->image->extension(); // Nombre único para la imagen
        $request->image->move(public_path('storage/images/'), $imagenNombre);
        $urlImagen = URL::to('/') . '/storage/images/' . $imagenNombre;
*/

        $gift->name = $name;
        $gift->description = $description;
        $gift->state =  $state;
        // $gift->urlimage = $urlImagen;

        try {
            $gift->save();
            $gifts = Gifts::where('state', 1)->get();
            return response()->json(['success' => true, 'gifts' => $gifts]);
        } catch (\Exception $e) {

            return response()->json(['success' => false, 'message' => 'Error al guardar los cambios'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gifts $gifts)
    {
        Log::error($gifts);
        try {
            $gifts->delete();
            $gifts = Gifts::where('state', 1)->get();
            return response()->json(['success' => true, 'gifts' => $gifts]);
        } catch (\Exception $e) {

            return response()->json(['success' => false, 'message' => 'Error al Eliminar el Bono'], 500);
        }
    }
}