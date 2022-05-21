/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/gruppo.js ***!
  \********************************/
/* Toggle ragister/login card */
if (document.querySelector(".welcome-content")) {
  var toggeleRegister = function toggeleRegister() {
    var login = document.getElementById("login");
    var register = document.getElementById("register");
    login.classList.toggle("hidden");
    register.classList.toggle("hidden");
  };

  var registerBtn = document.getElementById("register-trigger");
  var loginBtn = document.getElementById("login-trigger");
  registerBtn.addEventListener("click", toggeleRegister);
  loginBtn.addEventListener("click", toggeleRegister);
}
/* Menu Home - change style on scroll */


if (document.querySelector(".welcome-content")) {
  var menu = document.querySelector('.navbar');
  var specialBtn = document.querySelector(".menu .special-btn");
  var menuLinks = document.querySelectorAll("#menu-list .menu-item");
  window.addEventListener('scroll', function (e) {
    if (window.scrollY == 0) {
      menu.classList.remove("menu-scroll");
      specialBtn.classList.remove("btn--orange");
      specialBtn.classList.add("btn--white");
      Object.values(menuLinks).map(function (item) {
        return item.classList.add("hover-white");
      });
    } else {
      menu.classList.add("menu-scroll");
      specialBtn.classList.add("btn--orange");
      specialBtn.classList.remove("btn--white");
      Object.values(menuLinks).map(function (item) {
        return item.classList.remove("hover-white");
      });
    }
  });
}

if (document.querySelector(".gruppo-app")) {
  var _menu = document.querySelector('.navbar');

  window.addEventListener('scroll', function (e) {
    if (window.scrollY == 0) {
      _menu.classList.remove("menu-scroll");
    } else {
      _menu.classList.add("menu-scroll");
    }
  });
}
/******/ })()
;