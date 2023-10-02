$(document).ready(function() {
    const urlParams = new URLSearchParams(window.location.search);
    const productId = urlParams.get('id');

    // Llamar a la función para obtener la información del producto con el ID obtenido
    obtenerInfoProductos(productId);
    // Controlador de eventos para cambiar la imagen principal al colocar el puntero sobre miniaturas
    $(document).on("mouseover", ".product-thumbnails img", function() {
        var newImageSrc = $(this).attr("src");
        $("#imagenProducto img").attr("src", newImageSrc);
    });
});

function obtenerInfoProductos(id) {
    $.ajax({
        url: 'http://127.0.0.1:8000/infoProducto/'+id,
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

$("#btnAgregarCarrito").on("click", function() {
    $.ajax({
        url: '/api/auth/infoProductoCarrito/'+1,
        type: 'GET',
        dataType: 'JSON',
        headers: {
            'Authorization': 'Bearer ' + localStorage.getItem('access_token')
        },
        success: function(response) {
            // Verificar si la respuesta contiene datos válidos
            if (response.resultado === "OK") {
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

                // Insertar los select en el modal
                $("#select").html(selectColores + selectTallas);

                // Mostrar el modal
                $("#carritoModal").show();
            } else {
                console.log("No se pudo obtener la información del producto.");
            }
        },
        error: function(error) {
            console.log(error);
        }
    });
});

// Función para cerrar el modal
function closeModal() {
    $("#carritoModal").hide();
}
