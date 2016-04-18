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
});
