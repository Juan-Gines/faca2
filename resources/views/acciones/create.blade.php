@extends('layouts.plantilla')

@section('contenido')

  <div class="row justify-content-center p-3">
    <h2 class="text-center" style="color: #1652B5;">Crear nueva acción molde nº {{$molde->numero}}</h2>
  </div>
  <form method="POST" action="{{route('acciones.store')}}" class="container mt-5" style="max-width: 800px;">
    @csrf
    <input type="hidden" name="molde_id" id="molde_id" value="{{$molde->id}}">
    <div class="mb-3">
      <label for="tipo" class="form-label">Tipo</label>    
      <select class="form-select mb-3" name="tipo" aria-label="tipo" >
        <option value="Preventivo">Preventivo</option>      
        <option value="Correctivo">Correctivo</option>
        <option value="Cambio de versión">Cambio de versión</option>
        <option value="Colgar en máquina">Colgar en máquina</option>
        <option value="Sacar de máquina">Sacar de máquina</option>
        <option value="Enviar">Enviar</option>      
        <option value="Recepcionar">Recepcionar</option>      
      </select>
    </div>
    <div class="mb-3">
      <label for="fechaEntrada" class="form-label">Fecha de entrada</label>
      <input type="date" class="form-control" name="fechaEntrada" id="fechaEntrada" required>
    </div>
    <div class="mb-3">
      <label for="fechaSalida" class="form-label">Fecha de salida</label>
      <input type="date" class="form-control" name="fechaSalida" id="fechaSalida">
    </div>
    <div class="mb-3">
      <label for="descripcion" class="form-label">Descripción de la intervención</label>      
      <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
    </div>
    <div class="mb-3">
      <label for="reparacion" class="form-label">Reparación</label>      
      <textarea class="form-control" id="reparacion" name="reparacion" rows="3"></textarea>
    </div>   
    <div class="mb-3">
      <label for="lugar" class="form-label">Lugar</label>
      <input type="text" class="form-control" name="lugar" id="lugar">
    </div>
    <div class="mb-3">
      <label for="fechaPrueba" class="form-label">Fecha prueba</label>
      <input type="text" class="form-control" name="fechaPrueba" id="fechaPrueba">
    </div>
    <div class="mb-3">
      <label for="ok" class="form-label">Prueba Ok</label>
      <input type="text" class="form-control" name="ok" id="ok">
    </div>   
    <div class="mb-3">
      <button type="submit" class="btn btn-primary mb-3">Insertar nueva Accion</button>
      <a href="{{route('moldes.show',$molde->id)}}"><button type="button" class="btn btn-primary mb-3">Volver</button></a>
    </div>
  </form>

@endsection
@section('pie')
@endsection
