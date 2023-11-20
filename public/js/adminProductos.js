$(document).ready(function() {
    llenarSelects();
    cargarDatos();

    $("#btnGuardar").on("click", function() {
        var formulario = new FormData(document.getElementById("formularioProducto"));

        $.ajax({
            url: "/api/auth/guardarProducto",
            type: "POST",
            dataType: "JSON",
            data: formulario,
            processData: false,
            contentType: false,
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('access_token')
            },
            success: function(response) {
                if (response.resultado === 'OK') {
                    Swal.fire(
                        'Notificacion',
                        '¡Producto guardado con éxito!',
                        'success'
                    ).then(() => {
                        cargarDatos();
                        limpiarCampos();
                    });
                }
            },
            error: function(error) {
                console.log(formulario);
                if (error.status === 404) {
                    Swal.fire(
                        'Notificacion',
                        'Producto no encontrado',
                        'warning'
                    );
                } else {
                    if (error.status === 422) {
                        Swal.fire(
                            'Notificacion',
                            'Verifica que todos los datos estén llenos y escritos correctamente',
                            'warning'
                        );
                    }
                }
            }
        });
    });
});

var idProducto = null;

function cargarDatos() {
    $.ajax({
      url: '/api/auth/obtenerProductos',
      type: 'GET',
      dataType: 'json',
      headers: {
        'Authorization': 'Bearer ' + localStorage.getItem('access_token')
      },
      success: function(response) {
        // Limpia la tabla si ya existe un DataTable
        if ($.fn.DataTable.isDataTable('#tabla-productos')) {
          $('#tabla-productos').DataTable().destroy();
          $('#tabla-productos tbody').empty();
        }

        $.each(response.datos, function(index, producto) {
            var fila = '<tr>' +
                '<td>' + producto.id + '</td>' +
                '<td><img src="' + producto.imagen + '" alt="imagen-producto" width="100" height="100"></td>' +
                '<td>' + producto.nombre_producto + '</td>' +
                '<td>' + producto.estilo + '</td>' +
                '<td>' + producto.sku + '</td>' +
                '<td>' + producto.categoria + '</td>' +
                '<td>' + producto.sub_categoria + '</td>' +
                '<td>' +
                '<button type="button" data-bs-toggle="modal" data-bs-target="#privilegiosModal" class="btn btn-info" onclick="seleccionar(' + producto.id + ')"><i class="fas fa-eye"></i></button>' +
                '<button type="button" class="btn btn-danger" onclick="eliminar(' + producto.id + ')"><i class="fa fa-trash" aria-hidden="true"></i></button>' +
                '</td>' +
                '</tr>';

            $('#tabla-productos tbody').append(fila);
        });

        // Inicializa el DataTable
        $('#tabla-productos').DataTable();
      },
      error: function(xhr, status, error) {
        console.log(xhr.responseText);
      }
    });
  }

  function seleccionar(id) {
    idProducto = id;
    $("#btnGuardar").hide();
    $("#btnEditar").show();
    llenarSelects();
    $.ajax({
        url: "/api/auth/obtenerProducto/"+id,
        type: "GET",
        dataType: "JSON",
        headers: {
            'Authorization': 'Bearer ' + localStorage.getItem('access_token')
        },
        success: function(response) {
            if (response.resultado === 'OK') {
                $('#nombre_producto').val(response.datos.nombre_producto);
                $('#existencia').val(response.datos.existencia);
                $('#precio_1').val(response.datos.precio_1);
                $('#precio_2').val(response.datos.precio_2);
                $('#precio_3').val(response.datos.precio_3);
                $('#precio_4').val(response.datos.precio_4);
                $('#estilo').val(response.datos.estilo);
                $('#detalles').val(response.datos.detalles);
                $('#escote').val(response.datos.escote);
                $('#longitud_manga').val(response.datos.longitud_manga);
                $('#tejido').val(response.datos.tejido);
                $('#instrucciones_cuidado').val(response.datos.instrucciones_cuidado);
                $('#SKU').val(response.datos.sku);
                $('#composicion').val(response.datos.composicion);
                // $('#categoria').val(response.datos.nombre_categoria);
                // $('#sub_categoria').val(response.datos.nombre_sub_categoria);
                $("#labelImagen").hide();
                $('#imagen').hide();

                var catValue = response.datos.nombre_categoria;
                var catId = response.datos.idCat;

                var SubCatValue = response.datos.nombre_sub_categoria;
                var SubCatId = response.datos.subCat;

                $('#categoria').val(catId);
                $('#sub_categoria').val(SubCatId);

                if ($('#categoria option[value="' + catId + '"]').length === 0) {
                    $('#categoria').append($('<option>', {
                        value: catId,
                        text: catValue
                    }));
                }

                // Append the option if it doesn't already exist
                if ($('#sub_categoria option[value="' + SubCatId + '"]').length === 0) {
                    $('#sub_categoria').append($('<option>', {
                        value: SubCatId,
                        text: SubCatValue
                    }));
                }
            }
        },
        error: function(error) {
            if (error.status === 404) {
                Swal.fire(
                    'Notificacion',
                    'productos no encontrado',
                    'warning'
                );
            } else {
                if (error.status === 500) {
                    Swal.fire(
                        'Notificacion',
                        'A ocurrido un error, contáctese con nosotros',
                        'error'
                    );
                }
            }
        }
    });
}

function eliminar(id) {
    Swal.fire({
        title: 'Eliminar!',
        text: "¿Estas seguro de eliminar este usuario?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'SI!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/api/auth/eliminarProducto/"+id,
                type: "POST",
                dataType: "JSON",
                success: function(response) {
                    console.log(response);
                    Swal.fire(
                        'Eliminado!',
                        'El usuario se ha eliminado con exito',
                        'success'
                    )
                    cargarDatos();
                },
                error: function(error) {
                    console.log(error);
                }
            })
        }
    })
}

function llenarSelects() {
    $.ajax({
        url: '/api/auth/listarCatYsubCat',
        type: 'GET',
        dataType: 'json',
        headers: {
            'Authorization': 'Bearer ' + localStorage.getItem('access_token')
        },
        success: function(data) {
            if (data.resultado === 'OK') {
                var categoriaSelect = $('#categoria');
                categoriaSelect.empty(); // Borra las opciones existentes
                $.each(data.datos.categorias, function(index, categoria) {
                    categoriaSelect.append($('<option>', {
                        value: categoria.id,
                        text: categoria.nombre_categoria
                    }));
                });

                var subCategoriaSelect = $('#sub_categoria');
                subCategoriaSelect.empty(); // Borra las opciones existentes
                $.each(data.datos.sub, function(index, subCategoria) {
                    subCategoriaSelect.append($('<option>', {
                        value: subCategoria.id,
                        text: subCategoria.nombre_sub_categoria
                    }));
                });
            }
        },
        error: function(error) {
            console.error(error);
        }
    });
}

$('#btnEditar').on('click', function() {
    var formularioProducto = new FormData(document.getElementById("formularioProducto"));

    $.ajax({
        url: "/api/auth/editarProducto/"+idProducto,
        type: 'POST',
        dataType: 'json',
        data: formularioProducto,
        processData: false,
        contentType: false,
        headers: {
            'Authorization': 'Bearer ' + localStorage.getItem('access_token')
        },
        success: function(response) {
            console.log(response.sub_categoria);
            if (response.resultado === 'OK') {
                Swal.fire(
                    'Notificacion',
                    '¡Producto editado con éxito!',
                    'success'
                ).then(() => {
                    cargarDatos();
                    limpiarCampos();
                });
            }
        },
        error: function(error) {
            console.log(error);
            if (error.status === 422) {
                Swal.fire(
                    'Notificacion',
                    'Verifica que todos los datos estén llenos y escritos correctamente',
                    'warning'
                );
            } else if (error.status === 500) {
                Swal.fire(
                    'Notificacion',
                    'Ha ocurrido un error, contáctese con nosotros',
                    'error'
                );
            }
        }
    });
});


function limpiarCampos() {
    $('#nombre_producto').val("");
    $('#existencia').val(""),
    $('#precio_1').val("");
    $('#precio_2').val("");
    $('#precio_3').val("");
    $('#precio_4').val("");
    $('#estilo').val("");
    $('#detalles').val("");
    $('#escote').val("");
    $('#longitud_manga').val("");
    $('#tejido').val("");
    $('#instrucciones_cuidado').val("");
    $('#SKU').val("");
    $("#categoria").val("");
    $("#sub_categoria").val("");
    $("#imagen").val("");
}
