/* Toggle ragister/login card */
if(document.querySelector(".welcome-content")) {
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
}

/* Menu Home - change style on scroll */
if(document.querySelector(".welcome-content")) {
    let menu = document.querySelector('.navbar');
    let specialBtn =  document.querySelector(".menu .special-btn");
    let menuLinks = document.querySelectorAll("#menu-list .menu-item");
    window.addEventListener('scroll', (e) => {  
        if(window.scrollY==0) { 
            menu.classList.remove("menu-scroll");
            specialBtn.classList.remove("btn--orange");
            specialBtn.classList.add("btn--white");
            Object.values(menuLinks).map((item) => item.classList.add("hover-white"));
        } else {
            menu.classList.add("menu-scroll");
            specialBtn.classList.add("btn--orange");
            specialBtn.classList.remove("btn--white");
            Object.values(menuLinks).map((item) => item.classList.remove("hover-white"));
        }
    })
}
if(document.querySelector(".gruppo-app")) {
    let menu = document.querySelector('.navbar');
    window.addEventListener('scroll', (e) => {  
        if(window.scrollY==0) { 
            menu.classList.remove("menu-scroll");            
        } else {
            menu.classList.add("menu-scroll");
        }
    })
}