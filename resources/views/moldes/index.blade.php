@extends('layouts.plantilla')

@section('cabecera')
  Listado de moldes
@endsection
@section('contenido')  
<div class="m-5">
  <div class="row justify-content-center">
    <div class="col-auto mb-3 ">
      <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" action="" >
        <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
      </form>      
    </div>
    <div class="col-auto mb-3 ">      
      <select class="form-select mb-3" name="listado" aria-label="estado" >        
        <option value="todos"><a href="{{route('moldes.index')}}"><div>Todos</div></option> 
        <option value="desconocido"><div>Desconocido</div></option>      
        <option class="text-success" value="ok"><div>Ok</div></option>
        <option class="text-warning" value="reparacion"><div>En reparación</div></option>
        <option class="text-danger" value="nook"><div>No ok</div></option>     
      </select>      
    </div>
    <div class="col-auto mb-3 ">
      <a href ="{{route('moldes.create')}}" ><button class="btn btn-primary" type="button">Nuevo registro</button></a>
    </div>
  </div>  
  <div class="row justify-content-center">
    <table class="table table-hover" style="max-width: 1000px;" >
      <thead>                
        <tr>
          <th>Numero molde</th>
          <th>Ubicación almacen</th>
          <th>Ubicación actual</th>
          <th>versión actual</th>
          <th>Estado</th>
          <th>Cavidades</th>
        </tr>
      </thead>
      <tbody>
        @foreach($moldes as $molde)                            
          <tr class="table-{{$molde->estado}} clickable-row">
          
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
