<?php
$post_ID = get_the_ID();

$attributes = array(
    'sizes' => '(max-width: 350px) 350px, 233px',
    'class' => 'attachment-featured-large size-featured-image',
    'loading' => 'lazy'
);

$trimmed_excerpt = wp_html_excerpt( get_the_excerpt($post_ID), 200, ' ...' );

?>

<div class="col-12 col-md-6 col-lg-4">
    <div class="post-card">
        <header class="post-card__header">
            <figure class="post-card__image">
                <a href="<?php echo esc_url(get_permalink())?>">
                    <?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'featured-thumbnail', false, $attributes )?>
                </a>
            </figure>
            <h3><?php echo get_the_title();?></h3>
            <?php echo $trimmed_excerpt; ?>
            <a href="<?php echo get_permalink($post_ID) ?>" class="button"><?php _e( 'Read more', 'olena' )?></a>
        </header>
    </div>
</div>
