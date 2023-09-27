$(document).ready(function(){
    cargarProductosSubCategorias();
});

function cargarProductosSubCategorias(cat, subCat) {
    $(".dropdown a").on("click", function() {
        cat = $(this).data("cat");
        subCat = $(this).data("subcat");

        // Elimina los productos anteriores del contenedor
        $('#productos').empty();

        // Oculta todos los botones "Agregar al carrito"
        $('.add-to-cart-button').addClass('add-to-cart-button-hidden');

        $.ajax({
            url: `http://127.0.0.1:8000/subCategoriasProductos/${cat}/${subCat}`,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.resultado == 'OK') {
                    var productos = response.datos;
                    var html = '';
                    $.each(productos, function(index, producto) {
                        var cardHtml = `
                            <div class="col-md-4">
                                <div class="card">
                                    <img class="card-img-top" src="${producto.imagen}" alt="${producto.nombre_producto}">
                                    <div class="card-body">
                                        <h4 class="card-title">${producto.nombre_producto}</h4>
                                        <p class="card-text">${producto.detalles}</p>
                                        <p class="card-text">Existencia: ${producto.existencia}</p>
                                        <p class="card-text">Precio 1: $${producto.precio_1}</p>
                                        <button class="add-to-cart-button add-to-cart-button-hidden" data-product-id="${producto.id}">Agregar al carrito</button>
                                    </div>
                                </div>
                            </div>
                        `;
                        $('#productos').append(cardHtml);
                    });

                    // Agrega eventos de mouseenter y mouseleave para mostrar y ocultar el botón al pasar el cursor
                    $('.card').on('mouseenter', function() {
                        $(this).find('.add-to-cart-button').removeClass('add-to-cart-button-hidden');
                    }).on('mouseleave', function() {
                        $(this).find('.add-to-cart-button').addClass('add-to-cart-button-hidden');
                    });
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    });
}

