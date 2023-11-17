$(document).ready(function() {
    const urlParams = new URLSearchParams(window.location.search);
    const productId = urlParams.get('id');

    obtenerInfoProductos(productId);
    numeroProductosEnCarrito();

    // Controlador de eventos para cambiar la imagen principal al colocar el puntero sobre miniaturas
    $(document).on("mouseover", ".product-thumbnails img", function() {
        var newImageSrc = $(this).attr("src");
        $("#imagenProducto img").attr("src", newImageSrc);
    });

      const cartIcon = $('.fas.fa-shopping-cart'); // Cambiar el selector al nuevo icono
      const cartModal = $('#staticBackdrop');
      const closeButton = $('#close-button');
  
      // Agregar evento de clic para abrir el modal
      cartIcon.click(function () {
          $.ajax({
              url: '/api/auth/productosEnCarrito',
              type: 'GET',
              dataType: 'JSON',
              headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('access_token')
              },
              success: function (response) {
                console.log(response);
                  if (response.resultado === 'OK') {
                      const modalBody = $('#cart-items-list');
                      modalBody.empty();
                      let totalPrice = 0;
  
                      // Iterar sobre los datos y construir la tabla de productos
                      response.datos.forEach(function (producto) {
                          const id = producto.id;
                          const nombreProducto = producto.nombre_producto;
                          const precioTotal = parseFloat(producto.total).toFixed(2);
                          const imagen = `<img src="${producto.imagen}" alt="${nombreProducto}" width="50" height="50">`;
                          const talla = producto.nombre_talla;
                          const color = producto.nombre_color;
                          const row = `
                              <tr>
                                  <td>${nombreProducto}</td>
                                  <td>${imagen}</td>
                                  <td>${talla}</td>
                                  <td>${color}</td>
                                  <td>$${precioTotal}</td>
                                  <td><button id="eliminarCarrito" class="btn btn-outline-danger" onclick="eliminarDelCarrito(${id})"><i class="fa fa-trash"></i></button></td>
                              </tr>`;
                          modalBody.append(row);
                          totalPrice += parseFloat(producto.total);
                      });
  
                      // Actualizar el total de la sumatoria
                      $('#total-amount').text(totalPrice.toFixed(2));
  
                      cartModal.modal("show"); // Cambiado a método modal de Bootstrap
                  }
              },
              error: function (error) {
                  if (error.status === 401) {
                    const swalWithBootstrapButtons = Swal.mixin({
                      customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                      },
                      buttonsStyling: false
                    })
  
                    swalWithBootstrapButtons.fire({
                      title: 'Notificaciòn',
                      text: "Necesitamos que inicies sesiòn para que goces de todas nuestras opciones",
                      icon: 'info',
                      showCancelButton: true,
                      confirmButtonColor: '#212529',
                      cancelButtonColor: '#2980b9',
                      confirmButtonText: 'Iniciar sesion',
                      cancelButtonText: 'Registrarme',
                      reverseButtons: true
                    }).then((result) => {
                      if (result.isConfirmed) {
                        window.location.href = `/iniciar-sesion`;
                      } else if (
                        result.dismiss === Swal.DismissReason.cancel
                      ) {
                        window.location.href = `/registrarse`;
                      }
                    })
                  } else {
                    if (error.status === 404) {
                      Swal.fire(
                        'Notificacion',
                        'Aun no tienes productos en el carrito',
                        'warning'
                      );
                    }
                  }
              }
          });
      });
  
      closeButton.click(function () {
        cartModal.modal("hide"); // Cambiado a método modal de Bootstrap
      });
});

function menuRol() {
    $.ajax({
        url: 'api/auth/administrar', // La URL de tu endpoint
        type: 'GET',
        dataType: 'json',
        headers: {
            'Authorization': 'Bearer ' + localStorage.getItem('access_token')
        },
        success: function(data) {
            if (data.resultado === 'OK') {
                var userRole = data.datos;
  
                // Construye el elemento "Administrar" en función del rol del usuario
                var adminMenuItem = ''; // Inicializa la variable
                var rutaUsuarios ="";
                var rutaProductos = "";
  
                if (userRole === 1) {
                    adminMenuItem += '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-bs-toggle="dropdown" aria-expanded="false">Administrar</a>';
                    adminMenuItem += '<ul class="dropdown-menu" aria-labelledby="navbarDropdown4">';
                    adminMenuItem += '<li><a class="dropdown-item" href="'+rutaUsuarios+'">Usuarios</a></li>';
                    adminMenuItem += '<li><a class="dropdown-item" href="'+rutaProductos+'">Productos</a></li>';
                    adminMenuItem += '<li><a class="dropdown-item" href="#">Ofertas</a></li>';
                    adminMenuItem += '</ul>';
                } else if (userRole === 2) {
                    adminMenuItem += '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">Administrar</a>';
                    adminMenuItem += '<ul class="dropdown-menu" aria-labelledby="navbarDropdown4">';
                    adminMenuItem += '<li><a class="dropdown-item" href=" '+rutaProductos+'">Productos</a></li>';
                    adminMenuItem += '</ul>';
                }
  
                // Encuentra el elemento <li> por su ID y clase, y actualiza su contenido
                $('#menuRol').html(adminMenuItem);
            } else {
                console.error('Error al obtener el menú');
            }
        },
        error: function(xhr, status, error) {
            console.error('Error en la solicitud AJAX:', error);
        }
    });
  }

  menuRol();

function numeroProductosEnCarrito() {
    $.ajax({
      url: 'api/auth/contarProductosEnCarrito',
      type: 'GET',
      dataType: 'JSON',
      headers: {
        'Authorization': 'Bearer ' + localStorage.getItem('access_token')
      },
      success: function(response) {
      if (response.resultado === 'OK') {
        $(".cart-count").text(response.datos);
        $("#cerrarSesion").show();
        $("#iniciarSesion").hide();
        $("#registrarse").hide();
      }
      },
      error: function(error){
        console.log(error);
      }
    })
}

$("#search-button").on("click", function(event) {
    event.preventDefault();
  
    var nombre = $("#nombre_producto").val();
  
    var producto = {
      nombre_producto: nombre
    }
  
    $.ajax({
        url: '/buscarProducto',
        type: 'POST',
        dataType: 'JSON',
        data: producto,
        success: function(response) {
            if (response.resultado === 'OK') {
              window.location.href = `/producto?id=`+response.datos;
            }
        },
        error: function(error){
          if (error.status === 404) {
            Swal.fire(
              'Notificacion',
              'Lo sentimos no tenemos el producto que buscas por el momento',
              'warning'
            )
          } else {
            if (error.status === 422) {
              Swal.fire(
                'Notificacion',
                'Ingresa el nombre del producto en la barra de busqueda por favor',
                'warning'
              )
            }
        }
      }
    });
  });


// Función para manejar el click en el botón del acordeón
function toggleAccordion(index) {
    const accordions = $('.accordion');
    accordions.eq(index).toggleClass('active');
}

$('.accordion-button').each(function (index) {
    $(this).click(function () {
        toggleAccordion(index);
    });
});

function eliminarDelCarrito(id) {
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
                    )
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

function obtenerInfoProductos(id) {
    $.ajax({
        url: 'infoProducto/'+id,
        type: 'GET',
        dataType: 'JSON',
        success: function(response){
            if (response.resultado === 'OK'){
                var imagenes = response.datos.imagenes;
                var miniDetalles = response.datos.miniDetalles;
                var colores = response.datos.colores;
                var tallas = response.datos.tallas;
                var producto = response.datos.producto;
                var dimensiones = response.datos.dimensiones;

                var color = null;
                var talla = null;

                var imagenProducto = imagenes[0].imagenP; // Elige el primer elemento del array si solo esperas un elemento
                $("#imagenesProductos").html(`<img src="${imagenProducto}" alt="Thumbnail">`);

                $.each(imagenes, function(index, imagen){
                    var img = `<img src="${imagen.imagen}" alt="Thumbnail">`;
                    $("#imagenesProductos").append(img);
                });

                // imagen del producto
                var imagenProducto = miniDetalles[0].imagen; // Elige el primer elemento del array si solo esperas un elemento
                $("#imagenProducto").html(`<img id="main-image" src="${imagenProducto}" alt="Producto">`);

                // nombre del producto
                $("#nombre_product").text(miniDetalles[0].nombre_producto);

                // sku del producto
                $("#sku").text('SKU: ' + miniDetalles[0].sku);

                // descripcion del producto
                $("#descripcion").text('Detalles: '+miniDetalles[0].detalles);

                // // precio producto
                // $("#precio").text('Precio: '+miniDetalles[0].precio_1);

                // //existencia producto
                // $("#existencia").text('Existencia: '+miniDetalles[0].existencia);

                $.each(colores, function(index, color){
                    var coloresHTML = `<span class="color-option" style="background-color: ${color.color_fondo};" data-id="${color.id}"></span>`;
                    $("#coloresDisponibles").append(coloresHTML);
                });

                $.each(tallas, function(index, talla){
                    var tallasHTML = `<span class="product-size" data-id="${talla.id}">${talla.nombre_talla}</span>`;
                    $("#tallas_disponibles").append(tallasHTML);
                });

                $("#coloresDisponibles").on("click", ".color-option", function() {
                    $(".color-option").css("border-color", "#ccc");
                    $(this).css("border-color", "#ff4500");
                    color = $(this).data('id');
                
                    $.ajax({
                        url: '/cambiarInfo',
                        type: 'POST',
                        dataType: 'JSON',
                        data: {
                            producto: id,
                            color: color
                        },
                        success: function(response){
                            if (response.resultado === 'OK') {
                                $("#existencia").text('Existencia: '+response.datos[0].existencia);

                                $("#precio").text('Precio: $'+response.datos[0].precio);
                                
                                // Limpiar el contenedor de tallas antes de agregar las nuevas tallas
                                $("#tallas_disponibles").empty();
                
                                // Iterar a través de las tallas y agregarlas al contenedor
                                $.each(response.datos, function(index, talla){
                                    var tallasHTML = `<span class="product-size" data-id="${talla.talla_id}">${talla.nombre_talla}</span>`;
                                    $("#tallas_disponibles").append(tallasHTML);
                                });
                                var tallasDisponibles = response.datos.length;
                                if (tallasDisponibles == 2) {
                                    $("#precio").hide();
                                    $("#existencia").hide();

                                    $("#tallas_disponibles").on("click", ".product-size", function() {
                                        $(".product-size").removeClass("selected").addClass("deselected");
                                        $(this).removeClass("deselected").addClass("selected");
                                        talla = $(this).data('id'); 

                                        $.ajax({
                                            url: '/cambiarInfoTalla',
                                            type: 'POST',
                                            dataType: 'JSON',
                                            data: {
                                                producto: id,
                                                color: color,
                                                talla: talla
                                            },
                                            success: function(data){
                                                if (data.resultado === 'OK') {
                                                    console.log(data)
                                                    $("#existencia").text('Existencia: '+data.datos[0].existencia).show();
                                                    $("#precio").text('Precio: $'+data.datos[0].precio).show();
                                                }
                                            },
                                            error: function(error){
                                                console.log(error);
                                            }
                                        });
                                    });
                                }
                            }
                        },
                        error: function(error){
                            if (error.status === 404) {
                                $("#existencia").text('Existencia: ¡Agotado!');
                            }
                        }
                    });
                });

                $("#tallas_disponibles").on("click", ".product-size", function() {
                    $(".product-size").removeClass("selected").addClass("deselected");
                    $(this).removeClass("deselected").addClass("selected");
                    talla = $(this).data('id'); // Recupera el ID de la talla seleccionada
                });

                $("#btnAgregarCarrito").on("click", function () {
                    var cantidad = $("#quantity").val();
                    guardarEnCarrito(id, color, talla, cantidad);
                });

                $.each(producto, function(index, pro){
                    var proHTML = `<p>Estilo: ${pro.estilo}</p><br>
                                   <p>Detalles: ${pro.detalles}</p><br>
                                   <p>Escote: ${pro.escote}</p><br>
                                   <p>Longitud de manga: ${pro.longitud_manga}</p><br>
                                   <p>Tejido: ${pro.tejido}</p><br>
                                   <p>Composicion: ${pro.composicion}</p><br>
                                   <p>Instrucciones de cuidado: ${pro.instrucciones_cuidado}</p><br>`;
                    $("#acordeon_producto").append(proHTML);
                });

                    // Crear los encabezados de las tallas dinámicamente
                    var $tabla = $('#tablaMedidas');
                    var $encabezados = $tabla.find('thead tr');

                    $.each(dimensiones, function (index, talla) {
                        $encabezados.append('<th>' + talla.nombre_talla + '</th>');
                    });

                    // Llenar las medidas de pecho, largo y hombro dinámicamente
                    $.each(['pecho', 'largo', 'hombro'], function (index, medida) {
                        var $filaMedida = $tabla.find('tbody tr:eq(' + index + ')');

                        $.each(dimensiones, function (index, talla) {
                            $filaMedida.append('<td>' + talla[medida] + '</td>');
                        });
                });
            }
        },
        error: function(error){
            console.log(error);
        }
    });
}

function obtenerInformacionUsuario() {
    $.ajax({
        url: '/api/auth/me', // Endpoint para obtener la información del usuario autenticado
        type: 'POST',
        headers: {
          'Authorization': 'Bearer ' + localStorage.getItem('access_token')
        },
        success: function (response) {
            // Adjunta el evento click al botón "Cerrar Sesión" después de crearlo
            $("#cerrarSesion").on("click", function () {
                $.ajax({
                    url: '/api/auth/logout',
                    type: 'POST',
                    headers: {
                      'Authorization': 'Bearer ' + localStorage.getItem('access_token')
                    },
                    success: function(response){
                      Swal.fire(
                        'Notificacion',
                        'Session cerrada, vuelve pronto',
                        'success'
                      ).then(() => {
                        window.location.href = `/iniciar-sesion`;
                      })
                    },
                    error: function(error){
                        Swal.fire(
                          '¡Oopss...!',
                          'Hay un error en tu cierre de sesión, por favor intenta mas tarde.',
                          'error'
                        )
                    }
                });
            });
        },
        error: function (error) {
          console.log(error);
        }
    });
  }
  
  obtenerInformacionUsuario();

// Llamada para Agregar al Carrito
function guardarEnCarrito(id, color, talla) {
        var cantidad = $("#quantity").val();

            var pro = {
                producto: id,
                talla: talla,
                color: color,
                cantidad: cantidad
            };

            $.ajax({
                url: '/api/auth/añadirProductoCarrito',
                type: 'POST',
                dataType: 'JSON',
                data: pro,
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('access_token')
                },
                success: function (response) {
                    if (response.resultado === 'OK') {
                        Swal.fire(
                            'Notificación',
                            'Producto agregado con éxito al carrito',
                            'success'
                        ).then(() => {
                            window.location.href = '/producto?id=' + id;
                        })
                    }
                },
                error: function (error) {
                    if (error.status === 400) {
                        const swalWithBootstrapButtons = Swal.mixin({
                            customClass: {
                                confirmButton: 'btn btn-success',
                                cancelButton: 'btn btn-danger'
                            },
                            buttonsStyling: false
                        })

                        swalWithBootstrapButtons.fire({
                            title: 'Notificación',
                            text: "Necesitamos que inicies sesión para que disfrutes de todas nuestras opciones",
                            icon: 'info',
                            showCancelButton: true,
                            confirmButtonText: 'Iniciar sesión',
                            cancelButtonText: 'Registrarme',
                            reverseButtons: true
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = `/iniciar-sesion`;
                            } else if (result.dismiss === Swal.DismissReason.cancel) {
                                window.location.href = `/registrarse`;
                            }
                        })
                    }

                    if (error.status === 403) {
                        Swal.fire(
                            'Notificación',
                            'No puedes ingresar una cantidad mayor a la existencia actual del producto',
                            'warning'
                        )
                    }

                    if (error.status === 422) {
                        Swal.fire(
                            'Notificación',
                            'Debes seleccionar color, talla y enviar la cantidad por favor',
                            'warning'
                        )
                    }
                }
            });
        };

// Llamada para Comprar Ahora
// $("#btnComprarAhora").on("click", function () {
//     const urlParams = new URLSearchParams(window.location.search);
//     const productId = urlParams.get('id');
//     handleBotonAccion(productId, true);
// });

$("#buy-now-button").on("click", function () {
    window.location.href = '/facturacion';
})
