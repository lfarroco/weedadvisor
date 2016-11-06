<?php

    get_header(); 

    if(isset($_POST['new_post']) == '1') {

        $post_title = $_POST['post_title'];
        $post_category = $_POST['cat'];
        $post_content = $_POST['post_description'];
        
        $post_strain_type = $_POST['post_strain_type'];
        $post_thc = $_POST['post_thc'];
        $post_cbn = $_POST['post_cbn'];
        $post_cbd = $_POST['post_cbd'];
        
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
            'post_type' => 'strains'
        );

        $post_id = wp_insert_post($new_post);

        update_field('field_57f996878508a', $post_thc, $post_id);
        update_field('field_57f996c18508b', $post_cbd, $post_id);
        update_field('field_57f996d98508c', $post_cbn, $post_id);
        update_field('field_57f9963f85089', $post_strain_type, $post_id);

        $post = get_post($post_id);

        wp_redirect($post->guid);

    }  

?>  

<div id="add-dispensary" class="container">

    <form enctype="multipart/form-data" method="post" action="" class="col-sm-6 col-sm-offset-3"> 
        
        <h2 class="col-sm-12">Add New Strain</h2>

        <div class="col-sm-12">
            <p>Please provide the strin information by filling the form below.
            The information will be evalueted before being added to the list.
            Required filds are marqued with a (*)</p>
        </div>

        <div class="form-group col-sm-12">
        
            <label>Strain Name *</label>
            <input type="text" required name="post_title" size="45" id="input-title" class="form-control"/>
        </div>

        <div class="form-group col-sm-12">
        
            <label>Strain Type *</label>
            
            <select required name="post_strain_type" id="strain-type" class="form-control">

                <option value="Hybrid">Hybrid</option>
                <option value="Indica">Indica</option>
                <option value="Sativa">Sativa</option>                
            
            </select>

        </div>

        <div class="form-group col-sm-12">
            <label>Description</label>
            <textarea name="post_description" id="post_description" class="form-control"/>
            </textarea>
        </div>

        <div class="form-group col-sm-4">
            <label>THC</label>
            <input type="number" name="post_thc" id="post_thc" class="form-control"/>
        </div> 

        <div class="form-group col-sm-4">
            <label>CBN</label>
            <input type="number" name="post_cbn" id="post_cbn" class="form-control"/>
        </div>

        <div class="form-group col-sm-4">
            <label>CBD</label>
            <input type="number" name="post_cbd" id="post_cbd" class="form-control"/>
        </div>
  
        <input type="hidden" name="new_post" value="1"/>
        
         <div class="form-group col-sm-12">
            <input class="subput round" type="submit" name="submit" value="Add Strain"  class="form-control"/>
        </div>     
    </form>

</div><!-- .content-area -->

<?php get_footer(); ?>