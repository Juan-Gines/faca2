<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Faca gestión </title>
  <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('css/bootstrap.css.map')}}">
  <link rel="stylesheet" href="{{asset('css/styles.css')}}">
</head>
<body>
<header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
        <img width="100"  src="{{asset('images/logo_web.png')}}" alt="Logo Faca">
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 text-white">Inicio</a></li>
          <li><a href="{{route('moldes.index')}}" class="nav-link px-2 text-secondary">Moldes</a></li>
          <li><a href="{{route('produccion.show')}}" class="nav-link px-2 text-white">Producción</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Reparaciones</a></li>          
        </ul>      
      </div>
    </div>
  </header>       
  <main class="container main-container bg-light">
    @yield('contenido')
  </main>
  <footer>
    @yield('pie')
  </footer>
  <script src="{{asset('js/bootstrap.bundle.js')}}"></script>
  <script src="{{asset('js/bootstrap.bundle.js.map')}}"></script>
</body>
</html>