/* ======== AVOID `CONSOLE` ERRORS IN BROWSERS THAT LACK A CONSOLE
 ========================================================================== */
(function () {
    var method;
    var noop = function () {
    };
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());

/* ==================== ОПРЕДЕЛЯЕМ ВЕРСИЮ IE
 ========================================================================== */
function isIE() {
    var myNav = navigator.userAgent.toLowerCase();
    var result = (myNav.indexOf('msie') != -1) ? parseInt(myNav.split('msie')[1]) : false;
    //alert(result);
    return result;
}

/* ==================== НАСТРОЙКИ ARCTICMODAL
 ========================================================================== */
arcticmodal_settings = {
    overlay: {css: {opacity: .9}}
};