<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Registro</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .login-container {
            flex-grow: 1;
            width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
        }

        .login-container h2 {
            text-align: center;
            color: #ff6600;
        }

        .input-container {
            margin: 20px 0;
            margin-right: 45px;
            position: relative;
        }

        .input-container i {
            position: absolute;
            top: 12px;
            left: 10px;
            color: #888;
        }

        .input-container input {
            width: 100%;
            padding: 12px;
            padding-left: 30px;
            border: 2px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        .input-container input:focus {
            border-color: #ff6600;
            outline: none;
        }

        .login-button {
            width: 100%;
            padding: 10px;
            background-color: #777;
            border: none;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
            font-size: 18px;
        }

        .login-button:hover {
            background-color: #ff6600;
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
            color: #fff;
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
        .password-container {
    position: relative;
    display: flex;
    align-items: center;
}

.password-toggle-button {
    border: none;
    background: transparent;
    cursor: pointer;
    position: absolute;
    top: 50%;
    right: 10px; /* Ajusta la posición del botón del ícono del ojo */
    transform: translateY(-50%);
    z-index: 1;
}

/* Alinea el ícono en el centro verticalmente */
.password-toggle-button i {
    position: relative;
    top: 50%;
    transform: translateY(-50%);
}

.password-toggle-button i {
    font-size: 20px;
}

.password-toggle-button:focus,
.password-toggle-button:active {
    outline: none;
}

.password-toggle-button:hover i {
    color: #007BFF;
}

.spinner {
    border: 4px solid rgba(255, 255, 255, 0.3);
    border-radius: 50%;
    border-top: 4px solid #f2f2f2;
    width: 10px;
    height: 10px;
    animation: spin 2s linear infinite;
    margin-right: 10px;
    display: none;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

@media (max-width: 768px) {
    /* Estilos para pantallas con un ancho máximo de 768px (dispositivos móviles) */
    .container {
        flex-direction: column;
    }
    .login-container {
        width: 83%; /* Ajusta el ancho del contenedor de inicio de sesión */
        margin: 10px auto;
    }
    /* Agrega estilos específicos para los elementos en dispositivos móviles */
}
    </style>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <h2>Registro</h2>
            <form>
                <div class="input-container">
                    <i class="fa-solid fa-envelope"></i>
                    <input id="email" name="email" type="email" placeholder="Correo">
                </div>
                <div class="input-container">
                    <i class="fas fa-user"></i>
                    <input id="name" name="name" type="text" placeholder="Nombres">
                </div>
                <div class="input-container">
                    <i class="fas fa-user"></i>
                    <input id="apellidos" name="apellidos" type="text" placeholder="Apellidos">
                </div>
                <div class="input-container">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="password" name="password" placeholder="Contraseña">
                </div>
                <div class="input-container">
                    <i class="fas fa-lock"></i>
                    <input id="contraConfirm" name="contraConfirm" type="password" placeholder="Confirme contraseña">
                </div>
                <div class="gender-container">
                    <label for="masculino">Masculino</label>
                    <input id="masculino" name="gender" type="radio" value="M">

                    <label for="femenimo">Femenino</label>
                    <input id="femenimo" type="radio" name="gender" value="F">
                </div>
                <button type="submit" class="login-button" id="loginButton">
                    <span id="spinner" class="spinner"></span>
                    Registrarse
                </button>
            </form>
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
    </div>

    <script src="{{ asset('js/Registro.js') }}"></script>
</body>
</html>
