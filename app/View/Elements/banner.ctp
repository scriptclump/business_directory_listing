<?php $banners = $this->requestAction('banners/all_active_banners/');?>
<div class="banner_wrap">
	<div class="banner_top_shadow"></div>
    <div class="banner_slider">
    	<ul class="bxslider">
            <?php foreach($banners as $banner): ?>
                <li>
                    <div class="slide_img"><?php echo $this->Html->image('/'.$banner['Banner']['file_src'], array('alt' => h($banner['Banner']['title'])  )); ?></div>
                    <div class="banner_content">
                        <div class="row">
                            <div class="banner_container">
                            	<h2><?php echo $banner['Banner']['title']; ?></h2>
                                <?php echo $banner['Banner']['body']; ?>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>