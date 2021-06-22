let login_view_password_btn = document.getElementById("login-view-password");

let login_password_input = document.getElementById("password");

login_view_password_btn.addEventListener("click", loginViewPassword);

function loginViewPassword(event) {
   if (login_password_input.type === "password") {
      login_password_input.type = "text";
      login_view_password_btn.className = "far fa-eye";
   } else {
      login_password_input.type = "password";
      login_view_password_btn.className = "far fa-eye-slash";
   }
}

function goToRegister(root) {
   window.location.href = root + "auth/index__register";
}
