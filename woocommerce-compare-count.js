/* global jQuery, woocCount */
( function( $ ) {
    $(document).on("click", "#cboxOverlay, #cboxClose, a.compare:not(.added), .compare-list .remove a, a.yith_woocompare_clear, .yith-woocompare-widget li a.remove, .yith-woocompare-widget a.clear-all, .yith-woocompare-popup tr.remove a", function(e) {
        e.preventDefault();
        var data = {
            action: 'woocc'
        }
        setTimeout(function(){
            $.get(woocCount.ajaxurl + 'woocc', data, function(rez){
                $('.woocompare-count').text(rez);
            })
        }, 1000);
    });
}( jQuery ) );