@extends('layouts.plantilla')

@section('cabecera')
  Información del molde
@endsection
@section('contenido')
<div class="container max-w-75 rounded">
  
    <div class="row align-items-center m-5">
      <div class="col-6 text-center "> <span class="bg-secondary fw-bold">Molde nº</span> {{$molde->numero}}</div> 
      
      <div class="col-6 text-center "> <span class="bg-secondary fw-bold">Ubicación real</span> {{$molde->ubicacionReal}}</div>
    </div>
 
    <div class="row ">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Nombre  </div>
      <div class="col-md-6 mb-3"> {{$molde->nombre}}</div>
    </div> 
    <div class="row ">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Ubicación actual  </div>
      <div class="col-md-6 mb-3"> {{$molde->ubicacionActual}}</div>
    </div> 
    <div class="row ">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Versión actual montada  </div>
      <div class="col-md-6 mb-3"> {{$molde->versionActual}}</div>
    </div> 
    <div class="row ">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Estado </div>
      <div class="col-md-6 mb-3"> {{$molde->estadoTexto}}</div>
    </div> 
    <div class="row ">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Cavidades  </div>
      <div class="col-md-6 mb-3"> {{$molde->cavidades}}</div>
    </div> 
    <div class="row ">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Comentario  </div>
      <div class="col-md-6 mb-3">{{$molde->comentario}}</div>
    </div> 

      <div class="col-md-8 offset-md-4 ml-2 mb-3">
        <a href="{{route('moldes.edit',['molde'=>$molde->id])}}"><button class="btn btn-primary mb-3">Modificar registro</button></a>
      </div>    
    </div>
  
</div> 
@endsection
@section('pie')
@endsection
