<?php
namespace App\Http\Controllers;

use App\Http\Requests\ModeloStoreRequest;
use App\Http\Requests\ModeloUpdateRequest;
use App\Models\Marca;
use App\Models\Modelo;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests; // Recuperar datos de la vista
use Illuminate\Http\Request;

// permite trabajar con la  base de datos

class ModeloController extends Controller
{
    public function index(Request $request)
    {
        $modelo = Modelo::where('status', '=', '1')->get();
        return view('modelo.modelo', compact('modelo'));

    }
    public function create()
    {

        $marca = Marca::where('status', '=', '1')->get();
        return view('modelo.create', compact('marca'));

    }

    public function store(ModeloStoreRequest $request)
    {

        Modelo::create($request->all());
        return response()->json(['success' => true]);

    }
    public function edit($id)
    {
        // sirve para traer los datos a editar y los coloca en un formulario

        $modelo = Modelo::find($id);
        $marca = Marca::where('status', '=', '1')->get();
        return view('modelo.edit', compact('modelo', 'marca'));

    }

    public function update(ModeloUpdateRequest $request, $id)
    {

        $modelo = Modelo::find($id);
        $modelo->update($request->all());
        return response()->json(['success' => true]);

    }

    public function destroy($id)
    {
        // elimina registro
        $modelo = Modelo::where('id', '=', $id)->get()->first();
        $modelo->update(['status' => 0]);
        return back()->with('success');

    }

}
