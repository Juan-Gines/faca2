@extends('layouts.plantilla')


@section('contenido')
@dump($producciones)
<div class="row justify-content-center p-3">
  <h2 class="text-center" style="color: #1652B5;">Info Pedido nº {{$pedido->numero}}</h2>
</div>
  <div class="col  justify-content-center">
    <div class="row justify-content-center mb-3">
      <a href="{{route('pedidos.edit',$pedido->id)}}" class="col-auto"><button class=" btn btn-info mb-3"><i class="fa-regular fa-pen-to-square icon"></i>Modificar info</button></a>
      <a href="{{route('pedidos.index')}}"class="col-auto"><button type="button" class=" btn btn-outline-primary mb-3"><i class="fa-solid fa-arrow-up-right-from-square icon"></i>Volver</button></a>
    </div>     
    <div class="row ">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Número  </div>
      <div class="col-md-4 mb-3"> {{$pedido->numero}}</div>
    </div> 
    <div class="row ">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Máquina </div>
      <div class="col-md-4 mb-3"> {{$pedido->maquina->numero}}</div>
    </div>   
    <div class="row ">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Referencia </div>
      <div class="col-md-4 mb-3 "> {{$pedido->referencia->numero}}</div>
    </div> 
    <div class="row ">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Descripción </div>
      <div class="col-md-4 mb-3 "> {{$pedido->referencia->descripcion}}</div>
    </div> 
    <div class="row ">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Piezas totales </div>
      <div class="col-md-4 mb-3 "> {{$pedido->totalPiezas}}</div>
    </div>     
    <div class="row ">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Estado </div>
      <div class="col-md-4 mb-3 text-{{$pedido->estado ? $color[$pedido->estado] : ''}} "> {{$texto[$pedido->estado]}}</div>
    </div> 
    <div class="row ">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Fecha inicio </div>
      <div class="col-md-4 mb-3 "> {{!$pedido->fechaInicio =="" ? \Carbon\Carbon::parse(strtotime($pedido->fechaInicio))->formatLocalized('%d/%m/%Y') : ""}}</div>
    </div> 
    <div class="row ">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Fecha Fin </div>
      <div class="col-md-4 mb-3 "> {{!$pedido->fechaFin =="" ? \Carbon\Carbon::parse(strtotime($pedido->fechaFin))->formatLocalized('%d/%m/%Y') : ""}}</div>
    </div>
    <div class="row ">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Tiempo ciclo (seg) </div>
      <div class="col-md-4 mb-3 "> {{$pedido->tiempoCiclo}}</div>
    </div><div class="row ">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Peso pieza (grs) </div>
      <div class="col-md-4 mb-3 "> {{$pedido->pesoPieza}}</div>
    </div><div class="row ">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Cavidades </div>
      <div class="col-md-4 mb-3 "> {{$pedido->cavidades}}</div>
    </div> 
    </div><div class="row ">
      <div class="col-md-3 offset-md-3 fw-bold mb-3"> Material </div>
      <div class="col-md-4 mb-3 "> {{$pedido->materia}}</div>
    </div> 
  </div>
  <section class="row justify-content-center">
    <article class="col-auto ">
      <div class="row justify-content-center p-3">
        <h2 class="text-center" style="color: #1652B5;">Producciones</h2>
      </div>
      <div class="mb-5 mx-5 ">
        <div class="row justify-content-center mb-3">
          <div class="col-auto">         
            <a href="{{route('producciones.nuevo',$pedido->id)}}" class="col-auto"><button class=" btn btn-primary mb-3"><i class="fa-regular fa-clipboard icon"></i>Nuevo registro</button></a>                  
          </div>
        </div>
        <div class="row justify-content-center">
          <table class="table table-hover"  >
            <thead class="table-dark table-header-historial text-center">                
              <tr>            
                <th scope="col">Turno</th>
                <th scope="col">Fecha</th>
                <th scope="col">Cantidad</th>                                    
              </tr>
            </thead>
            <tbody>
              @foreach($producciones as $produccion)                            
                <tr class="clickable-row">            
                  <td>{{$produccion->turno}}</td>
                  <td >{{!$produccion->fecha =="" ? \Carbon\Carbon::parse(strtotime($produccion->fecha))->formatLocalized('%d/%m/%Y') : "" }}</td>
                  <td >{{$produccion->cantidad}}</td>                             
                </tr>          
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </article>
    <article class="col-auto">
      <div class="row justify-content-center p-3">
        <h2 class="text-center" style="color: #1652B5;">Mermas</h2>
      </div>
      <div class="mb-5 mx-5 ">
        <div class="row justify-content-center mb-3">
          <div class="col-auto">
           <a href="{{route('mermas.nuevo',$pedido->id)}}" class="col-auto"><button class=" btn btn-primary mb-3"><i class="fa-regular fa-clipboard icon"></i>Nuevo registro</button></a>      
          </div>
        </div>
        <div class="row justify-content-center">
          <table class="table table-hover"  >
            <thead class="table-dark table-header-historial text-center">                
              <tr>            
                <th scope="col">Fecha</th>
                <th scope="col">Salas</th>
                <th scope="col">Purga</th>                                    
              </tr>
            </thead>
            <tbody>
              @foreach($mermas as $merma)                            
                <tr class="clickable-row">            
                  <td>{{!$merma->fecha =="" ? \Carbon\Carbon::parse(strtotime($merma->fecha))->formatLocalized('%d/%m/%Y') : ""}}</td>                  
                  <td>{{$merma->sala}}</td>            
                  <td>{{$merma->purga}}</td>                            
                </tr>          
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </article>
  </section>  
@endsection
@section('pie')
@endsection
