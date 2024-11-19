if (document.querySelector('body.page-about')) {
    const skewed_image_containers = document.querySelectorAll('.ys-masonry-grid a');
    const skewed_images = document.querySelectorAll('.ys-masonry-grid a img');

    const founders_skewed_container_row = document.querySelector('.founders-section .skewed-row');
    const founders_skewed_image_container = document.querySelector('.founders-section .skewed-img-container');
    const founders_skewed_image = document.querySelector('.founders-section .skewed-img-container img');

    const press_skewed_container_row = document.querySelector('.press-section .skewed-row');
    const press_skewed_image_container = document.querySelector('.press-section .skewed-img-container');
    const press_skewed_image = document.querySelector('.press-section .skewed-img-container img');

    function set_image_widths() {
        if (window.innerWidth > 1024) {
            skewed_images.forEach(element => {
                const parentWidth = element.parentElement.getBoundingClientRect().width.toString()
                element.style.width = parentWidth + 'px'
            });

            // FOUNDERS

            const founders_skewed_image_parent_width = founders_skewed_image.parentElement.getBoundingClientRect().width.toString()
            const founders_skewed_image_parent_height = founders_skewed_container_row.getBoundingClientRect().height.toString()

            founders_skewed_image_container.style.height = founders_skewed_image_parent_height + 'px'
            founders_skewed_image.style.width = 'calc(50% + ' + founders_skewed_image_parent_width + 'px)'
            founders_skewed_image.style.height = founders_skewed_image_parent_height + 'px'

            // PRESS

            const press_skewed_image_parent_width = press_skewed_image.parentElement.getBoundingClientRect().width.toString()
            const press_skewed_image_parent_height = press_skewed_container_row.getBoundingClientRect().height.toString()

            press_skewed_image_container.style.height = press_skewed_image_parent_height + 'px'
            press_skewed_image.style.width = 'calc(50% + ' + press_skewed_image_parent_width + 'px)'
            press_skewed_image.style.height = press_skewed_image_parent_height + 'px'


        } else {
            skewed_images.forEach(element => {
                element.style.width = '100%'
            });

            founders_skewed_image_container.style.height = 'auto'
            founders_skewed_image.style.width = '100%'
            founders_skewed_image.style.height = 'auto'

            press_skewed_image_container.style.height = 'auto'
            press_skewed_image.style.width = '100%'
            press_skewed_image.style.height = 'auto'
        }
    }

    set_image_widths()

    window.addEventListener("resize", set_image_widths)
}