<?php
    get_header();
    $post_id = get_the_ID();
    $hide_title = get_post_meta($post_id, '_hide_page_title', true);
    $heading_class = !empty($hide_title) && 'yes' === $hide_title ? 'hide' : 'show';
   
?>

<div id="primary">
    <div id="main" class="site-main mt-5" role="main">
        <?php
        if ( have_posts() ) : ?>
            <div class="container">
                <div class="row">
                <div class="col-7">
                <?php
                    while ( have_posts() ) : the_post(); 
                    get_template_part('template-parts/content', 'post');
                    endwhile;
                ?>
                <div class="post__navigation">
                    <?php post_navigation();?>
                </div>
                <?php 
                else: get_template_part('template-parts/content', 'none');

                endif; ?>
                </div> 
                <div class="col-5">
                    <?php get_sidebar()?>
                </div>
                </div>
                
                <div class="row">
                    
                </div> 
            </div>
        
    </div>
</div>



<?php
    get_footer();
?>