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
            <?php if (!empty($title)): ?>
                <?php echo $title; ?>
            <?php endif; ?>
            <?php if (!empty($button)): ?>
                <?php echo $button['url']; ?>
                <?php echo $button['title']; ?>
            <?php endif; ?>
            <?php if (!empty($media_type) && $media_type == 'Image'): ?>
                <?php echo $image['url']; ?>
            <?php elseif (!empty($media_type) && $media_type == 'Video'): ?>
                <?php echo $video['url']; ?>
            <?php elseif (!empty($media_type) && $media_type == 'Vimeo'): ?>
                <?php echo $vimeo; ?>
            <?php elseif (!empty($media_type) && $media_type == 'Youtube'): ?>
                <?php echo $youtube; ?>
            <?php endif; ?>
        <?php elseif (get_row_layout() == 'spacing'): ?>

        <?php elseif (get_row_layout() == 'spacing'):
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
            <div class="spacing<?php
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