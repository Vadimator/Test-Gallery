'use strict';

$(document).ready(function() {
    $('.title-text').find('button').click(function() {
        var text = $(this).parent().find('div.title').html();
        $(this).parent().find('.title').replaceWith("<input type='text' id='exampleInputFile' name='description'  maxlength='200' class='form-control' value=" + text + ">");

        var inputTag = $(this).parent().find('input');
        var idBtn    = $(this).attr('id');
        var href     = window.location.href;

        inputTag.keyup(function(event) {
            if(event.keyCode == 13) {
                var textInput = $(this).val();
                $.post(href + "main/edit/" + idBtn + "/" + textInput + "");
                $(this).replaceWith("<div class='title'>" + textInput + "</div>");
            }
        });


        $(this).click(function() {
            var textInput = inputTag.val();
            $.post(href + "main/edit/" + idBtn + "/" + textInput + "");
            $(inputTag).replaceWith("<div class='title'>" + textInput + "</div>");
        });
    });
});