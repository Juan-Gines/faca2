@extends('layouts.plantilla')


@section('contenido')
<div class="row justify-content-center p-3">
  <h2 class="text-center" style="color: #1652B5;">Info acción molde nº {{$accion->molde->numero}}</h2>
</div>
  <div class="col  justify-content-center">
  <div class="col-md-12 offset-md-3 ml-2 mb-3">
      <a href="{{route('acciones.edit',['accione'=>$accion->id])}}"><button class="btn btn-primary mb-3">Modificar acción</button></a>
      <a href="{{route('moldes.show',$accion->molde->id)}}"><button type="button" class="btn btn-primary ms-5 mb-3">Volver</button></a>
    </div>     
    <div class="row ">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Tipo  </div>
      <div class="col-md-4 mb-3"> {{$accion->tipo}}</div>
    </div> 
    <div class="row ">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Lugar  </div>
      <div class="col-md-4 mb-3"> {{$accion->lugar}}</div>
    </div> 
    <div class="row ">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Descripción </div>
      <div class="col-md-4 mb-3"> {{$accion->descripcion}}</div>
    </div> 
    <div class="row ">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Reparación </div>
      <div class="col-md-4 mb-3"> {{$accion->reparacion}}</div>
    </div>      
    <div class="row ">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Fecha Entrada  </div>
      <div class="col-md-4 mb-3"> {{$accion->fechaEntrada}}</div>
    </div> 
    <div class="row ">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Fecha Salida  </div>
      <div class="col-md-4 text-break mb-3">{{$accion->fechaSalida}}</div>
    </div>       
  </div>  
@endsection
@section('pie')
@endsection
