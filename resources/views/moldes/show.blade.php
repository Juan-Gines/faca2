@extends('layouts.plantilla')


@section('contenido')
<div class="row justify-content-center p-3">
  <h2 class="text-center" style="color: #1652B5;">Info molde nº {{$molde->numero}}</h2>
</div>
  <div class="col  justify-content-center">
    <div class="row justify-content-center mb-3">
      <a href="{{route('moldes.edit',$molde->id)}}" class="col-auto"><button class=" btn btn-primary mb-3">Modificar info</button></a>
      <a href="{{route('moldes.index')}}"class="col-auto"><button type="button" class=" btn btn-primary mb-3">Volver</button></a>
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
    <h2 class="text-center" style="color: #1652B5;">Intervenciones</h2>
  </div>
  <div class="mb-5 mx-5 ">
    <div class="row justify-content-center mb-3">
      <div class="col-auto">
        <form action="{{route('acciones.importar')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="molde_id" id="molde_id" value="{{$molde->id}}">          
          <input type="file" name="accionExcel" accept=".xlsx,.xls" id="accionExcel" required>
          <button class=" btn btn-primary mb-3">Importar excel</button>
        </form>
      </div>
      <a href="{{route('acciones.nuevo',$molde->id)}}" class="col-auto"><button class=" btn btn-primary mb-3">Nueva intervención</button></a>      
      <a href="{{route('acciones.exportar',$molde->id)}}" class="col-auto"><button class=" btn btn-primary mb-3">Excel</button></a>      
    </div>
    <div class="row justify-content-center">
      <table class="table table-hover"  >
        <thead class="table-dark table-header-historial text-center">                
          <tr>            
            <th scope="col">Fecha Salida</th>
            <th scope="col">Fecha Entrada</th>
            <th scope="col">Motivo intervención</th>
            <th scope="col">Intervención efectuada</th>
            <th scope="col">Tipo</th>
            <th scope="col">Lugar</th>
            <th scope="col">Fecha / Prueba Nº</th>
            <th scope="col">¿Prueba Ok?</th>                    
          </tr>
        </thead>
        <tbody>
          @foreach($acciones as $accion)                            
            <tr class="clickable-row">              
              
              <td>{{!$accion->fechaSalida =="" ? \Carbon\Carbon::parse(strtotime($accion->fechaSalida))->formatLocalized('%d/%m/%Y') : ""}}</td>
              <td >{{!$accion->fechaEntrada =="" ? \Carbon\Carbon::parse(strtotime($accion->fechaEntrada))->formatLocalized('%d/%m/%Y') : "" }}</td>
              <td class="overflow-auto">{{$accion->descripcion}}</td>
              <td class="overflow-hidden">{{$accion->reparacion}}</td>
              <td><a href="{{route('acciones.show',$accion->id)}}">{{$accion->tipo}}</a></td>
              <td>{{$accion->lugar}}</td>            
              <td>{{is_numeric($accion->fechaPrueba) && strlen($accion->fechaPrueba)==5 ? \Carbon\Carbon::parse(strtotime($accion->fechaEntrada))->formatLocalized('%d/%m/%Y') : $accion->fechaPrueba}}</td>            
              <td>{{$accion->ok}}</td>            
              
            </tr>
            
          @endforeach
        </tbody>
      </table>
    </div>
  </div>  
@endsection
@section('pie')
@endsection
