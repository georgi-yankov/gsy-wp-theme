(function($) {
    $(document).ready(function() {
        var searchForm,
                scrollToTopButton;

        // $('#main-nav > ul > li:has(ul)').prepend('<span class="dropdown-arrow"></span>');

        // Feature Carousel
        $("#carousel").featureCarousel({
            // include options like this:
            // (use quotes only for string values, and no trailing comma after last option)
            // option: value,
            // option: value
        });

        // Search form
        searchForm = $(".widget.widget_search .searchform");
        $("a", searchForm).click(searchSubmit);

        function searchSubmit(event) {
            myPreventDefault(event);
            searchForm.submit();
        }

        // Go to Top Button
        scrollToTopButton = {
            button: {
                id: $('#scroll-to-top-btn'),
                height: 49,
                width: 50,
                distance: 12
            },
            siteWidth: 940,
            minWidth: function() {
                return this.siteWidth + this.button.width * 2 + this.button.distance * 2;
            },
            init: function() {
                var self = this;

                self.checkToShowButton();

                $(window).scroll(function() {
                    self.checkToShowButton();
                });
                $(window).resize(function() {
                    self.checkToShowButton();
                });

                self.button.id.click(self.onButtonClick);
            },
            checkToShowButton: function() {
                this.button.id.css({
                    top: ($(window).height() - this.button.height - this.button.distance) + 'px',
                    right: this.button.distance + 'px'
                });

                if (($(document).height() > $(window).height()) && ($(window).width() > this.minWidth()) && ($(window).scrollTop() > 300)) {
                    this.button.id.fadeIn('slow');
                } else {
                    this.button.id.fadeOut('slow');
                }
            },
            onButtonClick: function() {
                $('html, body').animate({scrollTop: 0}, 'slow');
                return false;
            }
        };

        scrollToTopButton.init();

        // Cross-browser prevent-default function
        function myPreventDefault(event) {
            if (event.preventDefault) {  // if preventDefault exists run it on the original event
                event.preventDefault();
            } else {  // otherwise set the returnValue property of the original event to false (IE)
                event.returnValue = false;
            }
        }
    });
}(jQuery));