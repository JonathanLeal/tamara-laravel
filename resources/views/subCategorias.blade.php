<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Camisas</title>
    <style>
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
    padding: 20px; /* Espaciado alrededor de los productos */
    overflow-x: auto; /* Permite desplazamiento horizontal si los productos no caben */
}

.product-row {
    display: flex;
}

/* Estilos para cada tarjeta de producto */
.card {
    flex: 0 0 auto; /* Evita que las tarjetas se estiren */
    width: 300px; /* Ancho fijo para cada tarjeta */
    margin-right: 20px; /* Espacio entre las tarjetas */
    border: 1px solid #ccc;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    text-align: left; /* Alineación del texto */
}

.card:hover {
  transform: scale(1.05);
}

.card img {
    width: 100%; /* Asegura que la imagen se ajuste correctamente */
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
}

.card-body {
    padding: 15px;
}

.card-title {
    font-size: 1.25rem;
    font-weight: bold;
    margin-bottom: 10px;
}

.card-text {
    font-size: 1rem;
    margin-bottom: 5px;
}

.card-text:last-child {
    margin-bottom: 0;
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
            <li><a href="#">Inicio</a></li>
            <li class="dropdown-parent">
                <a href="#">Hombres <i class="fas fa-chevron-down"></i></a>
                <ul class="dropdown">
                    <li class="dropdown-submenu">
                        <a href="#">Camisa <i class="fas fa-chevron-right"></i></a>
                        <ul class="sub-dropdown">
                            <li><a href="{{ route('subCtegoriasProductos', ['categoria' => 2, 'sub_categoria' => 1]) }}">Camisa Polo</a></li>
                            <li><a href="{{ route('subCtegoriasProductos', ['categoria' => 2, 'sub_categoria' => 2]) }}">Camisa Casual</a></li>
                            <li><a href="{{ route('subCtegoriasProductos', ['categoria' => 2, 'sub_categoria' => 3]) }}">Camiseta</a></li>
                        </ul>
                    </li>
                    <li class="dropdown-submenu">
                        <a href="#">Pantalones <i class="fas fa-chevron-right"></i></a>
                        <ul class="sub-dropdown">
                            <li><a href="{{ route('subCtegoriasProductos', ['categoria' => 2, 'sub_categoria' => 4]) }}">Pantalón Deportivo</a></li>
                            <li><a href="{{ route('subCtegoriasProductos', ['categoria' => 2, 'sub_categoria' => 5]) }}">Pantalón Formal</a></li>
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
                            <li><a href="{{ route('subCtegoriasProductos', ['categoria' => 1, 'sub_categoria' => 1]) }}">Camisa Polo</a></li>
                            <li><a href="{{ route('subCtegoriasProductos', ['categoria' => 1, 'sub_categoria' => 2]) }}">Camisa Casual</a></li>
                            <li><a href="{{ route('subCtegoriasProductos', ['categoria' => 1, 'sub_categoria' => 3]) }}">Camiseta</a></li>
                        </ul>
                    </li>
                    <li class="dropdown-submenu">
                        <a href="#">Pantalones <i class="fas fa-chevron-right"></i></a>
                        <ul class="sub-dropdown">
                            <li><a href="{{ route('subCtegoriasProductos', ['categoria' => 1, 'sub_categoria' => 4]) }}">Pantalón Deportivo</a></li>
                            <li><a href="{{ route('subCtegoriasProductos', ['categoria' => 1, 'sub_categoria' => 5]) }}">Pantalón Formal</a></li>
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
                            <li><a href="{{ route('subCtegoriasProductos', ['categoria' => 3, 'sub_categoria' => 1]) }}">Camisa Polo</a></li>
                            <li><a href="{{ route('subCtegoriasProductos', ['categoria' => 3, 'sub_categoria' => 2]) }}">Camisa Casual</a></li>
                            <li><a href="{{ route('subCtegoriasProductos', ['categoria' => 3, 'sub_categoria' => 3]) }}">Camiseta</a></li>
                        </ul>
                    </li>
                    <li class="dropdown-submenu">
                        <a href="#">Pantalones <i class="fas fa-chevron-right"></i></a>
                        <ul class="sub-dropdown">
                            <li><a href="{{ route('subCtegoriasProductos', ['categoria' => 3, 'sub_categoria' => 4]) }}">Pantalón Deportivo</a></li>
                            <li><a href="{{ route('subCtegoriasProductos', ['categoria' => 3, 'sub_categoria' => 5]) }}">Pantalón Formal</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
        <div class="search-box">
            <input type="text" placeholder="Buscar..." id="search-bar">
            <button type="submit" id="search-button"><i class="fas fa-search"></i></button>
        </div>
    </nav>

    <div class="product-container">
        <div class="product-row" id="productos"></div>
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

    <script src="{{ asset('js/SubCategoria.js') }}"></script>
</body>
</html>
