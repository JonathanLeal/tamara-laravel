$(document).ready(function () {
    // Obtén los parámetros de categoría y subcategoría de la URL
    const urlParams = new URLSearchParams(window.location.search);
    let cat = urlParams.get('cat');
    let subCat = urlParams.get('subCat');

    // Llama a la función para cargar productos con los parámetros obtenidos
    cargarProductos(cat, subCat);

    $(document).on('click', '.add-to-cart-button', function () {
        // Obtenemos el id del producto desde el atributo data-product-id
        const productId = $(this).data('product-id');

        // Redireccionamos a la vista de producto con el id del producto
        window.location.href = `/producto?id=${productId}`;
    });

    // Manejar el evento de clic en los enlaces de la categoría
    $(".dropdown-menu a").on("click", function () {
        cat = $(this).data("cat");
        subCat = $(this).data("subcat");

        // Llama a la función para cargar productos con los nuevos parámetros
        cargarProductos(cat, subCat);
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

      numeroProductosEnCarrito();
  });

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

function obtenerTodosProductosCategoria(cat) {
    $.ajax({
        url: '/productosPorCategoria/'+cat,
        type: 'GET',
        dataType: 'JSON',
        success: function(response){
            if (response.resultado == 'OK') {
                var productos = response.datos.productosCat;
                var colores = response.datos.colores;
                var html = '';
                $.each(productos, function (index, producto) {
                    var cardHtml = `
                        <div class="col-md-4">
                            <div class="card">
                                <img class="card-img-top" src="${producto.imagen}" alt="${producto.nombre_producto}">
                                <div class="card-body">
                                    <h4 class="card-title">${producto.nombre_producto}</h4>
                                    <p class="card-text">Categoria: ${producto.nombre_categoria}</p>
                                    <p class="card-text">Sub categoria: ${producto.nombre_sub_categoria}</p>
                                    <p class="card-text">Estilo: ${producto.estilo}</p>
                                    <p class="product-price">SKU: ${producto.sku}</p>
                                    <div class="color-balls">
                                    </div>
                                    <button class="add-to-cart-button add-to-cart-button-hidden" data-product-id="${producto.id}">Agregar al carrito</button>
                                </div>
                            </div>
                        </div>
                    `;
                    $('#productos').append(cardHtml);

                    // Obtener los colores del producto actual
                    var coloresProducto = colores.filter(color => color.nombre_producto === producto.nombre_producto);

                    // Mostrar los colores como bolitas pequeñas
                    var colorBallsContainer = $(`#productos .card-body .color-balls`).last();
                    coloresProducto.slice(0, 3).forEach(color => {
                      var colorBall = `<span class="color-ball" style="background-color: ${color.color_fondo}"></span>`;
                      colorBallsContainer.append(colorBall);
                    });

                    if (coloresProducto.length > 3) {
                      colorBallsContainer.append(`<span class="color-text">+${coloresProducto.length - 3} más</span>`);
                    }
                });

                // Agrega eventos de mouseenter y mouseleave para mostrar y ocultar el botón al pasar el cursor
                $('.card').on('mouseenter', function () {
                    $(this).find('.add-to-cart-button').removeClass('add-to-cart-button-hidden');
                }).on('mouseleave', function () {
                    $(this).find('.add-to-cart-button').addClass('add-to-cart-button-hidden');
                });
            }
        },
        error: function(error){
            if (error.status === 404) {
                Swal.fire({
                    title: 'Lo sentimos tanto',
                    text: "De momento no tenemos productos para esta categoria, puedes buscar otras.",
                    icon: 'warning',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Regresar'
                  }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '/';
                    }
                  })
            }
        }
    });
}

function cargarProductos(cat, subCat) {
    // Elimina los productos anteriores del contenedor
    $('#productos').empty();

    // Oculta todos los botones "Agregar al carrito"
    $('.add-to-cart-button').addClass('add-to-cart-button-hidden');

    $.ajax({
        url: `/subCategoriasProductos/${cat}/${subCat}`,
        type: 'GET',
        dataType: 'json',
        success: function (response) {
          if (response.resultado == 'OK') {
            var productos = response.datos.producto;
            var colores = response.datos.colores;

            $.each(productos, function (index, producto) {
                var cardHtml = `
                    <div class="col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="${producto.imagen}" alt="${producto.nombre_producto}">
                            <div class="card-body">
                                <h4 class="card-title">${producto.nombre_producto}</h4>
                                <p class="card-text">${producto.detalles}</p>
                                <p class="card-text">Estilo: ${producto.estilo}</p>
                                <p class="product-price">SKU: ${producto.sku}</p>
                                <div class="color-balls">
                                </div>
                                <button class="add-to-cart-button add-to-cart-button-hidden" data-product-id="${producto.id}">Agregar al carrito</button>
                            </div>
                        </div>
                    </div>
                `;

                $('#productos').append(cardHtml);

                // Obtener los colores del producto actual
                var coloresProducto = colores.filter(color => color.nombre_producto === producto.nombre_producto);

                // Mostrar los colores como bolitas pequeñas
                var colorBallsContainer = $(`#productos .card-body .color-balls`).last();
                coloresProducto.slice(0, 3).forEach(color => {
                    var colorBall = `<span class="color-ball" style="background-color: ${color.color_fondo}"></span>`;
                    colorBallsContainer.append(colorBall);
                });

                if (coloresProducto.length > 3) {
                    colorBallsContainer.append(`<span class="color-text">+${coloresProducto.length - 3} más</span>`);
                }
            });

                // Agrega eventos de mouseenter y mouseleave para mostrar y ocultar el botón al pasar el cursor
                $('.card').on('mouseenter', function () {
                    $(this).find('.add-to-cart-button').removeClass('add-to-cart-button-hidden');
                }).on('mouseleave', function () {
                    $(this).find('.add-to-cart-button').addClass('add-to-cart-button-hidden');
                });
            }
        },
        error: function (xhr) {
            if (xhr.status === 404) {
                Swal.fire({
                    title: 'Oopss...',
                    text: "Lo sentimos mucho, por el momento no hay productos para esa seccion, te mostraremos los disponibles.",
                    icon: 'warning',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Continuar'
                  }).then((result) => {
                        if (result.isConfirmed) {
                            obtenerTodosProductosCategoria(cat);
                        }
                  })
            }
        }
    });
}

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
                    ).then(() => {
                        window.location.href = `/`;
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
                var rutaUsuarios = '/';
                var rutaProductos = '/';
  
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
  