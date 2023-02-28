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


class ModeloController extends Controller
{
    public function index(Request $request)
    {
        $modelo = Modelo::where('status','=','1')->get();
         return view('modelo.modelo', compact('modelo'));

    }
    public function create(){


        $marca= Marca::where('status','=','1')->get();
        return view('modelo.create',compact('marca'));

}

   public function store(Request $request){
    $validated=$request->validate([
    'nombre'=>'required',
    'descripcion'=>'required',
    'id_marca'=>'required'

    ]);

    Modelo::create($validated);
    return response()->json(['success' => true]);

}
public function edit($id){
    // sirve para traer los datos a editar y los coloca en un formulario


            $modelo = Modelo::find($id);
            $marca= Marca::where('status','=','1')->get();
            return view('modelo.edit',compact('modelo','marca'));

    }

        public function update(Request $request, $id){
            $validated=$request->validate([
                'nombre'=>'required',
                'descripcion'=>'required',
                'id_marca'=>'required'

                ]);
                $modelo= Modelo::find($id);
                $modelo->update($validated);
                return response()->json(['success' => true]);



        }






        public function destroy($id){
            // elimina registro
            $modelo = Modelo::where('id','=',$id)->get()->First();
            $modelo->update(['status' => 0]);
            return back()->with('success');

           }

}
