$(document).ready(function () {
    $('input[name="reveal-password"]').change(function () {
        inputPassword = $('.reveal-password');

        if ($(this).prop('checked')) {
            inputPassword.attr('type', 'text');
        } else {
            inputPassword.attr('type', 'password');
        }
    })
});