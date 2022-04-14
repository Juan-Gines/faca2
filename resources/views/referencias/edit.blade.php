@extends('layouts.plantilla')


@section('contenido')
  <div class="row justify-content-center p-3">
    <h2 class="text-center" style="color: #1652B5;">Actualiza referencia nº {{$referencia->numero}}</h2>
  </div>
  <form method="POST" action="{{route('referencias.update',$referencia)}}" class="container" style="max-width: 800px;">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="numero" class="form-label">Número</label>
      <input type="text" class="form-control" value="{{$referencia->numero}}" required pattern="[0-9]{8}" name="numero" id="numero">
    </div>
    <div class="mb-3">
      <label for="tipo" class="form-label">Tipo</label>    
      <select class="form-select mb-3" name="tipo" aria-label="tipo" >
        <option value="Tapa" {{$referencia->tipo=='Tapa' ? 'selected':''}}>Tapa</option>      
        <option value="Tarro" {{$referencia->tipo=='Tarro' ? 'selected':''}}>Tarro</option>
        <option value="Tapones" {{$referencia->tipo=='Tapones' ? 'selected':''}}>Tapones</option>
        <option value="Sealed" {{$referencia->tipo=='Sealed' ? 'selected':''}}>Sealed</option>      
        <option value="Rejilla" {{$referencia->tipo=='Rejilla' ? 'selected':''}}>Rejilla</option>      
        <option value="Polvera" {{$referencia->tipo=='Polvera' ? 'selected':''}}>Polvera</option>
        <option value="Obturador" {{$referencia->tipo=='Obturador' ? 'selected':''}}>Obturador</option>
        <option value="Dispenser" {{$referencia->tipo=='Dispenser' ? 'selected':''}}>Dispenser</option>      
        <option value="Cubilete" {{$referencia->tipo=='Cubilete' ? 'selected':''}}>Cubilete</option>
        <option value="Contra obturador" {{$referencia->tipo=='Contra obturador' ? 'selected':''}}>Contra obturador</option>
        <option value="Botella" {{$referencia->tipo=='Botella' ? 'selected':''}}>Botella</option>      
      </select>
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
        <option  value="0" {{$referencia->estado=="0"?"selected":""}}>Desconocido</option>      
        <option class="text-success" value="2" {{$referencia->estado=="2"?"selected":""}}>Ok</option>
        <option class="text-warning" value="1" {{$referencia->estado=="1"?"selected":""}}>En reparación</option>
        <option class="text-danger" value="3" {{$referencia->estado=="3"?"selected":""}}>No ok</option>      
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
      <button type="submit" class="btn btn-success mb-3"><i class="fa-solid fa-circle-check icon"></i>Guardar</button>
      <a href="{{route('referencias.show',$referencia->id)}}"><button type="button" class="btn btn-outline-primary mb-3"><i class="fa-solid fa-arrow-up-right-from-square icon"></i>Volver</button></a>
    </div>
  </form>

@endsection
@section('pie')
@endsection
