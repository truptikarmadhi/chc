export class Parts {

    init() {
        this.CaseStudyTags();
    }

    CaseStudyTags() {
        $(document).ready(function () {
            $('.category-tags').each(function () {
                const $tags = $(this).find('.prefix').not('.prefix--more');
                const total = $tags.length;

                $(this).find('.prefix--more').remove();

                if (total > 2) {
                    $tags.slice(0, 2).show();
                    $tags.slice(2).removeClass('d-inline-flex').addClass('d-none');

                    const remaining = total - 2;

                    $(this).append(
                        `<div class="prefix prefix--more bg-B4B4B4-btn hg-regular font14 leading18 text-white radius5 d-inline-flex align-items-center me-2">+${remaining}</div>`
                    );
                } else {
                    $tags.show();
                }
            });
        });
    }
}
