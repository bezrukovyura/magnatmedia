// jQueryMobile-SwipeUpDown
// ----------------------------------
//
// Copyright (c)2012 Donnovan Lewis
// Distributed under MIT license
//
// https://github.com/blackdynamo/jquerymobile-swipeupdown

(function () {
// initializes touch and scroll events
    var supportTouch = jQuery.support.touch,
        scrollEvent = "touchmove scroll",
        touchStartEvent = supportTouch ? "touchstart" : "mousedown",
        touchStopEvent = supportTouch ? "touchend" : "mouseup",
        touchMoveEvent = supportTouch ? "touchmove" : "mousemove";

    // handles swipeup and swipedown
    jQuery.event.special.swipeupdown = {
        setup: function () {
            var thisObject = this;
            var jQuerythis = jQuery(thisObject);

            jQuerythis.bind(touchStartEvent, function (event) {
                var data = event.originalEvent.touches ?
                        event.originalEvent.touches[ 0 ] :
                        event,
                    start = {
                        time: (new Date).getTime(),
                        coords: [ data.pageX, data.pageY ],
                        origin: jQuery(event.target)
                    },
                    stop;

                function moveHandler(event) {
                    if (!start) {
                        return;
                    }

                    var data = event.originalEvent.touches ?
                        event.originalEvent.touches[ 0 ] :
                        event;
                    stop = {
                        time: (new Date).getTime(),
                        coords: [ data.pageX, data.pageY ]
                    };

                    // prevent scrolling
                    if (Math.abs(start.coords[1] - stop.coords[1]) > 10) {
                        event.preventDefault();
                    }
                }

                jQuerythis
                    .bind(touchMoveEvent, moveHandler)
                    .one(touchStopEvent, function (event) {
                        jQuerythis.unbind(touchMoveEvent, moveHandler);
                        if (start && stop) {
                            if (stop.time - start.time < 1000 &&
                                Math.abs(start.coords[1] - stop.coords[1]) > 30 &&
                                Math.abs(start.coords[0] - stop.coords[0]) < 75) {
                                start.origin
                                    .trigger("swipeupdown")
                                    .trigger(start.coords[1] > stop.coords[1] ? "swipeup" : "swipedown");
                            }
                        }
                        start = stop = undefined;
                    });
            });
        }
    };

//Adds the events to the jQuery events special collection
    jQuery.each({
        swipedown: "swipeupdown",
        swipeup: "swipeupdown"
    }, function (event, sourceEvent) {
        jQuery.event.special[event] = {
            setup: function () {
                jQuery(this).bind(sourceEvent, jQuery.noop);
            }
        };
        //Adds new events shortcuts
        jQuery.fn[ event ] = function( fn ) {
            return fn ? this.bind( event, fn ) : this.trigger( event );
        };
        // jQuery < 1.8
        if ( jQuery.attrFn ) {
            jQuery.attrFn[ event ] = true;
        }
    });

})();