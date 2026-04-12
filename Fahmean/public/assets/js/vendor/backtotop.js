(function ($) {
    "use strict";

    $(document).ready(function () {
        var progressPath = document.querySelector('.rbt-progress-parent path');

        // Check if the element exists to prevent errors on pages where the component is disabled
        if (progressPath) {
            var pathLength = progressPath.getTotalLength();

            progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
            progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
            progressPath.style.strokeDashoffset = pathLength;
            progressPath.getBoundingClientRect();
            progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';

            var updateProgress = function () {
                var scroll = $(window).scrollTop();
                var height = $(document).height() - $(window).height();
                var progress = pathLength - (scroll * pathLength / height);
                progressPath.style.strokeDashoffset = progress;
            }

            updateProgress();
            $(window).scroll(updateProgress);

            var offset = 50;
            var duration = 550;

            $(window).on('scroll', function () {
                if ($(this).scrollTop() > offset) {
                    $('.rbt-progress-parent').addClass('rbt-backto-top-active');
                } else {
                    $('.rbt-progress-parent').removeClass('rbt-backto-top-active');
                }
            });

            $('.rbt-progress-parent').on('click', function (event) {
                event.preventDefault();
                $('html, body').animate({
                    scrollTop: 0
                }, duration);
                return false;
            });
        }
    });

})(jQuery);