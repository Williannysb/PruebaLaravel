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
                                   <input type="text" class="form-control" id="txtcedula" name="txtcedula" placeholder="Ingrese Cedula">
                                   </div>
                               <div class="form-group">
                                Nombre: <br>
                               <input type="text" class="form-control" id="txtnombre" name="txtnombre" placeholder="Ingrese Nombre">
                               </div>
                              <div class="form-group">
                                Apellido:
                                <br>
                               <input type="text" class="form-control" id="txtapellido" name="txtapellido" placeholder="Ingrese Apellido">
                               </div>
                               <div class="form-group">
                                Fecha de Nacimiento:
                                <br>
                               <input type="date" class="form-control datepicker" id="date" name="date" placeholder="Ingrese Fecha de nacimiento">
                               </div>
                               <br>
                               <button class="btn btn-primary" id="registrarPropietario" value="Create">Registrar</button>
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
    $("#registrarPropietario").on('click', function(e){
      e.preventDefault();

      let txtcedula    = $('#txtcedula').val();
      let txtnombre    = $('#txtnombre').val();
      let txtapellido  = $('#txtapellido').val();
      let date         = $('#date').val();
      let _token       = $('input[name=_token]').val();



   $.ajax({
    type: "POST",
    url: " /propietario/store ",

    data:{

       cedula     :txtcedula,
       nombre     :txtnombre,
       apellido   :txtapellido,
       fecha_nac  :date,
       _token    :_token

    },
    dataType:'json',
    success:function(response){


    setTimeout(() => {
        toastr.success('Registro Exitoso');
        window.location.replace('{{route("propietario.propietario")}}')
    }, 3000);
}

   })
});

</script>

@endpush

