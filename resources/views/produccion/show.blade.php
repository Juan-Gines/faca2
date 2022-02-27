@extends('layouts.plantilla')


@section('contenido')
<div class="row justify-content-center p-3 mb-5">
  <h1 class="text-center" style="color: #1652B5;">Producción actual</h1>
</div>  
<div class="row justify-content-center mb-5"> 
  <table class="table table-hover  text-center"  >
    <thead  class="table-primary">
      <tr class="table-danger table-header-historial header--extra">
        <th scope="col" colspan="8">Sala A</th>
      </tr>                
      <tr class=" table-header-historial2">
        <th scope="col" >Máquina</th>
        <th scope="col">Pedido</th>
        <th scope="col">Referencia</th>
        <th scope="col">Denominación</th>
        <th scope="col">Piezas totales</th>
        <th scope="col">Piezas parciales</th>
        <th scope="col">Estado</th>          
        <th scope="col">Observaciones</th>          
      </tr>
    </thead>
    <tbody>
      @for($i=1; $i < 20; $i++)                            
        <tr class="table clickable-row" data-bs-toggle="tooltip" data-bs-placement="auto" >
        
          <th scope="row" title="Click para ver descripción del pedido">Máquina {{$i}}</th>
          <td title="Click para ver descripción del pedido">21254412454</td>            
          <td title="Click para ver descripción del pedido">1860/0/1</td>
          <td title="Click para ver descripción del pedido">Tapa 200 cc</td>
          <td title="Click para ver descripción del pedido">10000</td>
          <td title="Click para ver descripción del pedido">2586</td>
          <td title="Click para ver las opciones de estado">
            <select name="status" id="status">
              <option value="1">Produciendo</option>
              <option value="1">Preparando máquina</option>
              <option value="1">Molde roto</option>
              <option value="1">Máquina rota</option>
              <option value="1">Pruebas</option>
              <option value="1">Fin producción</option>
              <option value="1">ok</option>
            </select>
          </td>
          <td title="Click para ver descripción del pedido">Molde en reparación Cornellá</td>
          
        </tr>
        
      @endfor
    </tbody>
  </table>
  <table class="table table-hover  text-center"  >
    <thead  class="table-primary">
      <tr class="table-danger table-header-historial header--extra">
        <th scope="col" colspan="8">Sala B</th>
      </tr>                
      <tr class=" table-header-historial2">
        <th scope="col" >Máquina</th>
        <th scope="col">Pedido</th>
        <th scope="col">Referencia</th>
        <th scope="col">Denominación</th>
        <th scope="col">Piezas totales</th>
        <th scope="col">Piezas parciales</th>
        <th scope="col">Estado</th>          
        <th scope="col">Observaciones</th>          
      </tr>
    </thead>
    <tbody>
      @for($i=1; $i < 20; $i++)                            
        <tr class="table clickable-row" data-bs-toggle="tooltip" data-bs-placement="auto" >
        
          <th scope="row" title="Click para ver descripción del pedido">Máquina {{$i}}</th>
          <td title="Click para ver descripción del pedido">21254412454</td>            
          <td title="Click para ver descripción del pedido">1860/0/1</td>
          <td title="Click para ver descripción del pedido">Tapa 200 cc</td>
          <td title="Click para ver descripción del pedido">10000</td>
          <td title="Click para ver descripción del pedido">2586</td>
          <td title="Click para ver las opciones de estado">
            <select name="status" id="status">
              <option value="1">Produciendo</option>
              <option value="1">Preparando máquina</option>
              <option value="1">Molde roto</option>
              <option value="1">Máquina rota</option>
              <option value="1">Pruebas</option>
              <option value="1">Fin producción</option>
              <option value="1">ok</option>
            </select>
          </td>
          <td title="Click para ver descripción del pedido">Molde en reparación Cornellá</td>
          
        </tr>
        
      @endfor
    </tbody>
  </table>    
</div>
<div class="row justify-content-center p-3 mb-5">
  <h2 class="text-center" style="color: #1652B5;">Detalles del pedido 124512154</h2>
</div>
<div class="info mb-5">    
  <div class="info-item">
    <span class=" bg-secondary info-item__title">Máquina </span><span class="info-item__text
    "> 52 </span>
  </div>    
  <div class="info-item">
    <span class=" bg-secondary info-item__title">Fecha inicio </span><span class="info-item__text
    "> 22/02/2022 </span>
  </div>
  <div class="info-item">
    <span class=" bg-secondary info-item__title">Referencia </span><span class="info-item__text
    "> 1485/0/2 </span>
  </div>
  <div class="info-item">
    <span class=" bg-secondary info-item__title">Descripción pieza </span><span class="info-item__text
    "> Tapa 200 mónaco refill install referent mode </span>
  </div>
  <div class="info-item">
    <span class=" bg-secondary info-item__title">Peso gr. </span><span class="info-item__text
    "> 37.58</span>
  </div>
  <div class="info-item">
    <span class=" bg-secondary info-item__title">Tiempo ciclo </span><span class="info-item__text"> 26.58</span>
  </div>
  <div class="info-item">
    <span class=" bg-secondary info-item__title">Cavidades </span><span class="info-item__text
    "> 4</span>
  </div>
  <div class="info-item">
    <span class=" bg-secondary info-item__title">Horas </span><span class="info-item__text
    "> 14.8</span>
  </div>
  <div class="info-item">
    <span class=" bg-secondary info-item__title">Material </span><span class="info-item__text
    "> SAN</span>
  </div>
  <div class="info-item">
    <span class=" bg-secondary info-item__title">Cantidad Fabricada (uds) </span><span class="info-item__text
    "> 4571</span>
  </div>
  <div class="info-item">
    <span class=" bg-secondary info-item__title">Merma sala </span><span class="info-item__text
    "> 6</span>
  </div>
  <div class="info-item">
    <span class=" bg-secondary info-item__title">Merma puesta apunto </span><span class="info-item__text
    "> 10</span>
  </div>
  <div class="info-item">
    <span class="bg-secondary info-item__title">Merma producción % </span><span class="info-item__text
    "> 4.67%</span>
  </div>    
</div>
<div class="row justify-content-center p-3 mb-5">
  <h3 class="text-center" style="color: #1652B5;">Producción por turnos</h3>
</div>
<div class="row justify-content-center">
  <table class="table table-hover  text-center"  >
    <thead  class="table-primary table-header-historial">                
      <tr>
        <th scope="col">Fecha</th>
        <th scope="col">Turno</th>
        <th scope="col">Nº piezas máquina</th>
        <th scope="col">Nº piezas turno</th>
        <th scope="col">Merma máquina</th>
        <th scope="col">Merma sala</th>                   
        <th scope="col">Observaciones</th>                   
      </tr>
    </thead>
    <tbody>
      @for($i=1; $i < 10; $i++)                            
        <tr class="table clickable-row" data-bs-toggle="tooltip" data-bs-placement="auto" >
        
          <td>22/02/2022</td>
          <td>Tarde</td>            
          <td>14000</td>
          <td>2000</td>
          <td>1Kg</td>
          <td>2Kg</td>           
          <td>Piezas contaminadas</td>
        </tr>
        
      @endfor
    </tbody>
  </table>
</div>
<script src="{{asset('js/produccion.js')}}"></script>   
@endsection
@section('pie')
@endsection