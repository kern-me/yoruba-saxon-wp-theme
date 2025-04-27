const nav_overlay = document.querySelector('.nav-overlay');
const site_html = document.querySelector('html');
const primary_menu = document.getElementById('nav-btn')
const nav_links = document.querySelectorAll('.menu--right a')
const active_menu_outline = document.getElementById('active-menu-outline')

nav_links.forEach(elem => {
    elem.setAttribute('tabindex', '-1');
});

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
        nav_links.forEach(elem => {
            elem.setAttribute('tabindex', '-1');
        });
    } else {
        this.classList.add('active');
        this.setAttribute('tabindex', '0');
        nav_overlay.classList.add('active');
        site_html.classList.add('active');
        nav_links.forEach(elem => {
            elem.setAttribute('tabindex', '0');
        });
        const activeMenu = document.querySelector('html.active .menu--right');
        trapFocus(activeMenu);
    }
}

primary_menu.addEventListener('focus', function() {
    active_menu_outline.classList.add('focused');
})
primary_menu.addEventListener('blur', function() {
    active_menu_outline.classList.remove('focused');
})

// Focus Trap
function trapFocus(element) {
    const focusableElements = element.querySelectorAll('a[href], button, input, textarea, select, details,[tabindex]:not([tabindex="-1"])');
    const firstFocusableElement = focusableElements[0];
    const lastFocusableElement = focusableElements[focusableElements.length - 1];

    element.addEventListener('keydown', function(e) {
        const isTabPressed = e.key === 'Tab' || e.keyCode === 9;

        if (!isTabPressed) {
            return;
        }

        if (e.shiftKey) {
            if (document.activeElement === firstFocusableElement) {
                lastFocusableElement.focus();
                e.preventDefault();
            }
        } else {
            if (document.activeElement === lastFocusableElement) {
                firstFocusableElement.focus();
                e.preventDefault();
            }
        }
    });

    firstFocusableElement.focus();
}



if (document.querySelector('body.single-project')) {
    const skewedImage = document.querySelector('.single-project-description .ys-col--last img')
    const skewedImageContainer = document.querySelector('.single-project-description .ys-col--last')

    function setSkewedImageWidth() {
        if (window.innerWidth > 1024) {
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




