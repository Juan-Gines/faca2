@extends('layouts.plantilla')


@section('contenido')
  <div class="row justify-content-center p-3">
    <h2 class="text-center" style="color: #1652B5;">Actualiza molde nº {{$molde->numero}}</h2>
  </div>
  <form method="POST" action="{{route('moldes.update',$molde->id)}}" class="container" style="max-width: 800px;">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="numero" class="form-label">Número</label>
      <input type="text" class="form-control" value="{{$molde->numero}}" name="numero" id="numero">
    </div>
    <div class="mb-3">
      <label for="descripcion" class="form-label">Descripción</label>
      <input type="text" class="form-control" value="{{$molde->descripcion}}" name="descripcion" id="descripcion">
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
        <option  value="0" {{$molde->estado=="0"?"selected":""}}>Desconocido</option>      
        <option class="text-success" value="2" {{$molde->estado=="2"?"selected":""}}>Ok</option>
        <option class="text-warning" value="1" {{$molde->estado=="1"?"selected":""}}>En reparación</option>
        <option class="text-danger" value="3" {{$molde->estado=="3"?"selected":""}}>No ok</option>      
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
      <button type="submit" class="btn btn-success mb-3"><i class="fa-solid fa-circle-check icon"></i>Guardar</button>
      <a href="{{route('moldes.show',$molde->id)}}"><button type="button" class="btn btn-outline-primary mb-3"><i class="fa-solid fa-arrow-up-right-from-square icon"></i>Volver</button></a>
    </div>
  </form>

@endsection
@section('pie')
@endsection
