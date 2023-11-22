<!DOCTYPE html>
<html lang="es" class="full-height">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Detalles del producto</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
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

.product-container {
    display: flex;
    max-width: 1200px;
    margin: 20px auto;
    background-color: #ffffff;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    border-radius: 15px;
    overflow: hidden;
}

.product-thumbnails {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px;
}

.product-thumbnails img {
    width: 80px;
    height: auto;
    margin-bottom: 10px;
    border: 2px solid transparent;
    cursor: pointer;
    transition: border-color 0.3s ease;
}

.product-thumbnails {
    padding: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.product-image {
    display: flex;
    justify-content: center;
    align-items: center;
    flex: 1;
}

.product-image img {
    max-width: 100%;
    height: auto;
    border: none;
}

.product-details {
    flex: 1;
    padding: 20px;
    box-sizing: border-box;
}

.product-title {
    font-size: 32px;
    margin-bottom: 15px;
    color: #333;
}

.action-button {
    padding: 15px 30px;
    background-color: #ff6600;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
    width: 48%;
    font-size: 20px;
    margin-right: 10px;
}

.action-button:hover {
    background-color: #ff4500;
    transform: scale(1.05);
}

.action-button:active {
    transform: scale(0.95);
}

        .product-price {
            font-size: 24px;
            margin-bottom: 20px;
            color: #009688;
        }

.product-info {
    font-size: 18px;
    margin-bottom: 10px;
}

        .color-options {
            margin-bottom: 20px;
        }

        .color-option {
            display: inline-block;
            margin-right: 10px;
            width: 20px;
            height: 20px;
            border: 2px solid #ccc;
            border-radius: 50%;
            cursor: pointer;
            transition: border-color 0.3s ease;
        }

        .color-option:hover {
            border-color: #ff4500;
        }

        .product-sizes {
            margin-bottom: 20px;
        }

        .product-size {
            font-size: 15px;
            margin-right: 15px;
            padding: 8px 15px;
            border: 2px solid #777;
            border-radius: 5px;
            color: #ff6600;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .product-size:hover {
            background-color: #ff6600;
            color: #fff;
        }


        .selected {
            background-color: #ff6600; /* Cambia el color de fondo cuando se selecciona */
            color: #FFF; /* Cambia el color del texto cuando se selecciona */
        }

        .deselected {
            background-color: #ffffff; /* Color de fondo predeterminado */
            color: #ff6600; /* Color de texto predeterminado */
        }
        .product-availability {
            font-size: 20px;
            margin-bottom: 20px;
            color: #ff4500;
        }

        .product-description {
            margin-top: 20px;
            font-size: 18px;
            line-height: 1.6;
        }
        .quantity-container {
            display: flex;
            align-items: center;
            margin-top: 20px;
        }

        .quantity-label {
            font-size: 20px;
            margin-right: 15px;
        }

        .quantity-input {
            font-size: 20px;
            padding: 8px 15px;
            border: 2px solid #94c0bc;
            border-radius: 5px;
            color: #ff4500;
            width: 70px;
            text-align: center;
        }

        .quantity-button {
            padding: 8px 12px;
            background-color: #ff6600;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease, transform 0.2s ease, padding 0.2s ease; /* Agregar transición al padding */
            margin: 0 5px;
        }

        .quantity-button.small {
            padding: 5px 10px;
            font-size: 16px;
        }

        .quantity-button:hover {
            background-color: #ff4500;
            transform: scale(1.05);
            padding: 8px 12px;
        }

        .product-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .accordion {
            margin-top: 20px;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            width: 100%;
        }

.accordion-button {
  background-color: #f5f5f5;
  color: #333;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  font-size: 18px;
  width: 100%;
  text-align: left;
  padding: 15px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  transition: background-color 0.3s ease, color 0.3s ease;
}

.accordion-button.btn {
  /* Estilos de fondo y color de texto */
  background-color: #f5f5f5;
  color: #333;
  /* Otros estilos necesarios */
}

.accordion-content {
    display: none;
    padding: 15px;
    color: #333;
    font-size: 16px;
    background-color: #fff;
    border: 1px solid #e0e0e0;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    position: relative;
    z-index: 1;
    transition: opacity 0.3s ease, max-height 0.3s ease;
    max-height: 0;
    overflow: hidden;
}

.accordion.active .accordion-content {
    display: block;
    max-height: 500px; /* Ajusta esto según el contenido real */
    opacity: 1;
}

.accordion.active .accordion-button {
    background-color: #ff6600;
    color: white;
}

.accordion-button::after {
    content: '+';
    font-size: 20px;
    font-weight: bold;
    transform: translateY(3px);
    transition: transform 0.3s ease;
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
}

.accordion-button::after {
    content: '\25B6'; /* Icono de flecha derecha */
    font-size: 20px;
    font-weight: bold;
    transform: translateY(3px);
    transition: transform 0.3s ease;
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
}

.accordion.active .accordion-button::after {
    content: '\25BC'; /* Icono de flecha abajo */
    transform: translateY(-2px);
}

        .accordion-button:hover {
            background-color: #ff4500;
            color: white;
        }

.accordion-button, .accordion-content {
    transition: all 0.3s ease;
}
.accordion:first-child .accordion-button {
    margin-top: 0;
}
/* Estilos para el acordeón "Detalles" */
#acordeon_producto {
    padding: 15px;
    margin: 10px 0;
    color: #333;
    font-size: 16px;
    background-color: #fff;
    border: 1px solid #e0e0e0;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: max-height 0.3s ease;
    max-height: 0;
}

.accordion.active #acordeon_producto {
    max-height: 1000px; /* Ajusta esto según el contenido real */
}

/* Estilos para los párrafos dentro del acordeón "Detalles" */
#acordeon_producto p {
    margin: 10px 0; /* Agregar espacio entre párrafos */
    padding: 0;
    line-height: 1.6;
}

#tablaMedidas {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 0 8px rgba(0, 0, 0, 0.2);
}

#tablaMedidas th, #tablaMedidas td {
    padding: 8px 15px;
    text-align: center;
}

#tablaMedidas th {
    background-color: #ff6600;
    color: white;
}

#tablaMedidas td {
    background-color: #f4f4f4;
}

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

/* Agregar un estilo para dispositivos móviles */
@media (max-width: 768px) {
    header h1 {
        font-size: 24px;
    }

    nav ul {
        flex-direction: column;
        align-items: center;
    }

    nav li {
        margin: 10px 0;
    }

    .search-box {
        margin: 10px 0;
    }

    .product-container {
        flex-direction: column;
        align-items: center;
    }

    .product-thumbnails {
        flex-direction: row;
    }

    .product-thumbnails img {
        width: 60px;
        height: auto;
        margin-right: 10px;
    }

    .product-image img {
        max-width: 80%;
        height: auto;
    }

    .product-details {
        padding: 10px;
    }

    .product-title {
        font-size: 24px;
        margin-bottom: 10px;
    }

    .product-price {
        font-size: 20px;
    }

    .color-options {
        margin-bottom: 10px;
    }

    .color-option {
        width: 30px;
        height: 30px;
    }

    .product-sizes {
        margin-bottom: 10px;
    }

    .product-size {
        font-size: 16px;
        padding: 5px 10px;
    }

    .product-availability {
        font-size: 16px;
    }

    .quantity-container {
        margin-top: 10px;
    }

    .quantity-label {
        font-size: 16px;
    }

    .quantity-input {
        font-size: 16px;
        padding: 5px 10px;
    }

    .quantity-button {
        font-size: 14px;
    }

    .accordion-button {
        font-size: 16px;
    }

    .accordion-content {
        font-size: 14px;
    }

    .footer-column {
        margin: 0 10px 20px 10px;
    }
}

/* Estilo adicional para dispositivos muy pequeños (puede personalizarse) */
@media (max-width: 480px) {
    header {
        padding: 10px 0;
    }

    .footer-column {
        flex: 1 1 100%; /* Cambiar el ancho de las columnas en el pie de página */
    }
}

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

  /* [INICIO]arreglo de botones */

  /* [FIN]arreglo de botones */
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
    <div class="product-container">
        <div id="imagenesProductos" class="product-thumbnails">

        </div>
<div id="imagenProducto" class="product-image">

</div>
        <div class="product-details">
            <h1 id="nombre_product" class="product-title"></h1>
            <p class="product-info" id="sku"></p>
            <div class="product-description">
                <p id="descripcion"></p>
            </div>
            <p id="precio" class="product-price"></p>
            <!-- <p class="product-info" id="existencia"></p> -->
            <div id="coloresDisponibles" class="color-options">
                <h4>Colores disponibles</h4>
            </div>
            <div id="tallas_disponibles" class="product-sizes">
                <h4>Tallas disponibles</h4>
            </div>
            <p class="product-availability"></p>
            <div class="input-group quantity-container">
              <button class="btn btn-outline-secondary" id="decrease-btn">-</button>
              <input type="number" class="quantity-input" id="quantity" min="1" value="1">
              <button class="btn btn-outline-secondary" id="increase-btn">+</button>
            </div>
            <div class="product-actions">
                <button class="action-button" id="btnAgregarCarrito">Agregar al Carrito</button>
                <button class="action-button" id="btnComprarAhora">Comprar ahora</button>
            </div>
            <div class="accordion">
                <button class="accordion-button btn btn-light" data-index="0">Detalles</button>
                <div id="acordeon_producto" class="accordion-content">

                </div>
            </div>
            <div class="accordion">
                <button class="accordion-button btn btn-light" data-index="1">Tallas y Dimensiones</button>
                <div id="acordeon_dimensiones" class="accordion-content">
                    <table id="tablaMedidas" border="1">
                        <thead>
                            <tr>
                                <th>Medidas</th>
                                <!-- Aquí se llenarán las tallas dinámicamente -->
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Pecho</td>
                                <!-- Aquí se llenarán las medidas de pecho dinámicamente -->
                            </tr>
                            <tr>
                                <td>Largo</td>
                                <!-- Aquí se llenarán las medidas de largo dinámicamente -->
                            </tr>
                            <tr>
                                <td>Hombro</td>
                                <!-- Aquí se llenarán las medidas de hombro dinámicamente -->
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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
    <script src="js/producto.js"></script>
</body>
</html>
