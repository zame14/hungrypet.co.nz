jQuery(function($) {
    var $ = jQuery;
    $(".m-search").click(function() {
        $(".m-search .fa").toggleClass('fa-search');
        $(".m-search .fa").toggleClass('fa-times');
        $(".search-form").toggleClass('show-search');
    });
});