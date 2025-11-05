export class Parts {

    init() {
        this.CaseStudyTags();
        this.EventOpenButton();
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
    EventOpenButton() {
      $(document).ready(function () {
          var filterButtons = $(".service-filter-button");
          var viewAllButton = filterButtons.filter('[href="#"]');
          function updateStickyActive() {
              var scrollTop = $(window).scrollTop();
              var anySectionActive = false;
              if (scrollTop < 100) {
                  filterButtons.removeClass("active");
                  viewAllButton.addClass("active");
                  return;
              }
              filterButtons.each(function () {
                  var targetId = $(this).attr("href");
                  if (!targetId || targetId === "#") return;
                  var section = $(targetId);
                  if (section.length) {
                      var sectionTop = section.offset().top;
                      var sectionHeight = section.outerHeight();
                      if (scrollTop >= sectionTop - 100 && scrollTop < sectionTop + sectionHeight - 100) {
                          filterButtons.removeClass("active");
                          $(this).addClass("active");
                          anySectionActive = true;
                          return false; // break loop
                      }
                  }
              });
              if (!anySectionActive) {
                  filterButtons.removeClass("active");
              }
          }
          $(window).on("scroll", updateStickyActive);
          updateStickyActive(); // Run on page load
      });
    }
}
