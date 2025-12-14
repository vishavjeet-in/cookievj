/**
 * Admin JavaScript
 *
 * @package CookieVJ
 */

(function($) {
    'use strict';

    $(document).ready(function() {
        // Initialize color pickers
        if ($.fn.wpColorPicker) {
            $('.cookievj-color-picker').wpColorPicker();
        }
    });

})(jQuery);