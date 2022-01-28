@extends('layouts.plantilla')


@section('contenido')
<div class="row justify-content-center p-3">
  <h2 class="text-center" style="color: #1652B5;">Listado de moldes</h2>
</div>
<!-- <div class="row justify-content-center">
  <div class="col-auto">
    <a href="{{route('moldes.guardar')}}"><button class="btn btn-primary" type="button">Leer excel</button></a>
  </div>
</div> -->
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
            <li><a class="dropdown-item " href="{{route('moldes.index')}}">Todos</a></li>
            <li><a class="dropdown-item bg-success" href="/faca2/public/moldes/listado/ok">Ok</a></li>
            <li><a class="dropdown-item bg-warning" href="/faca2/public/moldes/listado/reparando">En reparación</a></li>
            <li><a class="dropdown-item bg-danger" href="/faca2/public/moldes/listado/nook">No ok</a></li>
            <li><a class="dropdown-item" href="/faca2/public/moldes/listado/desconocido">Desconocido</a></li>
          </ul>
        </li>
      </ul>
      <div class="col-auto m-3">
        <a href ="{{route('moldes.create')}}" ><button class="btn btn-primary" type="button">Nuevo registro</button></a>
      </div>
      <form action="/faca2/public/moldes/buscar" method="GET">
        <input class="form-control" type="text" name="busqueda" placeholder="Buscar..." aria-label="Search">
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
          <tr class="table-{{$molde->estado}} clickable-row" data-bs-toggle="tooltip" data-bs-placement="auto" title="{{$molde->nombre}}">
          
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
