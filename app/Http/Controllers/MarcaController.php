<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use App\Models\Marca;
use App\Models\Modelo;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request; // Recuperar datos de la vista

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\BD;

class MarcaController extends Controller
{
    public function index(Request $request)
    {
        $marca = Marca::where('status','=','1')->get();
         return view('marca.marca', compact('marca'));

    }
    public function create(){


        $marca= Marca::where('status','=','1')->get();
        return view('marca.create',compact('marca'));

}


   public function store(Request $request){
    $validated=$request->validate([
    'nombre'=>'required',
    'descripcion'=>'required'

    ]);

    Marca::create($validated);
    return response()->json(['success' => true]);

}
public function edit($id){
    // sirve para traer los datos a editar y los coloca en un formulario



            $marca= Marca::find($id);
            return view('marca.edit',compact('marca'));

    }

        public function update(Request $request, $id){
            $validated=$request->validate([
                'nombre'=>'required',
                'descripcion'=>'required'
                ]);
                $marca= Marca::find($id);
                $marca->update($validated);
                return response()->json(['success' => true]);



        }

        public function destroy($id){
         // elimina registro
         $marca = Marca::where('id','=',$id)->get()->first();

         $marca->update(['status' => 0]);
         return back()->with('success');

        }

    /*    public function store(Request $request){
            $validated=$request->validate([
              'title' => 'required|unique:posts|
              max:255',
              'body' => 'required',
            ]);

            Marca::create($validated());
            return response()->json(['success' => true]);

        }
        */
}
