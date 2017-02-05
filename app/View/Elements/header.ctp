<div id="main_container">
<div class="row">
<div class="main_wrap">
<!-- header start here -->
<div class="header_container">
    <div class="header_content">
        <div class="inner_header">
            <div class="main_nav inner">
                <ul>
                    <li><?php echo $this->Html->link('Home', '/'); ?></li>
                    <li><?php echo $this->Html->link('About Us', BASE_URL.'about-us'); ?></li>
                    <li><?php echo $this->Html->link('Black Directory', BASE_URL); ?></li>
                    <li><?php echo $this->Html->link('Advertising', BASE_URL.'view-ad-rates'); ?></li>
                    <li><?php echo $this->Html->link('Contact Us', BASE_URL.'contact-us'); ?></li>
                </ul>
                <ul class="account_nav">
                    <?php if (!$this->Session->read('Auth.User')) { ?>
                        <li><a href="<?=BASE_URL.'login';?>">Login</a></li>
                        <!-- <li><a href="<?=BASE_URL.'register';?>">Register</a></li> -->
                    <?php } else{ ?>
                        <li><a href="<?=BASE_URL.'users/my_account';?>">My Account</a></li>
                        <li><a href="<?=BASE_URL.'users/logout';?>">Logout</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- header end here -->
<?php
$banner = $this->requestAction('SlidingBanners/display/');
echo $this->Html->image( '/'.$banner['SlidingBanner']['banner_img'], array('alt' => $banner['SlidingBanner']['alt_tag'], 'title' => $banner['SlidingBanner']['title'] ));
 ?>