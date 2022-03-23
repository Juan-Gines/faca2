@extends('layouts.plantilla')


@section('contenido')
<div class="row justify-content-center p-3">
  <h2 class="text-center" style="color: #1652B5;">Intervención en referencia nº {{$accion->referencia->numero}}</h2>
</div>
  <div class="col  justify-content-center">
  <div class="row justify-content-center mb-3">
      <a href="{{route('acciones.edit',$accion->id)}}" class="col-auto"><button class="btn btn-info mb-3"><i class="fa-regular fa-pen-to-square icon"></i>Modificar Intervención</button></a>
      <a href="{{route('referencias.show',$accion->referencia->id)}}" class="col-auto"><button type="button" class="btn btn-outline-primary ms-5 mb-3"><i class="fa-solid fa-arrow-up-right-from-square icon"></i>Volver</button></a>
    </div>     
    <div class="row ">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Tipo  </div>
      <div class="col-md-4 mb-3"> {{$accion->tipo}}</div>
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
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Lugar  </div>
      <div class="col-md-4 mb-3"> {{$accion->lugar}}</div>
    </div>
    <div class="row ">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Fecha Entrada  </div>
      <div class="col-md-4 mb-3"> {{!$accion->fechaEntrada =="" ? \Carbon\Carbon::parse(strtotime($accion->fechaEntrada))->formatLocalized("%d/%m/%Y") : ""}}</div>
    </div> 
    <div class="row ">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Fecha Salida  </div>
      <div class="col-md-4 text-break mb-3">{{!$accion->fechaSalida =="" ? \Carbon\Carbon::parse(strtotime($accion->fechaSalida))->formatLocalized("%d/%m/%Y") : ""}}</div>
    </div>       
    <div class="row ">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Fecha Prueba  </div>
      <div class="col-md-4 text-break mb-3">{{!$accion->fechaPrueba =="" ? \Carbon\Carbon::parse(strtotime($accion->fechaPrueba))->formatLocalized("%d/%m/%Y") : ""}}</div>
    </div>       
    <div class="row ">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> ¿OK?  </div>
      <div class="col-md-4 text-break mb-3">{{$accion->ok}}</div>
    </div>  
    <form class="row justify-content-center mb-3">
      @csrf
      @method('DELETE')
      <a href="{{route('acciones.destroy',$accion->id)}}" class="col-auto"><button class="btn btn-danger mb-3"><i class="fa-regular fa-pen-to-square icon"></i>Borrar Intervención<nav></nav></button></a>
    </form>        
  </div>  
@endsection
@section('pie')
@endsection
