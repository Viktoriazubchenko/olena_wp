<?php
    get_header();
?>

<div id="primary">
    <div id="main" class="site-main mt-5" role="main">
        <?php
        if ( have_posts() ) : ?>
            <div class="container">
                <div class="row">
                    <header class="page__header">
                        <h1 class="page__title">
                            <?php single_post_title(); ?>
                        </h1>
					</header>
                </div>
                <div class="row">
                <?php
                    while ( have_posts() ) : the_post(); 
                    get_template_part('template-parts/content', 'post-card');
                    endwhile;
                ?>
                </div>  
            </div>
        <?php 

        else: get_template_part('template-parts/content', 'none');
    
        endif; ?>
    </div>
</div>



<?php
    get_footer();
?>