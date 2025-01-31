(function ($) {
    "use strict";
    $.fn.progressScroll = function (e) {
        var r = $.extend({ width: 50, height: 50, borderSize: 6, mainBgColor: "var(--scrollup-bg-color)", lightBorderColor: "#0F172A", darkBorderColor: "var(--scrollup-border-color)", fontSize: "20px" }, e);
        var t,
            i,
            n,
            o = this,
            a = this.selector,
            s = "progressScroll-border",
            d = "progressScroll-circle",
            l = "progressScroll-text";
        this.getHeight = function () {
            t = window.innerHeight;
            i = document.body.offsetHeight;
            n = i - t;
        };
        this.addEvent = function () {
            var e = document.createEvent("Event");
            e.initEvent("scroll", false, false);
            window.dispatchEvent(e);
        };
        this.updateProgress = function (e) {
            var e = Math.round(100 * e);
            var r = (e * 360) / 100;
            if (r <= 180) {
                $("." + s, a).css("background-image", "linear-gradient(" + (90 + r) + "deg, transparent 50%, #0F172A 50%),linear-gradient(90deg, #0F172A 50%, transparent 50%)");
            } else {
                $("." + s, a).css("background-image", "linear-gradient(" + (r - 90) + "deg, transparent 50%, var(--scrollup-border-color) 50%),linear-gradient(90deg, #0F172A 50%, transparent 50%)");
            }
            $("." + l, a).text();
        };
        //e+"%"
        this.prepare = function () {
            $(a).addClass("progressScroll");
            $(a).html("<div class='" + s + "'><div class='" + d + "'><span class='" + l + "'></span></div></div>");
            $(".progressScroll").css({ width: r.width, height: r.height, position: "fixed", bottom: "20px", right: "20px" });
            $("." + s, a).css({ position: "relative", "text-align": "center", width: "100%", height: "100%", "border-radius": "50%", "background-color": r.darkBorderColor, "background-image": "linear-gradient(91deg, transparent 50%," + r.lightBorderColor + "50%), linear-gradient(90deg," + r.lightBorderColor + "50%, transparent 50%" });
            $("." + d, a).css({ position: "relative", top: "50%", left: "50%", transform: "translate(-50%, -50%)", "text-align": "center", width: r.width - r.borderSize, height: r.height - r.borderSize, "border-radius": "50%", "background-color": r.mainBgColor });
            $("." + l, a).css({ top: "50%", left: "50%", transform: "translate(-50%, -50%)", position: "absolute", "font-size": r.fontSize });
        };
        this.init = function () {
            o.prepare();
            $(window).bind("scroll", function () {
                var e = window.pageYOffset || document.documentElement.scrollTop,
                    r = Math.max(0, Math.min(1, e / n));
                o.updateProgress(r);
            });
            $(window).bind("resize", function () {
                o.getHeight();
                o.addEvent();
            });
            $(window).bind("load", function () {
                o.getHeight();
                o.addEvent();
            });
        };
        o.init();
    };

})(jQuery);