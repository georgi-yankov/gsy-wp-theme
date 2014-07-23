(function($) {
    $(document).ready(function() {
        $('#main-nav > ul > li:has(ul)')
                .addClass('parent')
                .prepend('<span class="dropdown-arrow"></span>');
        
        // Feature Carousel
        $("#carousel").featureCarousel({
            // include options like this:
            // (use quotes only for string values, and no trailing comma after last option)
            // option: value,
            // option: value
        });
    });
}(jQuery));