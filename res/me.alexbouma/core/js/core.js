/**
 * jQuery AutoRefresh voor @DashboardiOS
 * 
 * @author Alex Bouma
 * @see http://www.alexbouma.me
 */
var TIME_HALF_MINUTE = 30000;
var TIME_MINUTE = TIME_HALF_MINUTE * 2;
var TIME_FIVE_MINUTE = TIME_MINUTE * 5;
var TIME_HALF_HOUR = TIME_FIVE_MINUTE * 6;

function autoRefreshMe(id, timeout) {
    if (timeout == null || timout == undefined) timout = TIME_FIVE_MINUTE;
    
    $.PeriodicalUpdater({
        url : 'index.php?id=' + id,
        minTimeout : timeout,
        maxTimeout : timeout * 20,
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
function loadMe(id) {
    $.ajax({
        url: 'index.php?id=' + id + '&f',
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

//fgnass.github.com/spin.js#v1.2.5
(function(a,b,c){function g(a,c){var d=b.createElement(a||"div"),e;for(e in c)d[e]=c[e];return d}function h(a){for(var b=1,c=arguments.length;b<c;b++)a.appendChild(arguments[b]);return a}function j(a,b,c,d){var g=["opacity",b,~~(a*100),c,d].join("-"),h=.01+c/d*100,j=Math.max(1-(1-a)/b*(100-h),a),k=f.substring(0,f.indexOf("Animation")).toLowerCase(),l=k&&"-"+k+"-"||"";return e[g]||(i.insertRule("@"+l+"keyframes "+g+"{"+"0%{opacity:"+j+"}"+h+"%{opacity:"+a+"}"+(h+.01)+"%{opacity:1}"+(h+b)%100+"%{opacity:"+a+"}"+"100%{opacity:"+j+"}"+"}",0),e[g]=1),g}function k(a,b){var e=a.style,f,g;if(e[b]!==c)return b;b=b.charAt(0).toUpperCase()+b.slice(1);for(g=0;g<d.length;g++){f=d[g]+b;if(e[f]!==c)return f}}function l(a,b){for(var c in b)a.style[k(a,c)||c]=b[c];return a}function m(a){for(var b=1;b<arguments.length;b++){var d=arguments[b];for(var e in d)a[e]===c&&(a[e]=d[e])}return a}function n(a){var b={x:a.offsetLeft,y:a.offsetTop};while(a=a.offsetParent)b.x+=a.offsetLeft,b.y+=a.offsetTop;return b}var d=["webkit","Moz","ms","O"],e={},f,i=function(){var a=g("style");return h(b.getElementsByTagName("head")[0],a),a.sheet||a.styleSheet}(),o={lines:12,length:7,width:5,radius:10,rotate:0,color:"#000",speed:1,trail:100,opacity:.25,fps:20,zIndex:2e9,className:"spinner",top:"auto",left:"auto"},p=function q(a){if(!this.spin)return new q(a);this.opts=m(a||{},q.defaults,o)};p.defaults={},m(p.prototype,{spin:function(a){this.stop();var b=this,c=b.opts,d=b.el=l(g(0,{className:c.className}),{position:"relative",zIndex:c.zIndex}),e=c.radius+c.length+c.width,h,i;a&&(a.insertBefore(d,a.firstChild||null),i=n(a),h=n(d),l(d,{left:(c.left=="auto"?i.x-h.x+(a.offsetWidth>>1):c.left+e)+"px",top:(c.top=="auto"?i.y-h.y+(a.offsetHeight>>1):c.top+e)+"px"})),d.setAttribute("aria-role","progressbar"),b.lines(d,b.opts);if(!f){var j=0,k=c.fps,m=k/c.speed,o=(1-c.opacity)/(m*c.trail/100),p=m/c.lines;!function q(){j++;for(var a=c.lines;a;a--){var e=Math.max(1-(j+a*p)%m*o,c.opacity);b.opacity(d,c.lines-a,e,c)}b.timeout=b.el&&setTimeout(q,~~(1e3/k))}()}return b},stop:function(){var a=this.el;return a&&(clearTimeout(this.timeout),a.parentNode&&a.parentNode.removeChild(a),this.el=c),this},lines:function(a,b){function e(a,d){return l(g(),{position:"absolute",width:b.length+b.width+"px",height:b.width+"px",background:a,boxShadow:d,transformOrigin:"left",transform:"rotate("+~~(360/b.lines*c+b.rotate)+"deg) translate("+b.radius+"px"+",0)",borderRadius:(b.width>>1)+"px"})}var c=0,d;for(;c<b.lines;c++)d=l(g(),{position:"absolute",top:1+~(b.width/2)+"px",transform:b.hwaccel?"translate3d(0,0,0)":"",opacity:b.opacity,animation:f&&j(b.opacity,b.trail,c,b.lines)+" "+1/b.speed+"s linear infinite"}),b.shadow&&h(d,l(e("#000","0 0 4px #000"),{top:"2px"})),h(a,h(d,e(b.color,"0 0 1px rgba(0,0,0,.1)")));return a},opacity:function(a,b,c){b<a.childNodes.length&&(a.childNodes[b].style.opacity=c)}}),!function(){function a(a,b){return g("<"+a+' xmlns="urn:schemas-microsoft.com:vml" class="spin-vml">',b)}var b=l(g("group"),{behavior:"url(#default#VML)"});!k(b,"transform")&&b.adj?(i.addRule(".spin-vml","behavior:url(#default#VML)"),p.prototype.lines=function(b,c){function f(){return l(a("group",{coordsize:e+" "+e,coordorigin:-d+" "+ -d}),{width:e,height:e})}function k(b,e,g){h(i,h(l(f(),{rotation:360/c.lines*b+"deg",left:~~e}),h(l(a("roundrect",{arcsize:1}),{width:d,height:c.width,left:c.radius,top:-c.width>>1,filter:g}),a("fill",{color:c.color,opacity:c.opacity}),a("stroke",{opacity:0}))))}var d=c.length+c.width,e=2*d,g=-(c.width+c.length)*2+"px",i=l(f(),{position:"absolute",top:g,left:g}),j;if(c.shadow)for(j=1;j<=c.lines;j++)k(j,-2,"progid:DXImageTransform.Microsoft.Blur(pixelradius=2,makeshadow=1,shadowopacity=.3)");for(j=1;j<=c.lines;j++)k(j);return h(b,i)},p.prototype.opacity=function(a,b,c,d){var e=a.firstChild;d=d.shadow&&d.lines||0,e&&b+d<e.childNodes.length&&(e=e.childNodes[b+d],e=e&&e.firstChild,e=e&&e.firstChild,e&&(e.opacity=c))}):f=k(b,"animation")}(),a.Spinner=p})(window,document);

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

function spinme(id) {
    var target = document.getElementById(id);
    return new Spinner(SPINNER_OPTS).spin(target);
}