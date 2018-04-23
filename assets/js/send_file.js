$(document).ready(function () {

  /*  function readImage ( input ) {
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
    }));*/


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
            data: /*JSON.stringify(*/{'params': params}/*)*/, // Данные которые мы передаем
      //      cache:false, // В запросах POST отключено по умолчанию, но перестрахуемся
            success:function(data){
                console.log(data);
            },
            error:function(data){
                console.log(data);
            }
        });
        /*-------------------------------------------------------------------------*/

    });

    /*-------------------------*/

    function readImage ( input, $res ) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.preview').each(function () {
                    console.log($(this).data('taskId')+ '   ' + $res);
                    if($(this).data('taskId')===$res) {
                        //console.log('fjbgkb');
                        $(this).attr('src', e.target.result);
                    }
                });
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

    $('.image').each(function () {
        let res =  $(this).data('taskId');
        console.log(res);
        $(this).change(function(){
            readImage(this, res);
        });
    });


    $('.upload-image').each(function () {
        $(this).on('submit',(function(e) {
            e.preventDefault();

            let id = $(this).data('taskId');
            var formData = new FormData(this);

            formData.append('id', ''+id);
            $.ajax({
                type:'POST', // Тип запроса
                //   url: 'modules/logic.php', // Скрипт обработчика
                url: '/save_image',
                data: formData, // Данные которые мы передаем
                cache:false, // В запросах POST отключено по умолчанию, но перестрахуемся
                contentType: false, // Тип кодирования данных мы задали в форме, это отключим
                processData: false, // Отключаем, так как передаем файл
                success:function(data){
                    //printMessage('#result', data);
                    console.log(data);
                },
                error:function(data){
                    console.log(data+'jbjkbk');
                }
            });
        }));
    });


    
    
});


































function DropDown(el) {
    this.dd = el;
    this.placeholder = this.dd.children('span');
    this.opts = this.dd.find('ul.dropdown > li');
    this.val = '';
    this.index = -1;
    this.initEvents();
}
DropDown.prototype = {
    initEvents : function() {
        var obj = this;

        obj.dd.on('click', function(event){
            $(this).toggleClass('active');
            return false;
        });

        obj.opts.on('click',function(){
            var opt = $(this);
            obj.val = opt.text();
            obj.index = opt.index();
            obj.placeholder.text(obj.val);
           // console.log(obj.val.replace(/^\s*/,'').replace(/\s*$/,'')==='Sort by Id');
            if(obj.val.replace(/^\s*/,'').replace(/\s*$/,'')==='Sort by Id')
                window.location = $('#IdLink').data('sort');
            if(obj.val.replace(/^\s*/,'').replace(/\s*$/,'')==='Sort by name')
                window.location = $('#NameLink').data('sort');
            if(obj.val.replace(/^\s*/,'').replace(/\s*$/,'')==='Sort by description')
                window.location = $('#DescriptionLink').data('sort');
            if(obj.val.replace(/^\s*/,'').replace(/\s*$/,'')==='Sort by status')
                window.location = $('#StatusLink').data('sort');
        });
    },
    getValue : function() {
        return this.val;
    },
    getIndex : function() {
        return this.index;
    }
}

$(function() {

    var dd = new DropDown( $('#dd') );

    $(document).click(function() {
        // all dropdowns
        $('.wrapper-dropdown-3').removeClass('active');
    });

});

