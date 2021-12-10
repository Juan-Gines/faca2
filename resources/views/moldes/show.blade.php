@extends('layouts.plantilla')

@section('cabecera')
  Información del molde
@endsection
@section('contenido')
<div class="container max-w-75 rounded"
  <div class="container " style="max-width: 1000px;">
    <div class="row align-items-center m-5">
      <div class="col-6 text-center "> <span class="bg-secondary fw-bold">Molde nº</span> {{$molde->numero}}</div> 
      
      <div class="col-6 text-center "> <span class="bg-secondary fw-bold">Ubicación real</span> {{$molde->ubicacionReal}}</div>
    </div>
  </div>
  <div class="container">
    <div class="row ">
      <div class="col-md-8 offset-md-4 mb-3"> <span class="bg-info  fw-bold">Nombre:</span> {{$molde->nombre}}</div>  
      <div class="col-md-8 offset-md-4 mb-3"> <span class=" fw-bold">Ubicación actual:</span> {{$molde->ubicacionActual}}</div>
      <div class="col-md-8 offset-md-4 mb-3"> <span class=" fw-bold">Versión actual montada:</span> {{$molde->versionActual}}</div>
      <div class="col-md-8 offset-md-4 mb-3"> <span class=" fw-bold">Estado:</span> {{$molde->estadoTexto}}</div>
      <div class="col-md-8 offset-md-4 mb-3"> <span class=" fw-bold">Cavidades:</span> {{$molde->cavidades}}</div>
      <div class="col-md-8 offset-md-4 mb-3"> <span class=" fw-bold">Comentario:</span> {{$molde->comentario}}</div>
      <div class="col-md-8 offset-md-4 ml-2 mb-3">
        <a href="{{route('moldes.edit',$molde->id)}}"><button class="btn btn-primary mb-3">Modificar registro</button></a>
      </div>
    
    </div>
  </div>
</div>
</div>

  
@endsection
@section('pie')
@endsection
