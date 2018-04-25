$(function(){
    $("#logout").click(function(e){
        $.ajax({
            type: 'POST', // Тип запроса
            url: '/logout',
            dataType: 'json',
            data: {'action': 'logout'}, // Данные которые мы передаем
            success: function (data) {
                if (data['result'] == 'success') {
                    window.location = "/list/1/id";
                }
            },
            error: function (data) {
                console.log(data);
            }
        });
    });
});