const menuButton = document.querySelector('#menu');
const menuItems = document.querySelector('#menu-items')

document.addEventListener('DOMContentLoaded', function () {
    iniciarApp();

});


function iniciarApp() {
    mostrarMenu();
}

function mostrarMenu() {
    menuButton.addEventListener('click', () => {
        menuItems.classList.toggle('hidden');
    });
}
