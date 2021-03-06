<?php
get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="container" role="main">

    <div class="col-sm-6 col-sm-offset-3 section">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

        ?>
                    
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
                        <span class="sticky-post"><?php _e( 'Featured', 'twentysixteen' ); ?></span>
                    <?php endif; ?>

                    <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

                </header><!-- .entry-header -->

                <div class="entry-content">
                    <?php
                        /* translators: %s: Name of current post */
                        the_content( sprintf(
                            __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
                            get_the_title()
                        ) );

                        do_action( 'wordpress_social_login' );

                        wp_link_pages( array(
                            'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
                            'after'       => '</div>',
                            'link_before' => '<span>',
                            'link_after'  => '</span>',
                            'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
                            'separator'   => '<span class="screen-reader-text">, </span>',
                        ) );
                    ?>
                </div><!-- .entry-content -->

                <footer class="entry-footer">
                    <?php 
                    //if(function_exists('the_ratings')) { the_ratings(); } 
                    ?>
                            
                </footer><!-- .entry-footer -->
            </article><!-- #post-## -->


    <?php
	
		endwhile;
		?>
    </div>

	</main><!-- .site-main -->

</div><!-- .content-area -->

<?php get_footer(); ?>
