"use strict";
$(
    $('#Auth').click(function (event$) {

        let authData = {"login": $('input[name="login"]').val(), "password": $('input[name="password"]').val()};

        $.ajax({
            type: 'POST', // Тип запроса
            url: '/authorization',
            dataType: 'json',
            data: {'authData': JSON.stringify(authData)}, // Данные которые мы передаем
            success: function (data) {
                // console.log(data['status']);
                if (parseInt(data['status']) == 1) {
                    window.location = "/list/1/id";
                }
            },
            error: function (data) {
                console.log(data);
            }
        });

    })
);

