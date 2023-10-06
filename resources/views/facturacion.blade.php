<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <title>Pagos</title>
  <!-- Estilos CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <style>
    /* Estilos generales */
    body {
      background-color: #f8f9fa;
      font-family: Arial, sans-serif;
    }

    .container {
      background-color: #ffffff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      margin-top: 20px;
    }

    /* Estilos para los campos y etiquetas */
    .form-label {
      font-weight: bold;
      color: #333;
    }

    .form-control {
      border: 2px solid #ccc;
      border-radius: 4px;
      padding: 10px;
      transition: border-color 0.2s;
    }

    .form-control:focus {
      border-color: #007bff;
      outline: none;
    }

    /* Estilos para el botón */
    .btn-primary {
      background-color: #007bff;
      border: none;
      border-radius: 4px;
      padding: 10px 20px;
      color: #fff;
      font-weight: bold;
      transition: background-color 0.2s;
    }

    .btn-primary:hover {
      background-color: #0056b3;
    }

    /* Personaliza el estilo de los mensajes de error */
    .invalid-feedback {
      color: red;
    }

    /* Personaliza el estilo de los campos inválidos */
    .was-validated .form-control:invalid {
      border-color: red;
    }

    /* Estilo para el encabezado centrado */
    .form-header {
      text-align: center;
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 20px;
    }

    /* Estilo para el encabezado de subsección */
    .form-subheader {
      font-size: 20px;
      font-weight: bold;
      margin-top: 20px;
    }

    /* Estilo para el campo de dirección más grande */
    .large-textarea {
      height: 150px;
    }

    .container-carrito {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }

        .table th {
            background-color: #343a40;
            color: #ffffff;
            text-align: center;
            vertical-align: middle;
            font-size: 16px;
        }

        .table th,
        .table td {
            border: 1px solid #dee2e6;
            text-align: center;
        }

        img.product-image {
            max-width: 80px;
            height: auto;
        }

        .btn-remove {
            background-color: #dc3545;
            color: #ffffff;
            border: none;
        }

        .btn-remove:hover {
            background-color: #c82333;
        }

        #total-price {
            font-size: 24px;
            font-weight: bold;
            margin-top: 20px;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }

        .table-striped tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.1);
        }
  </style>
</head>
<body>


  <div class="container">
    <div class="form-header">
      Datos de Facturación
    </div>
    <form class="row g-3 needs-validation" novalidate>
      <!-- Información personal -->
      <div class="row">
        <div class="col-md-4">
          <label for="validationCustom01" class="form-label">Nombres</label>
          <input type="text" class="form-control" id="validationCustom01" required>
          <div class="invalid-feedback">
            Ingresa tus nombres
          </div>
        </div>
        <div class="col-md-4">
          <label for="validationCustom02" class="form-label">Apellidos</label>
          <input type="text" class="form-control" id="validationCustom02" required>
          <div class="invalid-feedback">
            Ingresa tus apellidos
          </div>
        </div>
      </div>

      <!-- Información de contacto -->
      <div class="row">
        <div class="col-md-4">
          <label for="validationCustomUsername" class="form-label">Correo</label>
          <div class="input-group has-validation">
            <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
            <div class="invalid-feedback">
              Ingresa tu correo
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <label for="validationCustom07" class="form-label">Teléfono</label>
          <input type="text" class="form-control" id="validationCustom07" required>
          <div class="invalid-feedback">
            Ingresa tu número de teléfono
          </div>
        </div>
        <div class="col-md-2">
          <label for="validationCustom08" class="form-label">WhatsApp</label>
          <input type="text" class="form-control" id="validationCustom08" required>
          <div class="invalid-feedback">
            Ingresa tu número de WhatsApp
          </div>
        </div>
      </div>

      <!-- Información de documentación -->
      <div class="row">
        <div class="col-md-2">
          <label for="validationCustom04" class="form-label">Tipo de documentación</label>
          <select class="form-select" id="validationCustom04" required>
            <option selected disabled value="">Seleccione...</option>
            <option>...</option>
          </select>
          <div class="invalid-feedback">
            Seleccione su tipo de documentación
          </div>
        </div>
        <div class="col-md-2">
          <label for="validationCustomUsername" class="form-label">Número de documento</label>
          <div class="input-group has-validation">
            <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
            <div class="invalid-feedback">
              Ingrese su número de documento
            </div>
          </div>
        </div>
      </div>

      <!-- Información de ubicación -->
      <div class="row">
        <div class="col-md-2">
          <label for="validationCustom05" class="form-label">País</label>
          <input type="text" class="form-control" id="validationCustom05" required>
          <div class="invalid-feedback">
            Ingrese su país
          </div>
        </div>
        <div class="col-md-4">
          <label for="validationCustom03" class="form-label">Departamento</label>
          <input type="text" class="form-control" id="validationCustom03" required>
          <div class="invalid-feedback">
            Ingresa tu departamento
          </div>
        </div>
        <div class="col-md-4">
          <label for="validationCustom04" class="form-label">Ciudad</label>
          <input type="text" class="form-control" id="validationCustom04" required>
          <div class="invalid-feedback">
            Ingresa tu ciudad
          </div>
        </div>
      </div>

      <!-- Información de facturación -->
      <div class="row">
        <div class="col-md-4">
          <label for="validationCustom06" class="form-label">Dirección de Facturación</label>
          <input type="text" class="form-control" id="validationCustom06" required>
          <div class="invalid-feedback">
            Ingresa tu dirección de facturación
          </div>
        </div>
      </div>

      <div class="form-subheader">
        Dirección de Entrega
      </div>
      <div class="row">
        <div class="col-md-4">
          <label class="form-label">Método de Entrega</label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="entrega" id="entregaDomicilio" value="domicilio" required>
            <label class="form-check-label" for="entregaDomicilio">
              A Domicilio
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="entrega" id="entregaPunto" value="punto_entrega" required>
            <label class="form-check-label" for="entregaPunto">
              Punto de Entrega
            </label>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="entregaMismaDireccion">
            <label class="form-check-label" for="entregaMismaDireccion">
              Entregar en la misma dirección de facturación
            </label>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-2">
          <label for="validationCustom05" class="form-label">País</label>
          <input type="text" class="form-control" id="validationCustom05" required>
          <div class="invalid-feedback">
            Ingrese el país de entrega
          </div>
        </div>
        <div class="col-md-4">
          <label for="validationCustom03" class="form-label">Departamento</label>
          <input type="text" class="form-control" id="validationCustom03" required>
          <div class="invalid-feedback">
            Ingrese el departamento de entrega
          </div>
        </div>
        <div class="col-md-4">
          <label for="validationCustom04" class="form-label">Ciudad</label>
          <input type="text" class="form-control" id="validationCustom04" required>
          <div class="invalid-feedback">
            Ingrese la ciudad de entrega
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <label for="validationCustom06" class="form-label">Dirección de Entrega</label>
          <textarea class="form-control large-textarea" id="validationCustom06" required></textarea>
          <div class="invalid-feedback">
            Ingrese la dirección de entrega
          </div>
        </div>
      </div>
      <!-- Fin de Información de dirección de entrega -->

      <div class="container-carrito">
        <h3 class="mb-4">Detalles de su compra</h3>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Imagen</th>
                    <th>Cantidad</th>
                    <th>Talla</th>
                    <th>Color</th>
                    <th>Total</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody id="cart-items-list">
                <!-- Aquí se mostrarán los productos -->
            </tbody>
        </table>
        <div id="total-price">
            Total de productos: $<span id="total-amount">0.00</span>
        </div>

      <!-- Botón de envío -->
      <div class="col-12 mt-4">
        <button id="submitButton" class="btn btn-primary" type="submit">Enviar formulario</button>
      </div>
    </form>
  </div>

  <!-- JavaScript -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="{{ asset('js/pagos.js') }}"></script>
</body>
</html>
