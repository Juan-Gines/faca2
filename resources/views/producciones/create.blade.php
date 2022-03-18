@extends('layouts.plantilla')

@section('contenido')

  <div class="row justify-content-center p-3">
    <h2 class="text-center" style="color: #1652B5;">Crear nueva producción pedido nº {{$pedido->numero}}</h2>
  </div>
  <form method="POST" action="{{route('producciones.store')}}" class="container mt-5" style="max-width: 800px;">
    @csrf
    <input type="hidden" name="pedido_id" id="pedido_id" value="{{$pedido->id}}">
    <div class="mb-3">
      <label for="turno" class="form-label">Turno</label>        
      <select class="form-select mb-3" name="turno" aria-label="turno" >
        <option value="Mañana">Mañana</option>      
        <option value="Tarde">Tarde</option>
        <option value="Nonche">Nonche</option>              
      </select>      
    </div>
    <div class="mb-3">
      <label for="fecha" class="form-label">Fecha</label>
      <input type="date" class="form-control" name="fecha" id="fecha" required>
    </div>
    <div class="mb-3">
      <label for="cantidad" class="form-label">Cantidad</label>
      <input type="number" class="form-control" step="1" name="cantidad" id="cantidad">
    </div>       
    <div class="mb-3">
      <button type="submit" class="btn btn-success mb-3">Guardar</button>
      <a href="{{route('pedidos.show',$pedido->id)}}"><button type="button" class="btn btn-outline-primary mb-3"><i class="fa-solid fa-arrow-up-right-from-square icon"></i>Volver</button></a>
    </div>
  </form>

@endsection
@section('pie')
@endsection
