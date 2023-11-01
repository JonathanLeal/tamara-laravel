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

        .small-select {
            width: 150px; /* Personaliza el ancho como desees */
        }

        #info-agencia {
            display: none;
            border: 2px solid #ffffff;
            padding: 10px;
            margin: 20px 0;
            border-radius: 10px;
            background-color: #f0f0f0;
        }

        #info-agencia p {
            margin: 0;
            padding: 5px 0;
            line-height: 1; /* Elimina el interlineado entre párrafos */
        }

        #nombre_agencia {
            font-weight: bold;
            font-size: 15px;
        }

        #telefono, #ciudad, #direccion, #email {
            font-size: 15px;
        }

        @media (max-width: 480px) {
            #info-agencia {
                padding: 5px;
            }
            #nombre_agencia {
                font-size: 16px;
            }
            #telefono, #ciudad, #direccion {
                font-size: 14px;
            }
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
          <label for="nombres" class="form-label">Nombres</label>
          <input type="text" class="form-control" name="nombres" id="nombres" required>
          <div class="invalid-feedback">
            Ingresa tus nombres
          </div>
        </div>
        <div class="col-md-4">
          <label for="apellidos" class="form-label">Apellidos</label>
          <input type="text" class="form-control" name="apellidos" id="apellidos" required>
          <div class="invalid-feedback">
            Ingresa tus apellidos
          </div>
        </div>
      </div>

      <!-- Información de contacto -->
      <div class="row">
        <div class="col-md-4">
          <label for="correo" class="form-label">Correo</label>
          <div class="input-group has-validation">
            <input type="email" class="form-control" name="correo" id="correo" aria-describedby="inputGroupPrepend" required>
            <div class="invalid-feedback">
              Ingresa tu correo
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <label for="telefono" class="form-label">Teléfono</label>
          <input type="text" class="form-control" name="telefono" id="telefono" required>
          <div class="invalid-feedback">
            Ingresa tu número de teléfono
          </div>
        </div>
        <div class="col-md-2">
          <label for="whatsApp" class="form-label">WhatsApp</label>
          <input type="text" class="form-control" name="whatsApp" id="whatsApp" required>
          <div class="invalid-feedback">
            Ingresa tu número de WhatsApp
          </div>
        </div>
      </div>

      <!-- Información de documentación -->
      <div class="row">
        <div class="col-md-2">
          <label for="tipo_doc" class="form-label">Tipo de documentación</label>
          <select class="form-select" name="tipo_doc" id="tipo_doc" required>
            <option selected disabled value="">Seleccione...</option>
            <option>...</option>
          </select>
          <div class="invalid-feedback">
            Seleccione su tipo de documentación
          </div>
        </div>
        <div class="col-md-2">
          <label for="num_doc" class="form-label">Número de documento</label>
          <div class="input-group has-validation">
            <input type="text" class="form-control" name="num_doc" id="num_doc" aria-describedby="inputGroupPrepend" required>
            <div class="invalid-feedback">
              Ingrese su número de documento
            </div>
          </div>
        </div>
      </div>

      <!-- Información de ubicación -->
      <div class="row">
        <div class="col-md-2">
          <label for="pais" class="form-label">País</label>
          <input type="text" class="form-control" name="pais" id="pais" required>
          <div class="invalid-feedback">
            Ingrese su país
          </div>
        </div>
        <div class="col-md-4">
          <label for="depa" class="form-label">Departamento</label>
          <input type="text" class="form-control" name="depa" id="depa" required>
          <div class="invalid-feedback">
            Ingresa tu departamento
          </div>
        </div>
        <div class="col-md-4">
          <label for="ciudad" class="form-label">Ciudad</label>
          <input type="text" class="form-control" name="ciudad" id="ciudad" required>
          <div class="invalid-feedback">
            Ingresa tu ciudad
          </div>
        </div>
      </div>

      <!-- Información de facturación -->
      <div class="row">
        <div class="col-md-4">
          <label for="direc_fac" class="form-label">Dirección de Facturación</label>
          <input type="text" class="form-control" name="direc_fac" id="direc_fac" required>
          <div class="invalid-feedback">
            Ingresa tu dirección de facturación
          </div>
        </div>
      </div>

      <div class="form-subheader">
        Dirección de Entrega
      </div>
      <div class="row">
        <label class="form-label">Método de Entrega</label>
        <div class="col-md-4">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="entrega" id="entregaDomicilio" value="domicilio" required>
                <label class="form-check-label" for="entregaDomicilio">
                  A Domicilio $3.75
                </label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="entrega" id="entregaPunto" value="punto_entrega" required>
                <label class="form-check-label" for="entregaPunto">
                  Punto de Entrega
                </label>
              </div>
          </div>
      <div id="entregaDomicilioInputs" style="display: none">
        <div class="col-md-10 mt-3 mb-3">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="entregaMismaDireccion" id="entregaMismaDireccion">
              <label class="form-check-label" for="entregaMismaDireccion">
                Entregar en la misma dirección de facturación
              </label>
            </div>
          </div>
        <div class="row">
            <div class="col-md-2">
              <label for="pais_fac" class="form-label">País</label>
              <input type="text" class="form-control" name="pais_fac" id="pais_fac" required>
              <div class="invalid-feedback">
                Ingrese el país de entrega
              </div>
            </div>
            <div class="col-md-4">
              <label for="depa_fac" class="form-label">Departamento</label>
              <input type="text" class="form-control" name="depa_fac" id="depa_fac" required>
              <div class="invalid-feedback">
                Ingrese el departamento de entrega
              </div>
            </div>
            <div class="col-md-4">
              <label for="ciudad_fac" class="form-label">Ciudad</label>
              <input type="text" class="form-control" name="ciudad_fac" id="ciudad_fac" required>
              <div class="invalid-feedback">
                Ingrese la ciudad de entrega
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <label for="direc_factura" class="form-label">Dirección de Entrega</label>
              <textarea class="form-control large-textarea" name="direc_factura" id="direc_factura" required></textarea>
              <div class="invalid-feedback">
                Ingrese la dirección de entrega
              </div>
            </div>
          </div>
      </div>
      <div id="entregaPuntoInputs" style="display: none">
        <select class="form-select small-select" name="agencias" id="agencias" required>
            <option selected disabled value="">Seleccione...</option>
            <!-- Otras opciones aquí -->
        </select>
          <div class="invalid-feedback">
            Seleccione la agencia
          </div>
          <div id="info-agencia" style="display: none">
            <p id="nombre_agencia"></p>
            <p id="telefono"></p>
            <p id="email"></p>
            <p id="ciudad"></p>
            <p id="direccion"></p>
        </div>
      </div>
    </div>
      <!-- Fin de Información de dirección de entrega -->

      <div class="container-carrito">
        <h3 class="mb-4">Detalles de su compra</h3>
        <div class="table-responsive">
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
        </div>
    </div>
        <div class="form-subheader">
          Método de Pago
      </div>
      <div class="row">
          <div class="col-md-4">
              <label class="form-label">Selecciona el método de pago</label>
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="metodoPago" id="pagoTarjeta" value="PagoNormal" required>
                  <label class="form-check-label" for="pagoTarjeta">
                      <i class="fas fa-credit-card"></i> Pago con Tarjeta
                  </label>
              </div>
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="metodoPago" id="pagoEfectivo" value="efectivo" required>
                  <label class="form-check-label" for="pagoEfectivo">
                      <i class="fas fa-money-bill"></i> Pago en Efectivo
                  </label>
              </div>
          </div>
      </div>

      <!-- Detalles de Tarjeta de Crédito (visible si se selecciona Pago con Tarjeta) -->
      <div class="row mt-4" id="tarjetaDetails" style="display: none">
        <div class="col-md-4">
            <label for="titularTarjeta" class="form-label">Titular de la Tarjeta</label>
            <input type="text" class="form-control" name="titularTarjeta" id="titularTarjeta" required>
              <div class="invalid-feedback">
                Ingrese el titular de la tarjeta
              </div>
        </div>
        <div class="col-md-4">
            <label for="numeroTarjeta" class="form-label">Número de Tarjeta</label>
            <input type="text" class="form-control" name="numeroTarjeta" id="numeroTarjeta" required>
              <div class="invalid-feedback">
                Ingrese el numero de la tarjeta
              </div>
        </div>
        <div class="col-md-4">
            <label for="mesVencimiento" class="form-label">Mes de Vencimiento</label>
            <input type="text" class="form-control" name="mesVencimiento" id="mesVencimiento" required>
              <div class="invalid-feedback">
                Ingrese el mes de vencimiento
              </div>
        </div>
        <div class="col-md-4">
            <label for="anoVencimiento" class="form-label">Año de Vencimiento</label>
            <input type="text" class="form-control" name="anoVencimiento" id="anoVencimiento" required>
              <div class="invalid-feedback">
                ingrese el año de vencimiento
              </div>
        </div>
        <div class="col-md-4">
            <label for="cvc" class="form-label">CVC</label>
            <input type="text" class="form-control" name="cvc" id="cvc" required>
              <div class="invalid-feedback">
                Ingrese el CVC
              </div>
        </div>
    </div>
    <div id="total-price">
        Total de productos: $<span id="total-amount" name="monto">0.00</span>
    </div>

      <!-- Botón de envío -->
      <div class="col-12 mt-4">
        <button id="submitButton" class="btn btn-primary" type="submit"><i class="fas fa-shopping-cart"></i> Enviar formulario</button>
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
