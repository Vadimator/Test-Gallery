'use strict';

$(document).ready(function() {
    $('.gallery p').find('button').click(function() {
        var text = $(this).parent().find('span').html();
        $(this).parent().find('span').replaceWith("<input type='text' id='exampleInputFile' name='description' maxlength='200' class='form-control' value=" + text + ">");

        var inputTag = $(this).parent().find('input');
        var idBtn    = $(this).attr('id');

        inputTag.keyup(function(event) {
            if(event.keyCode == 13) {
                var textInput = $(this).val();
                $.post("http://laravel.local/main/edit/" + idBtn + "/" + textInput + "");
                $(this).replaceWith("<span>" + textInput + "</span>");
            }
        });

        $(this).click(function() {
            var textInput = inputTag.val();
            $.post("http://laravel.local/main/edit/" + idBtn + "/" + textInput + "");
            $(inputTag).replaceWith("<span>" + textInput + "</span>");
        });
    });
});