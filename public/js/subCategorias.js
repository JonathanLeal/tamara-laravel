$(document).ready(function () {
    // Obtén los parámetros de categoría y subcategoría de la URL
    const urlParams = new URLSearchParams(window.location.search);
    let cat = urlParams.get('cat');
    let subCat = urlParams.get('subCat');

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
                    var productos = response.datos;
                    var html = '';
                    $.each(productos, function (index, producto) {
                        var cardHtml = `
                            <div class="col-md-4">
                                <div class="card">
                                    <img class="card-img-top" src="${producto.imagen}" alt="${producto.nombre_producto}">
                                    <div class="card-body">
                                        <h4 class="card-title">${producto.nombre_producto}</h4>
                                        <p class="card-text">${producto.detalles}</p>
                                        <p class="card-text">Existencia: ${producto.existencia}</p>
                                        <p class="product-price">Precio 1: $${producto.precio_1}</p>
                                        <button class="add-to-cart-button add-to-cart-button-hidden" data-product-id="${producto.id}">Agregar al carrito</button>
                                    </div>
                                </div>
                            </div>
                        `;
                        $('#productos').append(cardHtml);
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

    // Llama a la función para cargar productos con los parámetros obtenidos
    cargarProductos(cat, subCat);

    $(document).on('click', '.add-to-cart-button', function () {
        // Obtenemos el id del producto desde el atributo data-product-id
        const productId = $(this).data('product-id');

        // Redireccionamos a la vista de producto con el id del producto
        window.location.href = `/producto?id=${productId}`;
    });

    // Manejar el evento de clic en los enlaces de la categoría
    $(".dropdown a").on("click", function () {
        cat = $(this).data("cat");
        subCat = $(this).data("subcat");

        // Llama a la función para cargar productos con los nuevos parámetros
        cargarProductos(cat, subCat);
    });
});

function obtenerTodosProductosCategoria(cat) {
    $.ajax({
        url: 'http://127.0.0.1:8000/productosPorCategoria/'+cat,
        type: 'GET',
        dataType: 'JSON',
        success: function(response){
            if (response.resultado == 'OK') {
                var productos = response.datos;
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
                                    <p class="card-text">Existencia: ${producto.existencia}</p>
                                    <p class="product-price">Precio 1: $${producto.precio_1}</p>
                                    <button class="add-to-cart-button add-to-cart-button-hidden" data-product-id="${producto.id}">Agregar al carrito</button>
                                </div>
                            </div>
                        </div>
                    `;
                    $('#productos').append(cardHtml);
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
                        window.location.href = 'http://127.0.0.1:8000/';
                    }
                  })
            }
        }
    });
}
