$(document).ready(function() {
    cargarDatos();
    llenarSelectRoles();
});

var idUsuario = null;

function cargarDatos() {
    $.ajax({
      url: '/api/auth/obtenerUsuarios',
      type: 'GET',
      dataType: 'json',
      headers: {
        'Authorization': 'Bearer ' + localStorage.getItem('access_token')
      },
      success: function(response) {
        // Limpia la tabla si ya existe un DataTable
        if ($.fn.DataTable.isDataTable('#tabla-usuarios')) {
          $('#tabla-usuarios').DataTable().destroy();
          $('#tabla-usuarios tbody').empty();
        }

        $.each(response.datos, function(index, usuario) {
          var fila = '<tr>' +
                     '<td>' + usuario.id + '</td>' +
                     '<td>' + usuario.nombres + '</td>' +
                     '<td>' + usuario.apellidos + '</td>' +
                     '<td>' + usuario.correo + '</td>' +
                     '<td>' + usuario.sexo + '</td>' +
                     '<td>' + usuario.rol + '</td>' +
                     '<td>' +
                     '<button type="button" data-bs-toggle="modal" data-bs-target="#privilegiosModal" class="btn btn-info" onclick="seleccionar('+usuario.id+')"><i class="fas fa-eye"></i></button>' +
                     '<button type="button" class="btn btn-danger" onclick="eliminar('+usuario.id+')"><i class="fa fa-trash" aria-hidden="true"></i></button>' +
                     '</td>' +
                     '<td><button class="btn btn-warning" id="btnEstado" onclick="cambiarEstado('+ usuario.id+ ')">'+ usuario.estado +'</button></td>'
                     '</tr>';

          $('#tabla-usuarios tbody').append(fila);
        });

        // Inicializa el DataTable
        $('#tabla-usuarios').DataTable();
      },
      error: function(xhr, status, error) {
        console.log(xhr.responseText);
      }
    });
  }


$("#btnGuardar").on("click", function() {
    var usuario = {
        nombres: $("#nombres").val(),
        apellidos: $("#apellidos").val(),
        correo: $("#correo").val(),
        pass: $("#pass").val(),
        sexo: $("#sexo").val(),
        rol: $("#rol").val()
    }
    $.ajax({
        url: "/api/auth/guardarUsuario",
        type: "POST",
        dataType: "JSON",
        data: usuario,
        headers: {
            'Authorization': 'Bearer ' + localStorage.getItem('access_token')
        },
        success: function(response) {
            if (response.resultado === 'OK') {
                Swal.fire(
                    'Notificacion',
                    '¡Usuario Registrado con exito!',
                    'success'
                ).then(() => {
                    cargarDatos();
                    limpiarCampos();
                })
            }
        },
        error: function(error) {
            if (error.status === 404) {
                Swal.fire(
                    'Notificacion',
                    'Usuario no encontrado',
                    'warning'
                )
            } else {
                if (error.status === 422) {
                    Swal.fire(
                        'Notificacion',
                        'Verifica que todos los datos esten llenos y escritos correctamente',
                        'warning'
                    );
                }
            }
        }
    });
});

function eliminar(id) {
    Swal.fire({
        title: 'Eliminar!',
        text: "Estas seguro de eliminar este usuario?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'SI!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/api/auth/eliminarUsuario/"+id,
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

function seleccionar(id) {
    idUsuario = id;
    $("#btnGuardar").hide();
    $("#btnEditar").show();
    $.ajax({
        url: "/api/auth/obtenerUsuario/"+id,
        type: "GET",
        dataType: "JSON",
        headers: {
            'Authorization': 'Bearer ' + localStorage.getItem('access_token')
        },
        success: function(response) {
            if (response.resultado === 'OK') {
                console.log(response.datos);
                $('#nombres').val(response.datos[0].nombres);
                $('#apellidos').val(response.datos[0].apellidos);
                $('#correo').val(response.datos[0].correo);
                $('#pass').val("Este campo no se puede editar");
                $('#sexo').val(response.datos[0].sexo);

                // Obtener el valor del campo "rol" en la respuesta JSON
                var rolValue = response.datos[0].rol;
                var rolId = response.datos[0].id_rol;

                // Establecer el valor seleccionado en el select de rol
                $('#rol').val(rolId);

                // Si el valor no coincide con ninguna opción, agregar una nueva opción
                if ($('#rol').val() === null) {
                    $('#rol').append($('<option>', {
                        value: rolId,
                        text: rolValue
                    }));
                    $('#rol').val(rolValue);
                }
            }
        },
        error: function(error) {
            if (error.status === 404) {
                Swal.fire(
                    'Notificacion',
                    'Usuario no encontrado',
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



$("#btnCancelar").on("click", function() {
    $("#nombre_privilegio").val("");
    $("#btnGuardar").show();
    $("#btnEditar").hide();
})

$('#btnEditar').on('click', function() {
    var usuario = {
        id: idUsuario,
        nombres: $("#nombres").val(),
        apellidos: $("#apellidos").val(),
        correo: $("#correo").val(),
        sexo: $("#sexo").val(),
        rol: $("#rol").val()
    }

    $.ajax({
        url: "/api/auth/editarUsuario",
        type: 'POST',
        dataType: 'json',
        data: usuario,
        headers: {
            'Authorization': 'Bearer ' + localStorage.getItem('access_token')
        },
        success: function(response) {
            if (response.resultado === 'OK') {
                Swal.fire(
                    'Notificacion',
                    '¡Usuario wditado con exito!',
                    'success'
                ).then(() => {
                    cargarDatos();
                    limpiarCampos();
                })
            }
        },
        error: function(error) {
            if (error.status === 422) {
                Swal.fire(
                    'Notificacion',
                    'Verifica que todos los datos esten llenos y escritos correctamente',
                    'warning'
                )
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
});

function llenarSelectRoles() {
    $.ajax({
        url: '/api/auth/obtenerRoles',
        type: 'GET',
        dataType: 'json',
        headers: {
            'Authorization': 'Bearer ' + localStorage.getItem('access_token')
        },
        success: function(data) {
            $.each(data, function(index, item) {
                $('#rol').append($('<option>', {
                    value: item.id,
                    text: item.rol
                }));
            });
        },
        error: function() {
            console.error('Error al cargar los datos.');
        }
    });
}

function limpiarCampos() {
    $("#nombres").val(""),
    $("#apellidos").val(""),
    $("#correo").val(""),
    $("#pass").val(""),
    $("#sexo").val(""),
    $("#rol").val("")
}

function cambiarEstado(id) {
    Swal.fire({
        title: 'Cambio de estado',
        text: "¿Estas seguro que deseas cambiar el estado de este usuario?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'SI!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/api/auth/cambiarEstado",
                type: "POST",
                dataType: "JSON",
                data:{id: id},
                success: function(response) {
                    if (response.resultado === 'OK') {
                        Swal.fire(
                            '¡Exito!',
                            'Estado de usuario cambiado con exito',
                            'success'
                        ).then(() => {
                            cargarDatos();
                        })
                    }
                },
                error: function(error) {
                    if (error.status === 500) {
                        Swal.fire(
                            '¡Notificacion!',
                            'A ocurrido un erro por favor contactese con nosotros',
                            'error'
                        )
                    } else {
                        if (error.status === 422) {
                            Swal.fire(
                                '¡Notificacion!',
                                'A ocurrido un erro por favor contactese con nosotros',
                                'error'
                            )
                        }
                    }
                }
            })
        }
    })
}
