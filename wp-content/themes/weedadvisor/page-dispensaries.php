<?php

get_header(); 

$args = array( 'post_type' => 'dispensaries', 'posts_per_page' => 999 );
$loop = new WP_Query( $args );

?>

	<div id="primary" class="content-area">

        <?php

        $picture = get_template_directory_uri().'/img/dispensary-high-res.jpg';

        echo 	"<div id='hero-picture' style='background-image:url($picture);'>'
            <h2>Dispensaries</h2>
        </div>";

        ?>

        <div class="container">

        <!-- ad -->
            <?php 

            get_template_part( 'template-parts/google-banner-ad');  
            
            ?>  

            <div class="section col-sm-3">
                <h4>Dipensaries by location</h4>

                <?php

                    wp_list_categories('child_of=2');
                
                ?>

                <hr />

                <h4>Add a Dispensary</h4>

                <p>Know a dispensary that is not in the list?
                You can add one in our <a href="<?php echo get_home_url(); ?>/add-dispensary">dispensary registration page</a></p>
                <a href="<?php echo get_home_url(); ?>/add-dispensary" class="btn btn-success">

                Add Dispensary
                
                </a>

                <hr />

                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- weed advisor 1 -->
                <ins class="adsbygoogle"
                style="display:block"
                data-ad-client="ca-pub-1044242235405946"
                data-ad-slot="6461890564"
                data-ad-format="auto"></ins>
                <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
                </script>



            </div>

		    <main id="dispensaries-main" class="col-sm-9 section" role="main">

                <div class="row">

                <h2>All Dispensaries</h2>

                <?php 

                get_template_part( 'register-ad');
                
                ?>
               

                <?php
                // Start the Loop.
                while ( $loop->have_posts() ) : $loop->the_post();

                    $logoId = get_field('logo');                
                    if( strlen( $logoId ) < 1 )
                        $logo =  wp_get_attachment_image_src( 557 )[0];
                    else if( is_numeric( get_field('logo') ))
                        $logo =  wp_get_attachment_image_src(get_field('logo'))[0];
                    else
                        $logo =  get_field('logo');

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
