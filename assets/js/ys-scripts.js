const nav_overlay = document.querySelector('.nav-overlay');
const site_html = document.querySelector('html');
const primary_menu = document.getElementById('nav-btn')

document.addEventListener('click', (event) => {
    if (!primary_menu.contains(event.target) && primary_menu.classList.contains('active')) {
        nav_overlay.classList.remove('active');
        primary_menu.click();
        primary_menu.classList.remove('active');
        site_html.classList.remove('active');
    }
});

document.getElementById('nav-btn').onclick = function(){
    if (this.classList.contains('active')){
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
        if (window.innerWidth > 1024) {
            console.log(innerWidth)
            const elem_width = skewedImageContainer.getBoundingClientRect().width.toString();
            skewedImage.style.width = elem_width + 'px'
        } else {
            skewedImage.style.width = '100%'
        }
    }

    setSkewedImageWidth()

    window.addEventListener("resize", setSkewedImageWidth)

    // Featured Video Play Button
    if (document.getElementById('featured_video')) {
        const video = document.getElementById("featured_video");
        const playButton = document.getElementById("featured_play_btn");

        playButton.addEventListener("click", function() {
            playButton.classList.remove('initial')

            if (video.paused) {
                playButton.classList.remove('play')
                playButton.classList.add('pause')
                video.play();
            } else {
                playButton.classList.remove('pause')
                playButton.classList.add('play')
                video.pause();
            }
        });
    }
}

const empty_paragraphs = document.querySelectorAll('p:empty')

empty_paragraphs.forEach(elem => {
    elem.remove();
});




