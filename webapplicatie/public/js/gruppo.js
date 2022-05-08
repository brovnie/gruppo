/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/gruppo.js ***!
  \********************************/
var registerBtn = document.getElementById("register-trigger");
var loginBtn = document.getElementById("login-trigger");
registerBtn.addEventListener("click", toggeleRegister);
loginBtn.addEventListener("click", toggeleRegister);

function toggeleRegister() {
  var login = document.getElementById("login");
  var register = document.getElementById("register");
  login.classList.toggle("hidden");
  register.classList.toggle("hidden");
}
/******/ })()
;