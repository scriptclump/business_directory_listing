</div>
</div>
<!-- footer start here -->
<div class="row">
    <div class="footer_wrap">
        <div class="footer_top">
            <div class="about_directory">
                <h4>About Directory</h4>
                <p>Connie Portis is the founder and co-publisher of the Greater Pittsburgh Black Business Directory and Resource Guide. A former president of the National Black Pages Association, Portis and her brother Richard are celebrating their 26th year of consecutive publishing of the Black Business Directory.</p>
                <?php echo $this->Html->link('<i class="fa fa-chevron-circle-right"></i> Read More', '/about-us', array('escape' => false, 'class' => 'view')); ?>
            </div>
            <div class="sitemap_box">
                <h4>Sitemap</h4>
                <ul>
                    <li><a href="<?=BASE_URL?>">Search by Company Name </a></li>
                    <li><a href="<?=BASE_URL?>">Search by Category</a></li>
                    <li><a href="<?=BASE_URL?>categories">View all Categories</a></li>
                    <li><a class="fancybox fancybox.iframe" href="http://www.pagegangster.com/p/5ajjb/">View Current Edition</a></li>
                    <li><a href="<?=BASE_URL?>contact-us">Contact Us</a></li>
                    <li><a href="<?=BASE_URL?>about-us">About Us</a></li>
                    <li><a href="<?=BASE_URL?>">Free Online Listing</a></li>
                    <li><a href="<?=BASE_URL?>view-ad-rates">View Ad Rates</a></li>
                    <li><a href="<?=BASE_URL?>publishing-schedule">Publishing Schedule</a></li>
                </ul>
            </div>
            <div class="contact_box">
                <h4>Contact</h4>
                <p>Black Business Directory<br/>
                    625 Stanwix Street # 2206<br/>
                    Pittsburgh PA 15222</p>
                <p class="email"><a href="mailto:info@pittsburghblackdirectory.com">info@pittsburghblackdirectory.com</a></p>
                <h3>(412) 391-8208</h3>
                <a href="#" class="view"><i class="fa fa-map-marker"></i> Locate</a>
            </div>
            <div class="newsletter_box">
                <!-- <h4>Newsletter</h4>
                <p>Morbi varius nisi cursus coracus vitae enim dapibaoreet.</p>
                <div class="newsletter_form">
                    <form>
                        <input name="" type="email" placeholder="Enter Email Here">
                        <input name="" type="submit" value="Subscribe">
                    </form>
                </div> -->
                <h4>Copyright</h4>
                <p>Copyright &copy; <?=date('Y')?><br/><a href="#">pittsburghblackdirectory.com</a><br/>All Rights Reserved.</p>
            </div>
        </div>
        <div class="footer_bottom">
            <div class="footer_left"><?php echo $this->Html->link('Home', '/'); ?> | <?php echo $this->Html->link('About Us', '/about-us'); ?> | <?php echo $this->Html->link('Contact Us', '/contact-us'); ?></div>
            <div class="footer_right"><?php echo $this->Html->link('Terms & Conditions', '/terms'); ?></div>
        </div>
    </div>
</div>
<!-- footer end here -->
</div>
<?php
if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) echo $this->Js->writeBuffer();
// Writes cached scripts
?>
</body>
</html>