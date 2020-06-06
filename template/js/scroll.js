
let menuPosition = $('header').offset().top;

let menu = $('header');

$(document).ready(function () {

    $(window).scroll(function(){
        let scrollPosition = $(this).scrollTop();
        menu.css({backgroundColor:'#1c1c1c'});
        if(scrollPosition == 0){
            menu.css({backgroundColor:'transparent'});
        }
    });

    if (menuPosition > 1){
        menu.css({backgroundColor:'#1c1c1c'});
    }
});
