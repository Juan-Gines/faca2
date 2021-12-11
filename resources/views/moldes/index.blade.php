@extends('layouts.plantilla')

@section('cabecera')
  Listado de moldes
@endsection
@section('contenido')  
<div class="m-5">
  <div class="row justify-content-center">
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
