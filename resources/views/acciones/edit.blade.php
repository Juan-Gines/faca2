@extends('layouts.plantilla')

@section('contenido')

  <div class="row justify-content-center p-3">
    <h2 class="text-center" style="color: #1652B5;">Modificar intervención referencia nº {{$accion->referencia->numero}}</h2>
  </div>
  <form method="POST" action="{{route('acciones.update',$accion->id)}}" class="container mt-5" style="max-width: 800px;">
    @csrf
    @method('PUT')
    <input type="hidden" name="referencia_id" id="referencia_id" value="{{$accion->referencia->id}}">
    <div class="mb-3">
      <label for="tipo" class="form-label">Tipo</label>    
      <select class="form-select mb-3" name="tipo" aria-label="tipo" value="" >
        <option value="Preventivo" {{$accion->tipo=="Preventivo"?"selected":""}}>Preventivo</option>      
        <option value="Correctivo" {{$accion->tipo=="Correctivo"?"selected":""}}>Correctivo</option>
        <option value="Cambio de versión" {{$accion->tipo=="Cambio de versión"?"selected":""}}>Cambio de versión</option>
        <option value="Colgar en máquina" {{$accion->tipo=="Colgar en máquina"?"selected":""}}>Colgar en máquina</option>
        <option value="Sacar de máquina" {{$accion->tipo=="Sacar de máquina"?"selected":""}}>Sacar de máquina</option>
        <option value="Enviar" {{$accion->tipo=="Enviar"?"selected":""}}>Enviar</option>      
        <option value="Recepcionar" {{$accion->tipo=="Recepcionar"?"selected":""}}>Recepcionar</option>      
      </select>
    </div>
    <div class="mb-3">
      <label for="fechaEntrada" class="form-label">Fecha de entrada</label>
      <input type="date" class="form-control" name="fechaEntrada" id="fechaEntrada" required value="{{$accion->fechaEntrada}}">
    </div>
    <div class="mb-3">
      <label for="fechaSalida" class="form-label">Fecha de salida</label>
      <input type="date" class="form-control" name="fechaSalida" id="fechaSalida" value="{{$accion->fechaSalida}}">
    </div>
    <div class="mb-3">
      <label for="descripcion" class="form-label">Descripción de la intervención</label>      
      <textarea class="form-control" id="descripcion" name="descripcion" rows="3" >{{$accion->descripcion}}</textarea>
    </div>
    <div class="mb-3">
      <label for="reparacion" class="form-label">Reparación</label>      
      <textarea class="form-control" id="reparacion" name="reparacion" rows="3">{{$accion->reparacion}}</textarea>
    </div>   
    <div class="mb-3">
      <label for="lugar" class="form-label">Lugar</label>
      <input type="text" class="form-control" name="lugar" id="lugar" value="{{$accion->lugar}}">
    </div>
    <div class="mb-3">
      <label for="fechaPrueba" class="form-label">Fecha prueba</label>
      <input type="text" class="form-control" name="fechaPrueba" id="fechaPrueba" value="{{$accion->fechaPrueba}}">
    </div>
    <div class="mb-3">
      <label for="ok" class="form-label">Prueba Ok</label>
      <input type="text" class="form-control" name="ok" id="ok" value="{{$accion->ok}}">
    </div>   
    <div class="mb-3">
      <button type="submit" class="btn btn-success mb-3"><i class="fa-solid fa-circle-check icon"></i>Guardar</button>
      <a href="{{route('acciones.show',$accion->id)}}"><button type="button" class="btn btn-outline-primary mb-3"><i class="fa-solid fa-arrow-up-right-from-square icon"></i>Volver</button></a>
    </div>
  </form>

@endsection
@section('pie')
@endsection
