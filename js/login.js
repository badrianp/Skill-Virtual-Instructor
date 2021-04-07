let login_form = document.getElementById("login-form");
let register_request_btn = document.getElementById("request-register");

let register_form = document.getElementById("register-form");
let login_request_btn = document.getElementById("request-login");

let login_view_password_btn = document.getElementById("login-view-password");
let register_view_password_btn = document.getElementById("register-view-password");
let login_password_input = document.getElementById("login-password");
let register_password_input = document.getElementById("register-password");

register_form.classList += " hide";
// register_form.className = "hide";

register_request_btn.addEventListener("click", showRegisterForm);

function showRegisterForm(event) {

    login_form.classList.add("hide");
    register_form.classList.remove("hide");
}


login_request_btn.addEventListener("click", showLoginForm);

function showLoginForm(event) {

    register_form.classList.add("hide");
    login_form.classList.remove("hide");
}

login_view_password_btn.addEventListener("click", loginViewPassword);

function loginViewPassword(event) {

    if (login_password_input.type === "password") {
        login_password_input.type = "text";
        login_view_password_btn.className = "far fa-eye";
    } else {
        login_password_input.type = "password";
        login_view_password_btn.className = "far fa-eye-slash"
    }
}

register_view_password_btn.addEventListener("click", registerViewPassword);

function registerViewPassword(event) {

    if (register_password_input.type === "password") {
        register_password_input.type = "text";
        register_view_password_btn.className = "far fa-eye";

    } else {
        register_password_input.type = "password";
        register_view_password_btn.className = "far fa-eye-slash";

    }
}