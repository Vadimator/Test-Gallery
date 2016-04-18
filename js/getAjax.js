'use strict';

$(document).ready(function() {
    $('#sortDate').click(function() {
      $.get('http://laravel.local/main/sortDate', function(data){
          $('body').html(data);
      });
    });

    $('#sortSize').click(function() {
        $.get('http://laravel.local/main/sortSize', function(data){
            $('body').html(data);
        });
    });

    $('.close').click(function() {
        var id = $(this).attr('data');
        $.get("http://laravel.local/main/delete/" + id + "");
        window.location.href = "http://laravel.local/";
    });

    var loc = window.location.toString();
    if(loc == 'http://laravel.local/add') {
        $('ul.nav').find('li').addClass('active');
    }else {
        $('ul.nav').find('li').removeClass('active');
    }
});
