$(document).ready(function(){

})

document.addEventListener("DOMContentLoaded", function () {
    const loginForm = document.querySelector("form");
    const loginButton = document.getElementById("loginButton");
    const spinner = document.getElementById("spinner");

    loginForm.addEventListener("submit", function (e) {
        e.preventDefault();

        spinner.style.display = "inline-block";

        setTimeout(function () {
            spinner.style.display = "none";
        }, 3000);
    });
});

const radioButtons = document.querySelectorAll('input[type="radio"]');

radioButtons.forEach(radioButton => {
    radioButton.addEventListener('change', function() {
        // Desseleccionar todos los radio buttons
        radioButtons.forEach(rb => {
            if (rb !== radioButton) {
                rb.checked = false;
            }
        });
    });
});

$("#loginButton").on("click", function() {
    var email = $("#email").val();
    var name = $("#name").val();
    var apellidos = $("#apellidos").val();
    var password = $("#password").val();
    var contraConfirm = $("#contraConfirm").val();
    var sexo = $("input[name='gender']:checked").val();

    var nuevoUsuario = {
        email: email,
        name: name,
        apellidos: apellidos,
        password: password,
        contraConfirm: contraConfirm,
        sexo: sexo
    }

    $.ajax({
        url: "/registroNewUser",
        type: "POST",
        data: nuevoUsuario,
        success: function(response){
            if (response.resultado === 'OK') {
                Swal.fire({
                    title: '¡Registrado con éxito!',
                    text: "Nos alegra que te hallas registrado, inicia sesión para disfrutar de nuestra tienda en linea",
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: '¡Entrar!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = `/iniciar-sesion`;
                    }
                })
            }
        },
        error: function(error){
            if (error.status === 401) {
                Swal.fire({
                    title: 'Notificación',
                    text: 'Detectamos que las contraseñas no son las mismas, por favor procura que sean las mismas.',
                    icon: 'warning',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: '¡Entendido!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                        limpiarCamposPass();
                    }
                })
            } else {
                if (error.status === 400) {
                    Swal.fire({
                        title: 'Notificación',
                        text: 'No se puede registrar este usuario, por favor contactese con servicio al cliente.',
                        icon: 'warning',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: '¡Entendido!'
                      }).then((result) => {
                        if (result.isConfirmed) {
                            $("#email").val("");
                        }
                    })
                } else {
                    if (error.status === 422) {
                        Swal.fire(
                            'Problema detectado',
                            'Recuerda que debes de completar todos los campos por favor.',
                            'warning'
                          )
                    }
                }
            }
        }
    });
});

function limpiarCamposPass() {
    $("#contra").val("");
    $("#contraConfirm").val("");
}
