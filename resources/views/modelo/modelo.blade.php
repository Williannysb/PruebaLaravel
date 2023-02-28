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
                          <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Listado de modelos</button>
                          </li>
                          <a href="{{route('modelo.create')}}"class="btn btn-danger">
                            <i class="fas fa-trash"></i>Registrar Modelo</a>

                        </ul>

                        </ul>
                        <div class="tab-content" id="myTabContent">
                             <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                 <p class="card-text"></p>
                                <div class= "table table-responsive"> </div>
                                    <table id="tabla-modelo"class="table table-sm table-hover">
                                    <thead>
                                       <th>Id</th>
                                       <th>Modelo</th>
                                       <th>Marca</th>
                                       <th>Descripcion</th>
                                       <th>Acciones</th>
                                   </thead>
                                   <tbody>
                                     @foreach ( $modelo as $modelo)

                                     <tr>
                                      <td>{{$modelo->id}}</td>
                                      <td>{{$modelo->nombre}}</td>
                                      <td>{{$modelo->marca->nombre}}</td>
                                      <td>{{$modelo->descripcion}}</td>
                                      <td>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <a href="{{route('modelo.edit',$modelo->id)}}" class="btn btn-primary">
                                        <i  class="fas fa-trash"></i>Editar</a>
                                    </div>
                                    <div class="col-md-2">
                                        <form action="{{route('modelo.destroy', $modelo->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                          <button class="btn btn-danger" type="submit">
                                            <i class="fas fa-trash"></i>Eliminar</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                                     </tr>
                                       @endforeach
                                  </tbody>

                                    </table>

                                </div>
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



</script>

@endpush
