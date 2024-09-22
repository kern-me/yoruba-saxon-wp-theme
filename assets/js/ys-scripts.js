const nav_overlay = document.querySelector('.nav-overlay');
const site_html = document.querySelector('html');

document.getElementById('nav-btn').onclick = function(){
    if (this.classList.contains('active')) {
        this.classList.remove('active');
        nav_overlay.classList.remove('active');
        site_html.classList.remove('active');
    } else {
        this.classList.add('active');
        nav_overlay.classList.add('active');
        site_html.classList.add('active');
    }
}