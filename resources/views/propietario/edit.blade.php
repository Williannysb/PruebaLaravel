@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
               <br><br>

                <div class="card">

                    <h5 class="card-header">PROPIETARIO</h5>
                    <div class="card-body">

                      <ul class="nav nav-tabs" id="myTab" role="tablist">


                        </ul>
                        <a href="javascript:void(0)" id="crearNuevoPropietario"></a>
                        <form id="propietarioForm" name="propietarioForm" class="form-horizontal">
                            @csrf
                            <div class="form-group">
                                Cedula: <br>
                               <input type="text" class="form-control" id="txtcedula" name="txtcedula" placeholder="Ingrese Cedula" aria-describedby="helpId" value="{{ $propietario->cedula }}" required>
                               </div>
                           <div class="form-group">
                            Nombre: <br>
                           <input type="text" class="form-control" id="txtnombre" name="txtnombre" placeholder="Ingrese Nombre" aria-describedby="helpId" value="{{ $propietario->nombre }}" required>
                           </div>
                          <div class="form-group">
                            Apellido:
                            <br>
                           <input type="text" class="form-control" id="txtapellido" name="txtapellido" placeholder="Ingrese Apellido" aria-describedby="helpId" value="{{ $propietario->apellido }}" required>
                           </div>
                           <div class="form-group">
                            Fecha de Nacimiento:
                            <br>
                           <input type="date" class="form-control datepicker" id="date" name="date" placeholder="Ingrese Fecha de nacimiento" aria-describedby="helpId" value="{{ $propietario->fecha_nac }}" required>
                           </div>
                           <br>
                           <button class="btn btn-primary" id="modificarPropietario" value="Update">Modificar</button>
                           <br>


                         </form>

                       </div>
                            <hr>

                   </div>

                </div>





            </div>

    </div>
</div>
</div>

@endsection
@push('javascript')

<script>

$('#modificarPropietario').on('click', function(e){

e.preventDefault();

let txtcedula =$('#txtcedula').val();
let txtnombre =$('#txtnombre').val();
let txtapellido=$('#txtapellido').val();
let date=$('#date').val();
let _token = $('input[name=_token]').val();

$.ajax({

type:"PUT",
url:"{{route('propietario.update', $propietario->id)}}",
data:{

    cedula : txtcedula,
    nombre : txtnombre,
    apellido : txtapellido,
    fecha_nac : date,
    _token : _token
},

dataType:'json',
    success:function(response){


    setTimeout(() => {
        toastr.success('Modificacion Exitosa');
        window.location.replace('{{route("propietario.propietario")}}')
    }, 3000);
}


})





})








</script>

@endpush
