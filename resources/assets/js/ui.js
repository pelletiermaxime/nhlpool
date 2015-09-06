var $ = require('jquery');

$(function() {
    var $layout   = $('#layout'),
        $menu     = $('#menu'),
        $menuLink = $('#menuLink');

    $menuLink.click(function(event) {
        event.preventDefault();
        $layout.toggleClass('active');
        $menu.toggleClass('active');
        $menuLink.toggleClass('active');
    });
});
