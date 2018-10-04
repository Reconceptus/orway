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
            var text = container.find('.comment-text').val();
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
                    container.find('.comment-text').val('');
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
});