@extends('layouts.plantilla')


@section('contenido')
  <div class="row justify-content-center p-3">
    <h2 class="text-center" style="color: #1652B5;">Actualiza referencia nº {{$referencia->numero}}</h2>
  </div>
  <form method="POST" action="{{route('referencias.update',$referencia->id)}}" class="container" style="max-width: 800px;">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="numero" class="form-label">Número</label>
      <input type="text" class="form-control" value="{{$referencia->numero}}" required pattern="[0-9]{8}" name="numero" id="numero">
    </div>
    <div class="mb-3">
      <label for="descripcion" class="form-label">Descripción</label>
      <input type="text" class="form-control" value="{{$referencia->descripcion}}" name="descripcion" id="descripcion">
    </div>
    <div class="mb-3">
      <label for="ubicacion" class="form-label">Ubicación almacén</label>
      <input type="text" class="form-control" value="{{$referencia->ubicacion}}" name="ubicacion" id="ubicacionReal">
    </div>        
    <div class="mb-3">
      <label for="estado" class="form-label">Estado</label>    
      <select class="form-select mb-3" name="estado" aria-label="estado" >
        <option  value="light" {{$referencia->estado=="light"?"selected":""}}>Desconocido</option>      
        <option class="text-success" value="success" {{$referencia->estado=="success"?"selected":""}}>Ok</option>
        <option class="text-warning" value="warning" {{$referencia->estado=="warning"?"selected":""}}>En reparación</option>
        <option class="text-danger" value="danger" {{$referencia->estado=="danger"?"selected":""}}>No ok</option>      
      </select>
    </div>
    <div class="mb-3">
      <label for="cavidades" class="form-label">Cavidades</label>
      <input type="text" class="form-control" name="cavidades" id="cavidades" value="{{$referencia->cavidades}}">
    </div>
    <div class="mb-3">
      <label for="comentario" class="form-label">Comentario</label>
      <textarea class="form-control" id="descripcion" name="comentario" rows="3" >{{$referencia->comentario}}</textarea>
    </div>
    <div class="mb-3">
      <label for="molde_id" class="form-label">Molde base</label>
      <input type="text" class="form-control" list="listaMoldes" name="molde_id" id="molde_id" value="{{$referencia->molde->numero}}" required pattern="[0-9]{8}" placeholder="Ejem. 11110000">
      <datalist id="listaMoldes">
        @foreach($moldes as $molde)          
            <option>{{$molde->numero}}</option>      
        @endforeach
      </datalist>
    </div>    
    <div class="mb-3">
      <button type="submit" class="btn btn-primary mb-3">Actualizar registro</button>
      <a href="{{route('referencias.show',$referencia->id)}}"><button type="button" class="btn btn-primary mb-3">Volver</button></a>
    </div>
  </form>

@endsection
@section('pie')
@endsection
