<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.min.css">
    <title>Usuarios</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <style>
        /* Estilos generales para el modal */
  .modal-content {
    border-radius: 10px;
  }

  .modal-header {
    background-color: #007BFF;
    color: #fff;
  }

  .modal-title {
    font-size: 24px;
  }

  .modal-body {
    padding: 20px;
  }

  .modal-footer {
    background-color: #f5f5f5;
  }

  /* Estilos para los botones */
  .btn-secondary {
    background-color: #d9534f;
    color: #fff;
  }

  .btn-secondary:hover {
    background-color: #c9302c;
  }

  .btn-success {
    background-color: #5bc0de;
    color: #fff;
  }

  .btn-success:hover {
    background-color: #46b8da;
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
        <h3>Lista de usuarios</h3>
        <!-- BUTON para abri modal de sociedades -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#privilegiosModal">
          Nuevo usuario
        </button>
        <!-- BUTON para abri modal de sociedades -->

        <!-- Modal INCIO SOCIEDADES-->
      <div class="modal fade" id="privilegiosModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Informacion del usuario</h1>
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
      <!-- Modal FIN SOCIEDADES-->

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
