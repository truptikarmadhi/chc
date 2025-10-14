<?php

$top_header = get_field('top_header', 'options');
$header_white_logo = get_field('header_white_logo', 'options');
$header_black_logo = get_field('header_black_logo', 'options');
$header_links = get_field('header_links', 'options');
$contact_details = get_field('contact_details', 'options');
$get_in_touch = get_field('get_in_touch', 'options');

?>
<!-- 
<?php if (!empty($top_header)): ?>
<?php echo $top_header['center_content']; ?>
<?php echo $top_header['member_login']['url']; ?>
<?php echo $top_header['member_login']['title']; ?>
<?php endif; ?>

<?php if (!empty($header_white_logo)): ?>
<?php echo $header_white_logo['url']; ?>
<?php endif; ?>

<?php if (!empty($header_black_logo)): ?>
<?php echo $header_black_logo['url']; ?>
<?php endif; ?>

<?php if (!empty($header_links)):
    foreach ($header_links as $header_link):
        $link_type = $header_link['link_type'];
        $link = $header_link['link'];
        $link_title = $header_link['link_title'];
        $mega_menu_links = $header_link['mega_menu_links'];
?>
<?php if (!empty($link_type) && $link_type == 'Link'): ?>
    <?php echo $link['url']; ?>
    <?php echo $link['title']; ?>

<?php elseif (!empty($link_type) && $link_type == 'Mega menu'): ?>
    <?php echo $link_title; ?>

    <?php if (!empty($mega_menu_links)):
                foreach ($mega_menu_links as $mega_menus):
                    $mega_link_type = $mega_menus['mega_link_type'];
                    $menu_link = $mega_menus['menu_link'];
                    $menu_link_title = $mega_menus['menu_link_title'];
                    $sub_menu = $mega_menus['sub_menu'];
                    $view_all_link = $mega_menus['view_all_link'];
    ?>
    <?php if (!empty($mega_link_type) && $mega_link_type == 'Link'): ?>
        <?php echo $menu_link['url']; ?>
        <?php echo $menu_link['title']; ?>

    <?php elseif (!empty($mega_link_type) && $mega_link_type == 'Sub menu'): ?>
        <?php echo $menu_link_title; ?>
         <?php if (!empty($sub_menu)):
                            foreach ($sub_menu as $menu):
                                $sub_link = $menu['sub_link'];
            ?>
                <?php echo $sub_link['url']; ?>
                <?php echo $sub_link['title']; ?>
                <?php echo $view_all_link['url']; ?>
        <?php endforeach;
                        endif; ?>
                <?php echo $view_all_link['title']; ?>
    <?php endif; ?>

    <?php endforeach;
            endif; ?>
<?php endif; ?>
<?php endforeach;
endif; ?>

<?php if (!empty($contact_details)):
    $call_number = $contact_details['call_number'];
    $general_mail = $contact_details['general_mail'];
    $sales_mail = $contact_details['sales_mail'];
    $account_mail =  $contact_details['account_mail'];
    $social_group = $contact_details['social_group'];
?>
    <?php echo $call_number; ?>
    <?php echo $general_mail; ?>
    <?php echo $sales_mail; ?>
    <?php echo $account_mail; ?>
    <?php if ($social_group):
        foreach ($social_group as $social):
            $social_icon = $social['social_icon'];
            $social_link = $social['social_link'];
    ?>
        <?php echo $social_icon['url']; ?>
        <?php echo $social_link; ?>
    <?php endforeach;
    endif; ?>
<?php endif; ?>

<?php if (!empty($get_in_touch)): ?>
    <?php echo $get_in_touch['url']; ?>
    <?php echo $get_in_touch['title']; ?>
<?php endif; ?> -->