<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehiculoStoreRequest;
use App\Http\Requests\VehiculoUpdateRequest;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Propietario;
use App\Models\Vehiculo;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests; // Recuperar datos de la vista
use Illuminate\Http\Request;
// permite trabajar con la  base de datos

class VehiculoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $vehiculo = Vehiculo::where('status', '=', '1')->with(['modelo.marca', 'propietario'])->get();
        return view('vehiculo.home', compact('vehiculo'));

    }

    public function create()
    {
        $propietario = Propietario::where('status', '=', '1')->get();
        $modelo = Modelo::where('status', '=', '1')->with('marca')->get();
        $marca = Marca::where('status', '=', '1')->get();
        return view('vehiculo.create', compact('modelo', 'marca', 'propietario'));

    }
    public function obtenerModelos($id)
    {

        $modelo = Modelo::where('status', '=', '1')->where('id_marca', '=', $id)->with('marca')->get();

        return $modelo;

    }

    public function store(VehiculoStoreRequest $request)
    {

        Vehiculo::create($request->all());
        return response()->json(['success' => true]);

    }

    public function edit($id)
    {
// sirve para traer los datos a editar y los coloca en un formulario
        $vehiculo = Vehiculo::find($id);
        $propietario = Propietario::where('status', '=', '1')->get();
        $modelo = Modelo::where('status', '=', '1')->with('marca')->get();
        $marca = Marca::where('status', '=', '1')->get();
        return view('vehiculo.edit', compact('vehiculo', 'modelo', 'marca', 'propietario'));
    }

    public function update(VehiculoUpdateRequest $request, $id)
    {

        $vehiculo = Vehiculo::find($id);
        $vehiculo->update($request->all());
        return response()->json(['success' => true]);

    }

    public function destroy($id)
    {
        // elimina registro
        $vehiculo = Vehiculo::where('id', '=', $id)->first();
        $vehiculo->update(['status' => 0]);
        return back()->with('success');

    }

}
