document.addEventListener('DOMContentLoaded', function () {
    const toggle = document.getElementById('navbar-toggle');
    const mobileMenu = document.getElementById('navbar-mobile');

    toggle?.addEventListener('click', function () {
        mobileMenu?.classList.toggle('hidden');
    });
});
