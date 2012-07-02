/**
 * jQuery AutoRefresh voor @DashboardiOS
 * 
 * @author Alex Bouma
 * @see http://www.alexbouma.me
 */
function autoRefreshMe(id, timeout) {
    $.PeriodicalUpdater({
        url : 'index.php?id=' + id,
        minTimeout : timeout,
        maxTimeout : timeout * 5,
        multiplier : 2
    }, function(data){
        $('#' + id.replace(/\./g, '-')).replaceWith(data);
    });
}
function refreshMe(id) {
    $.ajax({
        url: 'index.php?id=' + id,
        success: function(data) {
            $('#' + id.replace(/\./g, '-')).replaceWith(data);
        }
    });
}

$.getJSON('index.php?preload', function(data) {
    if (data !== null) {
        $.each(data, function(key, val) {
            console.log("Preload: " + val);
            $('<img/>')[0].src = val;
        });
    }
});

/**
 * PeriodicalUpdater - jQuery plugin for timed, decaying ajax calls
 *
 * http://www.360innovate.co.uk
 *
 * Copyright (c) 2009 360innovate (http://www.360innovate.co.uk)
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 *
 * Version: 1.0
 */
(function($) {
    $.PeriodicalUpdater = function(options, callback){

        settings = jQuery.extend({
            url: '',                // URL of ajax request
            method: 'get',          // method; get or post
            sendData: '',           // array of values to be passed to the page - e.g. {name: "John", greeting: "hello"}
            minTimeout: 1000,       // starting value for the timeout in milliseconds
            maxTimeout: 8000,       // maximum length of time between requests
            multiplier: 2,          // if set to 2, timerInterval will double each time the response hasn't changed (up to maxTimeout)
            type: 'text'            // response type - text, xml, json etc - as with $.get or $.post
        }, options);
        
        // should we be GETting or POSTing the URL?
        f = settings.method == 'post' || settings.method == 'POST' ? $.post : $.get;

        // you really, really don't want multipliers of less than 1 - it will cause lots of strain on the server!
        settings.multiplier = settings.multiplier < 1 ? 1:settings.multiplier;
        
        // set some initial values, then begin
        var prevContent;
        var timerInterval = settings.minTimeout;
        getdata();
        
        function getdata()
        {
            f(settings.url, settings.sendData, function(d){
                if(prevContent != d)
                {
                    // content has changed
                    prevContent = d;
                    if(callback)
                    {
                        callback(d);
                    }
                    
                    // recursive call to getdata(). You can stop ajax requests from this plugin by calling clearTimeout(PeriodicalTimer);
                    // (on a button click, for example)
                    PeriodicalTimer = setTimeout(getdata, settings.minTimeout);
                }else{
                    // content hasn't changed - re-calculate timers and recursively call getdata() again
                    if(timerInterval < settings.maxTimeout)
                    {
                        timerInterval = timerInterval * settings.multiplier;
                    }
                    
                    if(timerInterval > settings.maxTimeout)
                    {
                        timerInterval = settings.maxTimeout;
                    }
                    
                    PeriodicalTimer = setTimeout(getdata, timerInterval);
                }
            }, settings.type) 
        }
    };  
})(jQuery);