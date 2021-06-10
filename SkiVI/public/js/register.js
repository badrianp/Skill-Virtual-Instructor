let register_view_password_btn = document.getElementById(
   "register-view-password"
);

let register_password_input = document.getElementById("register-password");

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

function goToLogin(root) {
   window.location.href = root + "auth";
}
