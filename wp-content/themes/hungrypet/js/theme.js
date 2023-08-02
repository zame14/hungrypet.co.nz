jQuery(function($) {
    setTimeout(function () {
        $("#header").addClass('ani-show');
    }, 200);
    $(".cart-icons-list .fa-search").click(function() {
        $("#searchModal.modal").hide().fadeIn();
        $(this).toggleClass('fa-times');
    });
    $("#searchModal .fa-times").click(function() {
        $("#searchModal.modal").hide();
    });
    if($("#top-banner").length) {
        var h = ($("#top-banner").height() + 20);
        $("#header").css('margin-top', h+'px');
    }
     if($(".page-id-9").length)
     {
         if($(location).attr('hash') == "#loyalty-program")
         {
             $(".faq.lp").addClass('vc_toggle_active');
         }
     }
});