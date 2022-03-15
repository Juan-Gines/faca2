@extends('layouts.plantilla')


@section('contenido')
<pre>
  
</pre>
<div class="row justify-content-center p-3">
  <h2 class="text-center" style="color: #1652B5;">Info Pedido nº {{$pedido->numero}}</h2>
</div>
  <div class="col  justify-content-center">
    <div class="row justify-content-center mb-3">
      <a href="{{route('pedidos.edit',$pedido->id)}}" class="col-auto"><button class=" btn btn-primary mb-3">Modificar info</button></a>
      <a href="{{route('pedidos.index')}}"class="col-auto"><button type="button" class=" btn btn-primary mb-3">Volver</button></a>
    </div>     
    <div class="row ">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Número  </div>
      <div class="col-md-4 mb-3"> {{$pedido->numero}}</div>
    </div> 
    <div class="row ">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Máquina </div>
      <div class="col-md-4 mb-3"> {{$pedido->maquina->numero}}</div>
    </div>   
    <div class="row ">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Referencia </div>
      <div class="col-md-4 mb-3 "> {{$pedido->referencia->numero}}</div>
    </div> 
    <div class="row ">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Descripción </div>
      <div class="col-md-4 mb-3 "> {{$pedido->referencia->descripcion}}</div>
    </div> 
    <div class="row ">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Piezas totales </div>
      <div class="col-md-4 mb-3 "> {{$pedido->totalPiezas}}</div>
    </div> 
    <div class="row ">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Estado </div>
      <div class="col-md-4 mb-3 "> {{$texto[$pedido->estado]}}</div>
    </div> 
    <div class="row ">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Fecha inicio </div>
      <div class="col-md-4 mb-3 "> {{!$pedido->fechaInicio =="" ? \Carbon\Carbon::parse(strtotime($pedido->fechaInicio))->formatLocalized('%d/%m/%Y') : ""}}</div>
    </div> 
    <div class="row ">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Fecha Fin </div>
      <div class="col-md-4 mb-3 "> {{!$pedido->fechaFin =="" ? \Carbon\Carbon::parse(strtotime($pedido->fechaFin))->formatLocalized('%d/%m/%Y') : ""}}</div>
    </div>
    <div class="row ">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Tiempo ciclo (seg) </div>
      <div class="col-md-4 mb-3 "> {{$pedido->tiempoCiclo}}</div>
    </div><div class="row ">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Peso pieza (grs) </div>
      <div class="col-md-4 mb-3 "> {{$pedido->pesoPieza}}</div>
    </div><div class="row ">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Cavidades </div>
      <div class="col-md-4 mb-3 "> {{$pedido->cavidades}}</div>
    </div> 
    </div><div class="row ">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Material </div>
      <div class="col-md-4 mb-3 "> {{$pedido->materia}}</div>
    </div> 
  </div>  
@endsection
@section('pie')
@endsection
