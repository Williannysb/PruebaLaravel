<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropietarioStoreRequest;
use App\Http\Requests\PropietarioUpdateRequest;
use App\Models\Propietario;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests; // Recuperar datos de la vista
use Illuminate\Http\Request;

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

    public function store(PropietarioStoreRequest $request)
    {

        Propietario::create($request->all());
        return response()->json(['success' => true]);

    }
    public function edit($id)
    {
        // sirve para traer los datos a editar y los coloca en un formulario

        $propietario = Propietario::find($id);
        return view('propietario.edit', compact('propietario'));

    }

    public function update(PropietarioUpdateRequest $request, $id)
    {

        $propietario = Propietario::find($id);
        $propietario->update($request->all());
        return response()->json(['success' => true]);

    }

    public function destroy($id)
    {
        // elimina registro
        $propietario = Propietario::where('id', '=', $id)->first();
        $propietario->update(['status' => 0]);
        return back()->with('success');

    }

}
