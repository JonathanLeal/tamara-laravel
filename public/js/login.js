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

$("#loginButton").on("click", function() {
    var email = $("#email").val();
    var password = $("#password").val();

    var iniciado = {
        email: email,
        password: password
    }

    $.ajax({
        url: '/api/auth/login',
        type: 'POST',
        dataType: 'JSON',
        data: iniciado,
        success: function(response){
            if (response.resultado === 'OK'){
                localStorage.setItem('access_token', response.datos.access_token);
                Swal.fire({
                    title: 'Credenciales correctas',
                    text: "Se bienvenido a tienda Tamara, esperamos que nuestros productos sean de tu agrado.",
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Entrar'
                  }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = `/`;
                    }
                })
            }
        },
        error: function(error){
            if (error.status === 401) {
                Swal.fire({
                    title: 'Credenciales incorrectas',
                    text: "Por favor introduce tu email y contraseñas correctos",
                    icon: 'error',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Entendido'
                  }).then((result) => {
                    if (result.isConfirmed) {
                        $("#email").val("");
                        $("#password").val("");
                    }
                })
            } else if(error.status === 400) {
                Swal.fire(
                    'Campos vacios',
                    'Ingresa tanto tu email como tu contraseña por favor.',
                    'warning'
                )
            } else {
                if (error.status === 422) {
                    Swal.fire(
                        'Notificacion',
                        'Lo sentimos, este usuario momentaneamente no puede iniciar sesion.',
                        'error'
                    ).then(() => {
                        $("#email").val("");
                        $("#password").val("");
                    })
                }

                if (error.status === 500) {
                    Swal.fire(
                        'Notificacion',
                        'Lo sentimos, hay un error, por favor contactese con nosotros',
                        'error'
                    )
                }
            }
        }
    })
});
