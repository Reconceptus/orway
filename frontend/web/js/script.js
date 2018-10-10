$(function () {
    'use strict';
    $(document).on('click', '.js-submit-comment', function () {
        var button = $(this);
        button.attr('disabled', true);
        var container = button.closest('.add-comment');
        var accept = container.find('.comment-accept').is(':checked');
        if (accept === true) {
            accept = 1;
        }
        if (!accept) {
            $('.accept-error').text('You must accept');
            button.attr('disabled', false);
            return false;
        } else {
            $('.accept-error').text('');
            var name = container.find('.comment-name').val();
            var email = container.find('.comment-email').val();
            var text = container.find('.comment-text-input').val();
            var postId = container.find('.comment-post-id').val();
            var lang = container.data('lang');
        }
        $.ajax({
            type: 'POST',
            url: '/' + lang + '/blog/add-comment',
            data: {
                postId: postId,
                name: name,
                email: email,
                accept: accept,
                text: text
            },
            success: function (data) {
                if (data.status === 'success') {
                    $('.comments').append(data.box);
                    container.find('.comment-name').val('');
                    container.find('.comment-email').val('');
                    container.find('.comment-text-input').val('');
                    container.find('.comment-accept').attr("checked", false);
                    button.attr('disabled', false);
                } else {
                    alert(data.message);
                    button.attr('disabled', false);
                }
                $('#editFrom').hide();
            }
        });
    });
    $(document).on('click', '.js-request', function () {
        var button = $(this);
        button.closest('.request-form').addClass('success');
        $('#request-form').submit();
    });

    $('.landing').imagesLoaded( function() {
        $('.loader').removeClass('show');
        if ($('.section--blog').length == 0) {
            $('[data-elements=3] .line').addClass('not-complited');
            $('[data-elements=3] .light').addClass('not-complited');
            $('.boxes_before_footer').hide();
        }
        setTimeout(function () {
            $('.landing').removeClass('begin');
            if($('html').hasClass('mobile')){
                var slidesWithTitles = [3,4,5,6,7,8,9],
                    slidesWithAnimImg = [3,4,5];
                $('.landing').mobileSliding(slidesWithTitles,slidesWithAnimImg);
            }
        },200);
        setTimeout(function () {
            $('.owl-carousel').owlCarousel({
                loop:false,
                nav:false,
                dots:false,
                URLhashListener:true,
                mouseDrag:true,
                responsive:{
                    0:{
                        items:1,
                        startPosition: '05'
                    },
                    480:{
                        items:2,
                        startPosition: '05'
                    },
                    768:{
                        items:3,
                        startPosition: '04'
                    },
                    1000:{
                        startPosition: '03',
                        margin:10,
                        items:5
                    }
                }
            });
            if($('html').hasClass('desktop')){
                $('.landing').startSliding('#wrapper','desktop');
            }
            if($('html').hasClass('tablet')){
                $('.landing').startSliding('#wrapper','tablet');
            }
        },2000);
    });
});