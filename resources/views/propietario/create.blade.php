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


                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <p>Corrige los siguientes errores:</p>
                                <ul>
                                    @foreach ($errors->all() as $message)
                                        <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form id="propietarioForm" name="propietarioForm" class="form-horizontal">
                            @csrf
                            <div class="form-group">
                                Cedula: <br>
                                <input type="text" class="form-control" id="txtcedula" name="txtcedula"
                                    placeholder="Ingrese Cedula">
                            </div>

                            <div class="form-group">
                                Nombre: <br>
                                <input type="text" class="form-control" id="txtnombre" name="txtnombre"
                                    placeholder="Ingrese Nombre">
                            </div>
                            <div class="form-group">
                                Apellido:
                                <br>
                                <input type="text" class="form-control" id="txtapellido" name="txtapellido"
                                    placeholder="Ingrese Apellido">
                            </div>
                            <div class="form-group">
                                Fecha de Nacimiento:
                                <br>
                                <input type="date" class="form-control datepicker" id="txtfecha" name="txtfecha"
                                    placeholder="Ingrese Fecha de nacimiento">
                            </div>
                            <br>
                            <button class="btn btn-primary" id="registrarPropietario" value="Create">Registrar</button>
                            <a href="{{ route('propietario.propietario') }}" class="btn btn-danger">Regresar</a>
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
        $("#registrarPropietario").on('click', function(e) {
            e.preventDefault();

            let txtcedula = $('#txtcedula').val();
            let txtnombre = $('#txtnombre').val();
            let txtapellido = $('#txtapellido').val();
            let txtfecha = $('#txtfecha').val();
            let _token = $('input[name=_token]').val();
            let fecha2 = new Date(txtfecha);
            let date = new Date();
            let anno = Math.floor((date - fecha2) / (365.25 * 24 * 60 * 60 * 1000));

            if (anno >= 18) {

                $.ajax({
                    type: "POST",
                    url: " /propietario/store ",

                    data: {

                        cedula: txtcedula,
                        nombre: txtnombre,
                        apellido: txtapellido,
                        fecha_nac: txtfecha,
                        anno: anno,
                        _token: _token

                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success == true) {
                            toastr.success('Registro Exitoso');

                            setTimeout(() => {
                                window.location.replace(
                                    '{{ route('propietario.propietario') }}')
                            }, 3000);
                        } else {
                            toastr.error("Error al registrar");
                        }

                    },
                    error: function(err) {

                        let variable = [];
                        variable = Object.values(err.responseJSON.errors)
                        variable.forEach((item) => {
                            let er = item;
                            item.forEach((msg) => {
                                toastr.error(msg);
                            })
                        })

                    }

                });
            } else {

                toastr.warning("Debe ser mayor de Edad");

            }

        });
    </script>
@endpush
