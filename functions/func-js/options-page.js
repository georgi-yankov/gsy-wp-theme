(function($) {
    $(document).ready(function() {

        var introText = (function() {
            var allTrs,
                    introTextFirstTr,
                    introTextSecondTr,
                    introTextFirstValue,
                    introTextSecondValue,
                    addMoreIntroTextButton,
                    removeIntroTextButton;

            allTrs = $('#theme-options-wrap .form-table tbody > tr');

            introTextFirstTr = allTrs.eq(0);
            introTextSecondTr = allTrs.eq(1);

            introTextFirstValue = $('textarea', introTextFirstTr).val();
            introTextSecondValue = $('textarea', introTextSecondTr).val();

            $('textarea', introTextFirstTr).after('<button class="button add-more-intro-text">add more</button>');
            $('textarea', introTextSecondTr).after('<button class="button remove-intro-text">remove</button>');

            addMoreIntroTextButton = $('#theme-options-wrap .add-more-intro-text');
            removeIntroTextButton = $('#theme-options-wrap .remove-intro-text');

            if (!introTextSecondValue.trim()) {
                introTextSecondTr.hide();
            } else {
                addMoreIntroTextButton.hide();
            }

            addMoreIntroTextButton.click(addMoreIntroText);
            removeIntroTextButton.click(removeIntroText);

            function addMoreIntroText(event) {
                event.preventDefault();
                addMoreIntroTextButton.hide();
                introTextSecondTr.show('slow');
            }

            function removeIntroText(event) {
                event.preventDefault();
                addMoreIntroTextButton.show('slow');
                introTextSecondTr.hide('slow');
                $('textarea', introTextSecondTr).val('');
            }
        })();

    });
}(jQuery));