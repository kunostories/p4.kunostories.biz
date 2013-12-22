

$('.dropdown-toggle').dropdown()

$(document).ready(function () {

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

});