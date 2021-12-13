@extends('layouts.plantilla')

@section('cabecera')
  Info molde nº {{$molde->numero}}
@endsection
@section('contenido')
<div class="container max-w-75 rounded">
  
    <div class="row align-items-center m-5">
      <div class="col-6 text-center "> <span class=" fw-bold">Molde nº</span> {{$molde->numero}}</div>       
      <div class="col-6 text-center "> <span class=" fw-bold">Ubicación real</span> {{$molde->ubicacionReal}}</div>
    </div>
 
    <div class="row ">
      <div class="col-md-3 offset-md-1 fw-bold mb-3"> Nombre  </div>
      <div class="col-md-7 mb-3"> {{$molde->nombre}}</div>
    </div> 
    <div class="row ">
      <div class="col-md-3 offset-md-1 fw-bold mb-3"> Ubicación actual  </div>
      <div class="col-md-7 mb-3"> {{$molde->ubicacionActual}}</div>
    </div> 
    <div class="row ">
      <div class="col-md-3 offset-md-1 fw-bold mb-3"> Versión actual montada  </div>
      <div class="col-md-7 mb-3"> {{$molde->versionActual}}</div>
    </div> 
    <div class="row ">
      <div class="col-md-3 offset-md-1 fw-bold mb-3"> Estado </div>
      <div class="col-md-7 mb-3 text-{{$molde->estado!='light'?$molde->estado:''}} "> {{$molde->estadoTexto}}</div>
    </div> 
    <div class="row ">
      <div class="col-md-3 offset-md-1 fw-bold mb-3"> Cavidades  </div>
      <div class="col-md-7 mb-3"> {{$molde->cavidades}}</div>
    </div> 
    <div class="row ">
      <div class="col-md-3 offset-md-1 fw-bold mb-3"> Comentario  </div>
      <div class="col-md-7 text-break mb-3">{{$molde->comentario}}</div>
    </div> 

      <div class="col-md-12 offset-md-1 ml-2 mb-3">
        <a href="{{route('moldes.edit',['molde'=>$molde->id])}}"><button class="btn btn-primary mb-3">Modificar info</button></a>
        <a href="{{route('moldes.index')}}"><button type="button" class="btn btn-primary ms-5 mb-3">Volver</button></a>
      </div>    
    </div>
  
</div> 
@endsection
@section('pie')
@endsection
