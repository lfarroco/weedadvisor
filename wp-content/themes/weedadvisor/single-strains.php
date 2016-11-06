<?php 
get_header(); ?>

<main id="strain-main">
    <?php
        
        while ( have_posts() ) : the_post();

        $picture = get_template_directory_uri().'/img/cann.jpg';

        $title = get_the_title();

        echo 	"<div id='hero-picture' style='background-image:url($picture);'>'
                    <div class='backdrop'></div>
                    <h2>$title</h2>".
                        comment_average(get_the_id()).
                    "</div>";
    ?>

    <div class="container">

    <div class="row section">
    
        <?php

            get_template_part( 'register-ad');
                
        ?>

        <div class="col-sm-12">
            
            <?php

            // Include the single post content template.
            echo '<h2>About '.get_the_title().'</h2>';

            //get_template_part( 'template-parts/content', 'single' );

            the_content();
            
            $thc = get_field('thc');
            $cbn = get_field('cbn');
            $cbd = get_field('cbd');

            ?>

            <table class="table table-bordered table-striped">
                <tr>
                    <th>THC</th>
                    <th>CBN</th>
                    <th>CBD</th>
                </tr>
                <tr>
                    <td><?php echo $thc; ?></td>
                    <td><?php echo $cbn; ?></td>
                    <td><?php echo $cbd; ?></td>
                </tr>
            </table>
           
           
        </div>

        <div class="col-sm-12">

            <div class="row">
                <?php

                    if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }

                ?>
            </div>
                    
        </div>

  
    </div>

    <hr />

    

        <?php

            // End of the loop.
        endwhile;
        ?>

     

    </div> <!-- .container -->

</main><!-- .site-main -->

<?php get_footer(); ?>
