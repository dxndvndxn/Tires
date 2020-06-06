//GLOBAL
const loc = window.location.href;

let navLinks = document.querySelectorAll('nav ul a');
// let loc = window.location.href;

navLinks.forEach(el => {

    if (el.getAttribute('href') === loc.substring(loc.lastIndexOf('/'))){
        el.classList.add('activeLink');
    }

});