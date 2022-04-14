@extends('layouts.plantilla')

@section('contenido')

  <div class="row justify-content-center p-3">
    <h2 class="text-center" style="color: #1652B5;">Introduce nueva máquina</h2>
  </div>
  <form method="POST" action="{{route('maquinas.store')}}" class="container mt-5" style="max-width: 800px;">
    @csrf
    <div class="mb-3">
      <label for="numero" class="form-label">Numero</label>
      <input type="text" class="form-control" required name="numero" id="numero">
    </div>
    <div class="mb-3">
      <label for="descripcion" class="form-label">Descripción</label>
      <input type="text" class="form-control" name="descripcion" id="descripcion">
    </div>        
    <div class="mb-3">
      <label for="sala" class="form-label">Sala</label>    
      <select class="form-select mb-3" name="sala" aria-label="sala" >
        <option value="A">Sala A</option>      
        <option selected value="B">Sala B</option>             
      </select>
    </div>        
    <div class="mb-3">
      <button type="submit" class="btn btn-success mb-3"><i class="fa-solid fa-circle-check icon"></i>Guardar</button>
      <a href="{{route('maquinas.index')}}"><button type="button" class="btn btn-outline-primary mb-3"><i class="fa-solid fa-arrow-up-right-from-square icon"></i>Volver</button></a>
    </div>
  </form>

@endsection
@section('pie')
@endsection
