<?php 
    $title = get_the_title();
    $url = get_post_permalink();

    $thc = get_field('thc');
    $cbn = get_field('cbn');
    $cbd = get_field('cbd');
    $cat = get_field('category');
    $catClass= strtolower($cat);

    echo "<a class='strain col-sm-3 col-xs-4 $catClass' href='$url'>
            <div class='panel panel-default'>

                <div class='badge pull-left'>$cat</div>

                <h2 class='entry-title'>$title</h2>

                <div class='panel-body'>

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

                </div>

            </div>

    </a>";
 ?>