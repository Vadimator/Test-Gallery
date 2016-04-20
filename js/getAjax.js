'use strict';

$(document).ready(function() {

    var href = window.location.href;
    var host = window.location.host;
    var main = 'http://' + host + '/main';

    $('#sortDateASC').click(function() {
        if(href != main) {
            window.location.href = main;
        }
        $.get('http://' + window.location.host + '/main/sortDateAsc/', function(data){
            $('body').html(data);
        });
    });

    $('#sortDateDESC').click(function() {
        if(href != main) {
            window.location.href = main;
        }

        $.get('http://' + window.location.host + '/main/sortDateDesc', function(data){
            $('body').html(data);
        });

    });


    $('#sortSizeASC').click(function() {
        if(href != main) {
            window.location.href = main;
        }
        $.get('http://' + window.location.host + '/main/sortFileAsc', function(data){
            $('body').html(data);
        });
    });
    $('#sortSizeDESC').click(function() {
        if(href != main) {
            window.location.href = main;
        }
        $.get('http://' + window.location.host + '/main/sortFileDesc', function(data){
            $('body').html(data);
        });
    });



    $('.close').click(function() {
        var id = $(this).attr('data');
        $.get('http://' + host + "/main/delete/" + id + "");
        window.location.href = 'http://' + host;
    });

    var hrefAdd = 'http://' + host + '/add';

    if(href == hrefAdd) {
        $('ul.nav').find('li').addClass('active');
    }else {
        $('ul.nav').find('li').removeClass('active');
    }


    $('a[data-rel^=lightcase]').lightcase();

    
});
