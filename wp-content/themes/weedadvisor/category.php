<?php

get_header(); 

$category = get_category( get_query_var( 'cat' ) );
$cat_id = $category->cat_ID;
$cat_name = $category->name;
$args = array( 'post_type' => 'dispensaries', 'posts_per_page' => 999, 'cat' => $cat_id );
$loop = new WP_Query( $args );

?>

	<div id="primary" class="content-area">

        <?php

        $picture = get_template_directory_uri().'/img/dispensary.jpg';

        echo 	"<div id='hero-picture' style='background-image:url($picture);'>'
            <h2>Dispensaries</h2>
        </div>";

        ?>

        <div class="container">

            <div class="section col-sm-3">
                <h4>Dipensaries by location</h4>

                <?php

                    wp_list_categories('child_of=7');
                
                ?>
            </div>

		    <main id="dispensaries-main" class="col-sm-9 section" role="main">

                <div class="row">



                <h2>Dispensaries in <?php echo $cat_name; ?> </h2>               


                <?php
                // Start the Loop.
                while ( $loop->have_posts() ) : $loop->the_post();

                     $logoId = get_field('logo');                
                    if( strlen( $logoId ) < 1 )
                        $logo =  wp_get_attachment_image_src( 557 )[0];
                    else
                        $logo =  wp_get_attachment_image_src(get_field('logo'))[0];
                    

                    $url = esc_url( get_permalink() ) ;

                    echo "<div class='col-sm-6 dispensary-item'>
                    
                        <a class='dispensary-content' href=$url>";

                        if( strlen( $logo ) > 0)
                        echo	 	"<div class='col-xs-3'><img src='$logo' class='img img-thumbnail img-reponsive'/> </div>";
                    
                        echo '<div class="col-xs-9"><h4>';                        
                            the_title();
                        echo '</h4>';

                        if( strlen(get_field('address')) > 0 )    
                        echo '<div><i class="fa fa-home"></i>'.get_field('address').'</div>';

                        if( strlen(get_field('phone')) > 0 )
                        echo '<div><i class="fa fa-phone"></i>'.get_field('phone').'</div>';
                        
                        echo '</div>';

                    echo "</a></div>";

                // End the loop.
                endwhile;


                next_posts_link( 'Older Entries', $loop->max_num_pages );
                previous_posts_link( 'Newer Entries' );


                // Previous/next page navigation.
                the_posts_pagination( array(
                    'prev_text'          => __( 'Previous page', 'twentysixteen' ),
                    'next_text'          => __( 'Next page', 'twentysixteen' ),
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
                ) );

            ?>

             </div><!-- .row -->

		    </main><!-- .site-main -->

        </div><!-- .container -->

       

	</div><!-- .content-area -->


<?php get_footer(); ?>
