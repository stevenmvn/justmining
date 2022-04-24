const menu = document.querySelector('.nav__mobile');

menu.onclick = e => {
    document.querySelector('.nav__menu').classList.toggle('active');
}