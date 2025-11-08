<?php

$top_header = get_field('top_header', 'options');
$header_white_logo = get_field('header_white_logo', 'options');
$header_black_logo = get_field('header_black_logo', 'options');
$header_links = get_field('header_links', 'options');
$contact_details = get_field('contact_details', 'options');
$get_in_touch = get_field('get_in_touch', 'options');

$header_color = get_field('header_color');
$main_header_color = '';

if ($header_color == 'Default') {
    $main_header_color = '';
} elseif ($header_color == 'Header Black')  {
    $main_header_color = 'header-black';
}
?>

<header class="header <?php echo $main_header_color; ?> position-fixed w-100">
    <div class="top-header bg-EBFF99 dpt-10 dpb-10">
        <div class="container">
            <?php if (!empty($top_header)): ?>
                <div class="d-flex justify-content-lg-between justify-content-center align-items-center">
                    <div class="d-lg-flex align-items-center d-none">
                        <img src="<?php echo get_template_directory_uri(); ?>/templates/icons/black-search.svg" class="header-search-icon me-2" alt="">
                        <input type="text" class="hg-regular font14 leading18 space-0_28 text-0F120A header-search-input" placeholder="Site Search…">
                    </div>
                    <div class="header-center-data hg-regular font14 leading18 space-0_28 text-0F120A res-font11 res-space-0_22">
                        <?php echo $top_header['center_content']; ?>
                    </div>
                    <a href="<?php echo $top_header['member_login']['url']; ?>" class="hg-regular font14 leading18 space-0_28 text-0F120A text-decoration-none d-lg-inline-flex align-items-center d-none"><?php echo $top_header['member_login']['title']; ?> <img src="<?php echo get_template_directory_uri(); ?>/templates/icons/user-img.svg" class="user-icon ms-2" alt=""></a>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="header-section position-relative">
        <div class="container">
            <div class="d-flex align-items-lg-center justify-content-between flex-column flex-lg-row dpt-30 dpb-30 tpt-20 tpb-20">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <?php if (!empty($header_white_logo)): ?>
                            <a href="/" class="header-logo d-inline-block text-decoration-none white-logo">
                                <img src="<?php echo $header_white_logo['url']; ?>" class="h-100" alt=""></a>
                        <?php endif; ?>
        
                        <?php if (!empty($header_black_logo)): ?>
                            <a href="/" class="header-logo d-inline-block text-decoration-none black-logo">
                                <img src="<?php echo $header_black_logo['url']; ?>" class="h-100" alt="">
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="burger-toggle d-flex d-lg-none">
                        <img src="<?php echo get_template_directory_uri(); ?>/templates/icons/burger-menu.svg" class="h-100 burger-icon" alt="">
                        <img src="<?php echo get_template_directory_uri(); ?>/templates/icons/white-close.svg" class="h-100 close-icon" alt="">
                        <img src="<?php echo get_template_directory_uri(); ?>/templates/icons/black-burger-menu.svg" class="h-100 black-burger-icon" alt="">
                    </div>
                </div>
                <div class="res-search-input position-relative dmt-40 dmb-70 d-none">
                    <input type="text" class="hg-regular font12 leading18 space-0_28 res-space-0_24 text-capitalize text-white border-0 radius5 w-100 header-search-input" placeholder="Site Search…">
                    <img src="<?php echo get_template_directory_uri(); ?>/templates/icons/search-icon.svg" class="position-absolute top-center end-0 me-3" alt="">
                </div>
                <nav class="nav d-none d-lg-block">
                    <ul class="navigation list-none d-flex align-items-lg-center flex-column flex-lg-row ps-0 mb-0">
                        <?php if (!empty($header_links)):
                            foreach ($header_links as $header_link):
                                $link_type = $header_link['link_type'];
                                $link = $header_link['link'];
                                $link_title = $header_link['link_title'];
                                $mega_menu_links = $header_link['mega_menu_links'];
                        ?>
                                <?php if (!empty($link_type) && $link_type == 'Link'): ?>
                                    <li class="menu-item tmb-30">
                                        <a href="<?php echo $link['url']; ?>" class="menu-anchor hg-semibold font16 leading21 space-0_32 text-decoration-none d-inline-flex align-items-center res-font24 res-leading34 res-space-0_48"><?php echo $link['title']; ?></a>
                                    </li>
                                <?php elseif (!empty($link_type) && $link_type == 'Mega menu'): ?>
                                    <li class="menu-item tmb-30">
                                        <a href="" class="menu-anchor hg-semibold font16 leading21 space-0_32 text-decoration-none d-inline-flex align-items-center res-font24 res-leading34 res-space-0_48"><?php echo $link_title; ?> <img src="<?php echo get_template_directory_uri(); ?>/templates/icons/header-arrow.svg" class="header-arrow ms-2 ms-lg-1 white-arrow" alt=""> <img src="<?php echo get_template_directory_uri(); ?>/templates/icons/black-header-arrow.svg" class="header-arrow ms-1 black-arrow" alt="">
                                        </a>
                                        <div class="mega-menu position-absolute top-100 start-0 w-100 dpt-120 d-none p-initial tpt-30">
                                            <div class="container px-p-0">
                                                <div class="d-flex justify-content-between flex-column flex-lg-row">
                                                    <div class="menu-link-group position-relative col-lg-7 col-xl-5 col-12 p-initial">
                                                        <?php if (!empty($mega_menu_links)):
                                                            foreach ($mega_menu_links as $mega_menus):
                                                                $mega_link_type = $mega_menus['mega_link_type'];
                                                                $menu_link = $mega_menus['menu_link'];
                                                                $menu_link_title = $mega_menus['menu_link_title'];
                                                                $sub_menu = $mega_menus['sub_menu'];
                                                                $view_all_link = $mega_menus['view_all_link'];
                                                        ?>
                                                                <?php if (!empty($mega_link_type) && $mega_link_type == 'Link'): ?>
                                                                    <?php if(!empty($menu_link['title'])):?>
                                                                    <a href="<?php echo $menu_link['url']; ?>" class="text-decoration-none hg-regular font28 leading32 menu-links-heading cursor-pointer d-inline-flex align-items-center dmb-10 tmb-20 res-font20"> 
                                                                        <?php echo $menu_link['title']; ?>
                                                                    </a>
                                                                <?php endif;?>
                                                                    <?php elseif (!empty($mega_link_type) && $mega_link_type == 'Sub menu'): ?>
                                                                        <div class="d-flex">
                                                                            <div class="hg-regular font28 leading32 menu-links-heading cursor-pointer d-inline-flex align-items-center tmb-20 dmb-10 res-font20"><?php echo $menu_link_title; ?><img src="<?php echo get_template_directory_uri(); ?>/templates/icons/mega-menu-arrow.svg" class="arrow ms-3 transition" alt=""></div>
                                                                            <div class="mega-menu-links d-none position-absolute end-0 top-0 tpb-120">
                                                                                <a href="#" class="go-back hg-regular font20 leading45 space-0_4 text-white opacity-50 d-inline-block dmb-40 d-lg-none">Go back</a>
                                                                                <div class="d-flex flex-column">
                                                                                    <?php if (!empty($sub_menu)):
                                                                                        foreach ($sub_menu as $menu):
                                                                                            $sub_link = $menu['sub_link'];
                                                                                    ?>
                                                                                            <a href=" <?php echo $sub_link['url']; ?>" class="hg-regular font20 leading45 space-0_4 text-capitalize text-white text-decoration-none"> <?php echo $sub_link['title']; ?></a>
                                                                                    <?php endforeach;
                                                                                    endif; ?>
                                                                                    <a href="<?php echo $view_all_link['url']; ?>" class="hg-regular font20 leading45 space-0_4 text-capitalize text-white"> <?php echo $view_all_link['title']; ?>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <?php endif; ?>
                                                            <?php endforeach;
                                                        endif; ?>
                                                    </div>
                                                    <div class="col-lg-5 header-information-box radius20 res-radius10 tmb-30">
                                                        <?php if (!empty($contact_details)):
                                                            $call_number = $contact_details['call_number'];
                                                            $general_mail = $contact_details['general_mail'];
                                                            $sales_mail = $contact_details['sales_mail'];
                                                            $account_mail =  $contact_details['account_mail'];
                                                            $social_group = $contact_details['social_group'];
                                                        ?>
                                                            <div class="d-flex flex-wrap dmb-20">
                                                                <div class="hg-regular font23 leading36 text-FFFFFF80 me-1 res-font16 res-leading21">Call:</div>
                                                                <a href="tel:<?php echo $call_number; ?>" class="hg-regular font23 leading36 text-white text-decoration-none res-font16 res-leading21"><?php echo $call_number; ?></a>
                                                            </div>
                                                            <div class="d-flex flex-wrap tmb-10">
                                                                <div class="hg-regular font23 leading36 text-FFFFFF80 me-1 res-font16 res-leading21">General:</div>
                                                                <a href="mailto:<?php echo $general_mail; ?>" class="hg-regular font23 leading36 text-white text-decoration-none res-font16 res-leading21"><?php echo $general_mail; ?></a>
                                                            </div>
                                                            <div class="d-flex flex-wrap tmb-10">
                                                                <div class="hg-regular font23 leading36 text-FFFFFF80 me-1 res-font16 res-leading21">Sales:</div>
                                                                <a href="mailto:<?php echo $sales_mail; ?>" class="hg-regular font23 leading36 text-white text-decoration-none res-font16 res-leading21"><?php echo $sales_mail; ?></a>
                                                            </div>
                                                            <div class="d-flex flex-wrap">
                                                                <div class="hg-regular font23 leading36 text-FFFFFF80 me-1 res-font16 res-leading21">Accounts:</div>
                                                                <a href="mailto:<?php echo $account_mail; ?>" class="hg-regular font23 leading36 text-white text-decoration-none res-font16 res-leading21"><?php echo $account_mail; ?></a>
                                                            </div>
                                                        <?php endif; ?>

                                                        <div class="social-menus tmt-40 dmt-25 d-flex">
                                                            <?php if ($social_group):
                                                                foreach ($social_group as $social):
                                                                    $social_icon = $social['social_icon'];
                                                                    $social_link = $social['social_link'];
                                                            ?>
                                                                    <a href="<?php echo $social_link; ?>" target="_blank" class="text-decoration-none social-icon bg-white d-inline-flex align-items-center justify-content-center rounded-pill me-2">
                                                                        <img src="<?php echo $social_icon['url']; ?>" alt="">
                                                                    </a>
                                                                <?php endforeach; ?>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                <?php endif; ?>
                        <?php endforeach;
                        endif; ?>
                    </ul>
                </nav>

                <?php if (!empty($get_in_touch)): ?>
                    <div class="d-none d-lg-block tmt-15 header-btn d-lg-block">
                        <a href=" <?php echo $get_in_touch['url']; ?>" class="btnA bg-EBFF99-btn hg-semibold font16 leading21 space-0_32 text-0F120A d-inline-flex align-items-center text-decoration-none position-relative transition"><img src="<?php echo get_template_directory_uri(); ?>/templates/icons/button-arrow.svg" class="arrow me-2 arrow-1 position-absolute top-center transition"><span class="transition"> <?php echo $get_in_touch['title']; ?></span><img src="<?php echo get_template_directory_uri(); ?>/templates/icons/button-arrow.svg" class="arrow ms-2 arrow-2 position-absolute transition"></a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>