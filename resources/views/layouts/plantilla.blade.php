<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Faca gestión de moldes</title>
  <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('css/bootstrap.css.map')}}">
</head>
<body class="container" style="max-width: 1000px;">
  <header>
    <h1 class="text-center m-3">
      @yield('cabecera')
    </h1>
  </header>
  <main class="container border rounded bg-light">

    @yield('contenido')
  </main>
  <footer>
    @yield('pie')
  </footer>
  <script src="{{asset('js/bootstrap.bundle.js')}}"></script>
  <script src="{{asset('js/bootstrap.bundle.js.map')}}"></script>
</body>
</html>