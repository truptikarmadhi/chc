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

?>
<!-- <footer>

    <?php if (!empty($get_in_touch_section)): ?>
        <?php echo $get_in_touch_section['image']['url']; ?>
        <?php echo $get_in_touch_section['content']; ?>
    <?php endif; ?>

    <?php if (!empty($footer_contact_details)):
        $call_number = $footer_contact_details['call_number'];
        $general_mail = $footer_contact_details['general_mail'];
        $sales_mail = $footer_contact_details['sales_mail'];
        $account_mail = $footer_contact_details['account_mail'];
    ?>
        <?php echo $call_number; ?>
        <?php echo $general_mail; ?>
        <?php echo $sales_mail; ?>
        <?php echo $account_mail; ?>
    <?php endif; ?>

    <?php if (!empty($footer_logo)): ?>
        <?php echo $footer_logo['url']; ?>
    <?php endif; ?>

    <?php if (!empty($useful_areas)):
        $label = $useful_areas['label'];
        $useful_links = $useful_areas['useful_links'];
        $member_login = $useful_areas['member_login'];
    ?>
        <?php echo $label; ?>
        <?php foreach ($useful_links as $links):
            $link = $links['link'];
        ?>
            <?php echo $link['url']; ?>
            <?php echo $link['title']; ?>
        <?php endforeach; ?>
        <?php echo $member_login['url']; ?>
        <?php echo $member_login['title']; ?>
    <?php endif; ?>

    <?php if (!empty($acreditations_group)):
        $label = $acreditations_group['label'];
        $acreditations_images = $acreditations_group['acreditations_images'];
    ?>
        <?php echo $label; ?>
        <?php foreach ($acreditations_images as $images):
            $image = $images['image'];
        ?>
            <?php echo $image['url']; ?>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if (!empty($footer_social_group)):
        foreach ($footer_social_group as $social):
            $social_icon = $social['social_icon'];
            $social_link = $social['social_link'];
    ?>
            <?php echo $social_icon['url']; ?>
            <?php echo $social_link; ?>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if (!empty($app_button)):
        foreach ($app_button as $app_btn):
            $button_image = $app_btn['button_image'];
            $app_url = $app_btn['app_url'];
    ?>
            <?php echo $button_image['url']; ?>
            <?php echo $app_url; ?>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if (!empty($copy_right_text)): ?>
        <?php echo $copy_right_text; ?>
    <?php endif; ?>

    <?php if (!empty($registration_id)): ?>
        <?php echo $registration_id; ?>
    <?php endif; ?>

    <?php if (!empty($website_by)): ?>
        <?php echo $website_by; ?>
    <?php endif; ?>
</footer> -->