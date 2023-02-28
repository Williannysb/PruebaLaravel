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
use Illuminate\Support\Facades\BD; // permite trabajar con la  base de datos


class VehiculoController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }



    public function index(Request $request)
    {
        $vehiculo = Vehiculo::where('status','=','1')->with('modelo.marca')->get();
         return view('vehiculo.home', compact('vehiculo'));

    }


    public function create(){

        $modelo = Modelo::where('status','=','1')->with('marca')->get();
        $marca= Marca::where('status','=','1')->get();
        return view('vehiculo.create',compact('modelo','marca'));

}
  public function obtenerModelos($id) {

      $modelo = Modelo::where('status','=','1')->where('id_marca','=',$id)->with('marca')->get();

      return $modelo;


  }


    public function store(Request $request){
        $validated=$request->validate([
        'placa'=>'required|unique:vehiculos',
        'color'=>'required',
        'fecha_ingreso'=>'required|date',
        'id_modelo'=>'required'
        ]);

        Vehiculo::create($validated);
        return response()->json(['success' => true]);

    }

    public function edit($id){
// sirve para traer los datos a editar y los coloca en un formulario
        $vehiculo = Vehiculo::find($id);
        $modelo = Modelo::where('status','=','1')->with('marca')->get();
        $marca= Marca::where('status','=','1')->get();
        return view('vehiculo.edit',compact('vehiculo','modelo','marca'));
}

    public function update(Request $request, $id){
        $validated=$request->validate([
            'placa'=>'required|unique:vehiculos,placa,'.$id,
            'color'=>'required',
            'fecha_ingreso'=>'required|date',
            'id_modelo'=>'required'
            ]);
            $vehiculo = Vehiculo::find($id);
            $vehiculo->update($validated);
            return response()->json(['success' => true]);



    }

    public function destroy($id){
     // elimina registro
     $vehiculo = Vehiculo::where('id','=',$id)->get()->First();
     $vehiculo->update(['status' => 0]);
     return back()->with('success');

    }




}


