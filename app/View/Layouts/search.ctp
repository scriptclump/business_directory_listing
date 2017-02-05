<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'Pittsburgh Black Business Directory');
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8" />
<!-- Set the viewport width to device width for mobile -->
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>Welcome to Pittsburgh Black Business Directory</title>
<?php
echo $this->Html->meta('icon');
echo $this->fetch('meta');
if( isset($meta_key) ){
    echo $this->Html->meta( 'keywords', $meta_key);
} else {
    echo $this->Html->meta( 'keywords', 'Welcome to Pittsburgh Black Business Directory.');
}
if( isset($meta_desc) ){
    echo $this->Html->meta( 'description', $meta_desc);
} else{
    echo $this->Html->meta( 'description', 'Welcome to Pittsburgh Black Business Directory.');
}

echo $this->Html->css(
    array(
        '/front_end/css/style',
        '/front_end/css/font-awesome'
        )
    );
echo $this->Html->script(
    array(
        '/front_end/js/jquery-1.8.3.min',
        '/front_end/js/modernizr-1.7.min',
        '/front_end/js/selectivizr',
        '/front_end/js/jquery.nicescroll',
        '/front_end/js/theme-functions'
        )
    );
?>
<!-- IE Fix for HTML5 Tags -->
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!-- css3-mediaqueries.js for IE8 or older -->
<!--[if lt IE 9]>
<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
</head>

<body>
<div id="main_container">
<div class="row">
<div class="main_wrap">
<!-- header start here -->
<div class="header_container">
    <div class="header_top">
        <ul>
            <li><a href="<?=BASE_URL.'login';?>">Login</a></li>
            <li><a href="<?=BASE_URL.'register';?>">Register</a></li>
        </ul>
    </div>
    <div class="header_content">
        <div class="inner_header">
            <div class="logo">
                <span>Greater Pittsburgh</span>
                Black Business Directory
                <span><strong>& Resource Guide</strong></span>
            </div>
            <div class="main_nav">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Black Directory</a></li>
                    <li><a href="#">Advertising</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- header end here -->
<!-- content start here -->
<div class="content_container">
    <div class="content_left">
        <div class="search_result_area">
            <div class="search_result_top">
                <div class="search_result_left"><span>Search Result:</span> BAR-B-QUE</div>
                <div class="search_result_right"><a href="#"><i class="fa fa-angle-left"></i> Back to Search</a></div>
            </div>
            <p>Morbi varius nisi ac dolor cursus ullamcorper. Donec quis lacus vitae enim dapibus laoreet. Donec iaculis, metus non laoreet faucibus, nunc libero malesuada.</p>
            <div class="search_result_box">
                <div class="result_box_top">
                    <div class="result_box_top_left">Search by:</div>
                    <div class="result_box_top_right">
                        <div class="result_records">Found 97 records  |  Page 2 of 10</div>
                        <div class="result_page_drop">
                            <label>Results per page:</label>
                            <select name=""><option selected>10</option><option>20</option></select>
                        </div>
                    </div>
                </div>
                <div class="result_box_bottom">
                    <div class="result_box_bottom_left">#  <a href="#">a</a> <a href="#">b</a> <a href="#">c</a> <a href="#">d</a> <a href="#">e</a> f <a href="#">g</a> <a href="#">h</a> <a href="#">i</a> <a href="#">j</a> <a href="#">k</a> <a href="#">l</a> <a href="#">m</a> <a href="#">n</a> o p <a href="#">q</a> <a href="#">r</a> <a href="#">s</a> <a href="#">t</a> <a href="#">u</a> <a href="#">v</a> w <a href="#">x</a> <a href="#">y</a> <a href="#">z</a></div>
                    <div class="result_box_bottom_right">
                        <div class="result_pagination">
                            <ul>
                                <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                <li><a href="#">1</a></li>
                                <li><a href="#" class="active">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="listing_box_area">
                <div class="listing_box_row">
                    <h2><span>1</span>BBQ STU'S INC</h2>
                    <p>Mauris ac metus sem, eget pharetra mi. Integer vel tellus hendrerit augue vehicula convallis. Pellentesque dui tempor sapien dignissim aliquet eget ultricies elit. Duis commodo rutrum vulputate.</p>
                    <div class="listing_box_details">
                        <div class="listing_box_left">
                            <div class="listing_box_img"><img src="images/listing_img.png" alt="" /></div>
                            <div class="listing_box_desc">
                                <div class="listing_box_desc_top">
                                    <span class="listing_box_col">
                                        <p>Pres. Stu Wilson<br/>
                                            PO Box 111<br/>
                                            McKeesport,PA,15134<br/>
                                            <span>Web:</span> <a href="http://www.Bbqstus.com">www.Bbqstus.com</a></p>
                                    </span>
                                    <span class="listing_box_col right">
                                        <p>
                                            <span>Ph:</span> 412-673-6457<br/>
                                            <span>Mo:</span> 412-673-6457<br/>
                                            <span>e-mail:</span> <a href="mailto:info@bbqstus.com">info@bbqstus.com</a>
                                        </p>
                                    </span>
                                </div>
                                <div class="listing_box_desc_bottom">
                                    <a href="#"><i class="fa fa-map-marker"></i> Get Direction</a>
                                    <a href="#" class="cl"><i class="fa fa-check-circle"></i> Claim Your Listing</a>
                                </div>
                            </div>
                        </div>
                        <div class="listing_box_right">
                            <div class="listing_box_review">
                                <div class="review_star"><img src="images/star.png" width="78" height="13" alt="" /></div>
                                <div class="review_cont">4.5</div>
                            </div>
                            <div class="listing_box_rate"><a href="#">(69 reviews)</a> | <a href="#">Rate it</a></div>
                            <a href="#" class="read_more">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="listing_box_row">
                    <h2><span>2</span>BBQ STU'S INC</h2>
                    <p>Mauris ac metus sem, eget pharetra mi. Integer vel tellus hendrerit augue vehicula convallis. Pellentesque dui tempor sapien dignissim aliquet eget ultricies elit. Duis commodo rutrum vulputate.</p>
                    <div class="listing_box_details">
                        <div class="listing_box_left">
                            <div class="listing_box_img"><img src="images/listing_img.png" alt="" /></div>
                            <div class="listing_box_desc">
                                <div class="listing_box_desc_top">
                                    <span class="listing_box_col">
                                        <p>Pres. Stu Wilson<br/>
                                            PO Box 111<br/>
                                            McKeesport,PA,15134<br/>
                                            <span>Web:</span> <a href="http://www.Bbqstus.com">www.Bbqstus.com</a></p>
                                    </span>
                                    <span class="listing_box_col right">
                                        <p>
                                            <span>Ph:</span> 412-673-6457<br/>
                                            <span>Mo:</span> 412-673-6457<br/>
                                            <span>e-mail:</span> <a href="mailto:info@bbqstus.com">info@bbqstus.com</a>
                                        </p>
                                    </span>
                                </div>
                                <div class="listing_box_desc_bottom">
                                    <a href="#"><i class="fa fa-map-marker"></i> Get Direction</a>
                                    <a href="#" class="cl"><i class="fa fa-check-circle"></i> Claim Your Listing</a>
                                </div>
                            </div>
                        </div>
                        <div class="listing_box_right">
                            <div class="listing_box_review">
                                <div class="review_star"><img src="images/star.png" width="78" height="13" alt="" /></div>
                                <div class="review_cont">4.5</div>
                            </div>
                            <div class="listing_box_rate"><a href="#">(69 reviews)</a> | <a href="#">Rate it</a></div>
                            <a href="#" class="read_more">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="listing_box_row">
                    <h2><span>3</span>BBQ STU'S INC</h2>
                    <p>Mauris ac metus sem, eget pharetra mi. Integer vel tellus hendrerit augue vehicula convallis. Pellentesque dui tempor sapien dignissim aliquet eget ultricies elit. Duis commodo rutrum vulputate.</p>
                    <div class="listing_box_details">
                        <div class="listing_box_left">
                            <div class="listing_box_img"><img src="images/listing_img.png" alt="" /></div>
                            <div class="listing_box_desc">
                                <div class="listing_box_desc_top">
                                    <span class="listing_box_col">
                                        <p>Pres. Stu Wilson<br/>
                                            PO Box 111<br/>
                                            McKeesport,PA,15134<br/>
                                            <span>Web:</span> <a href="http://www.Bbqstus.com">www.Bbqstus.com</a></p>
                                    </span>
                                    <span class="listing_box_col right">
                                        <p>
                                            <span>Ph:</span> 412-673-6457<br/>
                                            <span>Mo:</span> 412-673-6457<br/>
                                            <span>e-mail:</span> <a href="mailto:info@bbqstus.com">info@bbqstus.com</a>
                                        </p>
                                    </span>
                                </div>
                                <div class="listing_box_desc_bottom">
                                    <a href="#"><i class="fa fa-map-marker"></i> Get Direction</a>
                                    <a href="#" class="cl"><i class="fa fa-check-circle"></i> Claim Your Listing</a>
                                </div>
                            </div>
                        </div>
                        <div class="listing_box_right">
                            <div class="listing_box_review">
                                <div class="review_star"><img src="images/star.png" width="78" height="13" alt="" /></div>
                                <div class="review_cont">4.5</div>
                            </div>
                            <div class="listing_box_rate"><a href="#">(69 reviews)</a> | <a href="#">Rate it</a></div>
                            <a href="#" class="read_more">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="listing_box_row">
                    <h2><span>4</span>BBQ STU'S INC</h2>
                    <p>Mauris ac metus sem, eget pharetra mi. Integer vel tellus hendrerit augue vehicula convallis. Pellentesque dui tempor sapien dignissim aliquet eget ultricies elit. Duis commodo rutrum vulputate.</p>
                    <div class="listing_box_details">
                        <div class="listing_box_left">
                            <div class="listing_box_img"><img src="images/listing_img.png" alt="" /></div>
                            <div class="listing_box_desc">
                                <div class="listing_box_desc_top">
                                    <span class="listing_box_col">
                                        <p>Pres. Stu Wilson<br/>
                                            PO Box 111<br/>
                                            McKeesport,PA,15134<br/>
                                            <span>Web:</span> <a href="http://www.Bbqstus.com">www.Bbqstus.com</a></p>
                                    </span>
                                    <span class="listing_box_col right">
                                        <p>
                                            <span>Ph:</span> 412-673-6457<br/>
                                            <span>Mo:</span> 412-673-6457<br/>
                                            <span>e-mail:</span> <a href="mailto:info@bbqstus.com">info@bbqstus.com</a>
                                        </p>
                                    </span>
                                </div>
                                <div class="listing_box_desc_bottom">
                                    <a href="#"><i class="fa fa-map-marker"></i> Get Direction</a>
                                    <a href="#" class="cl"><i class="fa fa-check-circle"></i> Claim Your Listing</a>
                                </div>
                            </div>
                        </div>
                        <div class="listing_box_right">
                            <div class="listing_box_review">
                                <div class="review_star"><img src="images/star.png" width="78" height="13" alt="" /></div>
                                <div class="review_cont">4.5</div>
                            </div>
                            <div class="listing_box_rate"><a href="#">(69 reviews)</a> | <a href="#">Rate it</a></div>
                            <a href="#" class="read_more">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="listing_box_pagination">
                    <div class="result_pagination">
                        <ul>
                            <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#" class="active">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content_right">
        <div class="social_box">
            <h2>Social News</h2>
            <ul>
                <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#" class="in"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#" class="rss"><i class="fa fa-rss"></i></a></li>
            </ul>
        </div>
        <div class="advertising_box">
            <h2>Advertising Bonus</h2>
            <p>Free online - with ad in Print edition of Black Business Directory</p>
            <div class="advertising_content"><a href="#">Top Banner</a> / <a href="#">Right side Banner</a> / <a href="#">Rotating Banner</a></div>
            <a href="#" class="view_rates">View Rates</a>
            <a href="#" class="submit_ad">Submit Ad</a>
        </div>
    </div>
</div>
<!-- content end here -->
</div>
</div>
<?php echo $this->element('footer'); ?>