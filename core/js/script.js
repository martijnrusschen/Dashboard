/* 
 * Author: Alex Bouma
 * Site: http://www.alexbouma.me
 * Twitter: stayallive
 */
// Predefined Time values
var TIME_SECOND = 1000;
var TIME_HALF_MINUTE = 30000;
var TIME_MINUTE = 60000;
var TIME_FIVE_MINUTE = 300000;
var TIME_HALF_HOUR = 1800000;
var TIME_HOUR = 3600000;
var TIME_DAY = 86400000;
var TIME_WEEK = 604800000;
var TIME_MONTH = 2592000000;
var TIME_YEAR = 31536000000;

// Spinner options
var SPINNER_OPTS = {
    lines: 13, // The number of lines to draw
    length: 7, // The length of each line
    width: 4, // The line thickness
    radius: 10, // The radius of the inner circle
    rotate: 0, // The rotation offset
    color: '#FFF', // #rgb or #rrggbb
    speed: 1, // Rounds per second
    trail: 60, // Afterglow percentage
    shadow: false, // Whether to render a shadow
    hwaccel: false, // Whether to use hardware acceleration
    className: 'spinner', // The CSS class to assign to the spinner
    zIndex: 2e9, // The z-index (defaults to 2000000000)
    top: 'auto', // Top position relative to parent in px
    left: 'auto' // Left position relative to parent in px
};
var SPINNERS = new Object();

// Autorefreshing items
var AUTOREFRESHERS = new Object();

// Helper functions
function isNumber(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
}

// (Auto) refresh functions
function autoRefreshMe(id, timeout) {
    if (timeout == null || timeout == undefined) timeout = TIME_FIVE_MINUTE;
    if (id in AUTOREFRESHERS) return; else AUTOREFRESHERS[id] = timeout;
    
    $.PeriodicalUpdater({
        url : 'index.php?id=' + id,
        minTimeout : timeout,
        maxTimeout : timeout * 10,
        multiplier : 2
    }, function(data){
        $('li#' + id.replace(/\./g, '-')).replaceWith(data);
        console.log("[LOG] {SUCCESS} \"" + id + "\" just refreshed.");
    });
    
    console.log("[LOG] {SUCCESS} autoRefresh has been enabled for \"" + id + "\" with a timeout of " + timeout + " ms or " + timeout / 1000 + " second(s) or " + timeout / 1000 / 60 + " minute(s).");
}
function refreshMe(id) {
    $.ajax({
        url: 'index.php?id=' + id,
        success: function(data) {
            $('#' + id.replace(/\./g, '-')).replaceWith(data);
            console.log("[LOG] {SUCCESS} \"" + id + "\" just refreshed.");
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error("[LOG] {ERROR} refreshMe(" + id + ") says: " + jqXHR.status + " " + jqXHR.statusText);
        }
    });
}

// Userland widget loader
function loadMe(id) {
    $.ajax({
        url: 'index.php?id=' + id + '&f',
        success: function(data) {
            $('#' + id.replace(/\./g, '-')).replaceWith(data);
            console.log("[LOG] {SUCCESS} \"" + id + "\" has loaded successfully.");
            removespin(id);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            $('#' + id.replace(/\./g, '-')).remove();
            console.error("[LOG] {ERROR} loadMe(" + id + ") says: " + jqXHR.status + " " + jqXHR.statusText);
            removespin(id);
        }
    });
}

// Add spinner to element
function spinme(id) {
    var target = document.getElementById(id.replace(/\./g, '-'));
    var spinner = new Spinner(SPINNER_OPTS).spin(target);
    SPINNERS[id] = spinner;
    //console.log("[LOG] {LOG} Spinner for: \"" + id + "\" started!");
}
function removespin(id) {
    SPINNERS[id].stop();
    //console.log("[LOG] {LOG} Spinner for: \"" + id + "\" stopped!");
}

$.getJSON('index.php?preload', function(data) {
    if (data !== null && data.length > 0) {
        $.each(data, function(key, val) {
            $('<img/>')[0].src = val;
        });
        console.log("[LOG] {SUCCESS} Preloaded: " + data.length + " images.");
    } else {
        console.warn("[LOG] {WARNING} Preloading has been disabled by the user.");
        console.warn("[LOG] {WARNING} Or no images are available!?");
    }
});

$(document).ready(function () {
    $("div[role=main]").on("click", "[data-href]", function () {
        var url = $(this).data('href');
                
        var a = document.createElement('a');
        a.setAttribute('href', url);
        a.setAttribute('target', '_blank');

        var dispatch = document.createEvent('HTMLEvents');
        dispatch.initEvent('click', true, true);
        a.dispatchEvent(dispatch);
                
        console.log("[LOG] {INFO} Click has been detected!");
        console.log("[LOG] {INFO} Redirecting to: " + url);
    });
        
    $("div[role=main]").on("DOMNodeInserted", "li[data-refresh=true]", function () {
        var id = $(this).data('id');
        if (id == null || id == undefined) { return; }
        
        var timeout = $(this).data('timeout');
        if (!isNumber(timeout)) { timeout = null; }
        
        console.log("[LOG] {SUCCESS} Found a auto refreshing widget named: \"" + id + "\" processing...");
        autoRefreshMe(id, timeout);
    });
});