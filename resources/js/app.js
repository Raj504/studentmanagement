// resources/js/app.js

require('./bootstrap');

(function($) {
    $fn = 'write_txt';
    $d_step = 0;
    $d_bchars = 300; //ms
    $total_phrases = 0;
    $frontend_array = null;
    $all_phrases = null;
    $backend_array = null;
    $w_line = null;
    $w_w_line = null;
    $w_h_line = null;
    $d_el = null;
    $b_time = 100; // back time
    $3d = -5;
    $now_span = null;
    $b_el = null;

    function change_w_line(top, left) {
        $w_line.css('top', top - ($w_h_line / 2) + 19 - $3d + 'px');
        $w_line.css('left', left + $w_w_line * 2 + 'px');
    }

    function d_check_resize() {
        $(window).resize(function() {
            try {
                var fleft = ($now_span.offset() || {
                    "fleft": NaN
                }).top;
                if (!isNaN(fleft)) {
                    change_w_line($now_span.offset().top - $now_span.parent().offset().top, $now_span.offset().left + parseInt($now_span.width()));
                }
            } catch ($e) {}
            var ba = $backend_array;
            $.each(ba, function(i, e) {
                var top = ($(e).offset() || {
                    "top": NaN
                }).top;
                if (!isNaN(top)) {
                    var left = $(e).offset().left - $(e).parent().parent().offset().left;
                    var ftop = $(e).offset().top - $(e).parent().offset().top - $3d;
                    var fa = $frontend_array;
                    try {
                        fa[i].css({
                            left: left + 'px',
                            top: ftop + 'px'
                        });
                    } catch (e) {}
                }
            });
        });
    }

    function b_to_delete($phrase) {
        $d_step++;
        if ($total_phrases - 1 < $d_step) {
            $d_step = 0;
        }
        $nphrase = $all_phrases[$d_step];
        $equalChars = 0;

        var del_step = 0;
        var ba = $backend_array;
        var fa = $frontend_array;

        function d_with_interval(del, ds) {
            var t = window.setInterval(function() {
                del.remove();
                $backend_array.splice(ds, 1);
                if (ds > $equalChars) {
                    $now_span = $backend_array[ds - 1];
                    $(window).resize();
                }
                $frontend_array[ds].remove();
                $frontend_array.splice(ds, 1);
                if (ds == $equalChars) {
                    b_to_write($nphrase, $equalChars, $b_el, true);
                    b_to_write($nphrase, $equalChars, $d_el, false);
                }
                window.clearInterval(t);
            }, (($phrase.length) - 1 - ds) * $b_time);
        }

        for (var i = $phrase.length - 1; i >= $equalChars; i--) {
            del_step = i;
            d_with_interval(ba[i], del_step);
        }
        if ($phrase.length == $equalChars) {
            b_to_write($nphrase, $equalChars, $b_el, true);
            b_to_write($nphrase, $equalChars, $d_el, false);
        }
    }

    function b_to_write(phrase, pos, parent, bk) {
        if ($d_step == 0 && bk) {}

        if (bk && $backend_array == null) {
            $backend_array = [];
        } else if (!bk && $frontend_array == null) {
            $frontend_array = [];
        }

        var c_length = phrase.length;
        var c_step = 0;
        var w_chars = pos;

        function wait_b_chars(char, time) {
            var t = window.setInterval(function() {
                var span = $('<span>', {
                    style: 'opacity:0;'
                });
                span.text(char);
                parent.append(span);

                if (bk) {
                    $backend_array[w_chars] = span;
                } else {
                    $frontend_array[w_chars] = span;
                }

                if (!bk) {
                    var b_left = $backend_array[w_chars].offset().left;
                    span.css('left', b_left + 'px');
                    var b_top = $backend_array[w_chars].offset().top - $b_el.offset().top - $3d;
                    span.css('top', b_top + 'px');
                    var sw = parseInt(span.offset().left - parent.offset().left);
                    var sh = parseInt(span.offset().top - parent.offset().top);
                    var s_w_h = parseInt(span.height());
                    var s_w_w = parseInt(span.width());
                    change_w_line(sh + $3d, sw + s_w_w);
                }

                span.css('opacity', '1');
                $now_span = span;

                w_chars++;
                if (w_chars == c_length) {
                    if (!bk) {
                        b_to_delete(phrase);
                    }
                }
                window.clearInterval(t);
            }, time * $d_bchars);
        }

        for (var i = pos; i < c_length; i++) {
            wait_b_chars(phrase[i], c_step);
            if (!bk) {
                $(window).resize();
                c_step += 1;
            }
        }
        if (pos == c_length) {
            b_to_delete(phrase);
        }
    }

    function wr(el, options) {
        $d_el = el;
        $b_el = el.find('.backend_txt');
        $w_line = el.find('.w_line');
        $w_h_line = parseInt($w_line.css('height'));
        var $w_w_line = parseInt($w_line.css('width'));
        options = $.extend({}, {}, options);
        var phrases = options.phrase;
        $total_phrases = phrases.length;
        $all_phrases = phrases;
        b_to_write(phrases[0], 0, $b_el, true);
        b_to_write(phrases[0], 0, $d_el, false);
        $w_line.toggleClass('active');
        d_check_resize();
    };

    $.fn[$fn] = function(options) {
        return this.each(function() {
            if (!$.data(this, $fn)) {
                $.data(this, $fn, new wr($(this), options));
            }
        });
    }
})(jQuery);

$(document).ready(function() {
    $('.d_txt').write_txt({
        phrase: ['WAVE', 'OCEAN', 'SEA', 'STORM', 'MOUNTAIN', 'TEXTEFFECTV2']
    });
});
