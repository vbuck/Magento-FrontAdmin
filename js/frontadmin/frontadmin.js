jQuery.noConflict();
var jQueryMeobook = jQuery;
// Init fancybox
jQueryMeobook(document).ready(function() {
    if (jQueryMeobook('#page-edit-link a').length) {
        jQueryMeobook('#page-edit-link a').fancybox({
            fitToView   : true,
            width       : '70%',
            height      : '60%',
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
