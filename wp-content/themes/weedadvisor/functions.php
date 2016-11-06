<?php


function wm_scripts() {
	
	wp_enqueue_style( 'boostrap-css',  get_template_directory_uri() . '/vendor/bootstrap/dist/css/bootstrap.min.css' );
	wp_enqueue_style( 'fontawesome',  get_template_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'styles',  get_template_directory_uri() . '/style.css' );

	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/vendor/bootstrap/dist/js/bootstrap.min.js', array('jquery'), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'wm_scripts' );

function theme_setup(){

	register_nav_menus( array(
		'primary' => __( 'Primary Menu'),
        'footer' => __( 'Footer Menu')	
	) );

}
add_action( 'after_setup_theme', 'theme_setup' );

 function strains_search($template)   
{    
  global $wp_query;   
  $post_type = get_query_var('post_type');   
  if( $wp_query->is_search && $post_type == 'strains' )   
  {
    return locate_template('search-strains.php');  
  }   
  return $template;   
}
add_filter('template_include', 'strains_search');  

function comment_average($id){

    $output = '<div class="text-center">';

    $comments = get_comments( 2519 );
    
    $total = 0;
    
    foreach ($comments as $key => $comment) {

        $id = $comment->comment_ID;
        $rating = get_comment_meta( $id, 'pixrating', true );

        $total += $rating;
        
    }

    $average = $total / sizeof( $comments );

    
    for($i=0;$i<$average;$i++){

        if($i - ($average-$i) == 1.5)
            $output .= '<i class="star-half-png"></i>';
        else
            $output .= '<i class="star-on-png"></i>';

    
    }
        
  $output .= '</div>';

  return $output;
    
} 

function upload_user_file( $file = array() ) {

	require_once( ABSPATH . 'wp-admin/includes/admin.php' );
      $file_return = wp_handle_upload( $file, array('test_form' => false ) );
      if( isset( $file_return['error'] ) || isset( $file_return['upload_error_handler'] ) ) {
          return false;
      } else {
          $filename = $file_return['file'];
          $attachment = array(
              'post_mime_type' => $file_return['type'],
              'post_title' => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
              'post_content' => '',
              'post_status' => 'inherit',
              'guid' => $file_return['url']
          );
          $attachment_id = wp_insert_attachment( $attachment, $file_return['file'] );
          
          require_once(ABSPATH . 'wp-admin/includes/image.php');

          $attachment_data = wp_generate_attachment_metadata( $attachment_id, $filename );
          wp_update_attachment_metadata( $attachment_id, $attachment_data );
          if( 0 < intval( $attachment_id ) ) {
          	return $attachment_id;
          }
      }
      return false;
}  

?>