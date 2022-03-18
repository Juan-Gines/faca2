@extends('layouts.plantilla')


@section('contenido')
<div class="row justify-content-center p-3">
  <h2 class="text-center" style="color: #1652B5;">Listado de máquinas</h2>
</div>
<nav class="navbar navbar-expand-sm navbar-light bg-light rounded navbar-fixed" aria-label="Eleventh navbar example">
  <div class="container-fluid justify-content-md-center">    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsmaquinas" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>     
    <div class="col-auto m-3">
      <a href ="{{route('maquinas.create')}}" ><button class="btn btn-primary" type="button"><i class="fa-regular fa-clipboard icon"></i>Nueva máquina</button></a>
    </div>
    <div class="col-auto m-3">
      <form action="{{route('maquinas.buscar')}}" method="GET">
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
          <th scope="col">Número</th>
          <th scope="col">Descripción</th>
          <th scope="col">Sala</th>                    
          <th scope="col">Estado</th>          
        </tr>
      </thead>
      <tbody>        
        @foreach($maquinas as $maquina)        
          <tr class="table-{{$maquina->estado}} clickable-row" data-bs-toggle="tooltip" data-bs-placement="auto" title="{{$maquina->comentario}}">          
            <td><a href="{{route('maquinas.show',$maquina->id)}}">{{$maquina->numero}}</a></td>            
            <td>{{$maquina->descripcion}}</td>
            <td>{{$maquina->sala}}</td>                        
            <td>{{$maquina->activa}}</td>                       
          </tr>          
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
@section('pie')
@endsection
