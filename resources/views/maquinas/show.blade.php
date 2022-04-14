@extends('layouts.plantilla')


@section('contenido')
<pre>
  
</pre>
<div class="row justify-content-center p-3">
  <h2 class="text-center" style="color: #1652B5;">Info Máquina nº {{$maquina->numero}}</h2>
</div>
  <div class="col  justify-content-center">
    <div class="row justify-content-center mb-3">
      <a href="{{route('maquinas.edit',$maquina)}}" class="col-auto"><button class=" btn btn-info mb-3"><i class="fa-regular fa-pen-to-square icon"></i>Modificar info</button></a>
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
    <div class="row mb-4">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Estado </div>
      <div class="col-md-4 mb-3 ">
        @if ($maquina->activa)
          <span class="badge bg-success rounded-pill badge-estado-fs ">Activa</span>
        @else
        <span class="badge bg-danger rounded-pill badge-estado-fs ">Inactiva</span>
        @endif
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-auto fw-bold mb-3">
        <form action="{{route('maquinas.destroy',$maquina)}}" method="POST">
          @csrf
          @method('delete')
          <button class=" btn btn-danger mb-3"><i class="fa-solid fa-trash-can icon"></i>Borrar máquina</button>
        </form>
      </div>    
    </div> 
  </div>  
@endsection
@section('pie')
@endsection
