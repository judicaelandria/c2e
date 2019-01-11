/**
 * Created by aro on 12/05/17.
 */
$(function () {
    $('body').click(function () {
        $('.list-menu-user').hide(200);
        $('.list-menu-guest').hide(200);
        $('.list-menu-link').animate({width:'hide'},200);
    })
    $('.menu-user').click(function (event) {
        $('.list-menu-user').toggle(200);
        $('.list-menu-guest').toggle(200);
        event.stopPropagation();
    })
    $('.menu-min').click(function (event) {
        $('.list-menu-link').animate({width:'toggle'},200);
        event.stopPropagation();
    })

    $('.alert').fadeOut(4000);
})