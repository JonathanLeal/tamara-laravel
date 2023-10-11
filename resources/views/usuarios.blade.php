<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.min.css">
    <title>Usuarios</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <style>
        /* Estilos generales para el modal */
        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }

            .modal-dialog {
                max-width: 90%;
            }

            /* Adjust any other styles as needed for smaller screens */
        }
  .modal-content {
    border-radius: 15px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
  }

  .modal-header {
    background-color: #3498db;
    color: #fff;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
  }

  .modal-title {
    font-size: 24px;
  }

  .modal-body {
    padding: 20px;
  }

  .modal-footer {
    background-color: #f9f9f9;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
  }

  /* Estilos para los botones */
  .btn-secondary {
    background-color: #e74c3c;
    color: #fff;
  }

  .btn-secondary:hover {
    background-color: #c0392b;
  }

  .btn-success {
    background-color: #2ecc71;
    color: #fff;
  }

  .btn-success:hover {
    background-color: #27ae60;
  }

  /* Estilos para los campos de entrada y etiquetas */
  .form-group {
    margin-bottom: 15px;
  }

  label {
    font-weight: bold;
  }

  /* Estilos para los selects */
  select.form-select {
    width: 100%;
    height: 40px;
  }

  /* Estilo básico de DataTables */
#tabla-usuarios {
    width: 100%;
    border-collapse: collapse;
}

#tabla-usuarios th, #tabla-usuarios td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: center;
}

/* Estilo de encabezados de columna */
#tabla-usuarios thead th {
    background-color: #333;
    color: #fff;
}

/* Estilo de filas alternas */
#tabla-usuarios tbody tr:nth-child(even) {
    background-color: #f2f2f2;
}

/* Estilo al pasar el mouse por encima de las filas */
#tabla-usuarios tbody tr:hover {
    background-color: #ccc;
}

/* Estilo para las celdas de "Acciones" o "Estado" (ajústalas según tus necesidades) */
#tabla-usuarios .acciones, #tabla-usuarios .estado {
    font-weight: bold;
    color: #007bff;
}

.container {
    margin-top: 20px;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

.page-title {
    font-size: 24px;
    margin-bottom: 20px;
}

/* Estilos para el botón */
.btn-primary {
    background-color: #007BFF;
    color: #fff;
    border: none;
}

.btn-primary:hover {
    background-color: #0056b3;
}
    </style>
</head>
<body>

    <!--INICIO DE NAV-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ route('inicio') }}">INICIO</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('vistaProductos') }}">Productos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/miembros">Ofertas</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
<!--FIN DE NAV-->

<!--INICIO DE Tabla-->
<div class="container">
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <h2>Gestión de Usuarios</h2>
        <!-- BOTÓN para abrir el modal de usuario -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#privilegiosModal">
          Agregar Nuevo Usuario
        </button>
        <!-- FIN del BOTÓN para abrir el modal de usuario -->

        <!-- Modal INICIO DE USUARIO -->
        <div class="modal fade" id="privilegiosModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h2 class="modal-title fs-5" id="exampleModalLabel">Información del Usuario</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                    <label for="nombres">Nombres:</label>
                    <input type="text" class="form-control" id="nombres">
                  </div>
                  <div class="form-group">
                      <label for="apellidos">Apellidos:</label>
                      <input type="text" class="form-control" id="apellidos">
                    </div>
                    <div class="form-group">
                      <label for="correo">Correo:</label>
                      <input type="email" class="form-control" id="correo">
                    </div>
                    <div class="form-group">
                      <label for="pass">Contraseña:</label>
                      <input type="text" class="form-control" id="pass">
                    </div>
                    <div class="form-group">
                      <label for="nombre_privilegio">Sexo:</label>
                      <select class="form-select" id="sexo">
                          <option value="M">Masculino</option>
                          <option value="F">Femenino</option>
                          <option value="otro">Otro</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="nombre_privilegio">Rol:</label>
                      <select class="form-select" id="rol">

                      </select>
                    </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btnCancelar">Cancelar</button>
                <button type="button" class="btn btn-success" data-bs-dismiss="modal" id="btnGuardar">Guardar</button>
                <button type="button" class="btn btn-success" data-bs-dismiss="modal" id="btnEditar" style="display: none;">Editar</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal FIN DE USUARIO -->

        <table id="tabla-usuarios" class="table table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombres</th>
              <th>Apellidos</th>
              <th>Correo</th>
              <th>Sexo</th>
              <th>Rol</th>
              <th>Acciones</th>
              <th>Estado</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>
  </div>
<!--FIN DE tabla-->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="{{asset('js/usuarios.js')}}"></script>
</body>
</html>
