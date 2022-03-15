@extends('layouts.plantilla')


@section('contenido')
  <div class="row justify-content-center p-3">
    <h2 class="text-center" style="color: #1652B5;">Actualiza pedido nº {{$pedido->numero}}</h2>
  </div>
  <form method="POST" action="{{route('pedidos.update',$pedido->id)}}" class="container" style="max-width: 800px;">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="numero" class="form-label">Número</label>
      <input type="text" class="form-control" value="{{$pedido->numero}}" required name="numero" id="numero">
    </div>
    <div class="mb-3">
      <label for="referencia_id" class="form-label">Referencia</label>
      <input type="number" class="form-control" list="listaReferencias" name="referencia_id" id="referencia_id" required pattern="[0-9]{8}" placeholder="Ejem. 11110000" value="{{$pedido->referencia->numero}}">
      <datalist id="listaReferencias">       
            @foreach($referencias as $referencia)          
                <option>{{$referencia->numero}}</option>      
            @endforeach
      </datalist>
    </div>
    <div class="mb-3">
      <label for="maquina_id" class="form-label">Máquina</label>
      <input type="number" class="form-control" list="listamaquinas" name="maquina_id" id="maquina_id" required pattern="[0-9]{2}" placeholder="Ejem. 11" value="{{$pedido->maquina->numero}}">
      <datalist id="listamaquinas">       
            @foreach($maquinas as $maquina)          
                <option>{{$maquina->numero}}</option>      
            @endforeach
      </datalist>
    </div>        
    <div class="mb-3">
      <label for="totalPiezas" class="form-label">Total piezas</label>
      <input type="number" class="form-control" step="1" min="0" name="totalPiezas" id="totalPiezas" value="{{$pedido->totalPiezas}}">
    </div>    
    <div class="mb-3">
      <label for="estado" class="form-label">Estado</label>
      <select class="form-select mb-3" name="estado" aria-label="estado" >
        <option value="0" {{$pedido->estado==0? "selected":""}}>Sin empezar</option>      
        <option class="text-warning" value="1" {{$pedido->estado==1? "selected":""}}>En preparación</option>
        <option class="text-success" value="2" {{$pedido->estado==2? "selected":""}}>En producción</option>
        <option class="text-danger" value="3" {{$pedido->estado==3? "selected":""}}>Parado avería</option>
        <option class="text-primary" value="4" {{$pedido->estado==4? "selected":""}}>Acabado</option>      
      </select>
    </div>
    <div class="mb-3">
      <label for="fechaInicio" class="form-label">Fecha Inicio</label>
      <input type="datetime-local" class="form-control" name="fechaInicio" id="fechaInicio" value="{{$pedido->fechaInicio}}">
    </div>
    <div class="mb-3">
      <label for="fechaFin" class="form-label">Fecha Fin</label>
      <input type="datetime-local" class="form-control" name="fechaFin" id="fechaFin" value="{{$pedido->fechaFin}}">
    </div>
    <div class="mb-3">
      <label for="tiempoCiclo" class="form-label">Tiempo Ciclo (seg)</label>
      <input type="number" class="form-control" step="0.01" min="0" name="tiempoCiclo" id="tiempoCiclo" value="{{$pedido->tiempoCiclo}}">
    </div>
    <div class="mb-3">
      <label for="pesoPieza" class="form-label">Peso Pieza (grs)</label>
      <input type="number" class="form-control" step="0.01" min="0" name="pesoPieza" id="pesoPieza" value="{{$pedido->pesoPieza}}">
    </div>
    <div class="mb-3">
      <label for="cavidades" class="form-label">Cavidades</label>
      <input type="number" class="form-control" step="1" min="0" name="cavidades" id="cavidades" value="{{$pedido->cavidades}}">
    </div>
    <div class="mb-3">
      <label for="material" class="form-label">Material</label>
      <input type="text" class="form-control" name="material" id="material" value="{{$pedido->material}}">
    </div>
    <div class="mb-3">
      <label for="observaciones" class="form-label">Observaciones</label>
      <input type="text" class="form-control" name="observaciones" id="observaciones" value="{{$pedido->observaciones}}">
    </div>
    <div class="mb-3">
    <div class="mb-3">
      <button type="submit" class="btn btn-primary mb-3">Actualizar pedido</button>
      <a href="{{route('pedidos.show',$pedido->id)}}"><button type="button" class="btn btn-primary mb-3">Volver</button></a>
    </div>
  </form>

@endsection
@section('pie')
@endsection
