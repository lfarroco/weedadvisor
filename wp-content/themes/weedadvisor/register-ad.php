<?php

	$homeUrl = esc_url( home_url( ) );

    if( !is_user_logged_in() )
        echo "<div id='register' class='bg-info panel-body' >

            Subscribe and get news about dispensaries and strains in Canada!

            <a class='btn btn-success' href='$homeUrl/register' >Register on weedadvisor</a>
            <button class='btn btn-default' onclick=jQuery('#register').hide('slow')>
            Not now, thanks.</button>

        </div>";

?>