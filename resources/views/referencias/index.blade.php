@extends('layouts.plantilla')

@section('variables')
  <script>
    var parametros={{Js::from($parametros)}};        
    var url='{{route('referencias.index')}}';    
  </script>
@endsection

@section('contenido')
<div class="row justify-content-center p-3">
  <h2 class="text-center" style="color: #1652B5;">Listado de referencias</h2>
</div>
 <!-- <div class="col-auto">
    <a href="{{route('referencias.directorio')}}"><button class="btn btn-primary" type="button">obtener directorio</button></a>
 </div>
 <div class="col-auto">
    <a href="{{route('referencias.exportar')}}"><button class="btn btn-primary" type="button">obtener excel</button></a>
 </div>  --> 
<nav class="navbar navbar-expand-md navbar-light bg-white navbar-fixed" aria-label="Eleventh navbar example">
  <div class="container">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
      <ul class="navbar-nav ">  
        <li class="nav-item mx-2 ">
          <a href ="{{route('referencias.create')}}" ><button class="btn btn-primary" type="button"><i class="fa-regular fa-clipboard icon" ></i>Nueva referencia</button></a>
        </li>                      
        <li class="nav-item dropdown mx-2 ">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown09" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
            <span id="filter1">
              <i class="fa-solid fa-filter"></i>Estado 
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
        <li class="nav-item">
          <ul class="navbar-nav mb-2 mb-lg-2">                
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown09" data-bs-toggle="dropdown" aria-expanded="false">
                <span id="filter2">
                  <i class="fa-solid fa-filter"></i>Tipo 
                </span>
              </a>
              <ul class="dropdown-menu" aria-labelledby="dropdown09">
                <li><p class="dropdown-item dedo m-0" id="Todos" >Todos</p></li>
                <li><p class="dropdown-item dedo m-0" id="Tapa" >Tapa</p></li>
                <li><p class="dropdown-item dedo m-0" id="Tarro" >Tarro</p></li>
                <li><p class="dropdown-item dedo m-0" id="Tapones" >Tapones</p></li>
                <li><p class="dropdown-item dedo m-0" id="Sealed" >Sealed</p></li>
                <li><p class="dropdown-item dedo m-0" id="Rejilla" >Rejilla</p></li>
                <li><p class="dropdown-item dedo m-0" id="Polvera" >Polvera</p></li>
                <li><p class="dropdown-item dedo m-0" id="Obturador" >Obturador</p></li>
                <li><p class="dropdown-item dedo m-0" id="Dispenser" >Dispenser</p></li>
                <li><p class="dropdown-item dedo m-0" id="Cubilete" >Cubilete</p></li>
                <li><p class="dropdown-item dedo m-0" id="Contra obturador" >Contra obturador</p></li>
                <li><p class="dropdown-item dedo m-0" id="Botella" >Botella</p></li>            
              </ul>
            </li>
          </ul>
        </li>
        <li class="nav-item mx-2 ">
          <button class="btn btn-outline-dark border-dark " disabled id="btnSinFiltro" ><i class="fa-solid fa-filter-circle-xmark"></i></button>
        </li>
        <li class="nav-item mx-2 ">      
          <form id="search" action="{{route('referencias.index')}}" method="GET">                                    
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
    <table class="table table-hover  text-center"  >
      <thead  class="table-primary table-header-fix">                
        <tr>
          <th scope="col">
            <div class="dedo" id="numero">
              <span>Referencia</span>   
            </div>        
          </th>
          <th scope="col">
            <div class="dedo" id="tipo">
              <span>Tipo</span>  
            </div>            
          </th>
          <th scope="col">
            <div class="dedo" id="descripcion">
              <span>Denominación</span>  
            </div>            
          </th>
          <th scope="col">            
              <div class="dedo" id="ubicacion">
                <span>Ubicación almacen</span>
              </div>
          </th>                    
          <th scope="col">
            <div class="dedo" id="estado">
              <span>Estado</span>
            </div>
          </th>
          <th scope="col">
            <div class="dedo" id="cavidades">
              <span>Cavidades</span>  
            </div>            
          </th>
        </tr>
      </thead>
      <tbody>
        @if($referencias->count()<=0)
          <tr><td colspan="7"> No hay registros que mostrar</td></tr>
        @endif        
        @foreach($referencias as $referencia)        
          <tr class="table-{{$referencia->estado==0?'light':$color[$referencia->estado]}} " data-bs-toggle="tooltip" data-bs-placement="auto" title="{{$referencia->comentario}}">          
            <td><a href="{{route('referencias.show',$referencia->id)}}"><span class="badge bg-primary rounded-pill fs-6">{{$referencia->numero}}</span></a></td>            
            <td>{{$referencia->tipo}}</td>
            <td>{{$referencia->descripcion}}</td>
            <td>{{$referencia->ubicacion}}</td>                        
            <td><span class="badge bg-{{$color[$referencia->estado]}} {{$referencia->estado==1? 'text-dark':''}} rounded-pill badge-estado-fs ">{{$texto[$referencia->estado]}}</span></td>
            <td>{{$referencia->cavidades}}</td>           
          </tr>          
        @endforeach
      </tbody>
    </table>
    {!! $referencias->appends(Request::except('page'))->render() !!}
    <p>Mostrando {{$referencias->firstItem()}}-{{$referencias->lastItem()}} de {{$referencias->total()}} referencia(s)</p>
  </div>
</div>
<script src="{{asset('js/referencias_index.js')}}"></script>
@endsection
@section('pie')
@endsection
