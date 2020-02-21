$(document).ready(function(){
    let top = $("#catalog").offset().top;
    $('body,html').animate({scrollTop: top -100}, 1500);
});