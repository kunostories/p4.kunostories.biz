/******************************
 *
 * Project 4: English Courses
 * Author: Shawn Roe
 * http:://p4.kunostories.biz
 *
 ******************************/

// dropdown
$('.dropdown-toggle').dropdown()

$(document).ready(function () {

    // validate sign up for for minimum length and email
    $('#signup').validate({
        rules: {
            alias: {
                minlength: 3
            },
            email: {
                email: true
            }
        }
    });

    // set video width to width of div container on load
    $('div > video').each(function() {
        $(this).width($(this).parent().width());
    });

});

// resize the video width to width of div container on load
$(window).on('resize', function() {

    $('div > video').each(function() {
        $(this).width($(this).parent().width());
    });
});