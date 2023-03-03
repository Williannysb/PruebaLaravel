@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <br><br>

                <div class="card">

                    <h5 class="card-header">MARCAS DE VEHICULOS</h5>
                    <div class="card-body">

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                        </ul>
                        <a href="javascript:void(0)" id="crearNuevaMarca"></a>
                        <form id="marcaForm" name="marcaForm" class="form-horizontal">
                            @csrf

                            <div class="form-group">
                                Nombre: <br>
                                <input type="text" class="form-control" id="txtnombre" name="txtnombre"
                                    placeholder="Ingrese Nombre" value="{{ $marca->nombre }}" required />
                            </div>
                            <div class="form-group">
                                Desccripcion:
                                <br>
                                <input type="text" class="form-control" id="txtdescripcion" name="txtdescripcion"
                                    placeholder="Ingrese Descripcion" value="{{ $marca->descripcion }}" required />
                            </div>
                            <br>
                            <button class="btn btn-primary" id="modificarMarca" value="Update">Modificar</button>
                            <a href="{{ route('marca.marca') }}" class="btn btn-danger">Regresar</a>

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
        $('#modificarMarca').on('click', function(e) {

            e.preventDefault();

            let txtnombre = $('#txtnombre').val();
            let txtdescripcion = $('#txtdescripcion').val();

            let _token = $('input[name=_token]').val();

            $.ajax({

                type: "PUT",
                url: "{{ route('marca.update', $marca->id) }}",
                data: {

                    nombre: txtnombre,
                    descripcion: txtdescripcion,
                    _token: _token
                },

                dataType: 'json',
                success: function(response) {

                    toastr.success('Modificacion Exitosa');
                    setTimeout(() => {
                        window.location.replace('{{ route('marca.marca') }}')
                    }, 3000);

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
