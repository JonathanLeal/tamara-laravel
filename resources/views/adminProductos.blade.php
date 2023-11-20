<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.min.css">
    <title>Productos</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <style>
        .table-container {
  display: flex;
  justify-content: center;
}
/* Estilos para el modal */
#privilegiosModal .modal-content {
    border: none;
    border-radius: 20px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
  }
  #privilegiosModal .modal-header {
    background: linear-gradient(135deg, #007BFF, #3498db);
    color: white;
    border-radius: 20px 20px 0 0;
  }
  #privilegiosModal .modal-title {
    font-size: 32px;
    font-weight: bold;
    text-align: center;
    margin-bottom: 20px;
  }
  #privilegiosModal .modal-body {
    padding: 20px;
  }
  #privilegiosModal .modal-footer {
    border-radius: 0 0 20px 20px;
  }
  #privilegiosModal .btn-secondary {
    background-color: #6C757D;
    color: white;
    border: none;
    transition: background-color 0.2s;
  }
  #privilegiosModal .btn-secondary:hover {
    background-color: #5A6268;
  }
  #privilegiosModal .btn-success {
    background-color: #28A745;
    color: white;
    border: none;
    transition: background-color 0.2s;
  }
  #privilegiosModal .btn-success:hover {
    background-color: #218838;
  }

  /* Estilos para los campos de entrada */
  #privilegiosModal .form-group {
    margin-bottom: 20px;
  }
  #privilegiosModal .form-label {
    font-weight: bold;
    font-size: 18px;
  }
  #privilegiosModal .form-control {
    font-size: 16px;
    border: 2px solid #ccc;
    border-radius: 10px;
    padding: 10px;
  }

  /* Estilos para los select */
  #privilegiosModal select.form-select {
    width: 100%;
    padding: 15px;
    border: 2px solid #ccc;
    border-radius: 10px;
    background-color: #f8f9fa;
    font-size: 16px;
  }

  /* Estilos para el botón de cierre */
  #privilegiosModal .btn-close {
    color: white;
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
                <a class="nav-link active" aria-current="page" href="{{ route('vistaUsuarios') }}">Usuarios</a>
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
        <h3 style="text-align: center">Lista de productos</h3>
        <center>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#privilegiosModal">
                Nuevo producto
            </button>
        </center>

        <!-- Modal INCIO SOCIEDADES-->
      <div class="modal fade" id="privilegiosModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Informacion del producto</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formularioProducto" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="nombre_producto">Nombre:</label>
                            <input type="text" name="nombre_producto" class="form-control" id="nombre_producto">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="existencia">Existencia:</label>
                            <input type="number" name="existencia" class="form-control" id="existencia">
                          </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="precio_1">Precio 1:</label>
                              <input type="number" step=".01" name="precio_1" class="form-control" id="precio_1" min="1">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="precio_2">Precio 2:</label>
                              <input type="number" step=".01" name="precio_2" class="form-control" id="precio_2" min="1">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="precio_3">Precio 3:</label>
                              <input type="number" step=".01" name="precio_3" class="form-control" id="precio_3" min="1">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="precio_4">Precio 4:</label>
                              <input type="number" step=".01" name="precio_4" class="form-control" id="precio_4" min="1">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="estilo">Estilo:</label>
                              <input type="number" name="estilo" class="form-control" id="estilo">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="detalles">Detalles:</label>
                              <input type="text" name="detalles" class="form-control" id="detalles">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="escote">Escote:</label>
                              <input type="text" name="escote" class="form-control" id="escote">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="longitud_manga">Longitud de manga:</label>
                              <input type="text" name="longitud_manga" class="form-control" id="longitud_manga">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="tejido">Tejido:</label>
                              <input type="text" name="tejido" class="form-control" id="tejido">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="instrucciones_cuidado">Instrucciones de cuidado:</label>
                              <input type="text" name="instrucciones_cuidado" class="form-control" id="instrucciones_cuidado">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="SKU">SKU:</label>
                              <input type="text" name="SKU" class="form-control" id="SKU">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="composicion">Composicion:</label>
                              <input type="text" name="composicion" class="form-control" id="composicion">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="categoria">Categoria:</label>
                              <select class="form-select" name="categoria" id="categoria">
                                <option value="">Seleccionar...</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="sub_categoria">Sub categoria:</label>
                              <select class="form-select" name="sub_categoria" id="sub_categoria">
                                <option value="">Seleccionar...</option>
                              </select>
                            </div>
                          </div>
                      </div>

                  <div class="form-group">
                    <label for="imagen" id="labelImagen">Imagen:</label>
                    <input type="file" name="imagen" value="" class="form-control" id="imagen">
                  </div>
                </form>
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

        <div class="table-responsive">
                <table id="tabla-productos" class="table table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>imagen</th>
                        <th>Producto</th>
                        <th>Estilo</th>
                        <th>SKU</th>
                        <th>Categoria</th>
                        <th>Sub categoria</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody></tbody>
                  </table>
        </div>

<!--FIN DE tabla-->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="{{asset('js/adminProductos.js')}}"></script>
</body>
</html>
