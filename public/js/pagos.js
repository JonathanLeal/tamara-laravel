$(document).ready(function() {
    llenarSelectIdentificacion();
    llenarTablaCarrita();
    llenarSelectAgencias();
    // Al cargar la página, muestra los campos de Método de Entrega seleccionado
  showEntregaFields();

  // Cuando se cambie la selección de Método de Entrega
  $('input[name="entrega"]').change(function () {
    showEntregaFields();
  });

  // Cuando se cambie la selección de Método de Pago
  $('input[name="metodoPago"]').change(function () {
    var selectedMetodoPago = $('input[name="metodoPago"]:checked').val();
    if (selectedMetodoPago === "PagoNormal") {
      $('#tarjetaDetails').show();
    } else {
      $('#tarjetaDetails').hide();
    }
  });

  // Función para mostrar los campos de Método de Entrega seleccionado
  function showEntregaFields() {
    var selectedEntrega = $('input[name="entrega"]:checked').val();

    if (selectedEntrega === "domicilio") {
      $('#entregaDomicilioInputs').show();
      $('#entregaPuntoInputs').hide();
    } else if (selectedEntrega === "punto_entrega") {
      $('#entregaDomicilioInputs').hide();
      $('#entregaPuntoInputs').show();
    }
  }

  // Función para mostrar los detalles de Tarjeta de Crédito si se selecciona ese método de pago
  function showMetodoPagoFields() {
    var selectedMetodoPago = $('input[name="metodoPago"]:checked').val();

    if (selectedMetodoPago === "tarjeta") {
      $('#tarjetaDetails').show();
    } else {
      $('#tarjetaDetails').hide();
    }
  }
});

// (() => {
//     'use strict'

//     const submitButton = document.getElementById('submitButton');

//     submitButton.addEventListener('click', event => {
//       event.preventDefault();

//       const form = submitButton.closest('form');

//       if (!form.checkValidity()) {
//         event.stopPropagation();
//         form.classList.add('was-validated');
//       }
//     }, false);
//   })();

function llenarSelectIdentificacion() {
    $.ajax({
        url: '/obtenerIdentificacion',
        type: 'GET',
        dataType: 'JSON',
        success: function(response){
            if (response.resultado === 'OK') {
                var select = $('#tipo_doc');

                select.empty();
                select.append('<option selected disabled value="">Seleccione...</option>');

                $.each(response.datos, function(index, item) {
                    select.append('<option value="' + item.id + '">' + item.documento + '</option>');
                });
            } else {
                console.log('Error en la respuesta de la API');
            }
        },
        error: function(error){
            console.log(error);
        }
    });
}

function llenarSelectAgencias() {
    $.ajax({
        url: '/obtenerAgencias',
        type: 'GET',
        dataType: 'JSON',
        success: function(response) {
            if (response.resultado === 'OK') {
                var select = $('#agencias');
                var infoAgenciaDiv = $('#info-agencia');

                select.empty();
                select.append('<option selected disabled value="">Seleccione...</option>');

                $.each(response.datos, function(index, item) {
                    select.append('<option value="' + item.id + '">' + item.nombre_agencia + '</option>');
                });

                select.on('change', function() {
                    var selectedAgencia = select.val();
                    if (selectedAgencia) {
                        $.ajax({
                            url: '/infoAgencias/' + selectedAgencia,
                            type: 'GET',
                            dataType: 'JSON',
                            success: function(info) {
                                if (info.resultado === 'OK') {
                                    var agenciaInfo = info.datos;
                                    infoAgenciaDiv.show();
                                    $('#nombre_agencia').text('Nombre: ' + agenciaInfo.nombre_agencia);
                                    $('#telefono').text('Teléfono: ' + agenciaInfo.telefono);
                                    $('#email').text('Email: ' + agenciaInfo.email);
                                    $('#direccion').text('Dirección: ' + agenciaInfo.direccion);
                                    $('#ciudad').text('Ciudad: ' + agenciaInfo.ciudad);
                                }
                            },
                            error: function(error) {
                                console.log(error);
                            }
                        });
                    } else {
                        infoAgenciaDiv.hide();
                    }
                });
            } else {
                console.log('Error en la respuesta de la API');
            }
        },
        error: function(error) {
            console.log(error);
        }
    });
}


function llenarTablaCarrita() {
    $.ajax({
        url: 'api/auth/productosEnCarrito',
        type: 'GET',
        dataType: 'json',
        headers: {
            'Authorization': 'Bearer ' + localStorage.getItem('access_token')
        },
        success: function(data) {
            if (data.resultado === 'OK') {
                var items = data.datos;

                $("#cart-items-list").empty();

                $.each(items, function(index, item) {
                    var newRow = '<tr>' +
                        '<td>' + item.nombre_producto + '</td>' +
                        '<td><img src="' + item.imagen + '" alt="' + item.nombre_producto + '" class="product-image"></td>' +
                        '<td>' + item.cantidad + '</td>' +
                        '<td>' + item.nombre_talla + '</td>' +
                        '<td>' + item.nombre_color + '</td>' +
                        '<td>$' + item.total + '</td>' +
                        '<td><button onclick="eliminarDelCarrito('+item.id+', event)" class="btn btn-remove"><i class="fa fa-trash"></i></button></td>' +
                        '</tr>';
                        $('#cart-items-list').append(newRow);
                    });

                var total = 0;
                $.each(items, function(index, item) {
                    total += parseFloat(item.total);
                });
                $('#total-amount').text(total.toFixed(2));
            }
        },
        error: function(error) {
            if (error.status === 404) {
                $("#cart-items-list").empty();
                $("#cart-items-list").html("<td>No tienes productos en tu carrito</td>");
            } else {
                if (error.status === 401) {
                    Swal.fire(
                        'Notificacion',
                        'Tu session a expirado por favor vuelva iniciar sesion',
                        'error'
                    ).then(() => {
                        window.location.href = '/iniciar-sesion';
                    });
                }
            }
        }
    });
}

function eliminarDelCarrito(id, event) {
    event.preventDefault();
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
                        llenarTablaCarrita();
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

$("#submitButton").on("click", function(event) {
    event.preventDefault();
    console.log("click");
    $.ajax({
        url: '/token', // Endpoint para obtener el token
        type: 'POST',
        dataType: 'JSON',
        success: function(response) {
            console.log(response.datos.access_token);
            if (response.datos.access_token) {
                // Si se obtiene el token con éxito, lo puedes usar para realizar la compra
                var token = response.datos.access_token;
                var formData = {
                    tarjetaCreditoDebido: {
                        numeroTarjeta: $('#numeroTarjeta').val(),
                        cvv: $('#cvc').val(),
                        mesVencimiento: parseInt($('#mesVencimiento').val()), // Convertir a entero
                        anioVencimiento: parseInt($('#anoVencimiento').val()), // Convertir a entero
                    },
                    monto: parseFloat($("#total-amount").text()), // Convertir a número decimal
                    emailCliente: $('#correo').val(),
                    nombreCliente: $('#nombres').val() + ' ' + $('#apellidos').val(),
                    formaPago: $('input[name="metodoPago"]:checked').val(),
                    configuracion: {
                        emailsNotificacion: $("#correo").val(),
                        urlWebhook: "https://tu-webhook-url.com",
                        telefonosNotificacion: $("#whatsApp").val(),
                        notificarTransaccionCliente: true
                    },
                    datosAdicionales: {
                        nombreProducto: "Nombre del Producto", // Asegúrate de incluir el nombre del producto
                        additionalProp2: "Valor 2",
                        additionalProp3: "Valor 3"
                    }
                };

                $.ajax({
                    url: '/transaccionCompra', // Ruta a tu endpoint en Laravel
                    type: 'POST',
                    dataType: 'JSON',
                    data: formData,
                    headers: {
                        'Authorization': 'Bearer ' + token // Agrega el token como encabezado de autorización
                    },
                    success: function(data) {
                        console.log(formData);
                        Swal.fire(
                            'Notificacion',
                            'Compra realizada con éxito',
                            'success'
                        )
                    },
                    error: function(error) {
                        console.log(formData);
                        console.log("Error en guardar: " + error);
                    }
                });
            } else {
                console.log("Error al obtener el token");
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log("Error en la solicitud: " + textStatus, errorThrown);
        }
    });
});
