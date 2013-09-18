$(function() {
    ////////////////////////////////
    var $url  = $('<a href="'+window.location+'"></a>');
    $('a[href$="'+$url.attr("uri:filename")+'"]').parent().addClass('active');
    ////////////////////////////////
    $('input, textarea').click(function()
    {
	$(this).parent().removeClass('error');
    });
    ////////////////////////////////

});