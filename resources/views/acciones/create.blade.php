@extends('layouts.plantilla')

@section('contenido')

  <div class="row justify-content-center p-3">
    <h2 class="text-center" style="color: #1652B5;">Crear nueva acción molde nº {{$molde->id}}</h2>
  </div>
  <form method="POST" action="{{route('acciones.store')}}" class="container mt-5" style="max-width: 800px;">
    @csrf
    <div class="mb-3">
      <label for="numero" class="form-label">Numero</label>
      <input type="text" class="form-control" name="numero" id="numero">
    </div>
    <div class="mb-3">
      <label for="nombre" class="form-label">Nombre</label>
      <input type="text" class="form-control" name="nombre" id="nombre">
    </div>
    <div class="mb-3">
      <label for="ubicacionReal" class="form-label">Ubicación real</label>
      <input type="text" class="form-control" name="ubicacionReal" id="ubicacionReal">
    </div>
    <div class="mb-3">
      <label for="ubicacionActual" class="form-label">Ubicación actual</label>
      <input type="text" class="form-control" name="ubicacionActual" id="ubicacionActual">
    </div>
    <div class="mb-3">
      <label for="versionActual" class="form-label">Versión montada</label>
      <input type="text" class="form-control" name="versionActual" id="versionActual">
    </div>
    <div class="mb-3">
      <label for="estado" class="form-label">Estado</label>    
      <select class="form-select mb-3" name="estado" aria-label="estado" >
        <option value="light">Desconocido</option>      
        <option class="text-success" value="success">Ok</option>
        <option class="text-warning" value="warning">En reparación</option>
        <option class="text-danger" value="danger">No ok</option>      
      </select>
    </div>
    <div class="mb-3">
      <label for="cavidades" class="form-label">Cavidades</label>
      <input type="text" class="form-control" name="cavidades" id="cavidades">
    </div>
    <div class="mb-3">
      <label for="comentario" class="form-label">Comentario</label>
      <textarea class="form-control" id="comentario" name="comentario" rows="3"></textarea>
    </div>
    <div class="mb-3">
      <button type="submit" class="btn btn-primary mb-3">Insertar registro</button>
      <a href="{{route('moldes.index')}}"><button type="button" class="btn btn-primary mb-3">Volver</button></a>
    </div>
  </form>

@endsection
@section('pie')
@endsection
