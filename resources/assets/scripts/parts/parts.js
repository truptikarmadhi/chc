export class Parts {

    init() {
        this.CaseStudyTags();
        this.EventOpenButton();
        this.MoreFilter();
    }

    MoreFilter(){
        $(document).ready(function() {
            $('.more-filter').on('click', function(e) {
                e.stopPropagation(); // prevent click from bubbling
                $(this).closest('.more-filter-container').toggleClass('active');
            });

            // Optional: close the menu when clicking outside
            $(document).on('click', function(e) {
                if (!$(e.target).closest('.more-filter-container').length) {
                    $('.more-filter-container').removeClass('active');
                }
            });
        });

        $(document).ready(function () {
    function handleCategoryDisplay() {
        if ($(window).width() <= 992) {
            // mobile/tablet - show all
            $('.extra-cat').removeClass('d-none');
        } else {
            // desktop - show only first 3
            $('.extra-cat').addClass('d-none');
        }
    }

    // Run on load
    handleCategoryDisplay();

    // Run on resize
    $(window).resize(function () {
        handleCategoryDisplay();
    });
});
        $(document).ready(function() {
    if ($(window).width() > 992) {
        $('.filter-item').removeClass('d-none');
    } else {
        $('.filter-item').addClass('d-none');
    }

    // Agar resize pe bhi check karna ho:
    $(window).resize(function() {
        if ($(window).width() > 992) {
            $('.filter-item').removeClass('d-none');
        } else {
            $('.filter-item').addClass('d-none');
        }
    });
});
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
                        `<div class="prefix prefix--more bg-B4B4B4-btn hg-regular font14 leading18 text-white radius5 d-inline-flex align-items-center me-2 res-font10">+${remaining}</div>`
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
