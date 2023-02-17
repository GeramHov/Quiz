// CONFIGURATION DU MENU CACHEE . AFFICHER / CACHER

const navbarToggle = document.querySelector('.navbar-toggler');
const burgerMenu = document.getElementById('burgermenu');
navbarToggle.addEventListener('click', function(event){
    burgerMenu.style.right = '40vw';
    event.stopPropagation();
});

document.addEventListener('click', function(){
    burgerMenu.style.right = '140vw';
})

