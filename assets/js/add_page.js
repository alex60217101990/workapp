//'use strict';
$(function(){
    $('.button-checkbox').each(function(){
        var $widget = $(this),
            $button = $widget.find('button'),
            $checkbox = $widget.find('input:checkbox'),
            color = $button.data('color'),
            settings = {
                on: {
                    icon: 'glyphicon glyphicon-check'
                },
                off: {
                    icon: 'glyphicon glyphicon-unchecked'
                }
            };

        $button.on('click', function () {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
        });

        $checkbox.on('change', function () {
            updateDisplay();
        });

        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');
            // Set the button's state
            $button.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $button.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$button.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $button
                    .removeClass('btn-default')
                    .addClass('btn-' + color + ' active');
            }
            else
            {
                $button
                    .removeClass('btn-' + color + ' active')
                    .addClass('btn-default');
            }
        }
        function init() {
            updateDisplay();
            // Inject the icon if applicable
            if ($button.find('.state-icon').length == 0) {
                $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
            }
        }
        init();
    });

});

$('#save').click(()=>{
    let my_interface = {"name": (!!$('#name').val())?$('#name').val():'', "email": (!!$('#email').val())?$('#email').val():'',
        "description": (!!$('#description').val()?$('#description').val():'')};
console.log(my_interface);

    $.ajax({
        type: 'POST', // Тип запроса
        url: '/save_info', // Скрипт обработчика
        dataType : "json",
        data: {'result' : JSON.stringify(my_interface)}, // Данные которые мы передаем
        cache: false, // В запросах POST отключено по умолчанию, но перестрахуемся
        success:function(data){
            console.log(data);
        },
        error:function(data){
            console.log(data);
        }
    });


});


$('#upload-image').on('submit',(function(e) {
    e.preventDefault();
   // let id = $(this).data('taskId');
    var formData = new FormData(this);

    formData.append('name', ''+(!!$('#name').val())?$('#name').val():'');
    formData.append('email', ''+(!!$('#email').val())?$('#email').val():'');
    formData.append('description', ''+(!!$('#description').val()?$('#description').val():''));

    $.ajax({
        type:'POST', // Тип запроса
        //   url: 'modules/logic.php', // Скрипт обработчика
        url: '/add_image',
        data: formData, // Данные которые мы передаем
        cache:false, // В запросах POST отключено по умолчанию, но перестрахуемся
        contentType: false, // Тип кодирования данных мы задали в форме, это отключим
        processData: false, // Отключаем, так как передаем файл
        success:function(data){
            console.log(data);
        },
        error:function(data){
            console.log(data+' success add.');
        }
    });
}));


$(document).ready(function () {
    let input = $('#image');
    input.change(function(){
        readImage(this);
    });

    function readImage(input_file) {
        // let input_file = document.getElementById('image');
        if (input_file.files && input_file.files[0]) {
            let reader = new FileReader();
            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
            };
            reader.readAsDataURL(input_file.files[0]);
        }
    }
});

$(document).ready(function() {
    var panels = $('.vote-results');
    var panelsButton = $('.dropdown-results');
    panels.hide();

    //Click dropdown
    panelsButton.click(function() {
        //get data-for attribute
        var dataFor = $(this).attr('data-for');
        var idFor = $(dataFor);

        //current button
        var currentButton = $(this);
        idFor.slideToggle(400, function() {
            //Completed slidetoggle
            if(idFor.is(':visible'))
            {
                currentButton.html('Hide Results');
            }
            else
            {
                currentButton.html('View Results');
            }
        })
    });
});


$('#ModStart').click(()=>{
    $('#nameModal').text($('#name').val());
    $('#mailModal').text($('#email').val());
    $('#descModal').text($('#description').val());
    $('#previewMod').attr('src', $('#preview').attr('src'));
});