(function($) {
    $(document).ready(function() {
        var searchForm;

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