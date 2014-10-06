jQuery.noConflict();
(function() {
    var url = document.location.origin + "/frontadmin/index/initFrontAdmin";
    new Ajax.Request(url, {
        parameters: {isAjax: 1, method: 'POST'},
        onSuccess: function(transport) {
            var menuContent = transport.responseText;
            if(menuContent.length){
                menuContent += "<div id='frontadmin-please-wait' style='display:none'><p class='loader' id='loading_mask_loader'><img src='" + document.location.origin + "/js/frontadmin/images/ajax-loader-tr.gif' /><br/>Please wait...</p></div>";
                var div = document.createElement('div');
                div.id = 'frontadmin-nav-bar';
                div.innerHTML = menuContent;
                $$('body')[0].insertBefore(div, $$('body')[0].firstChild);
            }
        }
    });
}());