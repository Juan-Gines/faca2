@extends('layouts.plantilla')

@section('variables')
  <script>
    var parametros={{Js::from($parametros)}};        
    var url='{{route('moldes.index')}}';    
  </script>
@endsection

@section('contenido')

<div class="row justify-content-center p-3">
  <h2 class="text-center" style="color: #1652B5;">Listado de moldes</h2>
</div>
<!-- <div class="row justify-content-center">
  <div class="col-auto">
    <a href="{{route('moldes.guardar')}}"><button class="btn btn-primary" type="button">Leer excel</button></a>
  </div>
  <div class="col-auto">
    <a href="{{route('moldes.directorio')}}"><button class="btn btn-primary" type="button">obtener directorio</button></a>
  </div>
  <div class="col-auto">
    <a href="{{route('moldes.savedata')}}"><button class="btn btn-primary" type="button">obtener excel</button></a>
  </div>
</div> -->  
<nav class="navbar navbar-expand-md navbar-light bg-white navbar-fixed" aria-label="Eleventh navbar example">
  <div class="container">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
      <ul class="navbar-nav ">  
        <li class="nav-item mx-2 ">
          <a href ="{{route('moldes.create')}}" ><button class="btn btn-primary" type="button"><i class="fa-regular fa-clipboard icon" ></i>Nuevo molde</button></a>
        </li>                      
        <li class="nav-item dropdown mx-2 ">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown09" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
            <span id="filter">
              <i class="fa-solid fa-filter"></i> Estado 
            </span> 
          </a>
          <ul class="dropdown-menu" aria-labelledby="dropdown09">
            <li><p class="dropdown-item m-0 dedo" id="fino" >Sin filtros</p></li>
            <li><p class="dropdown-item m-0 bg-success dedo" id="fi2" >Ok</p></li>
            <li><p class="dropdown-item m-0 bg-warning dedo" id="fi1" >En reparación</p></li>
            <li><p class="dropdown-item m-0 bg-danger dedo" id="fi3" >No ok</p></li>
            <li><p class="dropdown-item m-0 dedo" id="fi0" >Desconocido</p></li>
          </ul>
        </li>
        <li class="nav-item mx-2 ">
          <button class="btn btn-outline-dark border-dark " disabled id="btnSinFiltro" ><i class="fa-solid fa-filter-circle-xmark"></i></button>
        </li>
        <li class="nav-item mx-2 ">      
          <form id="search" action="{{route('moldes.index')}}" method="GET">                                    
              <input class="form-control" type="text" name="busqueda" id="busqueda" value="{{$parametros['busqueda']}}" placeholder="Buscar..." aria-label="Search">                         
          </form>
        </li>
        <li class="nav-item">
          <button class="btn btn-outline-dark border-secondary" form="search"><i class="fa-solid fa-magnifying-glass icon"></i></button>
        </li>
      </ul>
    </div>  
  </div>
</nav> 
<div class="mx-5">  
  <div class="row justify-content-center">
    <table class="table table-hover text-center"  >
      <thead  class="table-primary table-header-fix">                
        <tr>
          <th scope="col">
            <div id="numero" class="dedo">                
              <span>Molde</span>
            </div>            
          </th>          
          <th scope="col">             
              <div id="descripcion" class="dedo">                
                <span>Descripción</span>
              </div>                      
          </th>          
          <th scope="col">
            <div id="ubicacionReal" class="dedo">                
              <span>Ubicación Almacen</span>
            </div>                       
          </th>          
          <th scope="col">
            <div id="ubicacionActual" class="dedo">                
              <span>Ubicación Actual</span>
            </div>                   
          </th>          
          <th scope="col">
            <div id="versionActual" class="dedo">                
              <span>Versión Actual</span>
            </div>             
          </th>          
          <th scope="col">
            <div id="estado" class="dedo">                
              <span>Estado</span>
            </div>            
          </th>          
          <th scope="col">
            <div id="cavidades" class="dedo">                
              <span>Cavidades</span>
            </div>                      
          </th>         
        </tr>
      </thead>
      <tbody>
        @if($moldes->count()<=0)
        <tr><td colspan="7"> No hay registros que mostrar</td></tr>
        @endif        
        @foreach($moldes as $molde)                
          <tr class="table-{{$molde->estado==0?'light':$color[$molde->estado]}} " data-bs-toggle="tooltip" data-bs-placement="auto" title="{{$molde->descripcion}}">          
            <td data-bs-toggle="tooltip" data-bs-placement="auto" title="Click para editar la info del molde"><a href="{{route('moldes.show',$molde)}}"><span class="badge bg-primary rounded-pill fs-6">{{$molde->numero}}</span></a></td>
            <td>{{$molde->descripcion}}</td>           
            <td> {{$molde->ubicacionReal}}</td>
            <td> {{$molde->ubicacionActual}}</td>
            <td> {{$molde->versionActual}}</td>
            <td><span class="badge bg-{{$color[$molde->estado]}} {{$molde->estado==1? 'text-dark':''}} rounded-pill badge-estado-fs ">{{$texto[$molde->estado]}}</span></td>
            <td> {{$molde->cavidades}}</td>           
          </tr>                    
        @endforeach        
      </tbody>      
    </table>
    {!! $moldes->appends(Request::except('page'))->render() !!}
        <p>Mostrando {{$moldes->firstItem()}}-{{$moldes->lastItem()}} de {{$moldes->total()}} molde(s)</p>   
  </div>
</div>
<script src="{{asset('js/moldes_index.js')}}"></script>
@endsection
@section('pie')
@endsection
