$(document).ready(function () {
    $('.buy').click(function () {
        let buy = $(this).attr('data-id');
        $(this).attr("disabled",'');
        $(this).next().attr("disabled",'');
        $(this).html('В корзине!');
        if($(this).hasClass('buy tire')){
            $.ajax({
                beforeSend: function (xhr) {
                    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                },
                url: '/ajax',
                type: "POST",
                data:{'tire': buy} ,
                success: function (data) {
                    $('#count').html(data);
                }
            });
        }else{
            $.ajax({
                beforeSend: function (xhr) {
                    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                },
                url: '/ajax',
                type: "POST",
                data:{'disk': buy} ,
                success: function (data) {
                    $('#count').html(data);
                }
            });
        }
    });
});