$(document).ready(function() {
    llenarSelectIdentificacion();
    llenarTablaCarrita();
});

(() => {
    'use strict'

    const submitButton = document.getElementById('submitButton');

    submitButton.addEventListener('click', event => {
      event.preventDefault();

      const form = submitButton.closest('form');

      if (!form.checkValidity()) {
        event.stopPropagation();
        form.classList.add('was-validated');
      }
    }, false);
  })();

function llenarSelectIdentificacion() {
    $.ajax({
        url: '/obtenerIdentificacion',
        type: 'GET',
        dataType: 'JSON',
        success: function(response){
            if (response.resultado === 'OK') {
                var select = $('#validationCustom04');

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
