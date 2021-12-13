@extends('layouts.plantilla')

@section('cabecera')
  Listado de moldes
@endsection
@section('contenido')
<div class="row justify-content-center p-3">
  <h2 class="text-center" style="color: #1652B5;">Listado de moldes</h2>
</div>

<nav class="navbar navbar-expand-sm navbar-light bg-light rounded" aria-label="Eleventh navbar example">
  <div class="container-fluid">    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsMoldes" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>    
    <div class="collapse navbar-collapse  justify-content-md-center" id="navbarsMoldes" >
      <ul class="navbar-nav mb-2 mb-lg-2">                
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown09" data-bs-toggle="dropdown" aria-expanded="false">Filtrar por estado</a>
          <ul class="dropdown-menu" aria-labelledby="dropdown09">
            <li><a class="dropdown-item bg-success" href="#">Ok</a></li>
            <li><a class="dropdown-item bg-warning" href="#">En reparación</a></li>
            <li><a class="dropdown-item bg-danger" href="#">No ok</a></li>
            <li><a class="dropdown-item" href="#">Desconocido</a></li>
          </ul>
        </li>
      </ul>
      <div class="col-auto m-3">
        <a href ="{{route('moldes.create')}}" ><button class="btn btn-primary" type="button">Nuevo registro</button></a>
      </div>
      <form>
        <input class="form-control" type="text" placeholder="Buscar..." aria-label="Search">
      </form>      
    </div>
  </div>
</nav>  
<div class="m-5">
  
  <div class="row justify-content-center">
    <table class="table table-hover"  >
      <thead>                
        <tr>
          <th>Numero molde</th>
          <th>Ubicación almacen</th>
          <th>Ubicación actual</th>
          <th>versión actual</th>
          <th>Estado</th>
          <th>Cavidades</th>
        </tr>
      </thead>
      <tbody>
        @foreach($moldes as $molde)                            
          <tr class="table-{{$molde->estado}} clickable-row">
          
            <td><a href="{{route('moldes.show',$molde->id)}}">{{$molde->numero}}</a></td>
            
            <td>{{$molde->ubicacionReal}}</td>
            <td>{{$molde->ubicacionActual}}</td>
            <td>{{$molde->versionActual}}</td>
            <td>{{$molde->estadoTexto}}</td>
            <td>{{$molde->cavidades}}</td>
            
          </tr>
          
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
@section('pie')
@endsection
