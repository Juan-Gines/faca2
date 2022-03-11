@extends('layouts.plantilla')

@section('contenido')

  <div class="row justify-content-center p-3">
    <h2 class="text-center" style="color: #1652B5;">Introduce nueva referencia</h2>
  </div>
  <form method="POST" action="{{route('referencias.store')}}" class="container mt-5" style="max-width: 800px;">
    @csrf
    <div class="mb-3">
      <label for="numero" class="form-label">Numero</label>
      <input type="text" class="form-control" required pattern="[0-9]{8}" name="numero" id="numero">
    </div>
    <div class="mb-3">
      <label for="descripcion" class="form-label">Descripción</label>
      <input type="text" class="form-control" name="descripcion" id="descripcion">
    </div>
    <div class="mb-3">
      <label for="ubicacion" class="form-label">Ubicación Almacén</label>
      <input type="text" class="form-control" name="ubicacion" id="ubicacion">
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
      <label for="molde_id" class="form-label">Molde base</label>
      <input type="text" class="form-control" list="lista" name="molde_id" id="molde_id" required pattern="[0-9]{8}" placeholder="Ejem. 11110000">
      <datalist id="lista">      
        @foreach($moldes as $molde)          
            <option value="{{$molde->numero}}"></option>     
        @endforeach          
      </datalist>
    </div>    
    <div class="mb-3">
      <button type="submit" class="btn btn-primary mb-3">Insertar registro</button>
      <a href="{{route('referencias.index')}}"><button type="button" class="btn btn-primary mb-3">Volver</button></a>
    </div>
  </form>

@endsection
@section('pie')
@endsection
