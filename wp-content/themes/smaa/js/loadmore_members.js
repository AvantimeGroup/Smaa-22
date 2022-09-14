var page = 2;
jQuery(function($) {

    function appendPost(data, callback) {
        $.post(medlemmar.ajaxurl, data, function(response) {
            setTimeout(function(){$(".cv-spinner").addClass('is-hide'); },500);
            if ($.trim(response) == '') {
                $('.member-loadmore').hide();
            }
            $('.member-card-wrapper').append(response);
            page++;
            data.page = page;
            $.post(medlemmar.ajaxurl, data, function(response) {
                if ($.trim(response) == '') {
                    $('.member-loadmore').hide();
                }
            });
        });
    }

        $('body').on('click', '.member-loadmore', function() {
            $(".cv-spinner").removeClass('is-hide');　
            antalmembersphp = $('.member-loadmore').data('role');
            var data = {
            action: 'load_member_posts_by_ajax',
            antalmembers: antalmembersphp,
            page: page,
            security: medlemmar.security
            };
            appendPost(data);
        });

});