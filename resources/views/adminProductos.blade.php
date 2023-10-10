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
                <div class="form-group">
                  <label for="nombre_producto">Nombre:</label>
                  <input type="text" name="nombre_producto" class="form-control" id="nombre_producto">
                </div>
                <div class="form-group">
                    <label for="existencia">Existencia:</label>
                    <input type="number" name="existencia" class="form-control" id="existencia">
                  </div>
                  <div class="form-group">
                    <label for="precio_1">Precio 1:</label>
                    <input type="number" name="precio_1" step=".01" min="1" class="form-control" id="precio_1">
                  </div>
                  <div class="form-group">
                    <label for="precio_2">Precio 2:</label>
                    <input type="number" name="precio_2" step=".01" min="1" class="form-control" id="precio_2">
                  </div>
                  <div class="form-group">
                    <label for="precio_3">Precio 3:</label>
                    <input type="number" name="precio_3" step=".01" min="1" class="form-control" id="precio_3">
                  </div>
                  <div class="form-group">
                    <label for="precio_4">Precio 4:</label>
                    <input type="number" name="precio_4" step=".01" min="1" class="form-control" id="precio_4">
                  </div>
                  <div class="form-group">
                    <label for="estilo">Estilo:</label>
                    <input type="text" name="estilo" class="form-control" id="estilo">
                  </div>
                  <div class="form-group">
                    <label for="detalles">Detalles:</label>
                    <input type="text" name="detalles" class="form-control" id="detalles">
                  </div>
                  <div class="form-group">
                    <label for="escote">Escote:</label>
                    <input type="text" name="escote" class="form-control" id="escote">
                  </div>
                  <div class="form-group">
                    <label for="longitud_manga">Longitud de Manga:</label>
                    <input type="text" name="longitud_manga" class="form-control" id="longitud_manga">
                  </div>
                  <div class="form-group">
                    <label for="tejido">Tejido:</label>
                    <input type="text" name="tejido" class="form-control" id="tejido">
                  </div>
                  <div class="form-group">
                    <label for="composicion">Composicion:</label>
                    <input type="text" name="composicion" class="form-control" id="composicion">
                  </div>
                  <div class="form-group">
                    <label for="instrucciones_cuidado">Instrucciones de cuidado:</label>
                    <input type="text" name="instrucciones_cuidado" class="form-control" id="instrucciones_cuidado">
                  </div>
                  <div class="form-group">
                    <label for="SKU">SKU:</label>
                    <input type="text" name="SKU" class="form-control" id="SKU">
                  </div>
                  <div class="form-group">
                    <label for="categoria">Categoria:</label>
                    <select class="form-select" name="categoria" id="categoria">

                    </select>
                  </div>
                  <div class="form-group">
                    <label for="sub_categoria">Sub categoria:</label>
                    <select class="form-select" name="sub_categoria" id="sub_categoria">

                    </select>
                  </div>
                  <div class="form-group">
                    <label for="imagen">Imagen:</label>
                    <input type="file" name="imagen" class="form-control" id="imagen">
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

        <div class="container">
            <div class="table-container">
                <table id="tabla-productos" class="table table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>imagen</th>
                        <th>Producto</th>
                        <th>Existencia</th>
                        <th>Precio 1</th>
                        <th>Estilo</th>
                        <th>Detalles</th>
                        <th>Escote</th>
                        <th>Longitud de manga</th>
                        <th>Tejido</th>
                        <th>Composición</th>
                        <th>Instrucciones</th>
                        <th>SKU</th>
                        <th>Categoria</th>
                        <th>Sub categoria</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody></tbody>
                  </table>
            </div>
        </div>

<!--FIN DE tabla-->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="{{asset('js/adminProductos.js')}}"></script>
</body>
</html>
