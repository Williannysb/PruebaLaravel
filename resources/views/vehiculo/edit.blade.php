@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
               <br><br>

                <div class="card">

                    <h5 class="card-header">VEHICULOS</h5>
                    <div class="card-body">

                      <ul class="nav nav-tabs" id="myTab" role="tablist">
                        </ul>

                            <a  id="crearNuevoVehiculo"></a>
                            <form id="editForm" method="POST" name="editForm" class="form-horizontal">
                                @csrf
                                @method('PUT')
                            <div class="form-group">

                               Marca: <br>
                                      <select name="selmarca" id="selmarca" class="form-control" >
                                       <option value="null" required >Seleccione una Marca</option>
                                       @foreach ($marca as $mark)
                                       <option  {{$mark->id == $vehiculo->id_propietario ? 'selected' : '' }}  value="{{$mark->id}}">{{$mark->nombre}}</option>
                                       @endforeach
                                      </select>
                            </div>
                             <div class="form-group">
                                Modelo: <br>
                                <select name="selmodelo" id="selmodelo" class="form-control" >
                                    <option value="null" required >Seleccione un modelo</option>
                                    @foreach ($modelo as $model)
                                    <option  {{$model->id == $vehiculo->id_propietario ? 'selected' : '' }}  value="{{$model->id}}">{{$model->nombre}} </option>
                                    @endforeach
                                   </select>

                             </div>

                             <div class="form-group">
                                Placa: <br>
                                      <input type="text" class="form-control" id="txtplaca" name="txtplaca" placeholder="Ingrese Placa" aria-describedby="helpId"  value="{{ $vehiculo->placa }}" required>
                             </div>

                             <div class="form-group">
                                Color: <br>
                                      <input type="text" class="form-control" id="txtcolor" name="txtcolor" placeholder="Ingrese Color" aria-describedby="helpId" value="{{ $vehiculo->color }}" required >
                             </div>

                             <div for="date" class="form-group">
                                Fecha de Ingreso: <br>
                                <input id="date" type="date" class="form-control datepicker" name="date" aria-describedby="helpId" value="{{ $vehiculo->fecha_ingreso}}" required>
                             </div>
                             <div class="form-group">
                                Propietario: <br>
                                <select name="selpropietario" id="selpropietario" class="form-control">
                                    <option value="null" required>Seleccione un propietario</option>
                                    @foreach ($propietario as $propiet)
                                    <option  {{$propiet->id == $vehiculo->id_propietario ? 'selected' : '' }} value="{{$propiet->id}}">{{$propiet->nombre}}</option>
                                    @endforeach
                                   </select>

                             </div>
                            <br>
                             <button class="btn btn-primary" id="modificarVehiculo" value="Update">Modificar</button>
                             </form>
                           </div>
                                <hr>

                    </div>
                </div>
        </div>
    </div>
</div>

@endsection


@push('javascript')
<script>

    $('#modificarVehiculo').on('click', function(e){

    e.preventDefault();

    let selmarca  = $('#selmarca').val();
      let selmodelo = $('#selmodelo').val();
      let txtplaca  = $('#txtplaca').val();
      let txtcolor  = $('#txtcolor').val();
      let date      = $('#date').val();
      let selpropietario  = $('#selpropietario').val();
      let _token    = $('input[name=_token]').val();

    $.ajax({

    type:"PUT",
    url:"{{route('vehiculo.update', $vehiculo->id)}}",
    data:{

        id_modelo :selmodelo,
       placa     :txtplaca,
       color     :txtcolor,
       fecha_ingreso     :date,
       id_propietario :selpropietario,
       _token    :_token

    },

    dataType:'json',
        success:function(response){


        setTimeout(() => {
            toastr.success('Modificacion Exitosa');
            window.location.replace('{{route("vehiculo.home")}}')
        }, 3000);
    }


    })





    })








    </script>


@endpush
