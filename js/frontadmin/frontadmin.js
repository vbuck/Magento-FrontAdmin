jQuery.noConflict();
var jQueryMeobook = jQuery;
// Inject css
jQueryMeobook('head').append('<link rel="stylesheet" type="text/css" href="' + document.location.origin + '/js/frontadmin/frontadmin.css" media="all">');
jQueryMeobook('head').append('<link rel="stylesheet" type="text/css" href="' + document.location.origin + '/js/frontadmin/jquery.fancybox.css" media="all">');
// Init fancybox
jQueryMeobook(document).ready(function() {
    if (jQueryMeobook('#page-edit-link a').length) {
        jQueryMeobook('#page-edit-link a').fancybox({
            fitToView   : true,
            width       : '90%',
            height      : '80%',
            autoSize    : true,
            autoCenter  : true,
            fitToView   : true,
            closeClick  : true,
            openEffect  : 'elastic',
            closeEffect : 'fade'
        });
    };
});
// send refresh cache request
var flushAllCache = function(url){
    new Ajax.Request(url, {
        parameters: {isAjax: 1, method: 'POST'},
        onLoading: function(){$('frontadmin-please-wait').show();},
        onSuccess: function(transport) {
            window.location.reload();
        }
    });
    return false;
};
