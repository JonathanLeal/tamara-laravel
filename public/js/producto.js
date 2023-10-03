$(document).ready(function() {
    const urlParams = new URLSearchParams(window.location.search);
    const productId = urlParams.get('id');

    obtenerInfoProductos(productId);
    guardarAlCarrito(productId);

    // Controlador de eventos para cambiar la imagen principal al colocar el puntero sobre miniaturas
    $(document).on("mouseover", ".product-thumbnails img", function() {
        var newImageSrc = $(this).attr("src");
        $("#imagenProducto img").attr("src", newImageSrc);
    });
});

let cartCount = 0;

// Función para actualizar el contador del carrito
function updateCartCount() {
    const cartCountElement = $('.cart-count');
    cartCountElement.text(cartCount.toString());
}

// Llamada inicial para establecer el contador
updateCartCount();


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

const cartIcon = $('#cart-icon');
const cartModal = $('#cart-modal');
const closeCartModal = $('#close-cart-modal');
const closeButton = $('#close-button');

// Agregar evento de clic para abrir el modal
cartIcon.click(function () {
    $.ajax({
        url: '/api/auth/productosEnCarrito/'+5,
        type: 'GET',
        dataType: 'JSON',
        headers: {
            'Authorization': 'Bearer ' + localStorage.getItem('access_token')
        },
        success: function(response){
            if (response.resultado === 'OK') {
                const modalBody = $('#cart-items-list');
                modalBody.empty();
                let totalPrice = 0;

                // Iterar sobre los datos y construir la tabla de productos
                response.datos.forEach(function (producto) {
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
                        </tr>`;
                    modalBody.append(row);
                    totalPrice += parseFloat(producto.total);
                });

                // Actualizar el total de la sumatoria
                $('#total-amount').text(totalPrice.toFixed(2));

                cartModal.addClass("show-modal");
            }
        },
        error: function(error){
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
            }
        }
    });
});

// Agregar evento de clic para cerrar el modal (botón "Cerrar")
closeButton.click(function () {
    cartModal.removeClass("show-modal");
});

// Agregar evento de clic para cerrar el modal (botón "X")
closeCartModal.click(function () {
    cartModal.removeClass("show-modal");
});

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
                $("#nombre_producto").html('Nombre: '+miniDetalles[0].nombre_producto);

                // sku del producto
                $("#sku").text('SKU: ' + miniDetalles[0].sku);

                // descripcion del producto
                $("#descripcion").text('Detalles: '+miniDetalles[0].detalles);

                // precio producto
                $("#precio").text('Precio: '+miniDetalles[0].precio_1);

                //existencia producto
                $("#existencia").text('Existencia: '+miniDetalles[0].existencia);

                $.each(colores, function(index, color){
                    var coloresHTML = `<span class="color-option" style="background-color: ${color.color_fondo};"></span>`;
                    $("#coloresDisponibles").append(coloresHTML);
                });

                $.each(tallas, function(index, talla){
                    var tallasHTML = `<span class="product-size">${talla.nombre_talla}</span>`;
                    $("#tallas_disponibles").append(tallasHTML);
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
            // Actualiza el encabezado con el nombre del usuario y los enlaces
            $("#user-nombre").text(response.datos.name);
            $(".dropdown-user").html('<li><a href="#">Mi Perfil</a></li><li><a href="#" id="btnCerrarSesion">Cerrar Sesión</a></li>');

            // Adjunta el evento click al botón "Cerrar Sesión" después de crearlo
            $("#btnCerrarSesion").on("click", function () {
                $.ajax({
                    url: '/api/auth/logout',
                    type: 'POST',
                    headers: {
                        'Authorization': 'Bearer ' + localStorage.getItem('access_token')
                    },
                    success: function(response){
                        Swal.fire({
                            title: '¿Estas seguro que deseas cerrar sesión?',
                            text: "Nos encanta tenerte con nosotros",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Si, cerrar',
                            cancelButtonText: 'No, no cerrar'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                Swal.fire(
                                    '¡Sesión cerrada!',
                                    'Gracias por preferirnos, ¡vuelve pronto!.',
                                    'success'
                                ).then(() => {
                                    window.location.href = '/iniciar-sesion';
                                })
                            }
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

function showModal() {
    var modal = document.getElementById("carritoModal");
    modal.style.display = "block";
}

function guardarAlCarrito(id) {
    $("#btnAgregarCarrito").on("click", function() {
        $.ajax({
            url: '/api/auth/infoProductoCarrito/'+id,
            type: 'GET',
            dataType: 'JSON',
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('access_token')
            },
            success: function(response) {
                // Verificar si la respuesta contiene datos válidos
                if (response.resultado === "OK") {
                    showModal();
                    // Actualizar la imagen, nombre, SKU y existencia
                    $("#productImage").attr("src", response.datos.producto[0].imagen);
                    $("#productName").text(response.datos.producto[0].nombre_producto);
                    $("#productSKU").text(response.datos.producto[0].sku);
                    $("#productExistence").text(response.datos.producto[0].existencia);

                    // Construir los select de colores y tallas
                    var selectColores = '<select id="selectColores">';
                    response.datos.colores.forEach(function(color) {
                        selectColores += '<option value="' + color.id + '">' + color.nombre_color + '</option>';
                    });
                    selectColores += '</select>';

                    var selectTallas = '<select id="selectTallas">';
                    response.datos.tallas.forEach(function(talla) {
                        selectTallas += '<option value="' + talla.id + '">' + talla.nombre_talla + '</option>';
                    });
                    selectTallas += '</select>';

                    $("#quantity").attr('max', response.datos.producto[0].existencia);

                    // Insertar los select en el modal
                    $("#selectColoresContainer").html(selectColores);
                    $("#selectTallasContainer").html(selectTallas);

                    // Mostrar el modal
                    $("#carritoModal").show();
                } else {
                    console.log("No se pudo obtener la información del producto.");
                }

            },
            error: function(error) {
                if (error.status === 401) {
                    closeModal();
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
                }
            }
        });
    });
}

// Función para cerrar el modal del carrito
function closeModal() {
    $("#carritoModal").hide();
}

$("#btnAddToCart").on("click", function() {
    const urlParams = new URLSearchParams(window.location.search);
    const productId = urlParams.get('id');

    var talla = $("#selectColores").val();
    var color = $("#selectTallas").val();
    var cantidad = $("#quantity").val();

    var productoGuardado = {
        producto: productId,
        talla: talla,
        color: color,
        cantidad: cantidad
    }

    $.ajax({
        url: '/api/auth/añadirProductoCarrito',
        type: 'POST',
        dataType: 'JSON',
        data: productoGuardado,
        headers: {
            'Authorization': 'Bearer ' + localStorage.getItem('access_token')
        },
        success: function (response) {
           if (response.resultado === 'OK') {
                closeModal();
                Swal.fire(
                    '¡Excelente!',
                    'Producto agregado al carrito',
                    'success'
                ).then(() => {
                    window.location.href = `/producto?`+productId;
                })
           }
        },
        error: function (error) {
            if (error.status === 500) {
                closeModal();
                Swal.fire(
                    '¡Oopss...!',
                    'Hay un error en el servidor, por favor contactese con nosotros',
                    'error'
                )
            }
        }
    });
});
