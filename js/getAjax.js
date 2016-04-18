'use strict';

$(document).ready(function() {

    var href = window.location.href;

    $('#sortDate').click(function() {
        $.get('http://' + window.location.host + '/main/sortDate', function(data){
          $('body').html(data);
        });
    });

    $('#sortSize').click(function() {
        $.get('http://' + window.location.host + '/main/sortSize', function(data){
            $('body').html(data);
        });
    });

    $('.close').click(function() {
        var id = $(this).attr('data');
        $.get(href + "main/delete/" + id + "");
        window.location.href = href + 'main';
    });

    var hrefAdd = 'http://' + window.location.host + '/add';

    if(href == hrefAdd) {
        $('ul.nav').find('li').addClass('active');
    }else {
        $('ul.nav').find('li').removeClass('active');
    }
});
