export class Filter {
    init() {
        this.ProjectFilter();
    }
    ProjectFilter() {
        $(".filter-button").click(function () {
            var value = $(this).attr('data-filter');
            if (value == "all") {
                $('.filter').show('500');
            }
            else {
                $('.filter').not('.' + value).hide('1000');
                $('.filter').filter('.' + value).show('1000');
            }
        });

        $(".filter-button").click(function () {
            $(this).addClass("active").siblings().removeClass("active");
        });
    }
}