<div class="bread_crumb">
	<?php
		$this->Html->addCrumb('Home', '/');
		$this->Html->addCrumb('Categories', '/categories');
		$this->Html->addCrumb($category_businesses['Category']['title'], array('controller' => 'category', 'action' => $category_businesses['Category']['slug']));
		echo $this->Html->getCrumbList();
	?>
</div>


<div class="category_list">
<?php
if (!empty($category_businesses)): ?>
	<h1><?=$category_businesses['Category']['title']?></h1>
		<?php
		if ( isset($category_businesses['Business']) && ( count($category_businesses['Business']) > 0 ) ) :
?>
			<div class="search_result_area">
			    <p>Claim Your Listing - Upgrade to include photos and more information.</p>
			    <!-- <div class="search_result_box">
			    	<div class="result_box_top">
			        	<div class="result_box_top_left">Search by:</div>
			            <div class="result_box_top_right">
			            	<div class="result_records">Found 97 records  |  Page 2 of 10</div>
			                <div class="result_page_drop">
			                	<label>Results per page:</label>
			                    <select name=""><option selected="">10</option><option>20</option></select>
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
			                        <li><a class="active" href="#">2</a></li>
			                        <li><a href="#">3</a></li>
			                        <li><a href="#">4</a></li>
			                        <li><a href="#">5</a></li>
			                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
			                    </ul>
			                </div>
			            </div>
			        </div>
			    </div> -->
			    <div class="listing_box_area">
					<?php $i = 1;
						foreach ($category_businesses['Business'] as $k => $v):
					?>
						<div class="listing_box_row">
					                	<h2><span><i class="fa fa-briefcase"></i></span>
											<?php echo $this->Html->link($v['name'], array( 'controller' => 'business', 'action' => $v['slug'] )); ?></h2>
					                    <p><?php $this->Text->truncate( $v['description'], 50,
                                  array(
                                      'ellipsis' => '',
                                      'exact' => false
                                  ) ); ?></p>
					                    <div class="listing_box_details">
					                        <div class="listing_box_left">
					                            <div class="listing_box_img">
					                            	<?php
					                            		if( $v['img_src_small'] != "" ) {
					                            			echo $this->Html->image('/'.$v['img_src_small'], array('alt' => ''));
					                            		} else {
					                            		 	echo $this->Html->image('/front_end/images/no_image.png', array('alt' => ''));
					                            		} ?>
					                            </div>
					                            <div class="listing_box_desc">
					                            	<div class="listing_box_desc_top">
					                                    	<?php if( $v['pname'] != "" ){?>
					                                    	<p>Pres. <?=$v['pname']?><br>
					                                    	<?php }?>
					                                            <?php
					                                            $map_direction = '';
					                                            if( $v['street'] != "" ){
					                                            	$map_direction .= str_replace(' ', '+', $v['street'] );
					                                            	$map_direction .= ',+';
					                                             	echo $v['street']. ',';
				                                            	}
					                                            if( @$v['City']['city_name'] != "" ){
					                                            	echo @$v['City']['city_name'] .',';
					                                            	$map_direction .= str_replace(' ', '+', @$v['City']['city_name'] ).',+';
					                                            }
					                                            if( $v['state_iso'] != "" ){
					                                            	echo $v['state_iso'] .',';
					                                            	$map_direction .= str_replace(' ', '+', $v['state_iso']).',+';
					                                            }
					                                            if( $v['zip_code'] != "" ){
					                                            	echo $v['zip_code'];
					                                            	$map_direction .= $v['zip_code'].',+';
					                                            }
					                                            if( $v['country_iso'] != "" ){
					                                            	$map_direction .= $v['country_iso'];
					                                            }
					                                            echo '<br>';
					                                            if( $v['website'] != "" ){ ?>
					                                            	<span>Web:</span> <a href="<?=$v['website']?>" target="_blank"><?=$v['website']?></a>
					                                            <?php } ?>
					                                        </p>
					                                    	<p>
					                                    		<?php if( $v['phone'] != "" ){?>
					                                        	<span>Ph:</span> <?=$v['phone']?><br>
					                                        	<?php } ?>
					                                        	<?php if( $v['alternate_email'] != "" ){?>
					                                            <span>e-mail:</span> <a href="mailto:<?=$v['alternate_email']?>"><?=$v['alternate_email']?></a>
					                                            <?php } ?>
					                                        </p>
					                                </div>
					                                <div class="listing_box_desc_bottom">
					                                	<a href="https://www.google.com/maps/dir/<?=$map_direction?>" target="_blank"><i class="fa fa-map-marker"></i> Get Direction</a>
					                                    <a class="cl" href="#"><i class="fa fa-check-circle"></i> Claim Your Listing</a>
					                                </div>
					                            </div>
					                        </div>
					                        <div class="listing_box_right">
					                        	<div class="listing_box_review">
					                            	<?php
					                            	if( count($v['Reviews']) > 0 ){
					                            		$total_rating = 0;
					                                	for( $i=0; $i<count($v['Reviews']); $i++ ){
					                                		$total_rating = $total_rating + $v['Reviews'][$i]['rating'];
					                                	}
					                                	$avg = ( $total_rating / count($v['Reviews']) );
					                                	$rating =  floor($avg * 2) / 2;
					                            	 ?>
						                            	<div class="review_star"><?=$this->Star->renderStar($rating)?></div>
						                                <div class="review_cont"><?=$rating?><?php
						                                ?></div>
						                            <?php } else{
						                            	echo __('No rating yet..');
						                            }
						                            //echo $rating;
													// $avg          = 0;
													// $total_rating = 0;
													// $rating = 0;
						                            ?>
					                            </div>
					                            <div class="listing_box_rate">
					                            <?php
					                            if( count($v['Reviews']) > 0 ){
												 echo $this->Html->link( '('.count($v['Reviews']).' reviews)', array('controller' => 'reviews', 'action' => 'index', $v['id']) );
												 echo ' | ';
												}
												echo $this->Html->link( 'Rate it', array('controller' => 'reviews', 'action' => 'add', $v['id']) );
												?>
												</div>
					                            <?php echo $this->Html->link('Read More', array( 'controller' => 'business', 'action' => $v['slug'] ), array('class' => 'read_more')); ?>
					                        </div>
					                    </div>
					    </div>
					<?php endforeach; ?>
			    </div>
			</div>
	<?php
		endif; ?>
<?php
else:
	echo "Category not found";
endif;
?>

</div>