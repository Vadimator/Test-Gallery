'use strict';

$(document).ready(function() {

    var href = window.location.href;
    var host = window.location.host;
    var main = 'http://' + host + '/main';
    var pageOfNumber =  $('ul.pagination').find('a').html() - 1;
    var sort = 'sortFileDesc';

    $('.title-text').find('button').click(function() {
        var text = $(this).parent().find('div.title').html();
        $(this).parent().find('.title').replaceWith("<input type='text' id='exampleInputFile' name='description'  maxlength='200' class='form-control' value=" + text + ">");

        var inputTag = $(this).parent().find('input');
        var idBtn    = $(this).attr('id');
        var href     = 'http://' + window.location.host;

        inputTag.keyup(function(event) {
            if(event.keyCode == 13) {
                var textInput = $(this).val();
                $.post(href + "/main/edit/" + idBtn + "/" + textInput + "");
                $(this).replaceWith("<div class='title'>" + textInput + "</div>");
            }
        });

        $(this).click(function() {
            var textInput = inputTag.val();
            $.post(href + "/main/edit/" + idBtn + "/" + textInput + "");
            $(inputTag).replaceWith("<div class='title'>" + textInput + "</div>");
        });
    });

    $("ul.pagination").find('a').click(function() {
        pageOfNumber = $(this).html() - 1;
        $('ul.pagination').find('li').removeClass('active');
        $(this).parent().addClass('active');
        $.get('http://' + host + '/main/page/' + pageOfNumber  + '/' + sort, function(data) {
            $('.gallery').html(data);
            someFunction();
        });
    });

    $('#sortSizeDESC').click(function() {
        $.ajax({
            type: 'POST',
            url: 'http://' + host + '/main/sort/sortFileDesc/' + pageOfNumber,
            success: function(data){
                $('.gallery').html(data);
                someFunction();
                sort = 'sortFileDesc';
            }
        });
    });

    $('#sortSizeASC').click(function() {
        $.ajax({
            type: 'POST',
            url: 'http://' + host + '/main/sort/sortFileASC/' + pageOfNumber,
            success: function(data){
                $('.gallery').html(data);
                someFunction();
                sort = 'sortFileASC';
            }
        });
    });

    $('#sortDateASC').click(function() {
        $.ajax({
            type: 'POST',
            url: 'http://' + host + '/main/sort/sortDateASC/' + pageOfNumber,
            success: function(data){
                $('.gallery').html(data);
                someFunction();
                sort = 'sortDateASC';
            }
        });
    });

    $('#sortDateDESC').click(function() {
        $.ajax({
            type: 'POST',
            url: 'http://' + host + '/main/sort/sortDateDesc/' + pageOfNumber,
            success: function(data){
                $('.gallery').html(data);
                someFunction();
                sort = 'sortDateDesc';
            }
        });
    });

    $('.close').on('click', function()  {
        var id = $(this).attr('data');
        $.get('http://' + host + "/main/delete/" + id);
        window.location.href = 'http://' + host;
    });

   $('#addFoto').click(function() {
       $.get('http://' + host+ '/add/', function(data) {
           $('main').html(data);
       });
   });

    $('.navbar-brand').click(function() {
        $.get('http://' + host + '/main/', function(data) {
            $('body').html(data);
        });
    });

    $('a[data-rel^=lightcase]').lightcase();

    function someFunction() {
        //delete
        $('.close').on('click', function()  {
            var id = $(this).attr('data');
            $.get('http://' + host + "/main/delete/" + id);
            window.location.href = 'http://' + host;
        });
        //edit
        $('.title-text').find('button').click(function() {
            var text = $(this).parent().find('div.title').html();
            $(this).parent().find('.title').replaceWith("<input type='text' id='exampleInputFile' name='description'  maxlength='200' class='form-control' value=" + text + ">");

            var inputTag = $(this).parent().find('input');
            var idBtn    = $(this).attr('id');
            var href     = 'http://' + window.location.host;

            inputTag.keyup(function(event) {
                if(event.keyCode == 13) {
                    var textInput = $(this).val();
                    $.post(href + "/main/edit/" + idBtn + "/" + textInput + "");
                    $(this).replaceWith("<div class='title'>" + textInput + "</div>");
                }
            });


            $(this).click(function() {
                var textInput = inputTag.val();
                $.post(href + "/main/edit/" + idBtn + "/" + textInput + "");
                $(inputTag).replaceWith("<div class='title'>" + textInput + "</div>");
            });
        });
        //ligtcase
        $('a[data-rel^=lightcase]').lightcase();
    }
});
