@extends('layouts.plantilla')


@section('contenido')
<script>
  var campo={{Js::from($campo)}};
  var orden={{Js::from($orden)}};
  var url='{{route('moldes.index')}}';    
</script>
<div class="row justify-content-center p-3">
  <h2 class="text-center" style="color: #1652B5;">Listado de moldes</h2>
</div>
<!-- <div class="row justify-content-center">
  <div class="col-auto">
    <a href="{{route('moldes.guardar')}}"><button class="btn btn-primary" type="button">Leer excel</button></a>
  </div>
  <div class="col-auto">
    <a href="{{route('moldes.directorio')}}"><button class="btn btn-primary" type="button">obtener directorio</button></a>
  </div>
  <div class="col-auto">
    <a href="{{route('moldes.savedata')}}"><button class="btn btn-primary" type="button">obtener excel</button></a>
  </div>
</div> -->  
<nav class="navbar navbar-expand-md stiky-top navbar-light bg-white rounded navbar-fixed" aria-label="Eleventh navbar example">
  <div class="container mb-2 ">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
      <ul class="navbar-nav ">  
        <li class="nav-item mx-2 ">
          <a href ="{{route('moldes.create')}}" ><button class="btn btn-primary" type="button"><i class="fa-regular fa-clipboard icon" ></i>Nuevo molde</button></a>
        </li>                      
        <li class="nav-item dropdown mx-2 ">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown09" role="button" data-bs-toggle="dropdown" aria-expanded="false" >Filtrar por estado</a>
          <ul class="dropdown-menu" aria-labelledby="dropdown09">
            <li><a class="dropdown-item " href="{{route('moldes.index')}}">Todos</a></li>
            <li><a class="dropdown-item bg-success" href="{{route('moldes.ok')}}">Ok</a></li>
            <li><a class="dropdown-item bg-warning" href="{{route('moldes.reparando')}}">En reparación</a></li>
            <li><a class="dropdown-item bg-danger" href="{{route('moldes.nook')}}">No ok</a></li>
            <li><a class="dropdown-item" href="{{route('moldes.desconocido')}}">Desconocido</a></li>
          </ul>
        </li>
        <li class="nav-item mx-2 ">      
          <form action="{{route('moldes.buscar')}}" class=" ms-2" method="GET">            
            <input class="form-control" type="text" name="busqueda" placeholder="Buscar..." aria-label="Search">
            <button class="btn btn-outline-light"><i class="fa-solid fa-magnifying-glass icon"></i></button>
          </form>
        </li>
      </ul>
    </div>  
  </div>
</nav> 
<div class="mx-5">  
  <div class="row justify-content-center">
    <table class="table table-hover rounded text-center"  >
      <thead  class="table-primary table-header-fix">                
        <tr>
          <th scope="col">
            <div id="numero" class="dedo">                
              <span>Molde</span>
            </div>            
          </th>          
          <th scope="col">             
              <div id="descripcion" class="dedo">                
                <span>Descripción</span>
              </div>                      
          </th>          
          <th scope="col">
            <div id="ubicacionReal" class="dedo">                
              <span>Ubicación Almacen</span>
            </div>                       
          </th>          
          <th scope="col">
            <div id="ubicacionActual" class="dedo">                
              <span>Ubicación Actual</span>
            </div>                   
          </th>          
          <th scope="col">
            <div id="versionActual" class="dedo">                
              <span>Versión Actual</span>
            </div>             
          </th>          
          <th scope="col">
            <div id="estado" class="dedo">                
              <span>Estado</span>
            </div>            
          </th>          
          <th scope="col">
            <div id="cavidades" class="dedo">                
              <span>Cavidades</span>
            </div>                      
          </th>         
        </tr>
      </thead>
      <tbody>
        @if($moldes->count()<=0)
        <tr><td colspan="7"> No hay registros que mostrar</td></tr>
        @endif        
        @foreach($moldes as $molde)        
          <tr class="table-{{$molde->estado==0?'light':$color[$molde->estado]}} " data-bs-toggle="tooltip" data-bs-placement="auto" title="{{$molde->descripcion}}">          
            <td data-bs-toggle="tooltip" data-bs-placement="auto" title="Click para editar la info del molde"><a href="{{route('moldes.show',$molde->id)}}"><span class="badge bg-primary rounded-pill fs-6">{{$molde->numero}}</span></a></td>
            <td>{{$molde->descripcion}}</td>           
            <td> {{$molde->ubicacionReal}}</td>
            <td> {{$molde->ubicacionActual}}</td>
            <td> {{$molde->versionActual}}</td>
            <td><span class="badge bg-{{$color[$molde->estado]}} {{$molde->estado==1? 'text-dark':''}} rounded-pill badge-estado-fs ">{{$texto[$molde->estado]}}</span></td>
            <td> {{$molde->cavidades}}</td>           
          </tr>                    
        @endforeach        
      </tbody>      
    </table>
    {!! $moldes->appends(Request::except('page'))->render() !!}
        <p>Mostrando {{$moldes->firstItem()}}-{{$moldes->lastItem()}} de {{$moldes->total()}} molde(s)</p>   
  </div>
</div>
<script src="{{asset('js/moldes_index.js')}}"></script>
@endsection
@section('pie')
@endsection
