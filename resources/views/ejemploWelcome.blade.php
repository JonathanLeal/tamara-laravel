<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <title>Tamara</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <style>

    /* INICIO DE ENCABEZAD0 */
    .header {
      background-color: #333;
      color: #fff;
      text-align: center;
      padding: 20px;
      border-radius: 10px;
      display: flex;
      justify-content: center; /* Centra horizontalmente */
      align-items: center; /* Centra verticalmente */
    }

    .logo-container {
      margin-right: 20px; /* Ajusta el margen entre el logo y el dropdown */
    }
    
    .dropdown-menu {
      background-color: #212529; /* Cambia el color de fondo del dropdown */
      border: none;
      border-radius: 10px;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }
    
    .dropdown-item {
      color: #dee2e6;
    }
    
    .dropdown-item:hover {
      background-color: #61dafb;
      color: #fff;
    }
    /* FIN DEL ENCABEZADO*/

    /*inicio del nav */
    .navbar {
      background-color: #343a40; /* Color de fondo del navbar */
      border-radius: 10px; /* Bordes redondeados */
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* Sombra suave */
      padding: 10px; /* Espaciado interno */
    }

    .navbar-brand {
      font-family: 'Raleway', sans-serif; /* Fuente personalizada */
      font-size: 30px;
      font-weight: bold;
      color: #61dafb; /* Color del texto */
    }

    .navbar-nav {
      font-family: 'Raleway', sans-serif; /* Fuente personalizada */
      font-size: 20px;
    }

    .navbar-dark .navbar-toggler-icon {
      background-color: #61dafb; /* Color del icono del botón de alternar */
    }

    .navbar-toggler:focus {
      outline: none; /* Eliminar el contorno en el foco del botón de alternar */
    }

    .nav-item {
      margin-right: 15px; /* Espaciado entre elementos de menú */
    }

    .navbar-nav .nav-link {
      color: #dee2e6; /* Color del texto del enlace en el menú */
      transition: color 0.3s ease; /* Transición suave */
    }

    .navbar-nav .nav-link:hover {
      color: #61dafb; /* Cambio de color al pasar el ratón */
    }

    .navbar-nav .dropdown-menu {
      background-color: #343a40; /* Color de fondo del menú desplegable */
      border: none; /* Sin borde */
      border-radius: 10px; /* Bordes redondeados */
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* Sombra suave */
    }

    .navbar-nav .dropdown-menu .dropdown-item {
      color: #dee2e6; /* Color del texto en las opciones del menú desplegable */
      transition: background-color 0.3s ease; /* Transición suave */
    }

    .navbar-nav .dropdown-menu .dropdown-item:hover {
      background-color: #61dafb; /* Cambio de color al pasar el ratón */
      color: #fff; /* Cambio de color del texto al pasar el ratón */
    }

    .form-control {
      border-radius: 20px; /* Bordes redondeados para el campo de búsqueda */
      border: none; /* Sin borde */
      background-color: #495057; /* Color de fondo del campo de búsqueda */
      color: #dee2e6; /* Color del texto en el campo de búsqueda */
    }

    .btn-outline-success {
      border-radius: 20px; /* Bordes redondeados para el botón de búsqueda */
      color: #61dafb; /* Color del texto en el botón de búsqueda */
      border-color: #61dafb; /* Color del borde del botón de búsqueda */
      transition: all 0.3s ease; /* Transición suave */
    }

    .btn-outline-success:hover {
      background-color: #61dafb; /* Cambio de color al pasar el ratón */
      color: #fff; /* Cambio de color del texto al pasar el ratón */
    }
    /*FIN del nav */

    /* INICIO DEL SLIDER */
    .slider-wrapper {
      position: relative;
      overflow: hidden;
      max-width: 100%;
      margin: 0 auto;
      height: 400px; /* ajusta según tus necesidades */
    }
    
    .slider-container {
      display: flex;
      transition: transform 0.5s ease;
      max-width: 100%;
    }
    
    .slider-image {
      flex: 0 0 100%;
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }
    
    .slider-buttons {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      display: flex;
      justify-content: space-between;
      width: 100%;
      z-index: 1;
    }
    
    #prev-button,
    #next-button {
      background-color: #3498db;
      color: #fff;
      border: none;
      padding: 10px;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    
    #prev-button:hover,
    #next-button:hover {
      background-color: #2980b9;
    }
    
    /* FIN DEL SLIDER */
    
    /*INICIO DE TARJETAS*/
  </style>
  </head>
  <body>
    <header class="header">
      <div class="logo-container">
        <h1>Tamara</h1>
      </div>
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-user"></i>
        </button>
    
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="#">Registrarse</a>
          <a class="dropdown-item" href="#">Iniciar sesión</a>
        </div>
      </div>
    </header>

    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="{{ asset('storage/imagenes/palmera.png') }}" alt="Logo" class="img-fluid" style="max-width: 30px; height: 50px;">
        </a>
    
        <!-- Botón para mostrar el menú en dispositivos pequeños -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    
        <!-- Menú desplegable -->
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Hombre
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                <li><a class="dropdown-item" href="#">Camisas</a></li>
                <li><a class="dropdown-item" href="#">Camisetas</a></li>
                <li><a class="dropdown-item" href="#">Pantalones</a></li>
              </ul>
            </li>
    
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Mujer
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
                <li><a class="dropdown-item" href="#">Camisas</a></li>
                <li><a class="dropdown-item" href="#">Camisetas</a></li>
                <li><a class="dropdown-item" href="#">Pantalones</a></li>
              </ul>
            </li>
    
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Niños
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown3">
                <li><a class="dropdown-item" href="#">Camisas</a></li>
                <li><a class="dropdown-item" href="#">Camisetas</a></li>
                <li><a class="dropdown-item" href="#">Pantalones</a></li>
              </ul>
            </li>
          </ul>
    
          <!-- Input de búsqueda y botón con icono de lupa -->
          <form class="d-flex mx-auto">
            <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </form>
        </div>
      </div>
    </nav>

    <!-- Slider de imágenes -->
    <div class="container mt-4">
      <div class="slider-wrapper">
        <div class="slider-container">
          <!-- Agrega tus imágenes con la clase "slider-image" -->
          <div class="slider-image"><img src="{{ asset('storage/imagenes/prueba.jpg') }}" alt="Imagen 1"></div>
          <div class="slider-image"><img src="{{ asset('storage/imagenes/carrusel2.jpg') }}" alt="Imagen 2"></div>
          <div class="slider-image"><img src="{{ asset('storage/imagenes/carrusel1.jpg') }}" alt="Imagen 3"></div>
          <!-- ... Agrega más imágenes si es necesario ... -->
        </div>
        <!-- Botones de navegación del slider dentro del contenedor de imágenes -->
        <div class="slider-buttons">
          <button id="prev-button" class="btn btn-primary">Anterior</button>
          <button id="next-button" class="btn btn-primary">Siguiente</button>
        </div>
      </div>
    </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="{{ asset('js/welcome.js') }}"></script>  
</body>
</html>