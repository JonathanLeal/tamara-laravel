<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Tienda Tamara</title>
    <style>
        body {
    font-family: 'Roboto', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
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
    background-color: #1693D2;
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

.portada {
    background-image: url('imagen-de-portada.jpg');
    background-size: contain; /* Utiliza "contain" para ajustar la imagen dentro del contenedor */
    background-repeat: no-repeat;
    background-position: center center; /* Centra la imagen horizontal y verticalmente */
    height: 300px; /* Ajusta la altura según tus preferencias */
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin: 20px 0; /* Agrega margen superior e inferior */
}

.portada h2 {
    font-size: 36px; /* Reduce el tamaño del título */
    color: #fff;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    margin-bottom: 20px;
}

.portada a {
    background-color: #ff6600;
    color: #fff;
    text-decoration: none;
    font-weight: bold;
    padding: 10px 20px;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.portada a:hover {
    background-color: #ff4500;
}

.categorias {
    display: flex;
    flex-wrap: wrap;
    margin: 20px auto;
    justify-content: space-between;
    width: 1500px;
}

.categoria {
    border: 1px solid #ccc;
    padding: 4px;
    text-align: center;
    width: calc(16% - 20px); /* Ancho de cada categoría con margen */
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
    transition: transform 0.2s, margin 0.2s; /* Agregar transición a transform y margen */
    margin-bottom: 50px;
    margin-inline: 10px; /* Reducir el margen horizontal entre categorías */
    display: flex;
    align-items: center;
}

.categoria p {
    margin-top: 25px;
    font-weight: bold;
    font-size: 16px;
}

.categoria:hover {
    transform: scale(1.05); /* Hacer zoom al pasar el mouse sobre la categoría */
    margin-bottom: 45px; /* Reducir el margen inferior al pasar el mouse */
}

/* Ajusta el tamaño de la imagen */
.categoria-imagen {
    width: 40px;
    height: 40px;
    margin-right: 15px;
    border-radius: 50%;
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
    background-color: #9F3A25;
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

.slider-container {
    position: relative;
    max-width: 800px;
    margin: 0 auto;
    overflow: hidden;
    text-align: center;
}

.slider-wrapper {
    display: flex;
    transition: transform 0.5s ease;
    width: 100%;
    margin: 0;
}

.slider-image {
    margin-top: 6px;
    flex: 0 0 100%;
    width: 100%;
    height: auto;
    padding: 0;
}

#prev-button,
#next-button {
    position: absolute;
    top: 50%;
    background-color: #333;
    color: #fff;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
}

#prev-button {
    left: 1px;
}

#next-button {
    right: 1px;
}

#image-indicator {
    text-align: center;
    margin-top: 10px;
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

    /* Ajusta otros estilos según sea necesario para dispositivos móviles */
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
    <nav id="menu-container">
        <ul>
            <li><a href="{{ route('inicio') }}">Inicio</a></li>
            <li class="dropdown-parent">
                <a href="#">Hombres <i class="fas fa-chevron-down"></i></a>
                <ul class="dropdown">
                    <li class="dropdown-submenu">
                        <a href="#">Camisa <i class="fas fa-chevron-right"></i></a>
                        <ul class="sub-dropdown">
                            <li><a id="hombres-camisaPolo" href="{{ route('subCtegoriasView') }}?cat=2&subCat=1">Camisa Polo</a></li>
                            <li><a id="hombres-camisaCasual" href="{{ route('subCtegoriasView') }}?cat=2&subCat=2">Camisa Casual</a></li>
                            <li><a id="hombres-camiseta" href="{{ route('subCtegoriasView') }}?cat=2&subCat=3">Camiseta</a></li>
                        </ul>
                    </li>
                    <li class="dropdown-submenu">
                        <a href="#">Pantalones <i class="fas fa-chevron-right"></i></a>
                        <ul class="sub-dropdown">
                            <li><a id="hombres-pantalonDeportivo" href="{{ route('subCtegoriasView') }}?cat=2&subCat=4">Pantalón Deportivo</a></li>
                            <li><a id="hombres-pantalonFormal" href="{{ route('subCtegoriasView') }}?cat=2&subCat=5">Pantalón Formal</a></li>
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
                            <li><a id="mujeres-camisaPolo" href="{{ route('subCtegoriasView') }}?cat=1&subCat=1">Camisa Polo</a></li>
                            <li><a id="mujeres-camisaCasual" href="{{ route('subCtegoriasView') }}?cat=1&subCat=2">Camisa Casual</a></li>
                            <li><a id="mujeres-camiseta" href="{{ route('subCtegoriasView') }}?cat=1&subCat=3">Camiseta</a></li>
                        </ul>
                    </li>
                    <li class="dropdown-submenu">
                        <a href="#">Pantalones <i class="fas fa-chevron-right"></i></a>
                        <ul class="sub-dropdown">
                            <li><a id="mujeres-pantalonDeportivo" href="{{ route('subCtegoriasView') }}?cat=1&subCat=4">Pantalón Deportivo</a></li>
                            <li><a id="mujeres-pantalonFormal" href="{{ route('subCtegoriasView') }}?cat=1&subCat=5">Pantalón Formal</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="dropdown-parent">
                <a href="#">Niños <i class="fas fa-chevron-down"></i></a>
                <ul class="dropdown">
                    <li class="dropdown-submenu">
                        <a id="clicl" href="#">Camisa <i class="fas fa-chevron-right"></i></a>
                        <ul class="sub-dropdown">
                            <li><a id="niños-camisaPolo" href="{{ route('subCtegoriasView') }}?cat=3&subCat=1">Camisa Polo</a></li>
                            <li><a id="niños-camisaCasual" href="{{ route('subCtegoriasView') }}?cat=3&subCat=3">Camisa Casual</a></li>
                            <li><a id="niños-camiseta" href="{{ route('subCtegoriasView') }}?cat=3&subCat=3">Camiseta</a></li>
                        </ul>
                    </li>
                    <li class="dropdown-submenu">
                        <a href="#">Pantalones <i class="fas fa-chevron-right"></i></a>
                        <ul class="sub-dropdown">
                            <li><a id="niños-pantalonDeportivo" href="{{ route('subCtegoriasView') }}?cat=3&subCat=4">Pantalón Deportivo</a></li>
                            <li><a id="niños-pantalonFormal" href="{{ route('subCtegoriasView') }}?cat=3&subCat=5">Pantalón Formal</a></li>
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
    <div class="slider-container">
        <div class="slider-wrapper">
            <img src="{{ asset('storage/imagenes/prueba.jpg') }}" alt="Centralización de Operaciones" class="slider-image">
            <img src="{{ asset('storage/imagenes/carrusel1.jpg') }}" alt="Centralización de Operaciones" class="slider-image">
            <img src="{{ asset('storage/imagenes/carrusel2.jpg') }}" alt="Centralización de Operaciones" class="slider-image">
        </div>
        <button id="prev-button"><i class="fa-solid fa-arrow-left"></i></button>
        <button id="next-button"><i class="fa-solid fa-arrow-right"></i></button>
    </div>
    <div>
        <h3 style="text-align: center;">Lo más buscado</h3>
    </div>
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
                            <th>Accion</th>
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

    <script>
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
                            adminMenuItem += '<a href="#">Administrar <i class="fas fa-chevron-down"></i></a>';
                            adminMenuItem += '<ul class="dropdown">';
                            adminMenuItem += '<li><a href="'+rutaUsuarios+'">Usuarios</a></li>';
                            adminMenuItem += '<li><a href="'+rutaProductos+'">Productos</a></li>';
                            adminMenuItem += '<li><a href="#">Ofertas</a></li>';
                            adminMenuItem += '</ul>';
                        } else if (userRole === 2) {
                            adminMenuItem += '<a href="#">Administrar <i class="fas fa-chevron-down"></i></a>';
                            adminMenuItem += '<ul class="dropdown">';
                            adminMenuItem += '<li><a href="#">Productos</a></li>';
                            adminMenuItem += '</ul>';
                        }

                        // Encuentra el elemento <li> por su ID y clase, y actualiza su contenido
                        $('#menuRol.dropdown-parent').html(adminMenuItem);
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
                    $("#cart-icon .cart-count").text(response.datos);
                }
            },
            error: function(error){
                console.log(error);
            }
        })
    }

    numeroProductosEnCarrito();

    const cartIcon = $('#cart-icon');
const cartModal = $('#cart-modal');
const closeCartModal = $('#close-cart-modal');
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
        success: function(response){
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
                            <td><button id="eliminarCarrito" onclick="eliminarDelCarrito(${id})"><i class="fa fa-trash"></i></button></td>
                        </tr>`;
                    modalBody.append(row);
                    totalPrice += parseFloat(producto.total);
                });

                // Actualizar el total de la sumatoria
                $('#total-amount').text(totalPrice.toFixed(2));

                cartModal.addClass("show-modal");
            }
        },
        error: function(error){
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
                    )
                }
            }
        }
    });
});

$("#search-button").on("click", function() {
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
                    'info'
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

// Agregar evento de clic para cerrar el modal (botón "Cerrar")
closeButton.click(function () {
    cartModal.removeClass("show-modal");
});

// Agregar evento de clic para cerrar el modal (botón "X")
closeCartModal.click(function () {
    cartModal.removeClass("show-modal");
});

        function obtenerInformacionUsuario() {
            $.ajax({
                url: '/api/auth/me', // Endpoint para obtener la información del usuario autenticado
                type: 'POST',
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('access_token')
                },
                success: function (response) {
                    // Actualiza el encabezado con el nombre del usuario y los enlaces
                    $("#user-nombre").text(response.datos.name);
                    $(".dropdown-user").html('<li><a href="#">Mi Perfil</a></li><li><a href="#" id="btnCerrarSesion">Cerrar Sesión</a></li>');

                    // Adjunta el evento click al botón "Cerrar Sesión" después de crearlo
                    $("#btnCerrarSesion").on("click", function () {
                        $.ajax({
                            url: '/api/auth/logout',
                            type: 'POST',
                            headers: {
                                'Authorization': 'Bearer ' + localStorage.getItem('access_token')
                            },
                            success: function(response){
                                Swal.fire({
                                    title: '¿Estas seguro que deseas cerrar sesión?',
                                    text: "Nos encanta tenerte con nosotros",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Si, cerrar',
                                    cancelButtonText: 'No, no cerrar'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        Swal.fire(
                                            '¡Sesión cerrada!',
                                            'Gracias por preferirnos, ¡vuelve pronto!.',
                                            'success'
                                        ).then(() => {
                                            window.location.href = '/iniciar-sesion';
                                        })
                                    }
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
    </script>
    <script src="{{ asset('js/welcome.js') }}"></script>
</body>
</html>
