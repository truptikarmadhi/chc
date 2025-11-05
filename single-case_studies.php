<?php
$case_id = get_the_ID();
$how_helped = get_field('how_helped', $case_id);
$image_slider = get_field('image_slider', $case_id);

$heading = $how_helped['heading'];
$description = $how_helped['description'];
$label = $how_helped['label'];
$service_tags = $how_helped['service_tags'];
?>

<!-- case-studies-open-hero-section -->
<section class="case-studies-open-hero-section bg-0F120A dpt-220 dpb-70 position-relative tpt-160 tpb-25">
    <div class="case-down-arrow position-absolute end-0 top-0 z-3">
        <img src="<?php echo get_template_directory_uri(); ?>/templates/icons/case-down-arrow.svg" alt="" class="w-100 h-100 object-cover">
    </div>

    <div class="container">
        <div class="prefix bg-FFFFFC-prefix d-inline-flex align-items-center hg-regular font14 leading18 space-0_28 text-white dmb-15 radius5 tmb-25">Case studies</div>
        <div class="d-flex justify-content-between align-items-lg-end dmb-50 flex-column flex-lg-row">
            <div class="hg-semibold font64 leading71 space-1_28 text-white res-font30 res-leading40 res-space-0_6 tmb-10"><?php echo get_the_title($case_id); ?></div>
            <div class="hg-regular font14 leading18 space-0_28 text-white opacity-50">Cardiff, UK</div>
        </div>
        <div class="case-studies-open-hero-img radius10 overflow-hidden">
            <img src="<?php echo get_the_post_thumbnail_url($case_id, 'large'); ?>" class="w-100 h-100 object-cover" alt="">
        </div>
    </div>
</section>


<!-- case-studies-open-left-right-content-section  -->
<section class="case-studies-open-left-right-content-section bg-0F120A dpb-205">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-7 pe-5">
                <?php if (!empty($heading)): ?>
                    <div class="hg-regular font28 leading36 space-0_56 text-white dmb-15"><?php echo $heading; ?></div>
                <?php endif; ?>
                <?php if (!empty($description)): ?>
                    <div class="hg-regular font16 leading26 text-white pe-2">
                        <?php echo $description; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-3">
                <?php if (!empty($label)): ?>
                    <div class="hg-regular font14 leading24 text-F4F4F5 dmb-15"><?php echo $label; ?></div>
                <?php endif; ?>
                <div class="prefix-container d-flex flex-wrap">
                    <?php if (!empty($service_tags)):
                        foreach ($service_tags as $tag):
                            $tags = $tag['tags'];
                    ?>
                            <div class="prefix bg-B4B4B4-btn d-inline-flex align-items-center hg-regular font14 leading18 space-0_28 text-white radius5 me-2 dmb-10"><?php echo $tags; ?></div>
                    <?php endforeach;
                    endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- center-slider-section -->
<!-- <?php if (!empty($image_slider)): ?>
    <section class="center-slider-main-section bg-0F120A dpb-205 tpb-220">
        <div class="center-slider-section position-relative">
            <div class="center-slider swiper tpb-80">
                <div class="swiper-wrapper h-100">
                    <?php foreach ($image_slider as $image_slide):
                        $images = $image_slide['images'];
                    ?>
                        <div class="swiper-slide">
                            <div class="center-main-img h-100">
                                <div class="center-img w-100 h-100 overflow-hidden radius10">
                                    <img src="<?php echo $images['sizes']['medium']; ?>" alt="<?php echo $images['title']; ?>" class="w-100 h-100 object-cover" />
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="custom-arrows position-absolute p-initial top-50 end-0 w-100 d-inline-flex z-3">
                <div class="container px-p-0">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="swiper-button-prev position-initial d-inline-flex bg-EBFF99 radius3 me-2 cursor-pointer">
                            <div class="icon d-inline-flex justify-content-center align-items-center">
                                <img src="<?php echo get_template_directory_uri(); ?>/templates/icons/sector-prev.svg" alt="white-left-arrow" class="h-100">
                            </div>
                        </div>
                        <div class="swiper-button-next position-initial d-inline-flex bg-EBFF99 radius3 me-2 cursor-pointer">
                            <div class="icon d-inline-flex justify-content-center align-items-center">
                                <img src="<?php echo get_template_directory_uri(); ?>/templates/icons/sector-next.svg" alt="white-right-arrow" class="h-100">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?> -->
<?php if (!empty($image_slider)): ?>
    <section class="center-slider-main-section bg-0F120A dpb-205 tpb-220">
        <div class="center-slider-section position-relative ">
            <div class="container h-100">
                <div class="slick-arrows position-absolute top-0 start-0 w-100 h-100 z-3">
                    <div class="container h-100">
                        <div class="h-100 d-flex align-items-center justify-content-between w-100 ">
                            <div class="prev-arrow bg-EBFF99 d-flex justify-content-center align-items-center radius3 me-2 cursor-pointer"><img src="<?php echo get_template_directory_uri(); ?>/templates/icons/sector-prev.svg" class="icon" alt=""></div>
                            <div class="next-arrow bg-EBFF99 d-flex justify-content-center align-items-center radius3 cursor-pointer"><img src="<?php echo get_template_directory_uri(); ?>/templates/icons/sector-next.svg" class="icon" alt=""></div>
                        </div>
                    </div>
                </div>
                <div class="center-slider tpb-80">
                    <?php foreach ($image_slider as $image_slide):
                        $images = $image_slide['images'];
                    ?>
                        <div class="center-main-img h-100">
                            <div class="center-img w-100 h-100 overflow-hidden radius10">
                                <img src="<?php echo $images['sizes']['medium']; ?>" alt="<?php echo $images['title']; ?>" class="w-100 h-100 object-cover" />
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php include 'templates/page-builder.php'; ?>