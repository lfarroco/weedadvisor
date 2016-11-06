<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	
	<title>Weedadvisor <?php wp_title(); ?></title>

	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>
<div id="page">

	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				
				<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">

					<?php

						$picture = get_template_directory_uri().'/img/logo.jpg';

					?>

					<img src="<?php echo $picture; ?>" class="logo"/>
					
				</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">

				<?php
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'menu_class'     => 'nav navbar-nav'							
					) );
				?>

				<ul class="nav navbar-nav navbar-right">
					
						<?php
							if( !is_user_logged_in() ){
							
								$url = esc_url( home_url( ) );
						
								echo "
								<li><a href='$url/register'>
								<i class='fa fa-lg fa-sign-in'></i> Register </a></li> 

								<li>
									<a href='$url/login'>
										<i class='fa fa-lg fa-key'></i>
									 	Login </a>
								</li> 
								
								";

							}else{
								$user = wp_get_current_user();
								//print_r( $user );

								$logout = wp_logout_url(  home_url() );

								$username = $user->display_name;
							 
								echo "
								<li>
									<span class='username'>
										Logged in as $username
									</span> <a class='logout' href='$logout'>								
									<i class='fa fa-lg fa-sign-out'></i> Logout</a>
								</li>";
								
							}
						?>
								
				</ul>			
				
			</div><!--/.nav-collapse -->
		</div><!--/.container-fluid -->
	</nav>

	<div id="content">
