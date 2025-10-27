<?php

/* Template Name: Page Builder */

?>
<?php if (have_rows("flexible_content")):
    while (have_rows("flexible_content")):
        the_row();
        if (get_row_layout() == 'hero_section'):
            $title = get_sub_field('title');
            $button = get_sub_field('button');
            $media_type = get_sub_field('media_type');
            $image = get_sub_field('image');
            $video = get_sub_field('video');
            $vimeo = get_sub_field('vimeo');
            $youtube = get_sub_field('youtube');
?>
            <!-- hero-section -->
            <section class="hero-section bg-20994A 100vh dpt-280 dpb-70">
                <div class="container">
                    <div class="col-10 text-center mx-auto">
                        <?php if (!empty($title)): ?>
                            <div class="hg-semibold font80 leading79 space-1_6 text-white dmb-25">
                                <?php echo $title; ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($button)): ?>
                            <a href="<?php echo $button['url']; ?>" class="btnA bg-EBFF99-btn hg-semibold font16 leading21 space-0_32 text-0F120A d-inline-flex align-items-center text-decoration-none dmb-95 position-relative transition"><img src="<?php echo get_template_directory_uri(); ?>/templates/icons/button-arrow.svg" class="arrow me-2 arrow-1 position-absolute top-center transition"><span class="transition"> <?php echo $button['title']; ?> </span><img src="<?php echo get_template_directory_uri(); ?>/templates/icons/button-arrow.svg" class="arrow ms-2 arrow-2 position-absolute transition"></a>
                        <?php endif; ?>
                    </div>
                    <div class="hero-img radius20 overflow-hidden">
                        <?php if (!empty($media_type) && $media_type == 'Image'): ?>
                            <img src="<?php echo $image['url']; ?>" class="w-100 h-100 object-cover" alt="">
                        <?php elseif (!empty($media_type) && $media_type == 'Video'): ?>
                            <video id="hero-video" loop autoplay muted playsinline preload="auto"
                                class="w-100 h-100 object-cover">
                                <source src="<?php echo $video['url']; ?>" type="video/mp4">
                            </video>
                        <?php elseif (!empty($media_type) && $media_type == 'Vimeo'): ?>
                            <iframe class="w-100 h-100 object-cover"
                                src="https://player.vimeo.com/video/<?php echo $vimeo; ?>?autoplay=1&loop=1&background=1&controls=0&rel=0&mute=1"
                                allow="autoplay" allowfullscreen>
                            </iframe>
                        <?php elseif (!empty($media_type) && $media_type == 'Youtube'): ?>
                            <iframe class="w-100 h-100 object-cover"
                                src="https://www.youtube.com/embed/<?php echo $youtube; ?>?playlist=<?php echo $youtube; ?>&autoplay=1&loop=1&background=1&controls=0&rel=0&mute=1"
                                allow="autoplay; fullscreen">
                            </iframe>
                        <?php endif; ?>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'small_card_section'):
            $background_color = get_sub_field('background_color');
            $display_service = get_sub_field('display_service');
            $select_service = get_sub_field('select_service');
        ?>
            <!-- small-card-section -->
            <section class="small-card-section position-relative z-3 <?php echo $background_color; ?>">
                <div class="container">
                    <?php if ($display_service == 'All'): ?>
                        <div class="row row8" id="servicecontainer">
                        </div>
                        <script id="service-template" type="text/x-handlebars-template">
                            {{#each posts}}
                                <div class="col-3">
                                    <a href="{{link}}" class="small-card w-100 d-inline-block radius20 overflow-hidden position-relative card-hover">
                                        <img src="{{image}}" class="w-100 h-100 object-cover img" alt="">
                                        <div class="small-bg-layer position-absolute bottom-0 start-0 w-100"></div>
                                        <div class="position-absolute small-card-content">
                                            <div class="hg-semibold font20 leading26 space-0_4 text-white mb-1">{{title}}</div>
                                            <div class="hg-regular font14 leading18 space-0_28 text-white dmb-10">{{content}}</div>
                                            <img src="<?php echo get_template_directory_uri(); ?>/templates/icons/white-right-arrow.svg" class="small-arrow" alt="">
                                        </div>
                                    </a>
                                </div>
                            {{/each}}
                        </script>
                    <?php elseif ($display_service == 'Select'): ?>
                        <div class="row row8">
                            <?php if (!empty($select_service)):
                                foreach ($select_service as $service):
                                    $post_id = $service->ID;
                                    $title = get_the_title($post_id);
                                    $image = get_the_post_thumbnail_url($post_id, 'full');
                                    $description = get_the_excerpt($post_id); // ya get_the_content($post_id)
                            ?>
                                    <div class="col-3">
                                        <a href="<?php echo get_permalink($post_id); ?>" class="small-card w-100 d-inline-block radius20 overflow-hidden position-relative card-hover">
                                            <img src="<?php echo esc_url($image); ?>" class="w-100 h-100 object-cover img" alt="">
                                            <div class="small-bg-layer position-absolute bottom-0 start-0 w-100"></div>
                                            <div class="position-absolute small-card-content">
                                                <div class="hg-semibold font20 leading26 space-0_4 text-white"><?php echo esc_html($title); ?></div>
                                                <div class="hg-regular font14 leading18 space-0_28 text-white"><?php echo esc_html($description); ?></div>
                                                <img src="<?php echo get_template_directory_uri(); ?>/templates/icons/white-right-arrow.svg" class="small-arrow" alt="">
                                            </div>
                                        </a>
                                    </div>
                            <?php endforeach;
                            endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'left_right_content_section'):
            $background_color = get_sub_field('background_color');
            $heading = get_sub_field('heading');
            $link = get_sub_field('link');
            $description = get_sub_field('description');
        ?>
            <!-- left-right-content-section  -->
            <section class="left-right-content-section <?php echo $background_color; ?> position-relative">
                <div class="container">
                    <div class="col-8">
                        <?php if (!empty($heading)): ?>
                            <div class="hg-semibold font45 leading48 space-0_9 <?php echo $background_color == 'bg-0F120A' ? 'text-white' : 'text-0F120A'; ?> dmb-50">
                                <?php echo $heading; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <?php if (!empty($link)): ?>
                                <a href="<?php echo $link['url']; ?>" class="btnA bg-EBFF99-btn hg-semibold font16 leading21 space-0_32 text-0F120A d-inline-flex align-items-center text-decoration-none dmb-95 position-relative transition"><img src="<?php echo get_template_directory_uri(); ?>/templates/icons/button-arrow.svg" class="arrow me-2 arrow-1 position-absolute top-center transition"><span class="transition"><?php echo $link['title']; ?></span><img src="<?php echo get_template_directory_uri(); ?>/templates/icons/button-arrow.svg" class="arrow ms-2 arrow-2 position-absolute transition"></a>
                            <?php endif; ?>
                        </div>
                        <div class="col-6">
                            <div class="col-10 pe-2">
                                <?php if (!empty($description)): ?>
                                    <div class="hg-regular font16 leading26 <?php echo $background_color == 'bg-0F120A' ? 'text-white' : 'text-0F120A'; ?> opacity80">
                                        <?php echo $description; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="left-right-bg-img <?php echo $background_color == 'bg-0F120A' ? 'bg-img-white' : ''; ?> position-absolute">
                    <img src="<?php echo get_template_directory_uri(); ?>/templates/icons/left-right-content.svg" class="h-100" alt="">
                </div>
            </section>

        <?php elseif (get_row_layout() == 'case_studies_section'):
            $background_color = get_sub_field('background_color');
            $title = get_sub_field('title');
            $link = get_sub_field('link');
            $case_studies_display = get_sub_field('case_studies_display');
            $select_case_studies = get_sub_field('select_case_studies');
        ?>
            <!-- case-studies-section  -->
            <section class="case-studies-section position-relative <?php echo $background_color; ?>">
                <div class="container">
                    <div class="d-flex align-items-center justify-content-between dmb-35">
                        <div class="main-title hg-light font44 leading62 space-0_88 text-0F120A"><?php echo $title; ?></div>
                        <?php if (!empty($link)): ?>
                            <a href="<?php echo $link['url']; ?>" class="btnA bg-EBFF99-btn hg-semibold font16 leading21 space-0_32 text-0F120A d-inline-flex align-items-center text-decoration-none position-relative transition"><img src="<?php echo get_template_directory_uri(); ?>/templates/icons/button-arrow.svg" class="arrow me-2 arrow-1 position-absolute top-center transition"><span class="transition"> <?php echo $link['title']; ?> </span><img src="<?php echo get_template_directory_uri(); ?>/templates/icons/button-arrow.svg" class="arrow ms-2 arrow-2 position-absolute transition"></a>
                        <?php endif; ?>
                    </div>
                    <?php if ($case_studies_display == 'All'): ?>
                        <div class="row row8" id="caseContainer">
                        </div>

                        <script id="case-template" type="text/x-handlebars-template">
                            {{#each posts}}
                                <div class="col-6 case-studies-cards">
                                    <a href="{{link}}" class="case-studies-card d-inline-block text-decoration-none">
                                        <div class="case-studies-img dmb-25 card-hover radius20 overflow-hidden position-relative">
                                            <img src="{{image}}" class="w-100 h-100 object-cover img" alt="{{title}}">
                                            <div class="case-layer position-absolute bottom-0 start-0 w-100 opacity40"></div>
                                            <div class="category-tags position-absolute bottom-0 d-flex dmb-20 ms-3">
                                                {{#each categories}}
                                                    <div class="prefix bg-B4B4B4-btn hg-regular font14 leading18 text-white radius5 d-inline-flex align-items-center me-2">{{name}}</div>
                                                {{/each}}
                                            </div>
                                        </div>
                                        <div class="hg-medium font20 leading24 space-0_4 text-0F120A mb-1">{{title}}</div>
                                        <div class="hg-regular font16 leading21 space-0_32 text-111616 opacity-50 text-capitalize">{{location}}
                                        </div>
                                    </a>
                                </div>
                            {{/each}}
                        </script>
                    <?php elseif ($case_studies_display == 'Select'): ?>
                        <div class="row row8">
                            <?php if (!empty($select_case_studies)):
                                foreach ($select_case_studies as $casestudies):
                                    $case_id = $casestudies->ID;
                                    $title = get_the_title($case_id);
                                    $image = get_the_post_thumbnail_url($case_id, 'full');
                                    $description = get_the_excerpt($case_id);
                                    $categories = get_the_terms($case_id, 'case_studies_cat');
                                    $location = get_field('location', $case_id);
                            ?>
                                    <div class="col-6 case-studies-cards">
                                        <a href="<?php echo get_permalink($case_id); ?>" class="case-studies-card w-100 d-inline-block text-decoration-none">
                                            <div class="case-studies-img dmb-25 card-hover radius20 overflow-hidden position-relative">
                                                <img src="<?php echo esc_url($image); ?>" class="w-100 h-100 object-cover img" alt="">
                                                <div class="category-tags position-absolute bottom-0 d-flex dmb-20 ms-3">
                                                    <?php if (!empty($categories)):
                                                        foreach ($categories as $cat):
                                                    ?>
                                                            <div class="prefix bg-B4B4B4-btn hg-regular font14 leading18 text-white radius5 d-inline-flex align-items-center me-2"><?php echo $cat->name; ?></div>
                                                    <?php endforeach;
                                                    endif; ?>
                                                </div>
                                            </div>
                                            <div class="hg-medium font20 leading24 space-0_4 text-0F120A">
                                                <?php echo esc_html($title); ?>
                                            </div>
                                            <div class="hg-regular font16 leading21 space-0_32 text-111616 opacity-50 text-capitalize"> <?php echo esc_html($location); ?></div>
                                        </a>
                                    </div>
                            <?php endforeach;
                            endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'sectors_slider_section'):
            $background_color = get_sub_field('background_color');
            $title = get_sub_field('title');
            $sector_card = get_sub_field('sector_card');
        ?>
            <!-- sectors-slider-section  -->
            <section class="sectors-slider-section position-relative z-3 <?php echo $background_color; ?>">
                <div class="container">
                    <div class="d-flex align-items-center justify-content-between dmb-30">
                        <?php if (!empty($title)): ?>
                            <div class="main-title hg-light font44 leading62 space-0_88 text-0F120A"><?php echo $title; ?></div>
                        <?php endif; ?>
                        <div class="slick-arrows d-flex">
                            <div class="prev-arrow bg-EBFF99 d-flex justify-content-center align-items-center radius3 me-2 cursor-pointer"><img src="<?php echo get_template_directory_uri(); ?>/templates/icons/sector-prev.svg" class="icon" alt=""></div>
                            <div class="next-arrow bg-EBFF99 d-flex justify-content-center align-items-center radius3 cursor-pointer"><img src="<?php echo get_template_directory_uri(); ?>/templates/icons/sector-next.svg" class="icon" alt=""></div>
                        </div>
                    </div>
                    <div class="sectors-slider">
                        <?php if (!empty($sector_card)):
                            foreach ($sector_card as $sector):
                                $icon = $sector['icon'];
                                $sector_link = $sector['sector_link'];
                        ?>
                                <a href="<?php echo $sector_link['url']; ?>" class="sectors-cards d-inline-block text-decoration-none radius20 dpt-60 dpb-35">
                                    <div class="sectors-cards-img dmb-45 mx-auto">
                                        <img src="<?php echo $icon['url']; ?>" class="h-100 w-100" alt="<?php echo $icon['title']; ?>">
                                    </div>
                                    <div class="tk-early-sans-variable fw-medium font20 leading26 space-0_6 text-0F120A text-center"><?php echo $sector_link['title']; ?></div>
                                </a>
                        <?php endforeach;
                        endif; ?>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'testimonial_slider_section'):
            $background_color = get_sub_field('background_color');
            $testimonial_display = get_sub_field('testimonial_display');
            $select_testimonial = get_sub_field('select_testimonial');
        ?>
            <!-- testimonial-slider-section -->
            <section class="testimonial-slider-section position-relative z-3 <?php echo $background_color; ?> overflow-hidden">
                <div class="container">
                    <div class="testimonial-icon dmb-40 mx-auto">
                        <img src="<?php echo get_template_directory_uri(); ?>/templates/icons/testimonial-icon.svg" class="h-100 w-100" alt="">
                    </div>
                    <?php if ($testimonial_display == 'All'): ?>
                        <div class="testimonial-slider col-7 mx-auto text-center" id="testimonialcontainer">
                        </div>
                        <script id="tesimonial-template" type="text/x-handlebars-template">
                            {{#each posts}}
                                <div class="testimonial-cards">
                                    <div class="hg-regular font32 leading36 space-0_32 dmb-40 testimonial-heading <?php echo $background_color == 'bg-0F120A' ? 'text-white' : ''; ?>">“Its no wonder we have chosen them as our Waste Service provider. They’ve covered everything bespoke to our business requirements.</div>
                                    <div class="hg-regular font14 leading18 space-0_28 testimonial-client <?php echo $background_color == 'bg-0F120A' ? 'text-white' : ''; ?>">Jason Bourne, JB Building Ltd.</div>
                                </div>
                            {{/each}}
                        </script>
                    <?php elseif ($testimonial_display == 'Select'): ?>
                        <div class="testimonial-slider col-7 mx-auto text-center">
                            <div class="testimonial-cards">
                                <div class="hg-regular font32 leading36 space-0_32 dmb-40 <?php echo $background_color == 'bg-0F120A' ? 'text-white' : ''; ?> testimonial-heading">“Its no wonder we have chosen them as our Waste Service provider. They’ve covered everything bespoke to our business requirements.</div>
                                <div class="hg-regular font14 leading18 space-0_28 <?php echo $background_color == 'bg-0F120A' ? 'text-white' : ''; ?> testimonial-client">Jason Bourne, JB Building Ltd.</div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'sub_hero_section'):
            $media_type = get_sub_field('media_type');
            $image = get_sub_field('image');
            $video = get_sub_field('video');
            $vimeo = get_sub_field('vimeo');
            $youtube = get_sub_field('youtube');
            $heading = get_sub_field('heading');
            $description = get_sub_field('description');
            $link = get_sub_field('link');
        ?>
            <!-- sub-hero-section  -->
            <section class="sub-hero-section h-vh position-relative">
                <div class="position-fixed top-0 h-100 w-100">
                    <?php if (!empty($media_type) && $media_type == 'Image'): ?>
                        <img src="<?php echo $image['url']; ?>" class="w-100 h-100 object-cover" alt="">
                    <?php elseif (!empty($media_type) && $media_type == 'Video'): ?>
                        <video id="hero-video" loop autoplay muted playsinline preload="auto"
                            class="w-100 h-100 object-cover">
                            <source src="<?php echo $video['url']; ?>" type="video/mp4">
                        </video>
                    <?php elseif (!empty($media_type) && $media_type == 'Vimeo'): ?>
                        <iframe class="w-100 h-100 object-cover"
                            src="https://player.vimeo.com/video/<?php echo $vimeo; ?>?autoplay=1&loop=1&background=1&controls=0&rel=0&mute=1"
                            allow="autoplay" allowfullscreen>
                        </iframe>
                    <?php elseif (!empty($media_type) && $media_type == 'Youtube'): ?>
                        <iframe class="w-100 h-100 object-cover"
                            src="https://www.youtube.com/embed/<?php echo $youtube; ?>?playlist=<?php echo $youtube; ?>&autoplay=1&loop=1&background=1&controls=0&rel=0&mute=1"
                            allow="autoplay; fullscreen">
                        </iframe>
                    <?php endif; ?>
                </div>
                <div class="sub-hero-blur-layer position-absolute bottom-0 w-100"></div>
                <div class="sub-hero-bg-layer position-fixed top-0 start-0 w-100 h-100 bg-0F120A opacity60"></div>
                <div class="sub-hero-content position-absolute top-left-center w-100">
                    <div class="container">
                        <div class="col-8 mx-auto text-center">
                            <?php if (!empty($heading)): ?>
                                <div class="hg-semibold font80 leading104 space-1_6 text-white dmb-10"><?php echo $heading; ?></div>
                            <?php endif; ?>
                            <?php if (!empty($description)): ?>
                                <div class="hg-regular font18 leading24 space-0_36 text-white dmb-30 col-10 px-2 mx-auto">
                                    <?php echo $description; ?>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($link)): ?>
                                <a href="<?php echo $link['url']; ?>" class="btnA bg-EBFF99-btn hg-semibold font16 leading21 space-0_32 text-0F120A d-inline-flex align-items-center text-decoration-none dmb-95 position-relative transition"><img src="<?php echo get_template_directory_uri(); ?>/templates/icons/button-arrow.svg" class="arrow me-2 arrow-1 position-absolute top-center transition"><span class="transition"> <?php echo $link['title']; ?> </span><img src="<?php echo get_template_directory_uri(); ?>/templates/icons/button-arrow.svg" class="arrow ms-2 arrow-2 position-absolute transition"></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'center_content_section'):
            $heading = get_sub_field('heading');
            $description = get_sub_field('description');
        ?>
            <!-- center-content-section  -->
            <section class="center-content-section position-relative dpb-225">
                <div class="center-bg-img position-absolute">
                    <img src="<?php echo get_template_directory_uri(); ?>/templates/icons/center-content.svg" class="h-100" alt="">
                </div>
                <div class="bg-0F120A dpt-135 dpb-160">
                    <div class="container">
                        <div class="col-7 mx-auto text-center">
                            <?php if (!empty($heading)): ?>
                                <div class="hg-medium font30 leading36 text-white dmb-30">
                                    <?php echo $heading; ?>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($description)): ?>
                                <div class="hg-regular font16 leading26 text-white opacity80 col-11 mx-auto px-2">
                                    <?php echo $description; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="sub-hero-blur-layer bottom-layer position-absolute bottom-0 w-100 z-3"></div>
            </section>

        <?php elseif (get_row_layout() == 'counter_section'):
            $background_color = get_sub_field('background_color');
            $card_background = get_sub_field('card_background');
            $card_group = get_sub_field('card_group');
        ?>
            <!-- counter-section -->
            <section class="counter-section <?php echo $background_color; ?> position-relative">
                <div class="container">
                    <div class="row row8">
                        <?php if (!empty($card_group)):
                            foreach ($card_group as $cards):
                                $title = $cards['title'];
                                $count = $cards['count'];
                                $arrow = $cards['arrow'];
                        ?>
                                <div class="col-4">
                                    <div class="counter-cards <?php echo $card_background == 'Background Blur' ? '' : 'bg-20994A-cards' ?> radius20">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <?php if (!empty($count)): ?>
                                                <div class="hg-bold font74 leading96 space-1_48 counter-heading mb-1">
                                                    <?php echo $count; ?>%</div>
                                            <?php endif; ?>
                                            <?php if ($arrow == 'Up'): ?>
                                                <div class="counter-arrow">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/templates/icons/up-white-arrow.svg" class="h-100" alt="">
                                                </div>
                                            <?php elseif ($arrow == 'Down'): ?>
                                                <div class="counter-arrow down-arrow">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/templates/icons/up-white-arrow.svg" class="h-100" alt="">
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <?php if (!empty($title)): ?>
                                            <div class="hg-regular font20 leading26 space-0_4 counter-card-text">
                                                <?php echo $title; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                        <?php endforeach;
                        endif; ?>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'included_section'):
            $title = get_sub_field('title');
            $link = get_sub_field('link');
            $include_cards = get_sub_field('include_cards');
        ?>
            <!-- included-section  -->
            <section class="included-section position-relative dpt-230">
                <div class="included-blur-layer position-absolute top-0 w-100 z-3"></div>
                <div class="included-card-section bg-0F120A opacity90 dpt-15 dpb-170">
                    <div class="container">
                        <div class="row">
                            <div class="col-4">
                                <div class="included-left-content">
                                    <?php if (!empty($title)): ?>
                                        <div class="main-title hg-light font44 leading54 space-0_88 text-white dmb-20"><?php echo $title; ?></div>
                                    <?php endif; ?>
                                    <?php if (!empty($link)): ?>
                                        <a href="<?php echo $link['url']; ?>" class="btnA bg-EBFF99-btn hg-semibold font16 leading21 space-0_32 text-0F120A d-inline-flex align-items-center text-decoration-none position-relative transition"><img src="<?php echo get_template_directory_uri(); ?>/templates/icons/button-arrow.svg" class="arrow me-2 arrow-1 position-absolute top-center transition"><span class="transition"> <?php echo $link['title']; ?> </span><img src="<?php echo get_template_directory_uri(); ?>/templates/icons/button-arrow.svg" class="arrow ms-2 arrow-2 position-absolute transition"></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-8 ps-4">
                                <div class="row row8">
                                    <?php if (!empty($include_cards)):
                                        foreach ($include_cards as $include):
                                            $image = $include['image'];
                                            $title = $include['title'];
                                            $description = $include['description'];
                                    ?>
                                            <div class="col-6 included-col">
                                                <div class="included-card radius20 d-flex align-items-center">
                                                    <div class="included-card-img radius10 overflow-hidden">
                                                        <img src="<?php echo $image['url']; ?>" class="w-100 h-100 object-cover" alt="">
                                                    </div>
                                                    <div>
                                                        <div class="hg-regular font20 leading26 space-0_4 text-white text-capitalize dmb-5">
                                                            <?php echo $title; ?>
                                                        </div>
                                                        <div class="hg-light font14 leading18 space-0_28 text-white pe-5">
                                                            <?php echo $description; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php endforeach;
                                    endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'our_app_banner_section'):
            $background_color = get_sub_field('background_color');
            $title = get_sub_field('title');
            $description = get_sub_field('description');
            $app_logo = get_sub_field('app_logo');
        ?>
            <!-- our-app-banner-section  -->
            <section class="our-app-banner-section position-relative <?php echo $background_color; ?>">
                <div class="container">
                    <div class="our-app-content bg-20994A radius28 overflow-hidden position-relative dpt-50 dpb-60">
                        <div class="position-absolute top-0 start-0 h-100">
                            <img src="<?php echo get_template_directory_uri(); ?>/templates/icons/banner.svg" alt="">
                        </div>
                        <div class="col-7 px-3 mx-auto text-center">
                            <?php if (!empty($title)): ?>
                                <div class="hg-light font38 leading50 space-0_76 text-white dmb-20"><?php echo $title; ?></div>
                            <?php endif; ?>
                            <?php if (!empty($description)): ?>
                                <div class="hg-light font16 leading24 text-white opacity80 dmb-25"><?php echo $description; ?></div>
                            <?php endif; ?>
                            <div class="d-flex app-banner-logo justify-content-center">
                                <?php if (!empty($app_logo)):
                                    foreach ($app_logo as $logos):
                                        $logo = $logos['logo'];
                                        $link = $logos['link'];
                                ?>
                                        <a href="<?php echo $link; ?>" class="h-100 me-3">
                                            <img src="<?php echo $logo['url']; ?>" class="h-100 " alt="">
                                        </a>
                                <?php endforeach;
                                endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'left_hero_section'):
            $heading = get_sub_field('heading');
            $link = get_sub_field('link');

            $service_id = get_the_ID();
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    $image_url = get_the_post_thumbnail_url($service_id, 'full');
                }
            }
        ?>
            <!-- left-content-hero-section  -->
            <section class="left-content-hero-section h-vh position-relative">
                <div class="position-fixed h-100 w-100">
                    <img src="<?php echo $image_url; ?>" class="h-100 w-100" alt="">
                </div>
                <div class="position-absolute top-center w-100">
                    <div class="container">
                        <div class="col-9 pe-3">
                            <?php if (!empty($heading)): ?>
                                <div class="hg-regular font50 leading50 space-1 text-white dmb-30">
                                    <?php echo $heading; ?>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($link)): ?>
                                <a href="<?php echo $link['url']; ?>" class="btnA bg-EBFF99-btn hg-semibold font16 leading21 space-0_32 text-0F120A d-inline-flex align-items-center text-decoration-none position-relative transition"><img src="<?php echo get_template_directory_uri(); ?>/templates/icons/button-arrow.svg" class="arrow me-2 arrow-1 position-absolute top-center transition"><span class="transition"> <?php echo $link['title']; ?> </span><img src="<?php echo get_template_directory_uri(); ?>/templates/icons/button-arrow.svg" class="arrow ms-2 arrow-2 position-absolute transition"></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="left-content-hero-bg-layer position-absolute bottom-0 w-100"></div>
            </section>

        <?php elseif (get_row_layout() == 'what_we_offer_section'):
            $background_color = get_sub_field('background_color');
            $heading = get_sub_field('heading');
            $offer_card = get_sub_field('offer_card');
        ?>
            <!-- what-we-offer-section -->
            <section class="what-we-offer-section position-relative z-3 <?php echo $background_color; ?>">
                <div class="container">
                    <?php if (!empty($heading)): ?>
                        <div class="main-title hg-semibold font44 leading48 space-0_88 text-white dmb-55">
                            <?php echo $heading; ?>
                        </div>
                    <?php endif; ?>
                    <div class="row row8">
                        <?php if (!empty($offer_card)):
                            foreach ($offer_card as $index => $offer):
                                $icon = $offer['icon'];
                                $link_style = $offer['link_style'];
                                $link = $offer['link'];
                                $title = $offer['title'];
                                $description = $offer['description'];
                                $modal_content = $offer['modal_content'];
                                $modal_link = $offer['modal_link'];
                                $select_case_studies = $offer['select_case_studies'];
                                $modal_id = 'offerOffcanvas_' . $index;
                        ?>
                                <?php if ($link_style == 'Link'): ?>
                                    <div class="col-4 offer-cards dmb-20">
                                        <a href="<?php echo $link['url']; ?>" class="text-decoration-none h-100">
                                            <div class="offer-card position-relative bg-20994A radius20 overflow-hidden dpt-45 dpb-60">
                                                <div class="offer-img d-inline-flex dmb-40">
                                                    <img src="<?php echo $icon['url']; ?>" alt="" class="w-100 h-100 object-cover">
                                                </div>
                                                <div class="hg-regular font28 leading32 text-white text-capitalize dmb-15">
                                                    <?php echo $link['title']; ?>
                                                </div>
                                                <?php if (!empty($description)): ?>
                                                    <div class="hg-regular font14 leading24 text-white opacity80">
                                                        <?php echo $description; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </a>
                                    </div>
                                <?php elseif ($link_style == 'Modal'): ?>
                                    <div class="col-4 offer-cards dmb-20">
                                        <a href="javascript:void(0)" class="text-decoration-none h-100"
                                            data-bs-toggle="offcanvas" data-bs-target="#<?php echo $modal_id; ?>"
                                            aria-controls="<?php echo $modal_id; ?>">
                                            <div class="offer-card position-relative bg-20994A radius20 overflow-hidden dpt-45 dpb-60">
                                                <div class="offer-img d-inline-flex dmb-40">
                                                    <img src="<?php echo $icon['url']; ?>" alt="" class="w-100 h-100 object-cover">
                                                </div>
                                                <?php if (!empty($title)): ?>
                                                    <div class="hg-regular font28 leading32 text-white text-capitalize dmb-15">
                                                        <?php echo $title; ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if (!empty($description)): ?>
                                                    <div class="hg-regular font14 leading24 text-white opacity80">
                                                        <?php echo $description; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="offcanvas offer-modal offcanvas-end bg-0F120A"
                                        data-bs-backdrop="static" tabindex="-1"
                                        id="<?php echo $modal_id; ?>" aria-labelledby="<?php echo $modal_id; ?>Label">
                                        <div class="offcanvas-body">
                                            <div class="position-absolute top-0 end-0 dmt-25 pe-4">
                                                <button type="button" class="close-btn bg-transparent border-0"
                                                    data-bs-dismiss="offcanvas" aria-label="Close">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/templates/icons/modal-close.svg"
                                                        alt="">
                                                </button>
                                            </div>

                                            <?php if (!empty($title)): ?>
                                                <div class="hg-regular font34 leading45 space-0_68 text-white dmb-20">
                                                    <?php echo $title; ?>
                                                </div>
                                            <?php endif; ?>

                                            <?php if (!empty($modal_content)): ?>
                                                <div class="hg-regular font16 leading26 text-white opacity80 dmb-30">
                                                    <?php echo $modal_content; ?>
                                                </div>
                                            <?php endif; ?>

                                            <?php if (!empty($modal_link)): ?>
                                                <div class="dmb-70">
                                                    <a href="<?php echo $modal_link['url']; ?>"
                                                        class="btnA bg-EBFF99-btn hg-semibold font16 leading21 space-0_32 text-0F120A d-inline-flex align-items-center text-decoration-none position-relative transition">
                                                        <img src="<?php echo get_template_directory_uri(); ?>/templates/icons/button-arrow.svg"
                                                            class="arrow me-2 arrow-1 position-absolute top-center transition">
                                                        <span class="transition"><?php echo $modal_link['title']; ?></span>
                                                        <img src="<?php echo get_template_directory_uri(); ?>/templates/icons/button-arrow.svg"
                                                            class="arrow ms-2 arrow-2 position-absolute transition">
                                                    </a>
                                                </div>
                                            <?php endif; ?>

                                            <?php if (!empty($select_case_studies)):
                                                $case_id = $select_case_studies->ID;
                                                $case_title = get_the_title($case_id);
                                                $case_image = get_the_post_thumbnail_url($case_id, 'full');
                                                $case_description = get_the_excerpt($case_id);
                                                $case_categories = get_the_terms($case_id, 'case_studies_cat');
                                                $case_location = get_field('location', $case_id);
                                            ?>
                                                <div class="divider border-bottom border-white"></div>
                                                <div class="dmt-45">
                                                    <div class="hg-regular font34 leading45 space-0_68 text-white dmb-20">
                                                        Related Case Studies
                                                    </div>
                                                    <div class="case-studies-cards">
                                                        <a href="<?php echo get_permalink($case_id); ?>"
                                                            class="case-studies-card w-100 d-inline-block text-decoration-none">
                                                            <div class="case-studies-img dmb-25 card-hover radius20 overflow-hidden position-relative">
                                                                <img src="<?php echo esc_url($case_image); ?>"
                                                                    class="w-100 h-100 object-cover img" alt="">
                                                                <div class="category-tags position-absolute bottom-0 d-flex dmb-20 ms-3">
                                                                    <?php if (!empty($case_categories)):
                                                                        foreach ($case_categories as $cat): ?>
                                                                            <div class="prefix bg-B4B4B4-btn hg-regular font14 leading18 text-white radius5 d-inline-flex align-items-center me-2">
                                                                                <?php echo $cat->name; ?>
                                                                            </div>
                                                                    <?php endforeach;
                                                                    endif; ?>
                                                                </div>
                                                            </div>
                                                            <div class="hg-medium font20 leading24 space-0_4 text-white">
                                                                <?php echo esc_html($case_title); ?>
                                                            </div>
                                                            <div class="hg-regular font16 leading21 space-0_32 text-white opacity-50 text-capitalize">
                                                                <?php echo esc_html($case_location); ?>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                        <?php endforeach;
                        endif; ?>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'left_right_section'):
            $background_color = get_sub_field('background_color');
            $image_position = get_sub_field('image_position');
            $image = get_sub_field('image');
            $heading = get_sub_field('heading');
            $description = get_sub_field('description');
        ?>
            <!-- left-right-section -->
            <section class="left-right-section position-relative z-3 <?php echo $background_color; ?>">
                <div class="container">
                    <div class="row align-items-center">
                        <?php if ($image_position == 'Left'): ?>
                            <div class="col-6 dmb-15 px-3">
                                <div class="col-11 px-4 me-auto">
                                    <?php if (!empty($image)): ?>
                                        <div class="left-right-img w-100 radius20 overflow-hidden">
                                            <img src="<?php echo $image['url']; ?>" alt="" class="w-100 h-100 object-cover">
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="col-6 <?php echo $image_position == 'Left' ? 'ps-5' : 'pe-5' ?>">
                            <?php if (!empty($heading)): ?>
                                <div class="hg-regular font22 leading30 space-0_44 text-0F120A dmb-35">
                                    <?php echo $heading; ?>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($description)): ?>
                                <div class="hg-regular font16 leading26 space-0_32 text-0F120A">
                                    <?php echo $description; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php if ($image_position == 'Right'): ?>
                            <div class="col-6 px-3">
                                <div class="col-11 px-4 ms-auto">
                                    <?php if (!empty($image)): ?>
                                        <div class="left-right-img w-100 radius20 overflow-hidden">
                                            <img src="<?php echo $image['url']; ?>" alt="" class="w-100 h-100 object-cover">
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'other_service_section'):
            $background_color = get_sub_field('background_color');
            $title = get_sub_field('title');
            $select_service = get_sub_field('select_service');
        ?>
            <!-- other-service-section -->
            <section class="other-service-section position-relative z-3 <?php echo $background_color; ?>">
                <div class="container">
                    <div class="main-title hg-light font34 leading45 space-0_68 text-0F120A text-center dmb-45">
                        <?php echo $title; ?>
                    </div>
                    <?php if (!empty($select_service)): ?>
                        <div class="row row8">
                            <?php if (!empty($select_service)):
                                foreach ($select_service as $service):
                                    $post_id = $service->ID;
                                    $title = get_the_title($post_id);
                                    $image = get_the_post_thumbnail_url($post_id, 'full');
                                    $description = get_the_excerpt($post_id); // ya get_the_content($post_id)
                            ?>
                                    <div class="col-4">
                                        <a href="<?php echo get_permalink($post_id); ?>" class="small-card w-100 d-inline-block radius20 overflow-hidden position-relative card-hover">
                                            <img src="<?php echo esc_url($image); ?>" class="w-100 h-100 object-cover img" alt="">
                                            <div class="small-bg-layer position-absolute bottom-0 start-0 w-100"></div>
                                            <div class="position-absolute small-card-content">
                                                <div class="hg-semibold font20 leading26 space-0_4 text-white mb-1"><?php echo esc_html($title); ?></div>
                                                <div class="hg-regular font14 leading18 space-0_28 text-white dmb-10"><?php echo esc_html($description); ?></div>
                                                <img src="<?php echo get_template_directory_uri(); ?>/templates/icons/white-right-arrow.svg" class="small-arrow" alt="">
                                            </div>
                                        </a>
                                    </div>
                            <?php endforeach;
                            endif; ?>
                        </div>
                    <?php endif; ?>
                    <!-- <div class="row row8">
                        <div class="col-4">
                            <a href=""
                                class="small-card d-inline-block radius20 overflow-hidden position-relative card-hover">
                                <img src="assets/images/hero.png" class="w-100 h-100 object-cover img" alt="">
                                <div class="small-bg-layer position-absolute bottom-0 start-0 w-100"></div>
                                <div class="position-absolute small-card-content">
                                    <div class="hg-semibold font20 leading26 space-0_4 text-white mb-1">Recycling</div>
                                    <div class="hg-regular font16 leading21 space-0_32 text-white dmb-10">Destroying
                                        products
                                        safely and securely.</div>
                                    <img src="assets/svg/white-right-arrow.svg" class="small-arrow" alt="">
                                </div>
                            </a>
                        </div>
                    </div> -->
                </div>
            </section>

        <?php elseif (get_row_layout() == 'left_content_image_hero_section'):
            $media_type = get_sub_field('media_type');
            $image = get_sub_field('image');
            $video = get_sub_field('video');
            $vimeo = get_sub_field('vimeo');
            $youtube = get_sub_field('youtube');
            $heading = get_sub_field('heading');
            $buttons = get_sub_field('buttons');
        ?>
            <!-- left-content-hero-section  -->
            <section class="left-content-hero-section h-vh position-relative">
                <div class="position-fixed h-100 w-100">
                    <?php if (!empty($media_type) && $media_type == 'Image'): ?>
                        <img src="<?php echo $image['url']; ?>" class="w-100 h-100 object-cover" alt="">
                    <?php elseif (!empty($media_type) && $media_type == 'Video'): ?>
                        <video id="hero-video" loop autoplay muted playsinline preload="auto"
                            class="w-100 h-100 object-cover">
                            <source src="<?php echo $video['url']; ?>" type="video/mp4">
                        </video>
                    <?php elseif (!empty($media_type) && $media_type == 'Vimeo'): ?>
                        <iframe class="w-100 h-100 object-cover"
                            src="https://player.vimeo.com/video/<?php echo $vimeo; ?>?autoplay=1&loop=1&background=1&controls=0&rel=0&mute=1"
                            allow="autoplay" allowfullscreen>
                        </iframe>
                    <?php elseif (!empty($media_type) && $media_type == 'Youtube'): ?>
                        <iframe class="w-100 h-100 object-cover"
                            src="https://www.youtube.com/embed/<?php echo $youtube; ?>?playlist=<?php echo $youtube; ?>&autoplay=1&loop=1&background=1&controls=0&rel=0&mute=1"
                            allow="autoplay; fullscreen">
                        </iframe>
                    <?php endif; ?>
                </div>
                <div class="position-absolute top-center w-100">
                    <div class="container">
                        <div class="col-9 pe-3">
                            <?php if (!empty($heading)): ?>
                                <div class="hg-regular font50 leading50 space-1 text-white dmb-30">
                                    <?php echo $heading; ?>
                                </div>
                            <?php endif; ?>
                            <div>
                                <?php if (!empty($buttons)):
                                    foreach ($buttons as $btn):
                                        $link = $btn['link'];
                                ?>
                                        <?php if (!empty($link)): ?>
                                            <a href="<?php echo $link['url']; ?>" class="btnA bg-EBFF99-btn hg-semibold font16 leading21 space-0_32 text-0F120A d-inline-flex align-items-center text-decoration-none position-relative transition me-4"><img src="<?php echo get_template_directory_uri(); ?>/templates/icons/button-arrow.svg" class="arrow me-2 arrow-1 position-absolute top-center transition"><span class="transition"> <?php echo $link['title']; ?> </span><img src="<?php echo get_template_directory_uri(); ?>/templates/icons/button-arrow.svg" class="arrow ms-2 arrow-2 position-absolute transition"></a>
                                        <?php endif; ?>
                                <?php endforeach;
                                endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'main_content_section'):
            $content = get_sub_field('content');
        ?>
            <section class="main-content-section position-relative z-3 <?php echo $background_color; ?>">
                <div class="container">
                    <?php if (!empty($content)): ?>
                        <div class="main-title hg-light font50 leading62 space-1 text-0F120A text-center">
                            <?php echo $content; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'our_value_section'):
            $background_color = get_sub_field('background_color');
            $heading = get_sub_field('heading');
            $value_card = get_sub_field('value_card');
        ?>
            <!-- our-value-section -->
            <section class="our-value-section position-relative z-3 <?php echo $background_color; ?>">
                <div class="container">
                    <?php if (!empty($heading)): ?>
                        <div class="main-title hg-light font44 leading48 space-0_88 text-0F120A text-center dmb-95">
                            <?php echo $heading; ?>
                        </div>
                    <?php endif; ?>
                    <div class="col-10 value-slider">
                        <?php if (!empty($value_card)):
                            foreach ($value_card as $value):
                                $title = $value['title'];
                                $description = $value['description'];
                        ?>
                                <div class="value-cards">
                                    <div class="arorw-icon dmb-35">
                                        <img src="<?php echo get_template_directory_uri(); ?>/templates/icons/green-right-arrow.svg" alt="" class="h-100">
                                    </div>
                                    <?php if (!empty($title)): ?>
                                        <div class="hg-regular font28 leading32 text-0F120A dmb-25">
                                            <?php echo $title; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($description)): ?>
                                        <div class="hg-regular font14 leading21 text-0F120A pe-3">
                                            <?php echo $description; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                        <?php endforeach;
                        endif; ?>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'key_document_section'):
            $background_color = get_sub_field('background_color');
            $heading = get_sub_field('heading');
            $documents = get_sub_field('documents');
        ?>
            <!-- key-document-section -->
            <section class="key-document-section position-relative z-3 <?php echo $background_color; ?>">
                <div class="container">
                    <?php if (!empty($heading)): ?>
                        <div class="hg-medium font44 leading50 space-0_88 text-0F120A dmb-30">
                            <?php echo $heading; ?>
                        </div>
                    <?php endif; ?>
                    <div class="row row10">
                        <?php if (!empty($documents)):
                            foreach ($documents as $docs):
                                $title = $docs['title'];
                                $document = $docs['document'];
                        ?>
                                <div class="download-cards col-6 dmb-15">
                                    <div class="download-card radius10 overflow-hidden d-flex align-items-center justify-content-between">
                                        <div class="hg-regular font22 leading34 space-0_44 text-0F120A">
                                            <?php echo $title; ?>
                                        </div>
                                        <div
                                            class="download-icon bg-EBFF99 radius3 d-inline-flex align-items-center justify-content-center">
                                            <img src="<?php echo get_template_directory_uri(); ?>/templates/icons/download.svg" alt="">
                                        </div>
                                    </div>
                                </div>
                        <?php endforeach;
                        endif; ?>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'case_studies_card_section'):
            $heading = get_sub_field('heading');

            $args = array(
                'taxonomy' => 'case_studies_cat',
                'orderby' => 'name',
                'order' => 'ASC',
                'hide_empty' => 1,
            );
            $cats = get_categories($args);
            $total_count = 0;
            foreach ($cats as $cat) {
                $total_count += $cat->count;
            }
        ?>
            <section class="case-studies-card-section">
                <div class="container">
                    <div class="col-8">
                        <?php if (!empty($heading)): ?>
                            <div class="hg-semibold font48 leading54 space-0_96 text-black dmb-20">
                                <?php echo $heading; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="d-flex dmb-120">
                        <div class="col-8">
                            <div class="filter-btns filter-btn-list d-flex flex-nowrap">
                                <button data-tag="all"
                                    class="filter case-filter-btn active text-nowrap hg-regular font14 leading17 text-0F120A radius5 border-0 py-2 px-3">
                                    View all
                                </button>
                                <?php foreach ($cats as $cat): ?>
                                    <button data-tag="<?php echo $cat->slug; ?>" class="filter case-filter-btn text-nowrap hg-regular font14 leading17 text-0F120A radius5 border-0 py-2 px-3">
                                        <?php echo $cat->name; ?>
                                    </button>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="col-4 d-flex justify-content-end">
                            <div>
                                More Filters +
                            </div>
                        </div>
                    </div>
                    <div class="row row8" id="caseContainer">

                    </div>

                    <script id="case-template" type="text/x-handlebars-template">
                        {{#each posts}}
                            <div class="col-6 case-studies-cards dmb-70">
                                <a href="{{link}}" class="case-studies-card d-inline-block text-decoration-none">
                                    <div class="case-studies-img dmb-25 card-hover radius20 overflow-hidden position-relative">
                                        <img src="{{image}}" class="w-100 h-100 object-cover img" alt="{{title}}">
                                        <div class="case-layer position-absolute bottom-0 start-0 w-100 opacity40"></div>
                                        <div class="category-tags position-absolute bottom-0 d-flex dmb-20 ms-3">
                                            {{#each categories}}
                                                <div class="prefix bg-B4B4B4-btn hg-regular font14 leading18 text-white radius5 d-inline-flex align-items-center me-2">{{name}}</div>
                                            {{/each}}
                                        </div>
                                    </div>
                                    <div class="hg-medium font20 leading24 space-0_4 text-0F120A">{{title}}</div>
                                    <div class="hg-regular font16 leading21 space-0_32 text-111616 opacity-50 text-capitalize">{{location}}
                                    </div>
                                </a>
                            </div>
                        {{/each}}
                    </script>

                    <div class="d-flex justify-content-center">
                        <button id="caseLoadmore" class="btnA bg-EBFF99-btn border-0 hg-semibold font16 leading21 space-0_32 text-0F120A text-decoration-none position-relative transition"><img src="<?php echo get_template_directory_uri(); ?>/templates/icons/button-arrow.svg" class="arrow me-2 arrow-1 position-absolute top-center transition"><span class="transition">Load more</span><img src="<?php echo get_template_directory_uri(); ?>/templates/icons/button-arrow.svg" class="arrow ms-2 arrow-2 position-absolute transition"></button>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'center_slider_section'):
            $slider_image = get_sub_field('slider_image');
        ?>

        <?php elseif (get_row_layout() == 'contact_section'):
            $prefix = get_sub_field('prefix');
            $title = get_sub_field('title');
            $call = get_sub_field('call');
            $general_mail = get_sub_field('general_mail');
            $sales_mail = get_sub_field('sales_mail');
            $account_mail = get_sub_field('account_mail');
            $social_group = get_sub_field('social_group');
        ?>
            <section class="contact-section bg-20994A">
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <div>

                            </div>
                            <?php if (!empty($title)): ?>
                                <div>
                                    <?php echo $title; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'faq_section'):
            $prefix = get_sub_field('prefix');
            $heading = get_sub_field('heading');
            $faq_accordion = get_sub_field('faq_accordion');
        ?>

        <?php elseif (get_row_layout() == 'privacy_policy'):
            $policy_data = get_sub_field('policy_data');
        ?>

        <?php elseif (get_row_layout() == 'spacing'):
            $background_color = get_sub_field('background_color');
            $desktop = get_sub_field('desktop');
            $tablet = get_sub_field('tablet');
            $mobile = get_sub_field('mobile');
            $desktop_mb = $desktop['margin_bottom'];
            $desktop_mb_main = !empty($desktop['margin_bottom']) ? " dpb-" : "";
            $tablet_mb = $tablet['margin_bottom'];
            $tablet_mb_main = !empty($tablet['margin_bottom']) ? " tpb-" : "";
            $mobile_mb = $mobile['margin_bottom'];
            $mobile_mb_main = !empty($mobile['margin_bottom']) ? " mpb-" : "";
        ?>
            <div class="spacing position-relative z-3 <?php echo $background_color; ?> <?php
                                                                                        echo $desktop_mb_main;
                                                                                        echo $desktop_mb;
                                                                                        echo $tablet_mb_main;
                                                                                        echo $tablet_mb;
                                                                                        echo $mobile_mb_main;
                                                                                        echo $mobile_mb;
                                                                                        ?>  "></div>
        <?php endif; ?>
<?php
    endwhile;
endif; ?>