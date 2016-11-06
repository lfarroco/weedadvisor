<?php

    get_header(); 

    $homeUrl = esc_url( home_url( ) );

    $newStrainURL = $homeUrl.'/register';

?>

	<div id="primary" class="content-area">

        <?php

        $picture = get_template_directory_uri().'/img/macro.jpg';

        echo 	"<div id='hero-picture' style='background-image:url($picture);'>'
            <h2>Strains List</h2>
        </div>";

        ?>

		<main id="main" class="container" role="main">


            <div class="section row">
                <div class="col-sm-12">   
                    <h3 class="col-sm-12">Search Strains</h3>
                    <form role="search" action="<?php echo site_url('/'); ?>" method="get" id="searchform" class="form-group">
                    
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="s" placeholder="Search Strains"/>
                        </div>
                        <input type="hidden" name="post_type" value="strains" />
                        <div class="col-sm-2">
                            <input type="submit" alt="Search" value="Search" class="btn btn-default"/>
                        </div>
                    </form>
                </div>
            </div>

            <div id="add-strain-ad" class="bg-info panel-body row">

                <?php

				    $icon = get_template_directory_uri().'/img/icon-strains.png';

                ?>

				<img src="<?php echo $icon; ?>" class="pull-left" />

                Looking for a strain that is not on the list? You can add strains by filling <a href="<?php echo $newStrainURL; ?>" />this form</a>.
                The new strain will be available after the approval from our tea.

                <a class="btn btn-success" href="<?php echo $newStrainURL; ?>">Add New Strain</a>
                
            </div>


            <?php if ( have_posts() ) : while ( have_posts() ) : the_post();

                $title = get_the_title();
                $url = get_post_permalink();

                $thc = get_field('thc');
                $cbn = get_field('cbn');
                $cbd = get_field('cbd');
                $cat = get_field('category');
                $catClass= strtolower($cat);

                echo "<a class='strain col-sm-3 col-xs-4 $catClass' href='$url'>";

                echo '<div class="panel panel-default">';

                echo '<div class="badge pull-left">'.$cat.'</div>';

                echo "<h2 class='entry-title'>$title</h2>";

                echo "<div class='panel-body'>
                <table class='table'>
                <tr>
                <th>THC</th>
                <th>CBN</th>
                <th>CBD</th>
                </tr>
                <tr>
                <td>$thc</td>
                <td>$cbn</td>
                <td>$cbd</td>
                </tr>
                </table>

                </div>";

                echo '</div>';

                echo "</a>";

             endwhile;
            endif; ?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>