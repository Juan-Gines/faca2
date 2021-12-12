@extends('layouts.plantilla')

@section('cabecera')
  Editar molde nº {{$molde->numero}}
@endsection
@section('contenido')
<div class="m-5">
  <form method="POST" action="{{route('moldes.update',$molde->id)}}" class="container" style="max-width: 800px;">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="numero" class="form-label">Numero</label>
      <input type="text" class="form-control" value="{{$molde->numero}}" name="numero" id="numero">
    </div>
    <div class="mb-3">
      <label for="nombre" class="form-label">Nombre</label>
      <input type="text" class="form-control" value="{{$molde->nombre}}" name="nombre" id="nombre">
    </div>
    <div class="mb-3">
      <label for="ubicacionReal" class="form-label">Ubicación real</label>
      <input type="text" class="form-control" value="{{$molde->ubicacionReal}}" name="ubicacionReal" id="ubicacionReal">
    </div>
    <div class="mb-3">
      <label for="ubicacionActual" class="form-label">Ubicación actual</label>
      <input type="text" class="form-control" value="{{$molde->ubicacionActual}}" name="ubicacionActual" id="ubicacionActual">
    </div>
    <div class="mb-3">
      <label for="versionActual" class="form-label">Versión montada</label>
      <input type="text" class="form-control" value="{{$molde->versionActual}}" name="versionActual" id="versionActual">
    </div>
    <div class="mb-3">
      <label for="estado" class="form-label">Estado</label>    
      <select class="form-select mb-3" name="estado" aria-label="estado" >
        <option  value="table-light" {{$molde->estado=="table-light"?"selected":""}}>Desconocido</option>      
        <option class="text-success" value="table-success" {{$molde->estado=="table-success"?"selected":""}}>Ok</option>
        <option class="text-warning" value="table-warning" {{$molde->estado=="table-warning"?"selected":""}}>En reparación</option>
        <option class="text-danger" value="table-danger" {{$molde->estado=="table-danger"?"selected":""}}>No ok</option>      
      </select>
    </div>
    <div class="mb-3">
      <label for="cavidades" class="form-label">Cavidades</label>
      <input type="text" class="form-control" name="cavidades" id="cavidades" value="{{$molde->cavidades}}">
    </div>
    <div class="mb-3">
      <label for="comentario" class="form-label">Comentario</label>
      <textarea class="form-control" id="descripcion" name="comentario" rows="3" >{{$molde->comentario}}</textarea>
    </div>
    <div class="mb-3">
      <button type="submit" class="btn btn-primary mb-3">Actualizar registro</button>
      <a href="{{route('moldes.show',$molde->id)}}"><button type="button" class="btn btn-primary mb-3">Volver</button></a>
    </div>
  </form>
</div>
@endsection
@section('pie')
@endsection
