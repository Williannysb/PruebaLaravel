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

                          <li class="nav-item" role="presentation">

                          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Listado de vehiculos</button>

                          </li>
                          <a href="{{route('vehiculo.create')}}"class="btn btn-danger">
                            <i class="fas fa-trash"></i>Registrar Vehiculo</a>

                        </ul>
                        <div class="tab-content" id="myTabContent">

                             <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                 <p class="card-text"></p>
                                <div class= "table table-responsive"> </div>
                                    <table id="tabla-vehiculo"class="table table-sm table-hover">
                                    <thead>
                                       <th>Id</th>
                                       <th>Marca</th>
                                       <th>Modelo</th>
                                       <th>Placa</th>
                                       <th>Color</th>
                                       <th>Fecha de Ingreso</th>
                                       <th>Acciones</th>

                                   </thead>
                                   <tbody>
                                     @foreach ( $vehiculo as $vehiculo)

                                     <tr>
                                      <td>{{$vehiculo->id}}</td>
                                      <td>{{$vehiculo->modelo->marca->nombre}}</td>
                                      <td>{{$vehiculo->modelo->nombre}}</td>
                                      <td>{{$vehiculo->placa}}</td>
                                      <td>{{$vehiculo->color}}</td>
                                      <td>{{$vehiculo->fecha_ingreso}}</td>
                                      <td>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <a href="{{route('vehiculo.edit',$vehiculo->id)}}" class="btn btn-primary">
                                        <i  class="fas fa-trash"></i>Editar</a>
                                    </div>
                                    <div class="col-md-3">
                                        <form action="{{route('vehiculo.destroy', $vehiculo->id)}}" method="POST">
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

                    </div>
                </div>
        </div>
    </div>
</div>

@endsection

