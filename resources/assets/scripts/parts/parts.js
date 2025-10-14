export class Parts{

    init() {
        this.BottomLine();
        this.formSubmit();
        this.calenadrHeading();
    }

    BottomLine(){
        $('.close-icon').on('click', function () {
            $('.bottom-line').addClass('d-none');
        });
    }
    formSubmit(){
        $(document).ready(function() {
            document.addEventListener('wpcf7submit', function(event) {
                if (event.target.closest('.my-form')) {
                    if (event.detail.apiResponse && event.detail.apiResponse.status === 'mail_sent') {
                        $('.thankyou-button').trigger('click');
                    }
                }
            }, false);
        });
    }
    calenadrHeading(){
        $(document).ready(function() {
        if ($('body').hasClass('post-type-archive-tribe_events') || $('body').hasClass('events-archive')) {
            var checkExist = setInterval(function() {
                var calendarContainer = $('.tribe-events-view');
                var heading = $('.calendar-heading');

                if (calendarContainer.length && heading.length) {
                    clearInterval(checkExist);

                    // Move heading above calendar
                    heading.insertBefore(calendarContainer.first()).show();
                }
            }, 200);
        } else {
            $('.calendar-heading').hide();
        }
    });
    }
}
