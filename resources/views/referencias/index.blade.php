@extends('layouts.plantilla')


@section('contenido')
<div class="row justify-content-center p-3">
  <h2 class="text-center" style="color: #1652B5;">Listado de referencias</h2>
</div>
 <div class="col-auto">
    <a href="{{route('referencias.directorio')}}"><button class="btn btn-primary" type="button">obtener directorio</button></a>
 </div>
 <div class="col-auto">
    <a href="{{route('referencias.exportar')}}"><button class="btn btn-primary" type="button">obtener excel</button></a>
 </div> 
<nav class="navbar navbar-expand-sm navbar-light bg-light rounded navbar-fixed" aria-label="Eleventh navbar example">
  <div class="container-fluid">    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsReferencias" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>    
    <div class="collapse navbar-collapse  justify-content-md-center" id="navbarsReferencias" >
      <ul class="navbar-nav mb-2 mb-lg-2">                
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown09" data-bs-toggle="dropdown" aria-expanded="false">Filtrar por estado</a>
          <ul class="dropdown-menu" aria-labelledby="dropdown09">
            <li><a class="dropdown-item " href="{{route('referencias.index')}}">Todos</a></li>
            <li><a class="dropdown-item bg-success" href="{{route('referencias.ok')}}">Ok</a></li>
            <li><a class="dropdown-item bg-warning" href="{{route('referencias.reparando')}}">En reparación</a></li>
            <li><a class="dropdown-item bg-danger" href="{{route('referencias.nook')}}">No ok</a></li>
            <li><a class="dropdown-item" href="{{route('referencias.desconocido')}}">Desconocido</a></li>
          </ul>
        </li>
      </ul>
      <div class="col-auto m-3">
        <a href ="{{route('referencias.create')}}" ><button class="btn btn-primary" type="button">Nueva referencia</button></a>
      </div>
      <form action="{{route('referencias.buscar')}}" method="GET">
        <input class="form-control" type="text" name="busqueda" placeholder="Buscar..." aria-label="Search">
      </form>      
    </div>
  </div>
</nav> 
<div class="m-5">  
  <div class="row justify-content-center">
    <table class="table table-hover  text-center"  >
      <thead  class="table-dark table-header-fix">                
        <tr>
          <th scope="col">Referencia</th>
          <th scope="col">Denominación</th>
          <th scope="col">Ubicación almacen</th>                    
          <th scope="col">Estado</th>
          <th scope="col">Cavidades</th>
        </tr>
      </thead>
      <tbody>        
        @foreach($referencias as $referencia)        
          <tr class="table-{{$referencia->estado}} clickable-row" data-bs-toggle="tooltip" data-bs-placement="auto" title="{{$referencia->comentario}}">          
            <td><a href="{{route('referencias.show',$referencia->id)}}">{{$referencia->numero}}</a></td>            
            <td>{{$referencia->descripcion}}</td>
            <td>{{$referencia->ubicacion}}</td>                        
            <td>{{$referencia->estadoTexto}}</td>
            <td>{{$referencia->cavidades}}</td>           
          </tr>          
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
@section('pie')
@endsection
