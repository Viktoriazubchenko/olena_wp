<?php
    $post_id = get_the_ID();

    $post_date = get_the_date('j F, Y');
    $archive_year  = get_the_time( 'Y' ); 
    $archive_month = get_the_time( 'm' ); 
    $archive_day   = get_the_time( 'd' );
    $author_id  = get_post_field( 'post_author', get_the_ID() );
    $author_posts_link = get_author_posts_url( $author_id );

    $attributes = array(
        'sizes' => '100%, auto',
        'class' => 'attachment-large size-image',
        'loading' => 'lazy'
    );

    $post_terms = wp_get_post_terms( $post_id, [ 'category', 'post_tag' ] );
?>

<article id="post post-<?php the_ID(); ?>">
    <figure class="post__image">
        <?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'large', false, $attributes )?>
    </figure>
    <h1 class="post__title">
        <?php single_post_title(); ?>
    </h1>
    <a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day ) ); ?>">
        <time class="post__time"><?php echo $post_date; ?></time>
    </a>
    <div><?php _e('Written by ')?><a href="<?php echo esc_url( $author_posts_link ); ?>"><?php the_author(); ?></a></div>
    <?php echo get_the_content(); ?>
    <?php ?>
    
    <?php   if ( !empty( $post_terms ) ||  is_array( $post_terms ) ) { ?>

    <div class="entry-footer mt-4">
    <?php
    foreach($post_terms as  $post_term ) {
        ?>
        <a class="entry-footer-link text-black-50 btn border border-secondary mb-2 mr-2" href="<?php echo esc_url( get_term_link( $post_term ) ); ?>">
            <?php echo esc_html( $post_term->name ); ?>
        </a>
        <?php
    }
    ?>
    </div>	
    <?php } ?>
<?php
        wp_link_pages(
            [
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'olena' ),
                'after'  => '</div>',
            ]
        );
    ?>
</article>