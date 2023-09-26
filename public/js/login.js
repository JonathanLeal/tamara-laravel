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
