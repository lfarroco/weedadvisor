<?php

    get_header();

?>

<div id="primary" class="container">
    <main id="main" class="site-main" role="main">

        <?php

            $url = 'https://news.google.com/news?q=cannabis%20canada&output=rss';
            $time = time();
            $id = 'news-item-'.$time;
            
            $feed = implode(file( $url ));
            $xml = simplexml_load_string($feed);
            $json = json_encode($xml);
            $array = json_decode($json,TRUE);
            $news = $array['channel']['item'];
            
            echo '<div id="news"><h2>Recent Cannabis Stories on Canada</h2>';

            foreach ($news as $key => $value) {

                

                //  print_r($value) ;

                // $newsItem = $output[ $key ];
                // $output[ $key ]['title'] = $value['title'];
                // $output[ $key ]['link'] = $value['link'];
                // $output[ $key ]['desc'] = $value['description'];

                echo '<article><h4>'.$value['title'].'</h4>';

                echo $value['description'];

                echo '</article>';

            }

            echo '</div>';
        
        ?>



    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>
