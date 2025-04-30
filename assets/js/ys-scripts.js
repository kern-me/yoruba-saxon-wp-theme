const nav_overlay = document.querySelector('.nav-overlay')
const site_html = document.querySelector('html')
const hamburger_btn = document.getElementById('hamburger_btn')
const main_menu = document.querySelector('.main-menu-navigation')
const main_menu_links = document.querySelectorAll('.main-menu-navigation a')

main_menu_links.forEach(elem => {
    elem.setAttribute('tabindex', '-1')
});

function inactive_states() {
    nav_overlay.classList.remove('active')
    main_menu.classList.remove('active')
    main_menu.setAttribute('aria-expanded', 'false')
    site_html.classList.remove('active')
    main_menu_links.forEach(elem => {
        elem.setAttribute('tabindex', '-1')
    });
}

function active_states() {
    nav_overlay.classList.add('active')
    main_menu.classList.add('active')
    main_menu.setAttribute('aria-expanded', 'true')
    site_html.classList.add('active')
    main_menu_links.forEach(elem => {
        elem.setAttribute('tabindex', '0')
    });
}

document.addEventListener('click', (event) => {
    if (!hamburger_btn.contains(event.target) && hamburger_btn.classList.contains('active')) {
        hamburger_btn.classList.remove('active')
        inactive_states()
    }
});

hamburger_btn.onclick = function(){
    if (this.classList.contains('active')){
        this.classList.remove('active')
        inactive_states()
    } else {
        this.classList.add('active')
        this.setAttribute('tabindex', '0')
        active_states()
        const activeMenu = document.querySelector('html.active .site-header')
        trapFocus(activeMenu)
        hamburger_btn.focus()
    }
}

// Focus Trap
function trapFocus(element) {
    const focusableElements = element.querySelectorAll('a[href], button, input, textarea, select, details,[tabindex]:not([tabindex="-1"])')
    const firstFocusableElement = focusableElements[0]
    const lastFocusableElement = focusableElements[focusableElements.length - 1]

    element.addEventListener('keydown', function(e) {
        const isTabPressed = e.key === 'Tab' || e.keyCode === 9

        if (!isTabPressed) {
            return
        }

        if (e.shiftKey) {
            if (document.activeElement === firstFocusableElement) {
                lastFocusableElement.focus()
                e.preventDefault()
            }
        } else {
            if (document.activeElement === lastFocusableElement) {
                firstFocusableElement.focus()
                e.preventDefault()
            }
        }
    });

    firstFocusableElement.focus()
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
        const video = document.getElementById("featured_video")
        const playButton = document.getElementById("featured_play_btn")

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

document.addEventListener('DOMContentLoaded', function() {
    const header = document.querySelector('.site-header')
    let scrollTimeout
    const showDelay = 300

    function hideHeader() {
        header.classList.add('scrolling')
    }

    function showHeader() {
        header.classList.remove('scrolling')
    }

    // Handle scroll events
    window.addEventListener('scroll', function() {
        // Hide header immediately when scrolling starts
        hideHeader();

        // Clear the existing timeout
        if (scrollTimeout) {
            clearTimeout(scrollTimeout)
        }

        // Set new timeout for scroll end detection with 1 second delay
        scrollTimeout = setTimeout(function() {
            showHeader()
        }, showDelay)
    });
});

const empty_paragraphs = document.querySelectorAll('p:empty')

empty_paragraphs.forEach(elem => {
    elem.remove()
});
