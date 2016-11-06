<?php

    get_header(); 

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

            <?php 

                get_template_part( 'register-ad');
                    
            ?>

            <div class="col-md-12">
                <form class="form-inline section">
                    <div class="form-group">
                        <label>Filter By Type:</label>
                        <select id="strainCat" class="form-control ">

                            <option value="all">All</option>
                            <option value="hybrid">Hybrid</option>
                            <option value="indica">Indica</option>
                            <option value="sativa">Sativa</option>
                            
                        </select>
                    </div>
                </form>
            </div>



            <div class="col-sm-3">
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

			<?php
			
            echo do_shortcode('[ajax_load_more 
                post_type="strains" 
                button_label="Load More Strains"
                button_loading_label="Loading Strains..."
                posts_per_page="50"
                ]');

            ?>



		</main><!-- .site-main -->
	</div><!-- .content-area -->

<script>

    window.onload = function(){

        var $ = jQuery;

        $('#strainCat').change(function(){

            var val = this.value;

            if(val == 'all')
                $('.strain').css('display','block');
            else{

                

                $('.strain').css('display','none');

                console.log(val,$('.'+val));
                $('.'+val).css('display','block');

            }


        });


    }
    
    </script>

<?php get_footer(); ?>




