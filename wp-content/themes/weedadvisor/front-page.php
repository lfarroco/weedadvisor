<?php

$dispensary = get_template_directory_uri().'/img/dispensary.jpg';
$strains = get_template_directory_uri().'/img/strains.jpg';
$reviews = get_template_directory_uri().'/img/reviews.jpg';
$products = get_template_directory_uri().'/img/products.jpg';

get_header(); ?>

<main id="home"role="main">

    <div class="jumbotron">
        <div class="container">
            <h1>Your source for Marijuana Information</h1> 
            <p>Take part in a community for finding and sharing the best strains and dispensaries</p>
        </div>
    </div>
   
    <div id="home-main" class="container">

        <div class="row">

            <div class="text-center">

                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- weed advisor -->
                <ins class="adsbygoogle"
                style="display:inline-block;width:728px;height:90px"
                data-ad-client="ca-pub-1044242235405946"
                data-ad-slot="4985157362"></ins>
                <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            
            </div>

            <div class="col-sm-3">

                <img src="<?php echo $dispensary; ?>" class="img img-thumbnail img-responsive" />

                <h2>Dispensaries</h2>

                <p>Locate dispensaries in your city or province in Canada</p>

                <a href="dispensaries" class="btn btn-default btn-block">

                    View dispensary list
                
                </a>
            
            </div>

            <div class="col-sm-3">

                <img src="<?php echo $strains; ?>" class="img img-thumbnail img-responsive" />

                <h2>Strains</h2>

                <p>Get more information about different marijuana strain</p>

                <a href="strains" class="btn btn-default btn-block">

                    View strains list
                
                </a>
            
            </div>

            <div class="col-sm-3">

                <img src="<?php echo $reviews; ?>" class="img img-thumbnail img-responsive" />

                <h2>Reviews</h2>

                <p>Leave your reviews and help other users</p>

                  <a href="register" class="btn btn-default btn-block">

                    Register and start reviewing!
                
                </a>
            
            </div>

            <div class="col-sm-3">

                <img src="<?php echo $products; ?>" class="img img-thumbnail img-responsive" />

                <h2>News</h2>

                <p>Check out what's happening in the world of marijuana</p>

                 <a href="news" class="btn btn-default btn-block">

                    View our marijuana news
                
                </a>
            
            </div>

        </div>

        <hr />

        <div class="row">

            <div class="col-md-12">

                <h2 class="pull-left">Recent Dispensaries</h2>

                <a href="<?php echo home_url(); ?>/dispensaries" class="btn btn-default pull-right">

                    View dispensary list
                
                </a>
            
            </div>

            

                <?php

                    $args = array( 'post_type' => 'dispensaries', 'posts_per_page' => 6 );
                    $loop = new WP_Query( $args ); 
                
                    while ( $loop->have_posts() ) : $loop->the_post();

                    $logoId = get_field('logo');                
                    if( strlen( $logoId ) < 1 )
                        $logo =  wp_get_attachment_image_src( 557 )[0];
                    else
                        $logo =  wp_get_attachment_image_src(get_field('logo'))[0];
                    
                    echo "<div class='col-sm-2'>";

                        echo "<div class='panel panel-default panel-body text-center card strain'>";

                            
                            echo "
                            <div class='img-container'>
                                <img src='$logo' class='img img-reponsive'/>
                            </div>
                            ";
                        
                            the_title( sprintf( 
                                '<h4 class="entry-title"><a href="%s" rel="bookmark">', 
                                esc_url( get_permalink() ) ),
                                '</a></h4>'                           
                            );

                         echo "</div>";
                        
                    echo "</div>";

                // End the loop.
                endwhile;

                ?>
          
        </div><!-- .row -->

         <hr />

        <div class="row">

            <div class="col-md-12">

                <h2 class="pull-left">Popular Strains</h2>

                <a href="<?php echo home_url(); ?>/strains" class="btn btn-default pull-right">

                    View strains list
                
                </a>
            
            </div>

                <?php

                    $args = array( 'post_type' => 'strains', 'posts_per_page' => 4, 'tag'=>'popular-strains' );
                    $loop = new WP_Query( $args ); 

                     if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post();

                        get_template_part( 'template-parts/strain-card');

                        endwhile;
                    endif;

                ?>
          
        </div><!-- .row -->

    </div><!-- .container -->



</main><!-- .site-main -->





<?php get_footer(); ?>