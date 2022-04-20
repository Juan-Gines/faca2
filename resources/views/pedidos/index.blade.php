@extends('layouts.plantilla')

@section('variables')
  <script>
    var parametros={{Js::from($parametros)}};        
    var url='{{route('pedidos.index')}}';    
  </script>
@endsection

@section('contenido')
@dump($pedidos)

<div class="row justify-content-center p-3">
  <h2 class="text-center" style="color: #1652B5;">Listado de pedidos</h2>
</div>
<nav class="navbar navbar-expand-sm navbar-light bg-white navbar-fixed" aria-label="Eleventh navbar example">
  <div class="container-fluid justify-content-md-center">    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
      <ul class="navbar-nav ">  
        <li class="nav-item mx-2 ">
          <a href ="{{route('pedidos.create')}}" ><button class="btn btn-primary" type="button"><i class="fa-regular fa-clipboard icon" ></i>Nuevo pedido</button></a>
        </li>                      
        <li class="nav-item dropdown mx-2 ">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown09" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
            <span id="filter">
              <i class="fa-solid fa-filter"></i> Estado 
            </span> 
          </a>
          <ul class="dropdown-menu" aria-labelledby="dropdown09">
            <li><p class="dropdown-item m-0 dedo" id="fino" >Sin filtros</p></li>
            <li><p class="dropdown-item m-0 bg-primary dedo" id="fi2" >Acabado</p></li>
            <li><p class="dropdown-item m-0 bg-success dedo" id="fi1" >En producción</p></li>
            <li><p class="dropdown-item m-0 bg-warning dedo" id="fi3" >En preparación</p></li>
            <li><p class="dropdown-item m-0 bg-danger dedo" id="fi4" >Parado averia</p></li>
            <li><p class="dropdown-item m-0 dedo" id="fi0" >Sin empezar</p></li>
          </ul>
        </li>
        <li class="nav-item mx-2 ">
          <button class="btn btn-outline-dark border-dark " disabled id="btnSinFiltro" ><i class="fa-solid fa-filter-circle-xmark"></i></button>
        </li>
        <li class="nav-item mx-2 ">      
          <form id="search" action="{{route('pedidos.index')}}" method="GET">                                    
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
<div class="m-5">  
  <div class="row justify-content-center">
    <table class="table table-hover  text-center"  >
      <thead  class="table-primary table-header-fix">                
        <tr>          
          <th scope="col">
            <div id="numero" class="dedo">                
              <span>Número</span>
            </div>
          </th>
          <th scope="col">
            <div id="referencia" class="dedo">                
              <span>Referencia</span>
            </div>
          </th>
          <th scope="col">
            <div id="descripcion" class="dedo">                
              <span>Denominación</span>
            </div>
          </th>
          <th scope="col">
            <div id="maquina" class="dedo">                
              <span>Máquina</span>
            </div>            
          </th>
          <th scope="col">
            <div id="totalPiezas" class="dedo">                
              <span>Piezas totales</span>
            </div>
          </th>
          <th scope="col">
            <div id="tope" class="dedo">                
              <span>Piezas parciales</span>
            </div>
          </th>
          <th scope="col">
            <div id="estado" class="dedo">                
              <span>Estado</span>
            </div>
          </th>          
          <th scope="col">
            <div id="fechaInicio" class="dedo">                
              <span>Inicio</span>
            </div>
          </th>           
          <th scope="col">
            <div id="fechaFin" class="dedo">                
              <span>Fin</span>
            </div>
          </th>           
        </tr>
      </thead>
      <tbody>                
        @foreach($pedidos as $pedido)         
          <tr class="table-{{$color[$pedido->estado]}} clickable-row" data-bs-toggle="tooltip" data-bs-placement="auto" title="{{$pedido->comentario}}">          
            <td><a href="{{route('pedidos.show',$pedido)}}"><span class="badge bg-primary rounded-pill fs-6">{{$pedido->numero}}</span></a></td>            
            <td>{{$pedido->referencia}}</td>
            <td>{{$pedido->descripcion}}</td>                        
            <td>{{$pedido->maquina}}</td>                       
            <td>{{$pedido->totalPiezas}}</td>                       
            <td>{{$pedido->tope}}</td>                       
            <td><span class="badge bg-{{$color[$pedido->estado]}} {{$pedido->estado==1? 'text-dark':''}} rounded-pill badge-estado-fs ">{{$texto[$pedido->estado]}}</span></td>                       
            <td>{{!$pedido->fechaInicio =="" ? \Carbon\Carbon::parse(strtotime($pedido->fechaInicio))->formatLocalized('%d/%m/%Y') : ""}}</td>                       
            <td>{{!$pedido->fechaFin =="" ? \Carbon\Carbon::parse(strtotime($pedido->fechaFin))->formatLocalized('%d/%m/%Y') : ""}}</td>                       
          </tr>          
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<script src="{{asset('js/pedidos_index.js')}}"></script>
@endsection
@section('pie')
@endsection
