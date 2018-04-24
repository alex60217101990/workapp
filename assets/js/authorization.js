"use strict";
$(
    $('#Auth').click(function(event$){




        let authData = {"login": $('input[name="login"]').val(), "password": $('input[name="password"]').val()};

        /*-------------------------------------------------------------------------*/
        $.ajax({
            type:'POST', // Тип запроса
            url: '/authorization',
            dataType: 'json',
            data: {'authData': JSON.stringify(authData)}, // Данные которые мы передаем
            success:function(data){
                if(data==1) {
                    window.location = "http://workapp/list/1/id";
                }
                console.log(data);
            },
            error:function(data){
              //  window.location="http://workapp/list/1/id";
                console.log(data);
            }
        });
        /*-------------------------------------------------------------------------*/

    })
);