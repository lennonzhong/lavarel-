$(function () {

    $('.introduce').mouseenter(function () {
        $('.introduce').css({
            'transform':'scale(1.3)'
        });
    }).mouseleave(function () {
        $('.introduce').css({
            'transform':'scale(1.0)'
        })
    });
})