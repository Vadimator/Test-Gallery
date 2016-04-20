'use strict';

$(document).ready(function() {

    var href = window.location.href;
    var host = window.location.host;

    /*
    $('#sortDateASC').click(function() {
        $.get('http://' + window.location.host + '/main/sortDate/ASC/', function(data){
            $('body').html(data);
        });
    });

    $('#sortDateDESC').click(function() {
        $.get('http://' + window.location.host + '/main/sortDate/DESC', function(data){
            $('body').html(data);
        });
    });
    */

    $('#sortSizeASC').click(function() {
        $.get('http://' + window.location.host + '/main/sortSize/ASC', function(data){
            $('body').html(data);
        });
    });
    $('#sortSizeDESC').click(function() {
        $.get('http://' + window.location.host + '/main/sortSize/DESC', function(data){
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
    
    
    
});
