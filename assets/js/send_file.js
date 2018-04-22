$(document).ready(function () {

    function readImage ( input ) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    function printMessage(destination, msg) {

        $(destination).removeClass();

        if (msg == 'success') {
            $(destination).addClass('alert alert-success').text('Файл успешно загружен.');
        }

        if (msg == 'error') {
            $(destination).addClass('alert alert-danger').text('Произошла ошибка при загрузке файла.');
        }

    }

    $('#image').change(function(){
        readImage(this);
    });

    $('#upload-image').on('submit',(function(e) {
        e.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            type:'POST', // Тип запроса
         //   url: 'modules/logic.php', // Скрипт обработчика
            url: '/save_image',
            data: formData, // Данные которые мы передаем
            cache:false, // В запросах POST отключено по умолчанию, но перестрахуемся
            contentType: false, // Тип кодирования данных мы задали в форме, это отключим
            processData: false, // Отключаем, так как передаем файл
            success:function(data){
                printMessage('#result', data);
                console.log(data);
            },
            error:function(data){
                console.log(data+'jbjkbk');
            }
        });
    }));


    /**
     * Change event.
     */
    $('.Save').click(function(event$){
        let Name = $(this).data('taskId'); let params = [];
        $('.h3').each(function(){
            if($(this).data('taskId')===Name){
                params.push($(this).text().replace(/^\s*/,'').replace(/\s*$/,''));
            }
        });
        $('.pN').each(function(){
            if($(this).data('taskId')===Name){
                params.push($(this).text().replace(/^\s*/,'').replace(/\s*$/,''));
            }
        });
        $('.pE').each(function(){
            if($(this).data('taskId')===Name){
                params.push($(this).text().replace(/^\s*/,'').replace(/\s*$/,''));
            }
        });
        $('.CheckboxVal').each(function(){
            if($(this).data('taskId')===Name){
                params.push($(this).is(":checked"));
            }
        });
        $('.pD').each(function(){
            if($(this).data('taskId')===Name){
                params.push($(this).text().replace(/^\s*/,'').replace(/\s*$/,''));
            }
        });
     //   console.log(params);

        /*-------------------------------------------------------------------------*/
        $.ajax({
            type:'POST', // Тип запроса
            url: '/update_task_data',
            dataType: 'json',
            data: JSON.stringify({'params': params}), // Данные которые мы передаем
            cache:false, // В запросах POST отключено по умолчанию, но перестрахуемся
            contentType: 'json', // Тип кодирования данных
            processData: false, // Отключаем, так как передаем файл
            success:function(data){
                console.log(data);
            },
            error:function(data){
                console.log(data);
            }
        });
        /*-------------------------------------------------------------------------*/



    });






});
