<div class="content_right">
        <div class="social_box">
            <h2>Social News</h2>
            <ul>
                <li><a href="http://www.facebook.com/#!/pages/Pittsburgh-PA/Pittsburgh-Black-Directory/155075544506087?ref=sgm" class="facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <li><a href="http://twitter.com/connieportis" class="twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>
                <li><a href="http://www.linkedin.com/in/pittsburghblackdirectory" class="in" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="http://www.pittsburghblackdirectory.com/blog/" class="rss" target="_blank"><i class="fa fa-rss"></i></a></li>
            </ul>
        </div>
        <div class="advertising_box">
            <h2>Advertising Bonus</h2>
            <p>Free online - with ad in Print edition of Black Business Directory</p>
            <div class="advertising_content"><a href="#">Top Banner</a> / <a href="#">Right side Banner</a> / <a href="#">Rotating Banner</a></div>
            <a href="<?=BASE_URL?>view-ad-rates" class="view_rates">View Rates</a>
            <a href="#" class="submit_ad">Submit Ad</a>
        </div>
        <div class="advertising_box2">
            <?php
            for($i=0; $i<count($cmspage['Advertisement']); $i++){
                if( $cmspage['Advertisement'][$i]['ad_type'] == 0 ){
                    if( $cmspage['Advertisement'][$i]['ad_type'] == 1 ){
                        echo $this->Html->image('/'.$cmspage['Advertisement'][$i]['file_src'], array('alt' => ''));
                    } else{
                        echo $cmspage['Advertisement'][$i]['google_adsense'];
                    }
                }
                echo '<br /><br />';
            }
            ?>
        </div>
    </div>