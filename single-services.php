<?php include 'templates/page-builder.php'; ?>

<section class="service-bar position-fixed bottom-0 w-100 dmb-30">
  <div class="container">
    <div class="d-inline-flex justify-content-center w-100">
      <div class="service-bar-container radius10 d-none d-lg-block">
      </div>
    </div>
  </div>
</section>


<script>
    jQuery(document).ready(function ($) {
        if ($('body').hasClass('single-services')) {
            $('section[id]').each(function () {
                const sectionId = $(this).attr('id');
                const readableTitle = sectionId
                    .replace(/-/g, ' ')
                    .replace(/\b\w/g, l => l.toUpperCase());
                const anchor = `
            <a href="#${sectionId}" title="${readableTitle}"
               class="hg-regular service-filter-button font16 leading28 text-white d-inline-block text-decoration-none me-5">
               ${readableTitle}
            </a>
        `;
                $('.service-bar-container').append(anchor);
            });
        }
    });
    function shiftFiltersLeftToActive() {
        const $wrapper = $('.service-bar');
        const $filters = $('.service-bar-container');
        const $active = $('.service-filter-button.active');
        if (!$active.length) return;
        const wrapperLeft = $wrapper.offset().left;
        const activeLeft = $active.offset().left;
        const leftOffset = wrapperLeft - activeLeft + 10; // +10 for slight padding if needed
        $filters.css('left', leftOffset + 'px');
    }
</script>
