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
      <input type="text" class="form-control" list="listaReferencias" name="referencia_id" id="referencia_id" required pattern="[0-9]{8}" placeholder="Ejem. 11110000">
      <datalist id="listaReferencias">       
            @foreach($referencias as $referencia)          
                <option>{{$referencia->numero}}</option>      
            @endforeach
      </datalist>
    </div>        
    <div class="mb-3">
      <label for="totalPiezas" class="form-label">Total piezas</label>
      <input type="text" class="form-control" name="totalPiezas" id="totalPiezas">
    </div>
    <div class="mb-3">
      <label for="observaciones" class="form-label">Observaciones</label>
      <input type="text" class="form-control" name="observaciones" id="observaciones">
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
