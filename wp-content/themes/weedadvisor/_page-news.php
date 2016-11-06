<?php

get_header();


	if ( get_query_var('paged') ) {
		$paged = get_query_var('paged');
	} elseif ( get_query_var('page') ) { // 'page' is used instead of 'paged' on Static Front Page
		$paged = get_query_var('page');
	} else {
		$paged = 1;
	}

	$custom_query_args = array(
		'post_type' => 'post', 
		'posts_per_page' => 10,
		'paged' => $paged,
		'post_status' => 'publish',
		'ignore_sticky_posts' => true,
		//'category_name' => 'custom-cat',
		'order' => 'DESC', // 'ASC'
		'orderby' => 'date' // modified | title | name | ID | rand
	);
	$custom_query = new WP_Query( $custom_query_args );

	?>

	<div id="primary" class="container">
		<main id="main" class="site-main" role="main">

		<h2 class="section-title"> The Latest Marijuana News </h2>
		
			<?php

				if ( $custom_query->have_posts() ) :
				while( $custom_query->have_posts() ) : $custom_query->the_post(); 

				get_template_part( 'template-parts/news-list', get_post_format() );

				endwhile;
			 
				if ($custom_query->max_num_pages > 1) : // custom pagination 
					$orig_query = $wp_query; // fix for pagination to work
					$wp_query = $custom_query;
			?>

			<nav class="col-sm-12 prev-next-posts pagination">
				<div class="prev-posts-link">
					<?php echo get_next_posts_link( 'Older Entries', $custom_query->max_num_pages ); ?>
				</div>
				<div class="next-posts-link">
					<?php echo get_previous_posts_link( 'Newer Entries' ); ?>
				</div>
			</nav>

			<?php
				$wp_query = $orig_query; // fix for pagination to work
			
			 endif; ?>

			<?php
			wp_reset_postdata(); // reset the query 
			else:
			echo '<p>'.__('Sorry, no posts matched your criteria.').'</p>';
			endif;
			?>


		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
