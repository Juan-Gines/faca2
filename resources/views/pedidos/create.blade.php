@extends('layouts.plantilla')

@section('contenido')

  <div class="row justify-content-center p-3">
    <h2 class="text-center" style="color: #1652B5;">Introduce nuevo pedido</h2>
  </div>
  <form method="POST" action="{{route('pedidos.store')}}" class="container mt-5" style="max-width: 800px;">
    @csrf
    <div class="mb-3">
      <label for="numero" class="form-label">Numero</label>
      <input type="text" class="form-control" required name="numero" id="numero">
    </div>
    <div class="mb-3">
      <label for="referencia_id" class="form-label">Referencia</label>
      <input type="number" class="form-control" list="listaReferencias" name="referencia_id" id="referencia_id" required pattern="[0-9]{8}" placeholder="Ejem. 11110000">
      <datalist id="listaReferencias">       
            @foreach($referencias as $referencia)          
                <option>{{$referencia->numero}}</option>      
            @endforeach
      </datalist>
    </div>
    <div class="mb-3">
      <label for="maquina_id" class="form-label">Máquina</label>
      <input type="number" class="form-control" list="listamaquinas" name="maquina_id" id="maquina_id" required pattern="[0-9]{2}" placeholder="Ejem. 11">
      <datalist id="listamaquinas">       
            @foreach($maquinas as $maquina)          
                <option>{{$maquina->numero}}</option>      
            @endforeach
      </datalist>
    </div>        
    <div class="mb-3">
      <label for="totalPiezas" class="form-label">Total piezas</label>
      <input type="number" class="form-control" step="1" min="0" name="totalPiezas" id="totalPiezas">
    </div>    
    <div class="mb-3">
      <label for="estado" class="form-label">Estado</label>
      <select class="form-select mb-3" name="estado" aria-label="estado" >
        <option value="0">Sin empezar</option>      
        <option class="text-warning" value="1">En preparación</option>
        <option class="text-success" value="2">En producción</option>
        <option class="text-danger" value="3">Parado avería</option>
        <option class="text-primary" value="4">Acabado</option>      
      </select>
    </div>
    <div class="mb-3">
      <label for="fechaInicio" class="form-label">Fecha Inicio</label>
      <input type="datetime-local" class="form-control" name="fechaInicio" id="fechaInicio">
    </div>
    <div class="mb-3">
      <label for="fechaFin" class="form-label">Fecha Fin</label>
      <input type="datetime-local" class="form-control" name="fechaFin" id="fechaFin">
    </div>
    <div class="mb-3">
      <label for="tiempoCiclo" class="form-label">Tiempo Ciclo (seg)</label>
      <input type="number" class="form-control" step="0.01" min="0" name="tiempoCiclo" id="tiempoCiclo">
    </div>
    <div class="mb-3">
      <label for="pesoPieza" class="form-label">Peso Pieza (grs)</label>
      <input type="number" class="form-control" step="0.01" min="0" name="pesoPieza" id="pesoPieza">
    </div>
    <div class="mb-3">
      <label for="cavidades" class="form-label">Cavidades</label>
      <input type="number" class="form-control" step="1" min="0" name="cavidades" id="cavidades">
    </div>
    <div class="mb-3">
      <label for="material" class="form-label">Material</label>
      <input type="text" class="form-control" name="material" id="material">
    </div>
    <div class="mb-3">
      <label for="observaciones" class="form-label">Observaciones</label>
      <input type="text" class="form-control" name="observaciones" id="observaciones">
    </div>
    <div class="mb-3">
      <button type="submit" class="btn btn-primary mb-3">Insertar pedido</button>
      <a href="{{route('pedidos.index')}}"><button type="button" class="btn btn-primary mb-3">Volver</button></a>
    </div>
  </form>

@endsection
@section('pie')
@endsection
