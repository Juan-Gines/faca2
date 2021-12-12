@extends('layouts.plantilla')

@section('cabecera')
  Listado de moldes
@endsection
@section('contenido')  
<div class="m-5">
  <div class="row justify-content-center">
    <div class="col-auto mb-3 ">      
      <select class="form-select mb-3" name="listado" aria-label="estado" >
        </form>
        <option value="todos"><a href="{{route('moldes.index')}}"><div>Todos</div></a></option> 
        <option value="desconocido"><a href="{{route('moldes/listado/desconocido',)}}"><div>Desconocido</div></a></option>      
        <option class="text-success" value="ok"><a href="{{route('moldes/listado/ok')}}"><div>Ok</div></a></option>
        <option class="text-warning" value="reparacion"><a href="{{route('moldes/listado/reparacion')}}"><div>En reparación</div></a></option>
        <option class="text-danger" value="nook"><a href="{{route('moldes/listado/nook')}}"><div>No ok</div></a></option>     
      </select>      
    </div>
    <div class="col-auto mb-3 ">
      <a href ="{{route('moldes.create')}}" ><button class="btn btn-primary" type="button">Nuevo registro</button></a>
    </div>
  </div>  
  <div class="row justify-content-center">
    <table class="table table-hover" style="max-width: 800px;" >
      <thead>                
        <tr>
          <th>Numero molde</th>
          <th>Ubicacion real</th>
          <th>Ubicacion actual</th>
          <th>version actual</th>
          <th>Estado</th>
          <th>Cavidades</th>
        </tr>
      </thead>
      <tbody>
        @foreach($moldes as $molde)                            
          <tr class="{{$molde->estado}} clickable-row">
          
            <td><a href="{{route('moldes.show',$molde->id)}}">{{$molde->numero}}</a></td>
            
            <td>{{$molde->ubicacionReal}}</td>
            <td>{{$molde->ubicacionActual}}</td>
            <td>{{$molde->versionActual}}</td>
            <td>{{$molde->estadoTexto}}</td>
            <td>{{$molde->cavidades}}</td>
             
          </tr>
          
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
@section('pie')
@endsection
