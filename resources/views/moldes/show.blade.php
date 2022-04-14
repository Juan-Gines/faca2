@extends('layouts.plantilla')


@section('contenido')

<div class="row justify-content-center p-3">
  <h2 class="text-center" style="color: #1652B5;">Info molde nº {{$molde->numero}}</h2>
</div>
<div class="col  justify-content-center">
  <div class="row justify-content-center mb-3">
    <a href="{{route('moldes.edit',$molde)}}" class="col-auto"><button class=" btn btn-info mb-3"><i class="fa-regular fa-pen-to-square icon"></i>Modificar info</button></a>
    <a href="{{route('moldes.index')}}"class="col-auto"><button type="button" class=" btn btn-outline-primary mb-3"><i class="fa-solid fa-arrow-up-right-from-square icon"></i>Volver</button></a>
  </div>     
  <div class="row ">
    <div class="col-md-3 offset-md-3 fw-bold mb-3"> Nombre  </div>
    <div class="col-md-4 mb-3"> {{$molde->descripcion}}</div>
  </div> 
  <div class="row ">
    <div class="col-md-3 offset-md-3 fw-bold mb-3"> Ubicación actual  </div>
    <div class="col-md-4 mb-3"> {{$molde->ubicacionActual}}</div>
  </div> 
  <div class="row ">
    <div class="col-md-3 offset-md-3 fw-bold mb-3"> Ubicación almacen  </div>
    <div class="col-md-4 mb-3"> {{$molde->ubicacionReal}}</div>
  </div> 
  <div class="row ">
    <div class="col-md-3 offset-md-3 fw-bold mb-3"> Versión actual montada  </div>
    <div class="col-md-4 mb-3"> {{$molde->versionActual}}</div>
  </div> 
  <div class="row ">
    <div class="col-md-3 offset-md-3 fw-bold mb-3"> Estado </div>
    <div class="col-md-4 mb-3 text-{{$molde->estado ? $color[$molde->estado]:''}} "> {{$texto[$molde->estado]}}</div>
  </div> 
  <div class="row ">
    <div class="col-md-3 offset-md-3 fw-bold mb-3"> Cavidades  </div>
    <div class="col-md-4 mb-3"> {{$molde->cavidades}}</div>
  </div> 
  <div class="row ">
    <div class="col-md-3 offset-md-3 fw-bold mb-3"> Comentario  </div>
    <div class="col-md-4 text-break mb-3">{{$molde->comentario}}</div>
  </div>       
  <div class="row justify-content-center">
    <div class="col-auto fw-bold mb-3">
      <form action="{{route('moldes.destroy',$molde)}}" method="POST">
        @csrf
        @method('delete')
        <button class=" btn btn-danger mb-3"><i class="fa-solid fa-trash-can icon"></i>Borrar molde</button>
      </form>
    </div>    
  </div>       
</div>  
@endsection
@section('pie')
@endsection
