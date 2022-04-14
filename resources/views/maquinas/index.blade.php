@extends('layouts.plantilla')

@section('variables')
  <script>
    var parametros={{Js::from($parametros)}};        
    var url='{{route('maquinas.index')}}';    
  </script>
@endsection

@section('contenido')
<div class="row justify-content-center p-3">
  <h2 class="text-center" style="color: #1652B5;">Listado de máquinas</h2>
</div>
<nav class="navbar navbar-expand-md navbar-light bg-white navbar-fixed" aria-label="Eleventh navbar example">
  <div class="container">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
      <ul class="navbar-nav ">  
        <li class="nav-item mx-2 ">
         <a href ="{{route('maquinas.create')}}" ><button class="btn btn-primary" type="button"><i class="fa-regular fa-clipboard icon"></i>Nueva máquina</button></a>
        </li>
        <li class="nav-item">
          <ul class="navbar-nav mb-2 mb-lg-2">                
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown09" data-bs-toggle="dropdown" aria-expanded="false">
                <span id="filter">
                  <i class="fa-solid fa-filter"></i>Tipo 
                </span>
              </a>
              <ul class="dropdown-menu" aria-labelledby="dropdown09">
                <li><p class="dropdown-item dedo m-0" id="todos" >Todos</p></li>
                <li><p class="dropdown-item dedo m-0" id="activa" >Activa</p></li>
                <li><p class="dropdown-item dedo m-0" id="inactiva" >Inactiva</p></li>                            
              </ul>
            </li>
          </ul>
        </li>
        <li class="nav-item mx-2 ">
          <button class="btn btn-outline-dark border-dark " disabled id="btnSinFiltro" ><i class="fa-solid fa-filter-circle-xmark"></i></button>
        </li>
        <li class="nav-item mx-2 ">
          <form action="{{route('maquinas.index')}}" id="search" method="GET">
            <input class="form-control" type="text" name="busqueda" placeholder="Buscar..." value="{{$parametros['busqueda']}}" aria-label="Search">
          </form>
        </li>
        <li class="nav-item">
          <button class="btn btn-outline-dark border-secondary" form="search"><i class="fa-solid fa-magnifying-glass icon"></i></button>
        </li> 
      </ul>  
  </div>
</nav> 
<div class="mx-5">  
  <div class="row justify-content-center">
    <table class="table table-hover  text-center"  >
      <thead  class="table-primary table-header-fix">                
        <tr>
          <th scope="col">
            <div class="dedo" id="numero">
              <span>Nº Máquina</span>   
            </div>        
          </th>
          <th scope="col">
            <div class="dedo" id="descripcion">
              Descripción
            </th>
          <th scope="col">
            <div class="dedo" id="sala">
              Sala
            </th>                    
          <th scope="col">
            <div class="dedo" id="estado">
             Estado
            </th>          
        </tr>
      </thead>
      <tbody>        
        @foreach($maquinas as $maquina)        
          <tr class="table-{{$maquina->estado}} clickable-row" data-bs-toggle="tooltip" data-bs-placement="auto" title="{{$maquina->comentario}}">          
            <td><a href="{{route('maquinas.show',$maquina)}}">
              <span class="badge bg-primary rounded-pill fs-6">{{$maquina->numero}}</span>
            </a></td>            
            <td>{{$maquina->descripcion}}</td>
            <td>{{$maquina->sala}}</td>                        
            <td>
              @if ($maquina->activa)
                <span class="badge bg-success rounded-pill badge-estado-fs ">Activa</span>
              @else
               <span class="badge bg-danger rounded-pill badge-estado-fs ">Inactiva</span>
              @endif
            </td>                       
          </tr>          
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<script src="{{asset('js/maquinas_index.js')}}"></script>
@endsection
@section('pie')
@endsection
