@extends('layouts.plantilla')


@section('contenido')
<div class="row justify-content-center p-3">
  <h2 class="text-center" style="color: #1652B5;">Listado de pedidos</h2>
</div>
<nav class="navbar navbar-expand-sm navbar-light bg-light rounded navbar-fixed" aria-label="Eleventh navbar example">
  <div class="container-fluid justify-content-md-center">    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarspedidos" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>     
    <div class="col-auto m-3">
      <a href ="{{route('pedidos.create')}}" ><button class="btn btn-primary" type="button"><i class="fa-regular fa-clipboard icon"></i>Nuevo pedido</button></a>
    </div>
    <div class="col-auto m-3">
      <form action="{{route('pedidos.buscar')}}" method="GET">
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
          <th scope="col">Pedido número</th>
          <th scope="col">Referencia</th>
          <th scope="col">Denominación</th>
          <th scope="col">Máquina</th>
          <th scope="col">Piezas totales</th>
          <th scope="col">Piezas parciales</th>
          <th scope="col">Estado</th>          
          <th scope="col">Inicio</th>           
          <th scope="col">Fin</th>           
        </tr>
      </thead>
      <tbody>                
        @foreach($pedidos as $pedido)
          @foreach($producciones as $produccion)
            @if($produccion->pedido_id==$pedido->id)
              @php
                $cantidad=$produccion->cantidad;
              @endphp
              @break
            @endif
          @endforeach
          <tr class="table-{{$color[$pedido->estado]}} clickable-row" data-bs-toggle="tooltip" data-bs-placement="auto" title="{{$pedido->comentario}}">          
            <td><a href="{{route('pedidos.show',$pedido->id)}}">{{$pedido->numero}}</a></td>            
            <td>{{$pedido->referencia->numero}}</td>
            <td>{{$pedido->referencia->descripcion}}</td>                        
            <td>{{$pedido->maquina->numero}}</td>                       
            <td>{{$pedido->totalPiezas}}</td>                       
            <td>{{$cantidad}}</td>                       
            <td>{{$texto[$pedido->estado]}}</td>                       
            <td>{{!$pedido->fechaInicio =="" ? \Carbon\Carbon::parse(strtotime($pedido->fechaInicio))->formatLocalized('%d/%m/%Y') : ""}}</td>                       
            <td>{{!$pedido->fechaFin =="" ? \Carbon\Carbon::parse(strtotime($pedido->fechaFin))->formatLocalized('%d/%m/%Y') : ""}}</td>                       
          </tr>          
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
@section('pie')
@endsection