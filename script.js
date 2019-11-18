$(document).ready(function() {

    $('input[type=password]').keyup(function() {
        // keyup code here
    }).focus(function() {
        $('#pswd_info').show();
    }).blur(function() {
        $('#pswd_info').hide();
    });

});