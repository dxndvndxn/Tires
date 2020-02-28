// $(document).ready(function () {
//    $('.buy').click(function () {
//        let buy = $(this).attr('data-id');
//        if($(this).hasClass('buy tire')){
//            console.log(11);
//        }
//        $.ajax({
//            beforeSend: function (xhr) {
//                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//            },
//            url: '/ajax',
//            type: "POST",
//            data: buy,
//            success: function (data) {
//                $('#count').html(data);
//            }
//        });
//    });
// });
$(document).ready(function () {
    $('.buy').click(function () {
        let buy = $(this).attr('data-id');
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