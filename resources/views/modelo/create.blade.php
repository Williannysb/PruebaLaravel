@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <br><br>

                <div class="card">

                    <h5 class="card-header">MODELOS</h5>
                    <div class="card-body">

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                        </ul>

                        <a href="javascript:void(0)" id="crearNuevoModelo"></a>
                        <form id="modeloForm" name="modeloForm" class="form-horizontal">
                            @csrf
                            <div class="form-group">

                                Marca: <br>
                                <select name="selmarca" id="selmarca" class="form-control">
                                    <option value="null">Seleccione una Marca</option>
                                    @foreach ($marca as $marcas)
                                        <option value="{{ $marcas->id }}">{{ $marcas->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                Nombre: <br>
                                <input type="text" class="form-control" id="txtnombre" name="txtnombre"
                                    placeholder="Ingrese Nombre">
                            </div>
                            <div class="form-group">
                                Desccripcion:
                                <br>
                                <input type="text" class="form-control" id="txtdescripcion" name="txtdescripcion"
                                    placeholder="Ingrese Descripcion">
                            </div>
                            <br>
                            <button class="btn btn-primary" id="registrarModelo" value="Create">Registrar</button>
                            <a href="{{ route('modelo.modelo') }}" class="btn btn-danger">Regresar</a>
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
        $("#registrarModelo").on('click', function(e) {
            e.preventDefault();
            let selmarca = $('#selmarca').val();
            let txtnombre = $('#txtnombre').val();
            let txtdescripcion = $('#txtdescripcion').val();
            let _token = $('input[name=_token]').val();

            $.ajax({
                type: "POST",
                url: " /modelo/store ",

                data: {

                    id_marca: selmarca,
                    nombre: txtnombre,
                    descripcion: txtdescripcion,
                    _token: _token

                },
                dataType: 'json',
                success: function(response) {
                    if (response.success == true) {
                        toastr.success('Registro Exitoso');
                        setTimeout(() => {
                            window.location.replace(
                                '{{ route('modelo.modelo') }}')
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
        });
    </script>
@endpush
