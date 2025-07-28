/**
 * Fit Out Heroes Theme JavaScript
 */

(function($) {
    'use strict';

    $(document).ready(function() {
        
        // Mobile menu toggle
        $('.menu-toggle').on('click', function() {
            var $button = $(this);
            var $menu = $('.primary-menu-container');
            var expanded = $button.attr('aria-expanded') === 'true';
            
            $button.attr('aria-expanded', !expanded);
            $menu.toggleClass('mobile-menu-open');
        });

        // Smooth scrolling for anchor links
        $('a[href*="#"]:not([href="#"])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html, body').animate({
                        scrollTop: target.offset().top - 100
                    }, 1000);
                    return false;
                }
            }
        });

        // Add responsive table wrapper
        $('.entry-content table').wrap('<div class="table-responsive"></div>');

        // External links open in new window
        $('.entry-content a[href^="http"]').not('a[href*="' + location.hostname + '"]').attr('target', '_blank').attr('rel', 'noopener noreferrer');

    });

})(jQuery);