<?php

$get_in_touch_section = get_field('get_in_touch_section', 'options');
$footer_contact_details = get_field('footer_contact_details', 'options');
$footer_logo = get_field('footer_logo', 'options');
$useful_areas = get_field('useful_areas', 'options');
$acreditations_group = get_field('acreditations_group', 'options');
$footer_social_group = get_field('footer_social_group', 'options');
$app_button = get_field('app_button', 'options');
$copy_right_text = get_field('copy_right_text', 'options');
$registration_id = get_field('registration_id', 'options');
$website_by = get_field('website_by', 'options');

$footer_color = get_field('footer_color');
$main_footer_color = '';

if ($footer_color == 'default') {
    $main_footer_color = '';
} else {
    $main_footer_color = 'bg-FFFCFA-footer';
}

?>

<footer class="footer <?php echo $main_footer_color; ?> position-relative z-3 dpt-150 dpb-50 tpt-0 tpb-20">
    <div class="container">
        <div class="footer-banner-section position-relative">
            <?php if (!empty($get_in_touch_section)): ?>
                <div class="footer-banner bg-20994A radius20 overflow-hidden ps-lg-5 d-flex align-items-center flex-column flex-lg-row">
                    <div class="col-lg-8 ms-lg-4">
                        <div class="main-title main-white-title hg-light font54 leading62 space-1_08 text-white dmb-20 res-font30 res-leading40 tmb-30 pe-3 pe-lg-0 res-space-0_6">
                            <?php echo $get_in_touch_section['content']; ?>
                        </div>
                        <?php echo do_shortcode('[contact-form-7 id="c2cba21" title="Footer banner form"]'); ?>
                    </div>
                    <div class="position-absolute bottom-0 end-0">
                        <div class="footer-banner-img">
                            <img src="<?php echo $get_in_touch_section['image']['url']; ?>" alt="" class="w-100 h-100">
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="footer-main dmt-115 tmt-80">
            <div class="d-flex flex-column flex-lg-row dmb-65 tmb-50">
                <?php if (!empty($footer_contact_details)):
                    $call_number = $footer_contact_details['call_number'];
                    $general_mail = $footer_contact_details['general_mail'];
                    $sales_mail = $footer_contact_details['sales_mail'];
                    $account_mail = $footer_contact_details['account_mail'];
                ?>
                    <div class="col-lg-6 col-12 tmb-55">
                        <div class="hg-semibold font28 leading34 text-FFFFFF80 dmb-30 res-font18 res-leading28">
                            Call:
                            <a href="tel:<?php echo $call_number; ?>" class="text-decoration-none text-white">
                                <?php echo $call_number; ?>
                            </a>
                        </div>
                        <div class="hg-light font28 leading34 text-FFFFFF80 dmb-5 res-font18 res-leading28">
                            General:
                            <a href="mailto:<?php echo $general_mail; ?>" class="text-decoration-none text-white">
                                <?php echo $general_mail; ?>
                            </a>
                        </div>
                        <div class="hg-light font28 leading34 text-FFFFFF80 dmb-5 res-font18 res-leading28">
                            Sales:
                            <a href="mailto:<?php echo $sales_mail; ?>" class="text-decoration-none text-white">
                                <?php echo $sales_mail; ?>
                            </a>
                        </div>
                        <div class="hg-light font28 leading34 text-FFFFFF80 dmb-5 res-font18 res-leading28">
                            Accounts:
                            <a href="mailto:<?php echo $account_mail; ?>" class="text-decoration-none text-white">
                                <?php echo $account_mail; ?>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>


                <div class="col-lg-6 col-12 d-flex flex-column flex-lg-row">
                    <div class="col-lg-6 col-12 tmb-55">
                        <?php if (!empty($useful_areas)):
                            $label = $useful_areas['label'];
                            $useful_links = $useful_areas['useful_links'];
                            $member_login = $useful_areas['member_login'];
                        ?>
                            <div class="hg-semibold font14 leading18 space-0_28 text-white opacity40 dmb-15">
                                <?php echo $label; ?>
                            </div>
                            <ul class="list-none ps-0 dmb-10">
                                <?php foreach ($useful_links as $links):
                                    $link = $links['link'];
                                ?>
                                    <li>
                                        <a href="<?php echo $link['url']; ?>" class="text-decoration-none hg-semibold font16 leading28 space-0_32 text-white res-font14 res-leading24">
                                            <?php echo $link['title']; ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <a href="<?php echo $member_login['url']; ?>" class="text-decoration-none hg-semibold font16 leading21 space-0_32 text-0F120A bg-EBFF99 py-1 px-3 radius3">
                                <?php echo $member_login['title']; ?>
                            </a>
                        <?php endif; ?>
                    </div>

                    <div class="col-lg-6 col-12">
                        <?php if (!empty($acreditations_group)):
                            $label = $acreditations_group['label'];
                            $acreditations_images = $acreditations_group['acreditations_images'];
                        ?>
                            <div class="hg-semibold font14 leading18 space-0_28 text-white opacity40 dmb-15">
                                <?php echo $label; ?>
                            </div>
                            <div class="row row8 res-row4">
                                <?php foreach ($acreditations_images as $images):
                                    $image = $images['image'];
                                ?>
                                    <div class="col-lg-4 col-3 acreditations-card dmb-15">
                                        <div class="bg-white w-100 h-100 radius10 overflow-hidden d-flex align-items-center justify-content-center">
                                            <div class="acreditations-img">
                                                <img src="<?php echo $image['url']; ?>" alt="" class="h-100">
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-end flex-column flex-lg-row">
                <div class="col-lg-6 col-12">
                    <?php if (!empty($footer_logo)): ?>
                        <div class="footer-logo d-none d-lg-block">
                            <img src="<?php echo $footer_logo['url']; ?>" alt="" class="h-100">
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="d-flex align-items-lg-center justify-content-between dmb-25 flex-column flex-lg-row tmb-30">
                        <div class="social-menus tmb-45 d-flex">
                            <?php if (!empty($footer_social_group)):
                                foreach ($footer_social_group as $social):
                                    $social_icon = $social['social_icon'];
                                    $social_link = $social['social_link'];
                            ?>
                                    <a href="<?php echo $social_link; ?>" target="_blank" class="text-decoration-none social-icon bg-white d-inline-flex align-items-center justify-content-center rounded-pill me-2">
                                        <img src="<?php echo $social_icon['url']; ?>" alt="">
                                    </a>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>

                        <div class="d-flex align-items-center">
                            <?php if (!empty($app_button)):
                                foreach ($app_button as $app_btn):
                                    $button_image = $app_btn['button_image'];
                                    $app_url = $app_btn['app_url'];
                            ?>
                                    <div class="app-images ms-lg-3 me-2 me-lg-0">
                                        <a href="<?php echo $app_url; ?>" class="text-decoration-none h-100">
                                            <img src="<?php echo $button_image['url']; ?>" alt="" class="h-100">
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="w-100 d-flex align-items-center justify-content-between flex-column flex-lg-row">
                        <div class="hg-regular font14 leading18 space-0_28 text-white res-font10 res-space-0_2 pe-4 pe-lg-0 tmb-25">
                            <?php if (!empty($copy_right_text)): ?>
                                <?php echo $copy_right_text; ?>
                            <?php endif; ?>
                            Company Registration:
                            <?php if (!empty($registration_id)): ?>
                                <?php echo $registration_id; ?>
                            <?php endif; ?>
                        </div>

                        <div class="hg-regular font14 leading18 space-0_28 text-white opacity-50 res-font10 res-space-0_2 ms-auto">
                            <?php if (!empty($website_by)): ?>
                                <?php echo $website_by; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>