<?php 
get_header(); ?>


<main id="dispensary-main">
	<?php
	// Start the loop.
	while ( have_posts() ) : the_post();

		$picture = get_field('picture');
		
		if( strlen( $picture) < 1 )
			$picture = get_template_directory_uri().'/img/macro.jpg';

		if( is_numeric( get_field('logo') ))
			$logo =  wp_get_attachment_image_src(get_field('logo'))[0];
		else
			$logo =  get_field('logo');

		$title = get_the_title();

		echo 	"<div id='hero-picture' style='background-image:url($picture);'>'";

		if( strlen( $logo ) > 0)
		echo	 	"<div class='logo-wrapper'>
						<img src='$logo' class='dispensary-logo' />
					</div>";

		echo		"<h2>$title</h2>;
				</div>";

		?>

<div class="container">

<div class="row section">

		<?php 

            get_template_part( 'register-ad');
                
        ?>

	<div class="col-sm-6">
		
		<?php

		// Include the single post content template.
		echo '<h2>About '.get_the_title().'</h2>';

		//get_template_part( 'template-parts/content', 'single' );

		the_content();
		
		$twitter = get_field('twitter');
		$facebook = get_field('facebook');

		?>
		<div class="line">

			<?php

			if( strlen($twitter) > 0 )	
			echo "<h4> 
				
					<a href='$twitter'>
						<i class='fa fa-lg pull-left fa-twitter-square'></i>
					</a> 
				
				</h4>";

			if( strlen($facebook) > 0 )	
			echo "<h4> 			
					<a href='$facebook'>
						<i class='fa fa-lg pull-left fa-facebook-square'></i>
					</a> 			
				</h4>";	
			
			?>
		
		</div>
		
		<?php

		$phone = get_field('phone');
		$fax = get_field('fax');
		$email = get_field('email');
		$website = get_field('website_url');
		$address = urlencode ( get_field('address') );

		if( !stripos($website,'http://') && !stripos($website,'https://') )
			$website = 'http://'.$website; 
		

		if( strlen($phone) > 0)
			echo "<h5><i class='fa fa-phone'></i> Phone: $phone</h5>";
		
		if( strlen($fax) > 0)
			echo "<h5><i class='fa fa-fax'></i> Fax: $fax</h5>";

		if( strlen($email) > 0)
			echo "<h5><i class='fa fa-envelope'></i> Email: <a href='mailto:$email'>$email</a></h5>";

		if( strlen($website) > 0)
			echo "<h5><i class='fa fa-link'></i> Website: <a target='_blank' href='$website'>$website</a> </h5>";
			
		/*
		//MENU ITEMS

			echo '<table class="table table-bordered table-striped">';
				foreach(get_field('menu') as $item){
					echo '<tr><td>'.  $item->post_title .'</td></tr>';

				}
			echo '</table>';
			
		*/
		?>

	</div>

	<div class="col-sm-6 panel panel-default panel-body">

		<?php
			if( strlen( $address ) > 0)
				echo "<iframe
					width='100%'
					height='350'
					frameborder='0' style='border:0'
					src='https://www.google.com/maps/embed/v1/place?key=AIzaSyBX7ZFaBPlzbzdTZdusIv1qGpkAmImDW4A
					&q=$address' allowfullscreen>
					</iframe>";
			else
				echo '<p>No physical address available</p>';
		?>

	</div>

</div>

<hr />

<div class="col-sm-12">

	<?php

		
		// If comments_template are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}

		if ( is_singular( 'post' ) ) {
			// Previous/next post navigation.
			the_post_navigation( array(
				'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentysixteen' ) . '</span> ' .
					'<span class="screen-reader-text">' . __( 'Next post:', 'twentysixteen' ) . '</span> ' .
					'<span class="post-title">%title</span>',
				'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentysixteen' ) . '</span> ' .
					'<span class="screen-reader-text">' . __( 'Previous post:', 'twentysixteen' ) . '</span> ' .
					'<span class="post-title">%title</span>',
			) );
		}

		// End of the loop.
	endwhile;
	?>

	</div>

</div> <!-- .container -->

</main><!-- .site-main -->

<?php get_footer(); ?>
