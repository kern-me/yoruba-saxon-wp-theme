jQuery(document).ready(function($) {
    $('#load-more-press').on('click', function() {
        const button = $(this);
        const container = $('#press-articles-container');
        const currentPage = parseInt(button.data('page'));
        const maxPages = parseInt(button.data('max'));

        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'load_more_press',
                page: currentPage + 1,
                nonce: ajax_object.nonce
            },
            beforeSend: function() {
                button.text('Loading...');
            },
            success: function(response) {
                if (response.success) {
                    container.append(response.data.html);
                    button.data('page', currentPage + 1);
                    button.text('Load More');

                    if (currentPage + 1 >= maxPages) {
                        button.remove();
                    }
                }
            },
            error: function() {
                button.text('Load More');
            }
        });
    });
});