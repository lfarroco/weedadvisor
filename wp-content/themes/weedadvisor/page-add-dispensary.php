<?php

    get_header(); 

    if(isset($_POST['new_post']) == '1') {

        $post_title = $_POST['post_title'];
        $post_category = $_POST['cat'];
        $post_content = $_POST['post_content'];
        $address = $_POST['post_address'];

        $post_phone = $_POST['post_phone'];
        $post_website = $_POST['post_website'];
        $post_fax = $_POST['post_fax'];
        $post_twitter = $_POST['post_twitter'];
        $post_facebook = $_POST['post_facebook'];
        $post_email = $_POST['post_email'];

        if( ! empty( $_FILES ) ) {

            foreach( $_FILES as $file ) {

                echo is_array( $file );
                if( is_array( $file ) ) {
                $logo_id = upload_user_file( $file );
                }

            }

        }

        $new_post = array(
            'ID' => '',
            'post_author' => $user->ID, 
            'post_content' => $post_content, 
            'post_title' => $post_title,

            'post_status' => 'pending',
            'post_type' => 'dispensaries'
            );

        $post_id = wp_insert_post($new_post);

        update_field('field_57f417f423de7', $address, $post_id);
        update_field('field_57f25a36115da', $logo_id, $post_id);
        update_field('field_57f037b153c34', $post_phone, $post_id);
        update_field('field_57f037d153c35', $post_website, $post_id);
        update_field('field_57f25a22115d9', $post_fax, $post_id);
        update_field('field_57f25a65115db', $post_twitter, $post_id);
        update_field('field_57f25a70115dc', $post_facebook, $post_id);
        update_field('field_57f3e314d87a9', $post_email, $post_id);

        $post = get_post($post_id);

        wp_redirect($post->guid);

    }  

?>  

<div id="add-dispensary" class="container">

    <form enctype="multipart/form-data" method="post" action="" class="col-md-8 col-md-offset-2"> 
        
        <h2 class="col-sm-12">Add new Dispensary</h2>

        <div class="col-sm-12">
            <p>Please provide the dispensary information by filling the form below.
            Required filds are marqued with a (*)</p>
        </div>

        <div class="form-group col-sm-12">        
            <label>Dispensary Name *</label>
            <input type="text" required name="post_title" size="45" id="input-title" class="form-control"/>
        </div>

        <div class="form-group col-sm-6">
            <label>Dispensary City (*)</label>
            <input type="text" name="post_city" id="post_city" class="form-control"/>
        </div> 

         <div class="form-group col-sm-6">
            <label>Dispensary State (*)</label>
            <input type="text" name="post_state" id="post_state" class="form-control"/>
        </div> 

        <div class="form-group col-sm-6">
            <label>Phone</label>
            <input type="text" name="post_phone" id="post_phone" class="form-control"/>
        </div> 

         <div class="form-group col-sm-6">
            <label>Fax</label>
            <input type="text" name="post_fax" id="post_fax" class="form-control"/>
        </div> 

        <div class="form-group col-sm-6">
            <label>Email</label>
            <input type="email" name="post_email" id="post_email" class="form-control"/>
        </div> 

         <div class="form-group col-sm-6">
            <label>Website URL</label>
            <input type="text" name="post_website" id="post_website" class="form-control"/>
        </div> 

        <div class="form-group col-sm-12">
            <label>Logo</label>
            <input type="file" name="post_logo" id="post_logo" class="form-control"/>
        </div> 

        <div class="form-group col-sm-6">
            <label>Twitter URL</label>
            <input type="text" name="post_twitter" id="post_twitter" class="form-control"/>
        </div> 

        <div class="form-group col-sm-6">
            <label>Facebook URL</label>
            <input type="text" name="post_facebook" id="post_facebook" class="form-control"/>
        </div> 

        <div class="form-group col-sm-12">
            <label>Physical Address (*)</label>
             <input required type="text" name="post_address" id="post_address" class="form-control"/>
        </div> 

        <div class="form-group col-sm-12">
            <label>Dispensary Description</label>
            <textarea rows="5" name="post_content" cols="66" id="text-desc"  class="form-control"></textarea> 
        </div>      
                
        <input type="hidden" name="new_post" value="1"/>
        
        <div class="form-group col-sm-12">
            <input class="subput round" type="submit" name="submit" value="Add Dispensary"  class="form-control"/>
        </div>     

    </form>

</div><!-- .content-area -->

<?php get_footer(); ?>