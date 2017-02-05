<div class="bread_crumb">
	<?php
		$this->Html->addCrumb('Home', '/');
		$this->Html->addCrumb('Categories', '/categories');
		if( @$business['Category'][0]['title'] != "" ){
			$this->Html->addCrumb(@$business['Category'][0]['title'], array('controller' => 'category', 'action' => @$business['Category'][0]['slug']));
		}
		$this->Html->addCrumb($business['Business']['name'], array('controller' => 'business', 'action' => $business['Business']['slug']));
		echo $this->Html->getCrumbList();
	?>
</div>
<?php
if (!empty($business)): ?>
<div class="search_result_area">
        	<div class="search_result_top">
            	<div class="search_result_left"><span>Pittsburgh</span> <?=$business['Business']['name']?></div>
                <div class="search_result_right"><a href="<?=BASE_URL?>category/<?=@$business['Category'][0]['slug']?>"><i class="fa fa-angle-left"></i> Back to Listing</a></div>
            </div>
            <div class="listing_box_area review_list">
            	<div class="listing_box_row">
                	<h2><span><i class="fa fa-briefcase"></i></span><?=$business['Business']['name']?></h2>
                    <?=$business['Business']['description']?>
                    <div class="listing_box_details">
                        <div class="listing_box_left">
                            <div class="listing_box_img list_fancy">
                            	<ul>
								<?php
									if( $business['Business']['img_src_small'] != "" ) {
                            			echo $this->Html->image('/'.$business['Business']['img_src_small'], array('alt' => ''));
                            		} else {
                            		 	echo $this->Html->image('/front_end/images/no_image.png', array('alt' => ''));
                            		}
                            	?>
<!-- <li><a class="fancybox" href="<?=$this->webroot
?>front_end/images/listing_img.png" data-fancybox-group="gallery"><img src="<?=$this->webroot
?>front_end/images/listing_img.png" alt="" /></a></li>
<li><a class="fancybox" href="<?=$this->webroot
?>front_end/images/listing_img.png" data-fancybox-group="gallery"><img src="<?=$this->webroot
?>front_end/images/listing_img.png" alt="" /></a></li>
<li><a class="fancybox" href="<?=$this->webroot
?>front_end/images/listing_img.png" data-fancybox-group="gallery"><img src="<?=$this->webroot
?>front_end/images/listing_img.png" alt="" /></a></li> -->
                            	</ul>
                               <!--  <div class="listing_soacial">
                                	<a href="#" class="facebook"><i class="fa fa-facebook-square"></i></a>
                                    <a href="#" class="twitter"><i class="fa fa-twitter-square"></i></a>
                                </div> -->
                            </div>
                            <div class="listing_box_desc">
                            	<div class="listing_box_desc_top">
                                	<span class="listing_box_col">
                                    	<p><?php if($business['Business']['pname'] != ""){ ?> Pres. <?=$business['Business']['pname']?><br/><?php  } ?>
                                            <?php if($business['Business']['street'] != ""){ ?><?=$business['Business']['street']?><br/><?php  } ?>
                                            <?php if($business['Business']['street2'] != ""){ ?><?=$business['Business']['street2']?><br/><?php  } ?>
                                            <?php if($business['Business']['city_id'] != ""){ ?><?=$business['Business']['city_id']?>,<?php  } ?>
                                            <?php if($business['Business']['state_iso'] != ""){ ?><?=$business['Business']['state_iso']?>,<?php  } ?>
                                            <?php if($business['Business']['zip_code'] != ""){ ?><?=$business['Business']['zip_code']?><?php  } ?><br/>
                                            <?php if($business['Business']['website'] != ""){ ?>
                                            	<span>Web:</span> <a href="<?=$business['Business']['website']?>" target="_blank"><?=$business['Business']['website']?></a>
                                            <?php  } ?>
                                            </p>
                                    </span>
                                    <span class="listing_box_col right">
                                    	<p>
                                    		<?php if($business['Business']['phone'] != ""){ ?>
											<span>Ph:</span> <?=$business['Business']['phone']?><br/>
                                    		<?php  } ?>
                                        	<?php if($business['Business']['fax'] != ""){ ?>
											<span>Fax:</span> 412-673-6457<br/>
                                        	<?=$business['Business']['fax']?>
                                        	<?php  } ?>
                                        	<?php if($business['Business']['alternate_email'] != ""){ ?>
                                            <span>e-mail:</span> <a href="mailto:<?=$business['Business']['alternate_email']?>"><?=$business['Business']['alternate_email']?></a>
                                            <?php  } ?>
                                        </p>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                if( count($business['Reviews']) > 0 ){ ?>
	                <div class="review_box_area">
	                	<h2>Reviews</h2>
	                    <div class="review_listing_box">
	                    	<?php for( $i=0; $i<count($business['Reviews']); $i++ ){ ?>
	                    	<div class="review_listing_row">
	                            <ul>
					               <li class="listing_auth"><strong>Name: </strong> <?php echo h($business['Reviews'][$i]['name']); ?></li>
					               <li class="listing_email"><strong>Email: </strong> <a href="mailto:<?php echo h($business['Reviews'][$i]['email']); ?>"><?php echo h($business['Reviews'][$i]['email']); ?></a></li>
					               <li class="status"><strong>Date:</strong> <?php echo h($business['Reviews'][$i]['created']); ?></li>
					               <li class="details"><?php echo $this->Html->link( 'View', array('controller' => 'reviews', 'action' => 'view', $business['Reviews'][$i]['id']) ); ?></li>
					            </ul>
	                        </div>
	                        <?php } ?>
	                    </div>
	                </div>
	                <!-- <div class="listing_box_pagination">
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
	                </div> -->
                <?php  } ?>
            </div>
        </div>


<?php
else:
	echo "Business not found";
endif;
?>