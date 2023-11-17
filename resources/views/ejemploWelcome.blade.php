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

    /* INICIO DEL SLIDER */
    .slider-wrapper {
      position: relative;
      overflow: hidden;
      max-width: 100%;
      margin: 0 auto;
      height: 50vw; /* ajusta según tus necesidades */
    }
    
    .slider-container {
      display: flex;
      transition: transform 0.5s ease;
      max-width: 100%;
    }
    
    .slider-image {
      flex: 0 0 100%;
      width: 100%;
      height: 50vw;
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
      background-color: #ff6600;
      color: #fff;
      border: none;
      padding: 10px;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    
    #prev-button:hover,
    #next-button:hover {
      background-color: #ff6600;
    }
    /* FIN DEL SLIDER */
    
    /*INICIO DE TARJETAS*/
    .categorias {
      display: flex;
      flex-wrap: wrap;
      margin: 20px auto;
      justify-content: space-around;
      max-width: 100%;
  }
  
  .categoria {
      border: 2px solid #ff6600; /* Cambiado el color del borde */
      padding: 10px;
      text-align: center;
      width: calc(33.33% - 20px);
      background-color: #fff;
      border-radius: 10px; /* Bordes más redondeados */
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s, margin 0.3s, box-shadow 0.3s; /* Agregada transición al sombreado */
      margin-bottom: 20px;
      margin-inline: 10px;
      display: flex;
      align-items: center;
      box-sizing: border-box;
  }
  
  .categoria p {
      margin-top: 15px;
      font-weight: bold;
      font-size: 16px;
      color: #333; /* Color del texto más oscuro */
  }
  
  .categoria-imagen {
      width: 40px;
      height: 40px;
      margin-right: 15px;
      border-radius: 50%;
  }
  
  .categoria:hover {
      transform: scale(1.08); /* Mayor escala al pasar el mouse */
      margin-bottom: 15px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.2); /* Mayor sombreado al pasar el mouse */
  }
  
  @media (max-width: 768px) {
      .categoria {
          width: calc(50% - 20px);
      }
  }
  
  @media (max-width: 576px) {
      .categoria {
          width: calc(100% - 20px);
      }
  }

  @media (max-width: 576px) {
  .text-center {
    margin-top: 10px; /* Reduce el margen en dispositivos más pequeños */
  }
}
    /*FIN DE TARJETAS*/

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
      width: 97%; /* Ancho del modal en dispositivos móviles */
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
      font-size: 14px; /* Reducir el tamaño de fuente en dispositivos móviles */
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
                <li><a class="dropdown-item" href="{{ route('subCtegoriasEjem') }}?cat=2&subCat=1">Camisas</a></li>
                <li><a class="dropdown-item" href="{{ route('subCtegoriasView') }}?cat=2&subCat=2">Camisetas</a></li>
                <li><a class="dropdown-item" href="{{ route('subCtegoriasView') }}?cat=2&subCat=3">Pantalones</a></li>
              </ul>
            </li>
    
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Mujer
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
                <li><a class="dropdown-item" href="{{ route('subCtegoriasView') }}?cat=1&subCat=1">Camisas</a></li>
                <li><a class="dropdown-item" href="{{ route('subCtegoriasEjem') }}?cat=1&subCat=2">Camisetas</a></li>
                <li><a class="dropdown-item" href="{{ route('subCtegoriasView') }}?cat=1&subCat=3">Pantalones</a></li>
              </ul>
            </li>
    
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Niños
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown3">
                <li><a class="dropdown-item" href="{{ route('subCtegoriasView') }}?cat=3&subCat=1">Camisas</a></li>
                <li><a class="dropdown-item" href="{{ route('subCtegoriasView') }}?cat=3&subCat=2">Camisetas</a></li>
                <li><a class="dropdown-item" href="{{ route('subCtegoriasView') }}?cat=3&subCat=3">Pantalone</a></li>
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

    <!-- Slider de imágenes -->
    <div class="container mt-2">
      <div class="slider-wrapper">
        <div class="slider-container">
          <div class="slider-image"><img src="{{ asset('storage/imagenes/prueba.jpg') }}" alt="Imagen 1" class="img-fluid"></div>
          <div class="slider-image"><img src="{{ asset('storage/imagenes/carrusel2.jpg') }}" alt="Imagen 2" class="img-fluid"></div>
          <div class="slider-image"><img src="{{ asset('storage/imagenes/carrusel1.jpg') }}" alt="Imagen 3" class="img-fluid"></div>
        </div>
        <div class="slider-buttons">
          <button id="prev-button" class="btn btn-outline-primary"><i class="fas fa-chevron-left"></i></button>
          <button id="next-button" class="btn btn-outline-primary"><i class="fas fa-chevron-right"></i></button>
        </div>
      </div>
    </div>

    <div class="text-center mt-4">
      <h2>Lo mas buscado</h2>
    </div>

    <!-- Sección de Tarjetas de Productos -->
    <section class="container">
      <div class="row">
        <!-- Tarjeta 1 -->
        <div class="categorias">
          <div class="categoria">
              <img src="{{ asset("storage/imagenes/camisa.jpg") }}" class="categoria-imagen">
              <p>Camisas</p>
          </div>
          <div class="categoria">
              <img src="{{ asset("storage/imagenes/deportivo.jpg") }}" class="categoria-imagen">
              <p>Deportivo</p>
          </div>
          <div class="categoria">
              <img src="{{ asset("storage/imagenes/pantalon.jpg") }}" class="categoria-imagen">
              <p>Pantalones</p>
          </div>
          <div class="categoria">
              <img src="{{ asset("storage/imagenes/zapato.jpg") }}" class="categoria-imagen">
              <p>Zapatos</p>
          </div>
          <div class="categoria">
              <img src="{{ asset("storage/imagenes/calcetines.jpg") }}" class="categoria-imagen">
              <p>Calcetines</p>
          </div>
          <div class="categoria">
              <img src="{{ asset("storage/imagenes/3 (Centralización de Operaciones).png") }}" class="categoria-imagen">
              <p>Paisajes</p>
          </div>
      </div>
      </div>
    </section>

    <footer>
      <div class="footer-container">
          <div class="footer-column">
              <h3>Acerca de nosotros</h3>
              <p>Quienes somos.</p>
          </div>
          <div class="footer-column">
              <h3>Servicio al cliente</h3>
              <ul>
                  <li><a href="#">Contáctanos</a></li>
                  <li><a href="#">Politica de devolución</a></li>
                  <li><a href="#">Quines somos</a></li>
              </ul>
          </div>
          <div class="footer-column">
              <h3>Ayuda</h3>
              <ul>
                  <li><a href="#">Términos y condiciones</a></li>
                  <li><a href="#">Guía de tallas</a></li>
                  <li><a href="#">Cómo realizar el pedido</a></li>
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function () {
      const cartIcon = $('.fas.fa-shopping-cart'); // Cambiar el selector al nuevo icono
      const cartModal = $('#staticBackdrop');
      const closeButton = $('#close-button');
  
      // Agregar evento de clic para abrir el modal
      cartIcon.click(function () {
          $.ajax({
              url: '/api/auth/productosEnCarrito',
              type: 'GET',
              dataType: 'JSON',
              headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('access_token')
              },
              success: function (response) {
                  if (response.resultado === 'OK') {
                      const modalBody = $('#cart-items-list');
                      modalBody.empty();
                      let totalPrice = 0;
  
                      // Iterar sobre los datos y construir la tabla de productos
                      response.datos.forEach(function (producto) {
                          const id = producto.id;
                          const nombreProducto = producto.nombre_producto;
                          const precioTotal = parseFloat(producto.total).toFixed(2);
                          const imagen = `<img src="${producto.imagen}" alt="${nombreProducto}" width="50" height="50">`;
                          const talla = producto.nombre_talla;
                          const color = producto.nombre_color;
                          const row = `
                              <tr>
                                  <td>${nombreProducto}</td>
                                  <td>${imagen}</td>
                                  <td>${talla}</td>
                                  <td>${color}</td>
                                  <td>$${precioTotal}</td>
                                  <td><button id="eliminarCarrito" class="btn btn-outline-danger" onclick="eliminarDelCarrito(${id})"><i class="fa fa-trash"></i></button></td>
                              </tr>`;
                          modalBody.append(row);
                          totalPrice += parseFloat(producto.total);
                      });
  
                      // Actualizar el total de la sumatoria
                      $('#total-amount').text(totalPrice.toFixed(2));
  
                      cartModal.modal("show"); // Cambiado a método modal de Bootstrap
                  }
              },
              error: function (error) {
                  if (error.status === 401) {
                    const swalWithBootstrapButtons = Swal.mixin({
                      customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                      },
                      buttonsStyling: false
                    })
  
                    swalWithBootstrapButtons.fire({
                      title: 'Notificaciòn',
                      text: "Necesitamos que inicies sesiòn para que goces de todas nuestras opciones",
                      icon: 'info',
                      showCancelButton: true,
                      confirmButtonColor: '#212529',
                      cancelButtonColor: '#2980b9',
                      confirmButtonText: 'Iniciar sesion',
                      cancelButtonText: 'Registrarme',
                      reverseButtons: true
                    }).then((result) => {
                      if (result.isConfirmed) {
                        window.location.href = `/iniciar-sesion`;
                      } else if (
                        result.dismiss === Swal.DismissReason.cancel
                      ) {
                        window.location.href = `/registrarse`;
                      }
                    })
                  } else {
                    if (error.status === 404) {
                      Swal.fire(
                        'Notificacion',
                        'Aun no tienes productos en el carrito',
                        'warning'
                      );
                    }
                  }
              }
          });
      });
  
      closeButton.click(function () {
        cartModal.modal("hide"); // Cambiado a método modal de Bootstrap
      });

      numeroProductosEnCarrito();
  });
  
  function numeroProductosEnCarrito() {
    $.ajax({
      url: 'api/auth/contarProductosEnCarrito',
      type: 'GET',
      dataType: 'JSON',
      headers: {
        'Authorization': 'Bearer ' + localStorage.getItem('access_token')
      },
      success: function(response) {
      if (response.resultado === 'OK') {
        $(".cart-count").text(response.datos);
        $("#cerrarSesion").show();
        $("#iniciarSesion").hide();
        $("#registrarse").hide();
      }
      },
      error: function(error){
        console.log(error);
      }
    })
}

function obtenerInformacionUsuario() {
  $.ajax({
      url: '/api/auth/me', // Endpoint para obtener la información del usuario autenticado
      type: 'POST',
      headers: {
        'Authorization': 'Bearer ' + localStorage.getItem('access_token')
      },
      success: function (response) {
          // Adjunta el evento click al botón "Cerrar Sesión" después de crearlo
          $("#cerrarSesion").on("click", function () {
              $.ajax({
                  url: '/api/auth/logout',
                  type: 'POST',
                  headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('access_token')
                  },
                  success: function(response){
                    Swal.fire(
                      'Notificacion',
                      'Session cerrada, vuelve pronto',
                      'success'
                    ).then(() => {
                      window.location.href = `/iniciar-sesion`;
                    })
                  },
                  error: function(error){
                      Swal.fire(
                        '¡Oopss...!',
                        'Hay un error en tu cierre de sesión, por favor intenta mas tarde.',
                        'error'
                      )
                  }
              });
          });
      },
      error: function (error) {
        console.log(error);
      }
  });
}

obtenerInformacionUsuario();

$("#search-button").on("click", function(event) {
  event.preventDefault();

  var nombre = $("#nombre_producto").val();

  var producto = {
    nombre_producto: nombre
  }

  $.ajax({
      url: '/buscarProducto',
      type: 'POST',
      dataType: 'JSON',
      data: producto,
      success: function(response) {
          if (response.resultado === 'OK') {
            window.location.href = `/producto?id=`+response.datos;
          }
      },
      error: function(error){
        if (error.status === 404) {
          Swal.fire(
            'Notificacion',
            'Lo sentimos no tenemos el producto que buscas por el momento',
            'warning'
          )
        } else {
          if (error.status === 422) {
            Swal.fire(
              'Notificacion',
              'Ingresa el nombre del producto en la barra de busqueda por favor',
              'warning'
            )
          }
      }
    }
  });
});

function menuRol() {
  $.ajax({
      url: 'api/auth/administrar', // La URL de tu endpoint
      type: 'GET',
      dataType: 'json',
      headers: {
          'Authorization': 'Bearer ' + localStorage.getItem('access_token')
      },
      success: function(data) {
          if (data.resultado === 'OK') {
              var userRole = data.datos;

              // Construye el elemento "Administrar" en función del rol del usuario
              var adminMenuItem = ''; // Inicializa la variable
              var rutaUsuarios = '{{ route('vistaUsuarios') }}';
              var rutaProductos = '{{ route('vistaProductos') }}';

              if (userRole === 1) {
                  adminMenuItem += '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-bs-toggle="dropdown" aria-expanded="false">Administrar</a>';
                  adminMenuItem += '<ul class="dropdown-menu" aria-labelledby="navbarDropdown4">';
                  adminMenuItem += '<li><a class="dropdown-item" href="'+rutaUsuarios+'">Usuarios</a></li>';
                  adminMenuItem += '<li><a class="dropdown-item" href="'+rutaProductos+'">Productos</a></li>';
                  adminMenuItem += '<li><a class="dropdown-item" href="#">Ofertas</a></li>';
                  adminMenuItem += '</ul>';
              } else if (userRole === 2) {
                  adminMenuItem += '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">Administrar</a>';
                  adminMenuItem += '<ul class="dropdown-menu" aria-labelledby="navbarDropdown4">';
                  adminMenuItem += '<li><a class="dropdown-item" href=" '+rutaProductos+'">Productos</a></li>';
                  adminMenuItem += '</ul>';
              }

              // Encuentra el elemento <li> por su ID y clase, y actualiza su contenido
              $('#menuRol').html(adminMenuItem);
          } else {
              console.error('Error al obtener el menú');
          }
      },
      error: function(xhr, status, error) {
          console.error('Error en la solicitud AJAX:', error);
      }
  });
}

menuRol();

function eliminarDelCarrito(id) {
  Swal.fire({
      title: 'Advertencia',
      text: "¿Estas seguro de eliminar este producto de tu carrito de compras?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, eliminar',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url:'api/auth/eliminarProductoCarrito/'+id,
          type: 'POST',
          dataType: 'JSON',
          success: function (response){
              if (response.resultado === 'OK') {
                  Swal.fire(
                      'Notificacion',
                      'Producto eliminado de tu carrito con exito',
                      'success'
                  ).then(() => {
                      window.location.href = `/`;
                  });
              }
          },
          error: function(error){
              if (error.status === 500) {
                  Swal.fire(
                      'Notificacion',
                      'Ocurrio un error por favor contactese con nosotros',
                      'error'
                  )
              }
          }
      });
    }
  })
}
  </script>
  <script src="{{ asset('js/welcome.js') }}"></script>  
</body>
</html>