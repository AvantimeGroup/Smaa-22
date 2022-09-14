var page = 2;

jQuery(function($) {

    function appendPost(data, callback) {
        $.post(nyheter.ajaxurl, data, function(response) {
            setTimeout(function(){
                $(".cv-spinner").addClass('is-hide');　
              },500);
        if ($.trim(response) == '') {
        $('.loadmore').hide();
        }
        $('.blog-posts').append(response);
        page++;
        data.page = page;
        $.post(nyheter.ajaxurl, data, function(response) {
        if ($.trim(response) == '') {
        $('.loadmore').hide();
        }
        });
        });
    }

        $('body').on('click', '.loadmore', function() {
            $(".cv-spinner").removeClass('is-hide');　
            newsyearphp = $('.loadmore').data('role');
            antal_postsphp = $('.loadmore').data('antal');
            var data = {
            action: 'load_posts_by_ajax',
            newsyear: newsyearphp,
            antal_posts : antal_postsphp,
            page: page,
            security: nyheter.security,
            };
            appendPost(data);
        });

});