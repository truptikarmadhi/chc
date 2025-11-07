export class Accordion {
    init() {
        this.Accordion();
    }
    Accordion() {
        $(document).ready(function () {
            $('.closet-header').removeClass('active').next('.closet-content').slideUp();
            $('.closet-header').first().addClass('active').next('.closet-content').slideDown();
            $('.closet-header').click(function () {
                if ($(this).hasClass('active')) {
                    $(this).removeClass('active').next('.closet-content').slideUp();
                } else {
                    $('.closet-header').removeClass('active').next('.closet-content').slideUp();
                    $(this).addClass('active').next('.closet-content').slideDown();
                }
            });
        });
    }

}