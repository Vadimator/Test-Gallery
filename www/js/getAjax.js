'use strict';

$(document).ready(function() {

    var href = window.location.href;
    var host = window.location.host;
    var main = 'http://' + host + '/main';
    var pageOfNumber = $('ul.pagination').find('a').html() - 1;
    var sort = 'sizeFile';
    var type = 'DESC';




    $('.title-text').find('button').click(function() {
        var text = $(this).parent().find('div.title').html();
        $(this).parent().find('.title').replaceWith("<input type='text' id='exampleInputFile' name='description'  maxlength='200' class='form-control' value=" + text + ">");

        var inputTag = $(this).parent().find('input');
        var idBtn    = $(this).attr('id');
        var href     = 'http://' + window.location.host;

        inputTag.keyup(function(event) {
            if(event.keyCode == 13) {
                var textInput = $(this).val();
                $.ajax({
                    type: 'POST',
                    url: 'http://' + host + '/main/edit/' + idBtn + "/" + textInput,
                    success: function(data){
                        $(this).parent().find('title').html(data);
                    }
                });
                $(this).replaceWith("<div class='title'>" + textInput + "</div>");
            }
        });

        $(this).click(function() {
            var textInput = inputTag.val();
            $.ajax({
                type: 'POST',
                url: 'http://' + host + '/main/edit/' + idBtn + "/" + textInput,
                success: function(data){
                    $(this).parent().find('title').html(data);
                }
            });
            $(inputTag).replaceWith("<div class='title'>" + textInput + "</div>");
        });
    });

    $("ul.pagination").find('a').click(function() {
        pageOfNumber = $(this).html() - 1;
        $('ul.pagination').find('li').removeClass('active');
        $(this).parent().addClass('active');
        $.get('http://' + host + '/main/page/' + pageOfNumber  + '/' + sort + '/' + type, function(data) {
            $('.gallery').html(data);
            someFunction();
        });
    });

    $('#sortSizeDESC').click(function() {
       sortFunc('sizeFile', 'DESC');
    });

    $('#sortSizeASC').click(function() {
        sortFunc('sizeFile', 'ASC');
    });

    $('#sortDateASC').click(function() {
       sortFunc('uploadDate', 'ASC');
    });

    $('#sortDateDESC').click(function() {
       sortFunc('uploadDate', 'DESC');
    });



    $('.close').on('click', function()  {
        var id = $(this).attr('data');

        $.ajax({
            type: 'POST',
            url: 'http://' + host + "/main/delete/" + id + '/' + pageOfNumber,
            success: function(data){
                $('article').html(data);

                someFunction();

            }
        });
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
            $.ajax({
                type: 'POST',
                url: 'http://' + host + "/main/delete/" + id + '/' + pageOfNumber,
                success: function(data){
                    $('article').html(data);
                    var countLI = $('ul.gallery li').size();
                    if(countLI == 0) {
                        --pageOfNumber;
                        $.get('http://' + host + '/main/page/' + pageOfNumber  + '/' + sort + '/' + type, function(data) {
                            $('.gallery').html(data);
                            someFunction();
                        });
                    }
                    someFunction();
                    //pagination
                    $("ul.pagination").find('a').click(function() {
                        pageOfNumber = $(this).html() - 1;
                        $('ul.pagination').find('li').removeClass('active');
                        $(this).parent().addClass('active');
                        $.get('http://' + host + '/main/page/' + pageOfNumber  + '/' + sort + '/' + type, function(data) {
                            $('.gallery').html(data);
                            someFunction();
                        });
                    });
                }
            });
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
                    $.ajax({
                        type: 'POST',
                        url: 'http://' + host + '/main/edit/' + idBtn + "/" + textInput,
                        success: function(data){
                            $(this).parent().find('title').html(data);
                        }
                    });
                    $(this).replaceWith("<div class='title'>" + textInput + "</div>");
                }
            });

            $(this).click(function() {
                var textInput = inputTag.val();
                $.ajax({
                    type: 'POST',
                    url: 'http://' + host + '/main/edit/' + idBtn + "/" + textInput,
                    success: function(data){
                        $(this).parent().find('title').html(data);

                    }
                });
                $(inputTag).replaceWith("<div class='title'>" + textInput + "</div>");
            });
        });
        //ligtcase
        $('a[data-rel^=lightcase]').lightcase();
    }

    function sortFunc(methodSort, typeSort) {
        $.ajax({
            type: 'POST',
            url: 'http://' + host + '/main/sort/' + methodSort + '/' + pageOfNumber + '/' + typeSort,
            success: function(data){
                $('.gallery').html(data);
                sort = methodSort;
                type = typeSort;
                someFunction();
            }
        });
    }
});
