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

if (document.querySelector('body.single-project')) {
    const skewedImage = document.querySelector('.single-project-description .ys-col--last img')
    const skewedImageContainer = document.querySelector('.single-project-description .ys-col--last')

    function setSkewedImageWidth() {
        //console.log(skewedImageContainer.getBoundingClientRect().width)
        const elem_width = skewedImageContainer.getBoundingClientRect().width.toString();
        console.log(elem_width)
        skewedImage.style.width = elem_width + 'px'
    }
    window.addEventListener("resize", setSkewedImageWidth)
}


