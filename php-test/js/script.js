

var $ = jQuery.noConflict();

$(document).ready(function () {
    "use strict";
    var winDow = $(window);

    $(".post-content").on("hide.bs.collapse", function(){
        $(this).parent('div').find(".btn").html('Open');

    });
    $(".post-content").on("show.bs.collapse", function(){
        $(this).parent('div').find(".btn").html('Close');
    });

    $('#guestbookForm').validate();

});