<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <title>Tamara</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
      background-color: #ff6600;
      color: #fff;
    }
    /* FIN DEL ENCABEZADO*/

    /*inicio del nav */
    .navbar {
      background-color: #343a40;
      border-radius: 10px;
      box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2); /* Adjusted box-shadow */
      padding: 10px 20px; /* Adjusted padding */
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
      background-color: #ff6600; /* Color del icono del botón de alternar */
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
      color: #ff6600; /* Cambio de color al pasar el ratón */
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
      background-color: #ff6600; /* Cambio de color al pasar el ratón */
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
      color: #ff6600; /* Color del texto en el botón de búsqueda */
      border-color: #ff6600; /* Color del borde del botón de búsqueda */
      transition: all 0.3s ease; /* Transición suave */
    }

    .btn-outline-success:hover {
      background-color: #ff6600; /* Cambio de color al pasar el ratón */
      color: #fff; /* Cambio de color del texto al pasar el ratón */
    }
    /*FIN del nav */


    /*INICIO DEL FOOTER*/
    footer {
      background-color: #333;
      color: #fff;
      text-align: center;
      padding: 20px 0;
  }
  
  .footer-container {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
  }
  
  .footer-column {
      flex: 1;
      margin-right: 20px;
  }
  
  .footer-column:last-child {
      margin-right: 0;
  }
  
  h3 {
      font-size: 20px;
      margin-bottom: 10px;
  }
  
  p {
      font-size: 16px;
      line-height: 1.5;
  }
  
  ul {
      list-style: none;
      padding: 0;
  }
  
  ul li {
      margin-bottom: 10px;
  }
  
  ul li a {
      text-decoration: none;
      color: #fff;
      transition: color 0.3s;
  }
  
  ul li a:hover {
      color: #ff6600;
  }
  
  .social-icons {
      margin-top: 20px;
  }
  
  .social-icons a {
      color: #fff;
      font-size: 24px;
      margin-right: 20px;
      text-decoration: none;
  }
  
  .social-icons a:hover {
      color: #ff6600;
  }
  
  /* Estilos para el área de derechos de autor */
  .footer-bottom {
      padding: 10px 0;
  }
  
  .footer-bottom p {
      font-size: 14px;
      margin: 0;
  }
  
  #carritoModal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.8);
  }
    /*FIN DEL FOOTER*/

  /*CARRITO DE COMPRAS*/
  .cart-container {
    position: relative;
    margin-right: 20px;
    cursor: pointer;
  }
  
  /* Estilos para el ícono del carrito */
  .cart-container i {
    font-size: 24px; /* Ajusta según tu diseño */
    color: #2980b9; /* Color del ícono */
  }
  
  /* Estilos para el número en el carrito */
  .cart-count {
    position: absolute;
    top: -20px;
    right: -20px;
    background-color: #ff6600;
    color: #fff;
    border-radius: 50%;
    padding: 6px 10px;
    font-size: 14px;
    font-weight: bold;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Sombra para resaltar el número */
    transition: background-color 0.3s ease-in-out; /* Transición suave del color de fondo */
  }
  
  /* Cambia el color del número cuando el carrito tiene elementos */
  .cart-container.filled .cart-count {
    background-color: #e44d26; /* Cambia a otro color cuando hay elementos en el carrito */
  }
  /*CARRITO DE COMPRAS*/

  /*modal*/
  .modal-content {
    border-radius: 10px; /* Bordes redondeados */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra suave */
  }
  
  .modal-header {
    background-color: #007bff; /* Color de fondo del encabezado */
    color: #fff; /* Color del texto en el encabezado */
  }
  
  .modal-footer {
    background-color: #f8f9fa; /* Color de fondo del pie de página */
  }
  
  #total-price {
    margin-top: 15px; /* Espaciado superior para el total */
    font-weight: bold; /* Texto en negrita para el total */
  }

  .table {
    background-color: #fff; /* Fondo blanco para la tabla */
  }

  @media (max-width: 767px) {
    .modal-dialog {
      width: 98%; /* Ancho del modal en dispositivos móviles */
    }
  
    .modal-content {
      border-radius: 0; /* Bordes cuadrados en dispositivos móviles */
    }
  
    #total-price {
      margin-top: 10px; /* Menos espacio para el total en dispositivos móviles */
    }
  }

  @media (max-width: 767px) {
    .table-responsive {
      overflow-x: auto; /* Agregar barra de desplazamiento horizontal en dispositivos móviles si es necesario */
    }

    .footer-column {
      margin: 0 10px 20px 10px;
  }
  }

  @media (max-width: 767px) {
    .modal-footer button {
      width: 100%; /* Ancho completo para los botones en dispositivos móviles */
      margin-bottom: 10px; /* Espaciado inferior entre los botones en dispositivos móviles */
    }
  }

  @media (max-width: 767px) {
    .table th {
      white-space: normal; /* Permitir el retorno de línea en el encabezado en dispositivos móviles */ 
    }
  }

  @media (max-width: 767px) {
    .table {
      font-size: 11px; /* Reducir el tamaño de fuente en dispositivos móviles */
    }
  }

  .product-container {
    flex-grow: 1;
}

.product-row {
    display: flex;
}

/* Estilos para cada tarjeta de producto */
.card {
    width: 200px; /* Establece el ancho fijo de las tarjetas */
    border: 1px solid #e0e0e0;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    text-align: center;
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    overflow: hidden; 
    margin-bottom: 25px;
    margin-top: 25px;
}

.card:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
}

.card img {
    width: 160px;
    height: 160px; /* Ajustar la altura automáticamente */
    object-fit: cover;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    margin-left: 20px;
}

.card-body {
    padding: 10px;
}

.card-title {
    font-size: 1rem; /* Tamaño de fuente más pequeño */
    font-weight: bold;
    margin-bottom: 5px;
    color: #333;
}

.card-text {
    font-size: 0.9rem; /* Tamaño de fuente más pequeño */
    margin-bottom: 5px;
    color: #666;
}

.product-price {
    font-size: 1.2rem;
    font-weight: bold;
    color: #ff4500;
    margin-top: 10px;
}

.card-text:last-child {
    margin-bottom: 0;
}

.add-to-cart-button {
    background-color: #ff4500;
    color: #fff;
    font-weight: bold;
    cursor: pointer;
    padding: 8px 16px;
    border-radius: 5px;
    border: none;
    transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
    margin-top: 10px;
}

.add-to-cart-button:hover {
    background-color: #ff3300;
    transform: translateY(-2px);
    box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
}

.product-price {
    font-size: 1.2rem;
    font-weight: bold;
    color: #ff4500;
    margin-top: 10px;
}

.added-to-cart {
    background-color: #4CAF50;
    color: #fff;
    text-align: center;
    padding: 10px;
    border-radius: 5px;
    font-weight: bold;
    margin-top: 10px;
    opacity: 0;
    transform: scale(0.8);
    transition: opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
}

.added-to-cart.show {
    opacity: 1;
    transform: scale(1);
}
.animated-row .card:hover {
  animation: scale 0.3s ease-in-out;
}

.add-to-cart-button-hidden {
    display: none;
}

.color-balls {
  display: flex;
  justify-content: center;
  margin-top: 10px;
}

.color-ball {
  width: 15px;
  height: 15px;
  border-radius: 50%;
  margin-right: 5px;
  display: inline-block;
  border: 1px solid black; /* Cambia el borde a negro */
}

.color-text {
  font-size: 0.9rem;
  color: #666;
  margin-left: 5px;
  display: inline-block;
  line-height: 15px; /* Ajusta la alineación vertical */
}

@keyframes scale {
  0% {
    transform: scale(1);
  }
  50% {
    transform: scale(1.1);
  }
  100% {
    transform: scale(1);
  }
}

@media (max-width: 768px) {
    .product-row {
        flex-direction: column;
    }

    .card {
        width: calc(100% - 20px); /* Utiliza el ancho completo con un margen inferior */
        margin: 10px auto; /* Margen superior e inferior, centrando las tarjetas */
    }

    .card img{
        margin-left: 90px;
    }
}

  /*modal*/
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
            <a id="registrarse" class="dropdown-item" href="{{ route('registrarse') }}">Registrarse</a>
            <a id="iniciarSesion" class="dropdown-item" href="{{ route('login') }}">Iniciar Sesión</a>
            <a id="cerrarSesion" class="dropdown-item" href="#" style="display: none;">Cerrar sesion</a>
          </div>
      </div>
  </header>
  
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container d-flex justify-content-between align-items-center">
      <a class="navbar-brand d-flex align-items-center" href="#">
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
              <li><a class="dropdown-item" href="#" data-cat="2" data-subcat="1">Camisas</a></li>
              <li><a class="dropdown-item" href="#" data-cat="2" data-subcat="2">Camisetas</a></li>
              <li><a class="dropdown-item" href="#" data-cat="2" data-subcat="3">Pantalones</a></li>
            </ul>
          </li>
  
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Mujer
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
              <li><a class="dropdown-item" href="#" data-cat="1" data-subcat="1">Camisas</a></li>
              <li><a class="dropdown-item" href="#" data-cat="1" data-subcat="2">Camisetas</a></li>
              <li><a class="dropdown-item" href="#" data-cat="1" data-subcat="3">Pantalones</a></li>
            </ul>
          </li>
  
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Niños
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown3">
              <li><a class="dropdown-item" href="#" data-cat="3" data-subcat="1">Camisas</a></li>
              <li><a class="dropdown-item" href="#" data-cat="3" data-subcat="2">Camisetas</a></li>
              <li><a class="dropdown-item" href="#" data-cat="3" data-subcat="3">Pantalone</a></li>
            </ul>
          </li>

          <li id="menuRol" class="nav-item dropdown">

          </li>
        </ul>
        <!-- Input de búsqueda y botón con icono de lupa -->
        <form class="d-flex ms-auto">
          <div class="cart-container d-flex align-items-center">
            <i class="fas fa-shopping-cart"></i>
            <span class="cart-count">0</span>
          </div>
          <input class="form-control me-2" id="nombre_producto" type="search" placeholder="Buscar" aria-label="Search">
          <button class="btn btn-outline-success" id="search-button" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </form>
      </div>
    </div>
  </nav>

    <div class="product-container">
        <div class="product-row" id="productos"></div>
    </div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background: linear-gradient(to right, #007bff, #3498db);">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tu carrito</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table table-striped">
          <thead>
              <tr>
                  <th>Producto</th>
                  <th>Imagen</th>
                  <th>Talla</th>
                  <th>Color</th>
                  <th>Precio</th>
                  <th>Accion</th>
              </tr>
          </thead>
          <tbody id="cart-items-list">
              <!-- Aquí se mostrarán los productos -->
          </tbody>
      </table>
      <div id="total-price" class="mt-2">
          Total: $<span id="total-amount">0.00</span>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-outline-primary">Comprar Ahora</button>
      </div>
    </div>
  </div>
</div>

<footer>
  <div class="footer-container">
      <div class="footer-column">
          <h3>Acerca de nosotros</h3>
          <p>Somos Tienda Tamara, tu destino para encontrar la moda más elegante y exclusiva para todas las ocasiones. Nuestra pasión es proporcionarte la mejor selección de ropa y accesorios para que te veas y te sientas increíble en cualquier momento.</p>
      </div>
      <div class="footer-column">
          <h3>Enlaces rápidos</h3>
          <ul>
              <li><a href="#">Inicio</a></li>
              <li><a href="#">Productos</a></li>
              <li><a href="#">Categorías</a></li>
              <li><a href="#">Hombres</a></li>
              <li><a href="#">Mujeres</a></li>
              <li><a href="#">Deportes</a></li>
          </ul>
      </div>
      <div class="footer-column">
          <h3>Síguenos</h3>
          <div class="social-icons">
              <a href="#" class="facebook-icon"><i class="fab fa-facebook"></i></a>
              <a href="#" class="instagram-icon"><i class="fab fa-instagram"></i></a>
          </div>
      </div>
  </div>
  <div class="footer-bottom">
      <p>&copy; 2023 Tienda Tamara</p>
  </div>
</footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>  
  <script src="{{ asset('js/subCategorias.js') }}"></script>
</body>
</html>