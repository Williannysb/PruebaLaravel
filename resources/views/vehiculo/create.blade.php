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
                            <form id="vehiculoForm" method="POST" name="vehiculoForm" class="form-horizontal">
                                @csrf
                            <div class="form-group">

                               Marca: <br>
                                      <select name="selmarca" id="selmarca" class="form-control">
                                       <option value="null">Seleccione una Marca</option>
                                       @foreach ($marca as $mark)
                                       <option value="{{$mark->id}}">{{$mark->nombre}}</option>
                                       @endforeach
                                      </select>
                            </div>
                             <div class="form-group">
                                Modelo: <br>
                                <select name="selmodelo" id="selmodelo" class="form-control">
                                    <option value="null">Seleccione un modelo</option>
                                    @foreach ($modelo as $model)
                                    <option value="{{$model->id}}">{{$model->nombre}}</option>
                                    @endforeach
                                   </select>

                             </div>

                             <div class="form-group">
                                Placa: <br>
                                      <input type="text" class="form-control" id="txtplaca" name="txtplaca" placeholder="Ingrese Placa">
                             </div>

                             <div class="form-group">
                                Color: <br>
                                      <input type="text" class="form-control" id="txtcolor" name="txtcolor" placeholder="Ingrese Color">
                             </div>

                             <div for="date" class="form-group">
                                Fecha de Ingreso: <br>
                                <input id="date" type="date" class="form-control datepicker" name="date">
                             </div>
                            <br>
                             <button class="btn btn-primary" id="registrarVehiculo" value="Create">Registrar</button>
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
    $('#selmarca').on('change', function(e){
                var id = e.target.value;
                $.get('/marca/modelo/' + id,function(data) {
                    $('#selmodelo').empty();
                    $('#selmodelo').append('<option value="" disable="true" selected="true">Seleccione un modelo</option>');
                    $.each(data, function(fetch, regenciesObj){
                        console.log(data);
                        $('#selmodelo').append('<option value="'+ regenciesObj.id +'">'+ regenciesObj.nombre +'</option>');
                    });
                });
            });
</script>

<script>

    $("#registrarVehiculo").on('click', function(e){
      e.preventDefault();


      let selmarca  = $('#selmarca').val();
      let selmodelo = $('#selmodelo').val();
      let txtplaca  = $('#txtplaca').val();
      let txtcolor  = $('#txtcolor').val();
      let date      = $('#date').val();
      let _token    = $('input[name=_token]').val();



   $.ajax({
    type: "POST",
    url: " /vehiculo/store ",

    data:{

       id_modelo :selmodelo,
       placa     :txtplaca,
       color     :txtcolor,
       fecha_ingreso     :date,
       _token    :_token

    },
    dataType:'json',
    success:function(response){


    setTimeout(() => {
        toastr.success('Registro Exitoso');
        window.location.replace('{{route("vehiculo.home")}}')
    }, 3000);
}

   })
});

</script>

@endpush
