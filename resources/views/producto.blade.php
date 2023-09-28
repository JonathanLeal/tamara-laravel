<!DOCTYPE html>
<html lang="es" class="full-height">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Detalles del Producto - Camisa Polo</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        html.full-height {
    height: 100%;
}
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
    margin-left: auto;
}

#search-bar {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-right: 20px;
    font-size: 16px;
}

#search-button {
    background-color: #7a2818;
    color: #fff;
    text-decoration: none;
    font-weight: bold;
    padding: 10px 20px;
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
    justify-content: center;
    align-items: center;
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
    width: 40px; /* Tamaño deseado para la imagen */
    height: 40px; /* Tamaño deseado para la imagen */
    margin-right: 15px; /* Espacio entre la imagen y el texto */
    border-radius: 50%; /* Para hacer que la imagen sea circular (opcional) */
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
    background-color: #009688;
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
    background-color: #007272;
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
            width: 40px;
            height: 40px;
            border: 2px solid #ccc;
            border-radius: 50%;
            cursor: pointer;
            transition: border-color 0.3s ease;
        }

        .color-option:hover {
            border-color: #009688;
        }

        .product-sizes {
            margin-bottom: 20px;
        }

        .product-size {
            font-size: 20px;
            margin-right: 15px;
            padding: 8px 15px;
            border: 2px solid #009688;
            border-radius: 5px;
            color: #009688;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .product-size:hover {
            background-color: #009688;
            color: #fff;
        }

        .product-availability {
            font-size: 20px;
            margin-bottom: 20px;
            color: #009688;
        }

        .product-description {
            margin-top: 20px;
            font-size: 18px;
            line-height: 1.6;
        }

        button {
            padding: 15px 30px;
            background-color: white;
            color: #009688;
            border: 2px solid #009688;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            width: 48%;
            font-size: 20px;
        }

        button:hover {
            background-color: #009688;
            color: white;
            transform: scale(1.05);
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
            border: 2px solid #009688;
            border-radius: 5px;
            color: #009688;
            width: 50px;
            text-align: center;
        }

        .quantity-button {
            padding: 8px 12px;
            background-color: #009688;
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
            background-color: #007272;
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
            border: 2px solid #009688;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            width: 100%;
        }

.accordion-button {
    background-color: #f5f5f5;
    color: #333;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 18px;
    width: 100%;
    text-align: left;
    padding: 15px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: background-color 0.3s ease, transform 0.2s ease, color 0.3s ease;
    margin-bottom: 10px;
    position: relative;
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
    background-color: #009688;
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
            background-color: #007272;
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
}

#tablaMedidas th, #tablaMedidas td {
    padding: 8px 15px;
    text-align: center;
}

#tablaMedidas th {
    background-color: #009688;
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
    </style>
</head>
<body>
    <header>
        <h1>TAMARA</h1>
        <div class="dropdown-parent-user">
            <button id="user-button"><i class="fas fa-user"></i></button>
            <ul class="dropdown-user">
                <li><a href="{{ route('registrarse') }}">Registrarse</a></li>
                <li><a href="{{ route('login') }}">Iniciar Sesión</a></li>
            </ul>
        </div>
    </header>
    <nav>
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
                        <a href="#">Camisa <i class="fas fa-chevron-right"></i></a>
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
        </ul>
        <div class="search-box">
            <div class="cart">
                <i class="fas fa-shopping-cart"></i>
                <span class="cart-count">0</span>
            </div>
            <input type="text" placeholder="Buscar..." id="search-bar">
            <button type="submit" id="search-button"><i class="fas fa-search"></i></button>
        </div>
    </nav>
    <div class="product-container">
        <div id="imagenesProductos" class="product-thumbnails">

        </div>
<div id="imagenProducto" class="product-image">

</div>
        <div class="product-details">
            <h1 id="nombre_producto" class="product-title"></h1>
            <p class="product-info" id="sku"></p>
            <div class="product-description">
                <p id="descripcion"></p>
            </div>
            <p id="precio" class="product-price"></p>
            <p class="product-info" id="existencia"></p>
            <div id="coloresDisponibles" class="color-options">
                <h4>Colores disponibles</h4>
            </div>
            <div id="tallas_disponibles" class="product-sizes">
                <h4>Tallas disponibles</h4>
            </div>
            <p class="product-availability"></p>
            <div class="quantity-container">
                <span id="cantidad" class="quantity-label"></span>
                <button class="quantity-button" id="decrement-button">-</button>
                <input class="quantity-input" type="number" id="quantity" value="1" min="1" max="5">
                <button class="quantity-button" id="increment-button">+</button>
            </div>
            <div class="product-actions">
                <button class="action-button">Agregar al Carrito</button>
                <button class="action-button">Comprar ahora</button>
            </div>
            <div class="accordion">
                <button class="accordion-button">Detalles</button>
                <div id="acordeon_producto" class="accordion-content">

                </div>
            </div>
            <div class="accordion">
                <button class="accordion-button">Tallas y Dimensiones</button>
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

        let cartCount = 0;

        // Función para actualizar el contador del carrito
        function updateCartCount() {
            const cartCountElement = document.querySelector('.cart-count');
            cartCountElement.textContent = cartCount.toString();
        }

        // Llamada inicial para establecer el contador
        updateCartCount();
        // Obtener los elementos del DOM
        const decrementButton = document.getElementById("decrement-button");
        const incrementButton = document.getElementById("increment-button");
        const quantityInput = document.getElementById("quantity");

        // Manejar la lógica de incremento y decremento
        decrementButton.addEventListener("click", () => {
            const currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = (currentValue - 1).toString();
                decrementButton.classList.add("small"); // Agregar clase de botón pequeño
                setTimeout(() => {
                    decrementButton.classList.remove("small"); // Eliminar clase después de la animación
                }, 200);
            }
        });

        incrementButton.addEventListener("click", () => {
            const currentValue = parseInt(quantityInput.value);
            if (currentValue < 5) {
                quantityInput.value = (currentValue + 1).toString();
                incrementButton.classList.add("small"); // Agregar clase de botón pequeño
                setTimeout(() => {
                    incrementButton.classList.remove("small"); // Eliminar clase después de la animación
                }, 200);
            }
        });

        // Función para manejar el click en el botón del acordeón
    function toggleAccordion(index) {
        const accordions = document.querySelectorAll('.accordion');
        accordions[index].classList.toggle('active');
    }

    // Agregar evento click a los botones del acordeón
    const accordionButtons = document.querySelectorAll('.accordion-button');
    accordionButtons.forEach((button, index) => {
        button.addEventListener('click', () => {
            toggleAccordion(index);
        });
    });
    </script>
    <script src="js/producto.js"></script>
</body>
</html>
