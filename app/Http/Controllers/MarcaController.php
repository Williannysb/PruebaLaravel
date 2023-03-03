<?php

namespace App\Http\Controllers;

use App\Http\Requests\MarcaStoreRequest;
use App\Http\Requests\MarcaUpdateRequest;
use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function index(Request $request)
    {
        $marca = Marca::where('status', '=', '1')->get();
        return view('marca.marca', compact('marca'));

    }
    public function create()
    {

        $marca = Marca::where('status', '=', '1')->get();
        return view('marca.create', compact('marca'));

    }

    public function store(MarcaStoreRequest $request)
    {

        Marca::create($request->all());
        return response()->json(['success' => true]);

    }
    public function edit($id)
    {
        // sirve para traer los datos a editar y los coloca en un formulario

        $marca = Marca::find($id);
        return view('marca.edit', compact('marca'));

    }

    public function update(MarcaUpdateRequest $request, $id)
    {

        $marca = Marca::find($id);
        $marca->update($request->all());
        return response()->json(['success' => true]);

    }

    public function destroy($id)
    {
        // elimina registro
        $marca = Marca::where('id', '=', $id)->first();

        $marca->update(['status' => 0]);
        return back()->with('success');

    }

}
