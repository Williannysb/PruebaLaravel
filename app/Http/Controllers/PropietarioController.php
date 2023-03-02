<?php

namespace App\Http\Controllers;


use App\Models\Vehiculo;
use App\Models\Marca;
use App\Models\Propietario;
use App\Models\Modelo;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request; // Recuperar datos de la vista
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class PropietarioController extends Controller
{

  public function index(Request $request)
    {
        $propietario = Propietario::where('status', '=', '1')->get();
        return view('propietario.propietario', compact('propietario'));

    }
    public function create()
    {

        $propietario = Propietario::where('status', '=', '1')->get();
        return view('propietario.create', compact('propietario'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'cedula'=> 'required|unique:propietarios',
            'nombre' => 'required',
            'apellido' => 'required',
            'fecha_nac' => 'required'

        ]);

        Propietario::create($validated);
        return response()->json(['success' => true]);

    }
    public function edit($id)
    {
        // sirve para traer los datos a editar y los coloca en un formulario

        $propietario = Propietario::find($id);
        return view('propietario.edit', compact('propietario'));

    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'cedula'=> 'required|unique:propietarios,cedula,'.$id,
            'nombre' => 'required',
            'apellido' => 'required',
            'fecha_nac' => 'required'
        ]);
        $propietario = Propietario::find($id);
        $propietario->update($validated);
        return response()->json(['success' => true]);

    }

    public function destroy($id)
    {
        // elimina registro
        $propietario = Propietario::where('id','=',$id)->get()->first();
        $propietario->update(['status' => 0]);
        return back()->with('success');

    }

}

