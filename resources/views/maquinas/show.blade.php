@extends('layouts.plantilla')


@section('contenido')
<pre>
  
</pre>
<div class="row justify-content-center p-3">
  <h2 class="text-center" style="color: #1652B5;">Info Máquina nº {{$maquina->numero}}</h2>
</div>
  <div class="col  justify-content-center">
    <div class="row justify-content-center mb-3">
      <a href="{{route('maquinas.edit',$maquina->id)}}" class="col-auto"><button class=" btn btn-info mb-3"><i class="fa-regular fa-pen-to-square icon"></i>Modificar info</button></a>
      <a href="{{route('maquinas.index')}}"class="col-auto"><button type="button" class=" btn btn-outline-primary mb-3"><i class="fa-solid fa-arrow-up-right-from-square icon"></i>Volver</button></a>
    </div>     
    <div class="row ">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Descripción  </div>
      <div class="col-md-4 mb-3"> {{$maquina->descripcion}}</div>
    </div> 
    <div class="row ">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Sala </div>
      <div class="col-md-4 mb-3"> {{$maquina->sala}}</div>
    </div>   
    <div class="row ">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Estado </div>
      <div class="col-md-4 mb-3 "> {{$maquina->activa}}</div>
    </div> 
  </div>  
@endsection
@section('pie')
@endsection
