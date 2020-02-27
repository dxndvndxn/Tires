$(document).ready(function () {
   $('.buy').click(function () {
       let buy = $(this).attr('data-id');
       $.ajax({
           beforeSend: function (xhr) {
               xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
           },
           url: '/ajax',
           type: "POST",
           data: buy,
           success: function (data) {
               $('#count').html(data);
           }
       });
   });
});