let registerBtn = document.getElementById("register-trigger");
let loginBtn = document.getElementById("login-trigger");
registerBtn.addEventListener("click", toggeleRegister);
loginBtn.addEventListener("click", toggeleRegister);

function toggeleRegister() {
    let login = document.getElementById("login");
    let register = document.getElementById("register");
    login.classList.toggle("hidden");
    register.classList.toggle("hidden");
}