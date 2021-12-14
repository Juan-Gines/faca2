@extends('layouts.plantilla')


@section('contenido')
<div class="row justify-content-center p-3">
  <h2 class="text-center" style="color: #1652B5;">Info molde nº {{$molde->numero}}</h2>
</div>
  <div class="col  justify-content-center">
  <div class="col-md-12 offset-md-3 ml-2 mb-3">
      <a href="{{route('moldes.edit',['molde'=>$molde->id])}}"><button class="btn btn-primary mb-3">Modificar info</button></a>
      <a href="{{route('moldes.index')}}"><button type="button" class="btn btn-primary ms-5 mb-3">Volver</button></a>
    </div>     
    <div class="row ">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Nombre  </div>
      <div class="col-md-4 mb-3"> {{$molde->nombre}}</div>
    </div> 
    <div class="row ">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Ubicación actual  </div>
      <div class="col-md-4 mb-3"> {{$molde->ubicacionActual}}</div>
    </div> 
    <div class="row ">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Ubicación almacen  </div>
      <div class="col-md-4 mb-3"> {{$molde->ubicacionReal}}</div>
    </div> 
    <div class="row ">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Versión actual montada  </div>
      <div class="col-md-4 mb-3"> {{$molde->versionActual}}</div>
    </div> 
    <div class="row ">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Estado </div>
      <div class="col-md-4 mb-3 text-{{$molde->estado!='light'?$molde->estado:''}} "> {{$molde->estadoTexto}}</div>
    </div> 
    <div class="row ">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Cavidades  </div>
      <div class="col-md-4 mb-3"> {{$molde->cavidades}}</div>
    </div> 
    <div class="row ">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Comentario  </div>
      <div class="col-md-4 text-break mb-3">{{$molde->comentario}}</div>
    </div>       
  </div>
  <div class="row justify-content-center p-3">
    <h2 class="text-center" style="color: #1652B5;">Acciones</h2>
  </div>
  <div class="m-5">
  
  <div class="row justify-content-center">
    <table class="table table-hover"  >
      <thead>                
        <tr>
          <th>ID</th>
          <th>Fecha Entrada</th>
          <th>Fecha Salida</th>
          <th>tipo</th>
          <th>lugar</th>                    
        </tr>
      </thead>
      <tbody>
        @foreach($acciones as $accion)                            
          <tr class="clickable-row">
          
            <td><a href="{{route('acciones.show',$accion->id)}}">{{$accion->id}}</a></td>
            
            <td>{{$accion->fechaEntrada}}</td>
            <td>{{$accion->fechaSalida}}</td>
            <td>{{$accion->tipo}}</td>
            <td>{{$accion->lugar}}</td>            
            
          </tr>
          
        @endforeach
      </tbody>
    </table>
  </div>
</div>  
@endsection
@section('pie')
@endsection
