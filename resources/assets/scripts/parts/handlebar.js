import Handlebars from 'handlebars';

export class HandleBars {
    init() {
        this.CaseHandlebar();
        this.TestimonialSlider();
        this.ServiceHandlebar();
        this.SearchHandlebar();
    }

    CaseHandlebar() {
        $(document).ready(function () {
            let currentPage = 1;
            const postsPerPage = 4;

            function loadCases(category, page) {
                $.ajax({
                    url: ajax_params.ajax_url,
                    method: 'POST',
                    data: {
                        action: 'load_case',
                        category: category,
                        page: page,
                        posts_per_page: postsPerPage,
                    },
                    success: function (response) {
                        if (response.success) {
                            renderPosts(response.data.posts);
                            const totalPosts = parseInt(response.data.total_posts);

                            if (currentPage * postsPerPage >= totalPosts) {
                                $('#caseLoadmore').hide();
                            } else {
                                $('#caseLoadmore').show();
                            }
                        } else {
                            console.error('No posts found.');
                            $('#caseLoadmore').hide();
                        }
                    },
                    error: function (error) {
                        console.error('Error fetching posts:', error);
                    },
                });
            }

            function trimCasePrefixes() {
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
            }

            function renderPosts(posts) {
                const source = $("#case-template").html();
                const template = Handlebars.compile(source);
                const html = template({ posts });
                $('#caseContainer').append(html);

                trimCasePrefixes();
            }

            $('.case-filter-btn').click(function () {
                currentPage = 1;
                const category = $(this).data('tag');

                $('.case-filter-btn').removeClass('active');
                $(this).addClass('active');

                $('#caseContainer').empty();
                loadCases(category, currentPage);
            });

            $('#caseLoadmore').click(function () {
                currentPage++;
                const category = $('.case-filter-btn.active').data('tag');
                loadCases(category, currentPage);
            });

            loadCases('all', currentPage);
        });
    }

    TestimonialSlider() {
        $(document).ready(function () {
            let currentPage = 1;
            const postsPerPage = -1;

            function loadTestimonial(page) {
                $.ajax({
                    url: ajax_params.ajax_url,
                    method: 'POST',
                    data: {
                        action: 'load_testimonial',
                        page: page,
                        posts_per_page: postsPerPage,
                    },
                    success: function (response) {
                        if (response.success) {
                            renderPosts(response.data.posts);
                        } else {
                            console.error('No posts found.');
                        }
                    },
                    error: function (error) {
                        console.error('Error fetching posts:', error);
                    },
                });
            }

            function renderPosts(posts) {
                const source = $("#tesimonial-template").html();
                const template = Handlebars.compile(source);
                const html = template({ posts });
                $('#testimonialcontainer').append(html);

                // Initialize Slick
                $('#testimonialcontainer').slick({
                    dots: false,
                    infinite: true,
                    arrows: false,
                    speed: 1000,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 5000,
                });
            }
            // Initial load
            loadTestimonial('all', currentPage);
        });
    }

    ServiceHandlebar() {
        $(document).ready(function () {
            let currentPage = 1;
            const postsPerPage = -1;

            function loadService(page) {
                $.ajax({
                    url: ajax_params.ajax_url,
                    method: 'POST',
                    data: {
                        action: 'load_service',
                        page: page,
                        posts_per_page: postsPerPage,
                    },
                    success: function (response) {
                        if (response.success) {
                            renderPosts(response.data.posts);
                        } else {
                            console.error('No posts found.');
                        }
                    },
                    error: function (error) {
                        console.error('Error fetching posts:', error);
                    },
                });
            }

            function renderPosts(posts) {
                const source = $("#service-template").html();
                const template = Handlebars.compile(source);
                const html = template({ posts });
                $('#servicecontainer').append(html);
            }
            // Initial load
            loadService('all', currentPage);
        });
    }

    SearchHandlebar() {
        jQuery(document).ready(function ($) {
            var $searchInput = $('.header-search-input'); // change to your search input selector

            if (!$searchInput.length) {
                $searchInput = $('input[type="search"]').first();
            }

            $searchInput.on('keydown', function (e) {
                if (e.key === 'Enter' || e.keyCode === 13) {
                    e.preventDefault();

                    var term = $.trim($(this).val());
                    if (!term.length) return;

                    $.ajax({
                        url: tpSearchRedirect.ajax_url,
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            action: 'tp_search_redirect',
                            term: term,
                            nonce: tpSearchRedirect.nonce,
                        },
                        success: function (resp) {
                            if (resp && resp.success && resp.data && resp.data.url) {
                                window.location.href = resp.data.url;
                            } else {
                                window.location.href =
                                    tpSearchRedirect.fallback_search_url +
                                    encodeURIComponent(term);
                            }
                        },
                        error: function () {
                            window.location.href =
                                tpSearchRedirect.fallback_search_url +
                                encodeURIComponent(term);
                        },
                    });
                }
            });
        });

    }
}