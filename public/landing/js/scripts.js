// load anim

$(window).on('load', function() {
    setTimeout(function() {
        $('.load-anim').addClass('loaded');
    }, 2000);
    setTimeout(function() {
        $(".load-anim").remove();
    }, 4000);
});