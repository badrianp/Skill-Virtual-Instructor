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

function wrongs(params1, params2 = "") {
   // alert("p1: " + params1 + " p2: " + params2);
   var ex1 = params1;
   // alert(ex1);
   if (params2 != "") {
      var ex2 = params2;
      var bro2 = document.getElementById(ex2);
      // alert(ex2);
      var span2 = document.createElement("span");
      span2.id = "wrong";
      span2.innerText = "this " + ex2 + " is taken .. ";
      bro2.after(span2);
   }
   var bro1 = document.getElementById(ex1);

   var span1 = document.createElement("span");
   span1.id = "wrong";
   span1.innerText = "this " + ex1 + " is taken .. ";
   bro1.after(span1);
}
