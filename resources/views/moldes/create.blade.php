@extends('layouts.plantilla')

@section('contenido')

  <div class="row justify-content-center p-3">
    <h2 class="text-center" style="color: #1652B5;">Introduce nuevo molde</h2>
  </div>
  <form method="POST" action="{{route('moldes.store')}}" class="container mt-5" style="max-width: 800px;">
    @csrf
    <div class="mb-3">
      <label for="numero" class="form-label">Numero</label>
      <input type="text" class="form-control" name="numero" id="numero" value="{{old('numero')}}">
      @error('numero')
        <p><small>*{{$message}}</small></p>
      @enderror
      
    </div>
    <div class="mb-3">
      <label for="descripcion" class="form-label">Descripción</label>
      <input type="text" class="form-control" name="descripcion" id="descripcion" value="{{old('descripcion')}}">
    </div>
    <div class="mb-3">
      <label for="ubicacionReal" class="form-label">Ubicación real</label>
      <input type="text" class="form-control" name="ubicacionReal" id="ubicacionReal" value="{{old('ubicacionReal')}}">
    </div>
    <div class="mb-3">
      <label for="ubicacionActual" class="form-label">Ubicación actual</label>
      <input type="text" class="form-control" name="ubicacionActual" id="ubicacionActual" value="{{old('ubicacionActual')}}">
    </div>
    <div class="mb-3">
      <label for="versionActual" class="form-label">Versión montada</label>
      <input type="text" class="form-control" name="versionActual" id="versionActual" value="{{old('versionActual')}}">
    </div>
    <div class="mb-3">
      <label for="estado" class="form-label">Estado</label>    
      <select class="form-select mb-3" name="estado" aria-label="estado" >
        <option value="0" {{old('estado') == '0'?'selected':''}}>Desconocido</option>      
        <option class="text-success" value="2" {{old('estado') == '2'?'selected':''}}>Ok</option>
        <option class="text-warning" value="1" {{old('estado') == '1'?'selected':''}}>En reparación</option>
        <option class="text-danger" value="3" {{old('estado') == '3'?'selected':''}}>No ok</option>      
      </select>
    </div>
    <div class="mb-3">
      <label for="cavidades" class="form-label">Cavidades</label>
      <input type="text" class="form-control" name="cavidades" id="cavidades" value="{{old('cavidades')}}">
    </div>
    <div class="mb-3">
      <label for="comentario" class="form-label">Comentario</label>
      <textarea class="form-control" id="comentario" name="comentario" rows="3">{{old('comentario')}}</textarea>
    </div>
    <div class="mb-3">
      <button type="submit" class="btn btn-success mb-3"><i class="fa-solid fa-circle-check icon"></i>Guardar</button>
      <a href="{{route('moldes.index')}}"><button type="button" class="btn btn-outline-primary mb-3"><i class="fa-solid fa-arrow-up-right-from-square icon"></i>Volver</button></a>
    </div>
  </form>

@endsection
@section('pie')
@endsection
