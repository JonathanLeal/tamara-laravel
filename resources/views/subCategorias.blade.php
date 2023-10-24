<!DOCTYPE html>
<html lang="en" class="full-height">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Camisas</title>
    <style>
        html.full-height {
    height: 100%;
}
body {
    display: flex;
    flex-direction: column;
    min-height: 100%;
    margin: 0;
}
        header {
    background-color: #333;
    color: #fff;
    padding: 20px 0;
    display: flex;
    justify-content: space-between; /* Alineación horizontal */
    align-items: center; /* Alineación vertical */
}

header h1 {
    margin: 0;
    padding: 0;
    font-size: 36px;
    text-align: center;
    flex: 1; /* Hace que el h1 ocupe todo el espacio disponible horizontalmente */
}

nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #444;
    text-align: left;
    padding: 1px 0;
}

@media (max-width: 768px) {
    nav {
        flex-direction: column;
        text-align: center;
    }

    nav ul {
        flex-direction: column;
    }

    nav li {
        margin: 10px 0;
    }

    .search-box {
        margin-right: 0;
    }

    /* Estilos para el icono del carrito en pantallas más pequeñas */
    .cart {
        margin-right: 0;
    }
}

.cart {
    display: flex;
    align-items: center;
    position: relative;
    cursor: pointer;
    margin-right: 30px; /* Espacio entre el carrito y la barra de búsqueda */
}

.cart i {
    font-size: 24px;
    margin-right: 10px;
    color: #ff4500; /* Color personalizado para el icono */
}

.cart-count {
    background-color: #777;
    color: #fff;
    font-size: 14px;
    border-radius: 50%;
    padding: 6px 10px;
    position: absolute;
    top: -10px;
    right: -10px;
}

.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    z-index: 1;
    justify-content: center;
    align-items: center;
}

.modal-content {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    text-align: center;
    position: relative;
}

.close-modal {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 20px;
    cursor: pointer;
}

/* Estilo del carrito de compras */
#cart-icon {
    cursor: pointer;
}

/* Agrega animación para mostrar el modal */
.modal.show-modal {
    display: flex;
}

/* Estilo del pie de página del modal */
.modal-footer {
    margin-top: 20px;
}

/* Estilo para los botones del modal */
button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin: 0 10px;
}

button:hover {
    background-color: #0056b3;
}

.search-box {
    display: flex;
    align-items: center;
}

#search-bar {
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-right: 10px;
}

#search-button {
    background-color: #7a2818;
    color: #fff;
    text-decoration: none;
    font-weight: bold;
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

#search-button:hover {
    background-color: #ff4500;
}

nav ul {
    list-style-type: none;
    padding: 0;
    display: flex;
    justify-content: center; /* Centra los elementos horizontalmente */
}

nav li {
    margin: 0 15px;
}

nav a {
    text-decoration: none;
    color: #fff;
    font-weight: bold;
    font-size: 18px;
    transition: color 0.3s; /* Agrega una transición al color del texto */
}

nav a:hover {
    color: #ff6600; /* Cambia el color al pasar el mouse sobre los enlaces */
}

.search-box {
    display: flex;
    align-items: center;
    margin-right: 20px;
}

#search-bar {
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-right: 10px;
}

#search-button {
    background-color: #ff6600;
    color: #fff;
    text-decoration: none;
    font-weight: bold;
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.3s; /* Agregar transición a transform */
}

#search-button:hover {
    background-color: #ff4500;
    transform: scale(1.05); /* Hacer zoom al pasar el mouse sobre el botón de búsqueda */
}

/* Estilo para el menú desplegable */
.dropdown-parent {
    position: relative;
    cursor: pointer;
}

.dropdown-parent:hover .dropdown {
    display: block;
}

.dropdown {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background-color: #fff; /* Cambia el color de fondo */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2); /* Agrega sombra */
    z-index: 1;
    text-align: left;
    border-radius: 5px;
    min-width: 200px;
    padding: 10px;
    border: 1px solid #ccc; /* Agrega un borde */
    transition: opacity 0.3s, visibility 0.3s, transform 0.3s;
}

.dropdown li {
    margin: 10px 0; /* Agrega espacio entre elementos del menú */
    list-style: none;
}

.dropdown a {
    text-decoration: none;
    color: #333;
    display: block;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    padding: 10px 0;
    transition: color 0.3s;
}

.dropdown a:hover {
    color: #ff6600; /* Cambia el color al pasar el mouse sobre los enlaces */
}

/* Estilo para el menú desplegable cuando está abierto */
.dropdown.active {
    display: block;
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
    background-color: #f9f9f9;
}

.dropdown-parent i {
    margin-left: 10px;
}


/* Flecha hacia abajo en el enlace del menú */
.dropdown-parent a i {
    margin-left: 5px;
    transition: transform 0.3s;
}

.dropdown-parent:hover i {
    color: #ff6600; /* Cambia el color del ícono al pasar el mouse sobre el dropdown principal */
}

.dropdown-parent i {
    margin-left: 10px;
    color: #fff; /* Cambia el color del ícono */
}

.dropdown-parent:hover a i {
    transform: rotate(180deg); /* Rota la flecha hacia abajo al abrir el menú */
}

.dropdown:not(.active) {
    display: none;
}

.sub-dropdown {
    background-color: #f9f9f9;
    border-radius: 5px;
    padding: 8px;
}

.sub-dropdown li {
    margin: 0;
}

.sub-dropdown a {
    color: #333;
    font-size: 14px;
    transition: color 0.3s;
}

.sub-dropdown a:hover {
    color: #ff6600;
}

.dropdown.active .sub-dropdown {
    display: none;
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.3s, visibility 0.3s;
}

.dropdown.active:hover .sub-dropdown {
    display: block;
    opacity: 1;
    visibility: visible;
}

/* Estilo del botón de usuario */
#user-button {
    background-color: #777;
    color: #fff;
    font-weight: bold;
    cursor: pointer;
    padding: 8px 16px;
    border-radius: 5px;
    border: none;
    transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
    margin-right: 40px
}

#user-button:hover {
    background-color: #ff4500;
    transform: translateY(-2px);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
}

/* Estilo del menú desplegable */
.dropdown-user {
    margin-top: 2px;
    position: absolute;
    background-color: #fff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    z-index: 1;
    text-align: left;
    padding: 10px;
    border-radius: 5px;
    width: auto;
    opacity: 0;
    visibility: hidden;
    transform: translateY(-10px);
    transition: opacity 0.3s, transform 0.3s, visibility 0.3s; /* Agregamos visibility */
    right: 17px;
}

.user-dropdown button {
    background-color: #9F3A25;
    color: #fff;
    font-weight: bold;
    cursor: pointer;
    padding: 8px 16px;
    border-radius: 5px;
    border: none;
    transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
    margin-right: 40px;
}

.user-dropdown button:hover {
    background-color: #ff4500;
    transform: translateY(-2px);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
}

#user-button:hover + .dropdown-user,
.dropdown-user:hover {
    opacity: 1;
    visibility: visible; /* Mostrar el menú cuando se pasa el ratón sobre él */
    transform: translateY(0);
}

/* Estilo de los elementos del menú desplegable */
.dropdown-user a {
    text-decoration: none;
    color: #333;
    display: block;
    padding: 10px;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    transition: background-color 0.3s, color 0.3s;
}

.dropdown-user a:hover {
    background-color: #ff6600;
    color: #fff;
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

@media (max-width: 768px) {
    header h1 {
        display: none;
    }

    .dropdown-parent-user {
        display: flex;
        align-items: center;
        margin-right: 10px;
    }
}

@media (max-width: 768px) {
    nav ul {
        flex-direction: column;
        text-align: center;
    }

    nav li {
        margin: 10px 0;
    }
}

@media (max-width: 768px) {
    .slider-image {
        max-width: 100%;
    }
}

@media (max-width: 768px) {
    .categorias {
        flex-direction: column;
        align-items: center;
    }

    .categoria {
        width: 100%;
        margin-bottom: 20px;
    }

    .categoria-imagen {
        width: 60px;
        height: 60px;
        margin-right: 10px;
    }
}

.container {
    max-width: 120px; /* Opcional: establece un ancho máximo para el contenido */
    margin: 0 auto; /* Centra el contenido en la página */
}

.row {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between; /* Distribuye los elementos de manera uniforme */
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
    margin: 20px;
}

.card:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
}

.card img {
    width: 160px;
    height: 160px; /* Ajustar la altura automáticamente */
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
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
    footer {
        text-align: center;
    }
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

#carritoModal .modal-content {
    background-color: #fff;
    margin: 10% auto;
    padding: 20px;
    border: none;
    border-radius: 10px;
    width: 80%;
    max-width: 400px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    text-align: center;
    position: relative;
}

/* Estilos para la imagen del producto */
#productImage {
    max-width: 50%;
    height: auto;
    border-radius: 10px;
    margin-bottom: 10px;
}

/* Estilos para el título del producto */
#productName {
    font-size: 1.5rem;
    color: #333;
    margin-bottom: 10px;
    text-transform: uppercase;
}

/* Estilos para el SKU y la existencia */
.product-details p {
    font-size: 1rem;
    color: #777;
    margin: 5px 0;
}

/* Estilos para los select y la cantidad */
.select-options {
    margin-bottom: 20px;
    text-align: left;
}

#selectColores,
#selectTallas {
    width: 100%;
    padding: 10px;
    border: 2px solid #ddd;
    border-radius: 10px;
    margin-bottom: 10px;
    font-size: 1rem;
    background-color: #f9f9f9;
}

.quantity {
    text-align: left;
}

#quantity {
    width: 60px;
    padding: 10px;
    border: 2px solid #ddd;
    border-radius: 10px;
    font-size: 1rem;
}

/* Estilos para el botón */
#btnAddToCart {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    font-size: 1.2rem;
    transition: background-color 0.3s ease;
}

#btnAddToCart:hover {
    background-color: #45a049;
}

/* Estilos para el modal */
/* Estilos para el modal */
.modalMuestra {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1000;
        align-items: center;
        justify-content: center;
    }

    .modal-content-car {
        background-color: white;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        width: 80%;
        max-width: 600px;
    }

    /* Estilos para la tabla */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    th, td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    /* Estilos para botones */
    .modal-footer {
        text-align: right;
        margin-top: 20px;
    }

    .btn {
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-left: 10px;
    }

    .btn:hover {
        background-color: #0056b3;
    }

    /* Estilos para cerrar el modal */
    .close-modal-car {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 20px;
        cursor: pointer;
    }

    /* Estilos para la imagen */
    img {
        max-width: 100%;
        height: auto;
    }

    /* Estilos para el total */
    #total-price {
        margin-top: 20px;
        font-weight: bold;
    }

    /* Estilos para botones en línea */
    .btn, .btn-inline {
        display: inline-block;
    }

    .btn-inline {
        float: right;
    }
/* Estilos para dispositivos móviles */
@media (max-width: 768px) {
    #carritoModal .modal-content {
        margin: 20px auto;
        padding: 10px;
        width: 90%;
        max-width: 300px;
    }
}

@media (max-width: 768px) {
    .product-row {
        flex-direction: column;
    }

    .card {
        width: 100%;
        margin: 10px 0;
    }
}

@media (max-width: 768px) {
    .footer-column {
        margin-right: 0;
    }
}

.mobile-menu-button {
    display: none; /* Ocultar el botón en pantallas grandes */
    cursor: pointer;
}

.mobile-menu-button .bar {
    width: 30px;
    height: 3px;
    background-color: #fff;
    margin: 4px 0;
    transition: 0.4s;
}

@media (max-width: 768px) {
    nav ul {
        display: none; /* Ocultar el menú principal en pantallas pequeñas */
    }

    .mobile-menu-button {
        display: block; /* Mostrar el botón de hamburguesa en pantallas pequeñas */
    }

    /* Estilizar el menú desplegable */
    .mobile-menu-button.active .bar:nth-child(1) {
        transform: rotate(-45deg) translate(-5px, 6px);
    }
    .mobile-menu-button.active .bar:nth-child(2) {
        opacity: 0;
    }
    .mobile-menu-button.active .bar:nth-child(3) {
        transform: rotate(45deg) translate(-5px, -6px);
    }
}
    </style>
</head>
<body>
    <header>
        <h1>TAMARA</h1>
        <div class="dropdown-parent-user">
            <button id="user-button"><i class="fas fa-user"></i></button>
            @auth
            <span id="user-nombre">{{ Auth::user()->name }}</span>
            @endauth
            <ul class="dropdown-user">
                @auth
                <li><a href="#">Mi Perfil</a></li>
                <li><a href="#">Cerrar Sesión</a></li>
                @else
                <li><a href="{{ route('registrarse') }}">Registrarse</a></li>
                <li><a href="{{ route('login') }}">Iniciar Sesión</a></li>
                @endauth
            </ul>
        </div>
    </header>
    <nav>
        <div class="mobile-menu-button">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
        <ul>
            <li><a href="{{ route('inicio') }}">Inicio</a></li>
            <li class="dropdown-parent">
                <a href="#">Hombres <i class="fas fa-chevron-down"></i></a>
                <ul class="dropdown">
                    <li class="dropdown-submenu">
                        <a href="#">Camisa <i class="fas fa-chevron-right"></i></a>
                        <ul class="sub-dropdown">
                            <li><a href="#" class="subcat-link" data-cat="2" data-subcat="1">Camisa Polo</a></li>
                            <li><a href="#" class="subcat-link" data-cat="2" data-subcat="2">Camisa Casual</a></li>
                            <li><a href="#" class="subcat-link" data-cat="2" data-subcat="3">Camiseta</a></li>
                        </ul>
                    </li>
                    <li class="dropdown-submenu">
                        <a href="#">Pantalones <i class="fas fa-chevron-right"></i></a>
                        <ul class="sub-dropdown">
                            <li><a href="#" class="subcat-link" data-cat="2" data-subcat="4">Pantalón Deportivo</a></li>
                            <li><a href="#" class="subcat-link" data-cat="2" data-subcat="5">Pantalón Formal</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="dropdown-parent">
                <a href="#">Mujeres <i class="fas fa-chevron-down"></i></a>
                <ul class="dropdown">
                    <li class="dropdown-submenu">
                        <a href="#">Camisa <i class="fas fa-chevron-right"></i></a>
                        <ul class="sub-dropdown">
                            <li><a href="#" class="subcat-link" data-cat="1" data-subcat="1">Camisa Polo</a></li>
                            <li><a href="#" class="subcat-link" data-cat="1" data-subcat="2">Camisa Casual</a></li>
                            <li><a href="#" class="subcat-link" data-cat="1" data-subcat="3">Camiseta</a></li>
                        </ul>
                    </li>
                    <li class="dropdown-submenu">
                        <a href="#">Pantalones <i class="fas fa-chevron-right"></i></a>
                        <ul class="sub-dropdown">
                            <li><a href="#" class="subcat-link" data-cat="1" data-subcat="4">Pantalón Deportivo</a></li>
                            <li><a href="#" class="subcat-link" data-cat="1" data-subcat="5">Pantalón Formal</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="dropdown-parent">
                <a href="#">Niños <i class="fas fa-chevron-down"></i></a>
                <ul class="dropdown">
                    <li class="dropdown-submenu">
                        <a href="#">Camisa <i class="fas fa-chevron-right"></i></a>
                        <ul class="sub-dropdown">
                            <li><a href="#" class="subcat-link" data-cat="3" data-subcat="1">Camisa Polo</a></li>
                            <li><a href="#" class="subcat-link" data-cat="3" data-subcat="2">Camisa Casual</a></li>
                            <li><a href="#" class="subcat-link" data-cat="3" data-subcat="3">Camiseta</a></li>
                        </ul>
                    </li>
                    <li class="dropdown-submenu">
                        <a href="#">Pantalones <i class="fas fa-chevron-right"></i></a>
                        <ul class="sub-dropdown">
                            <li><a href="#" class="subcat-link" data-cat="3" data-subcat="4">Pantalón Deportivo</a></li>
                            <li><a href="#" class="subcat-link" data-cat="3" data-subcat="5">Pantalón Formal</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="dropdown-parent" id="menuRol">

            </li>
        </ul>
        <div class="search-box">
            <div class="cart" id="cart-icon">
                <i class="fas fa-shopping-cart"></i>
                <span class="cart-count">0</span>
            </div>
            <input type="text" placeholder="Producto..." id="nombre_producto">
            <button type="submit" id="search-button"><i class="fas fa-search"></i></button>
        </div>
    </nav>

    <div class="product-container">
        <div class="product-row" id="productos"></div>
    </div>

    <div class="modal" id="cart-modal">
        <div class="modal-content">
            <span class="close-modal" id="close-cart-modal">&times;</span>
            <h2>Tu carrito de compras</h2>
            <div class="modal-body">
                <table>
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Imagen</th>
                            <th>Talla</th>
                            <th>Color</th>
                            <th>Precio</th>
                        </tr>
                    </thead>
                    <tbody id="cart-items-list">
                        <!-- Aquí se mostrarán los productos -->
                    </tbody>
                </table>
                <div id="total-price">
                    Total: $<span id="total-amount">0.00</span>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" id="buy-now-button">Comprar Ahora</button>
                <button class="btn btn-inline" id="close-button">Cerrar</button>
            </div>
        </div>
    </div>

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
    <script src="{{ asset('js/subCategorias.js') }}"></script>
</body>
</html>
