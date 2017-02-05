<div class="search_result_area">
	<div class="search_result_top">
    	<div class="search_result_left"><span>Search Result:</span>
		<?php echo $this->request->params['named']['name'];	?>
    	</div>
        <div class="search_result_right"><a href="<?=BASE_URL?>"><i class="fa fa-angle-left"></i> Back to Search</a></div>
    </div>
    <!-- <p>Morbi varius nisi ac dolor cursus ullamcorper. Donec quis lacus vitae enim dapibus laoreet. Donec iaculis, metus non laoreet faucibus, nunc libero malesuada.</p> -->
   	<?php if ( isset($businesses) && ( count($businesses) > 0 ) ) : ?>
	    <!-- <div class="search_result_box">
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
	            	<?php if( $this->Paginator->params['paging']['Business']['pageCount'] > 1 ){ ?>
	            	<div class="result_pagination">
	                	<ul>
		                	<?php
	                         echo $this->Paginator->prev( __('<i class="fa fa-angle-left"></i>'), array('escape'=>false, 'tag' => 'li'), null, array('escape'=>false, 'class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
	                         echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'active'));
	                         echo $this->Paginator->next( __('<i class="fa fa-angle-right"></i>'), array('escape'=>false, 'tag' => 'li'), null, array('escape'=>false, 'class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
	                      ?>
		                </ul>
	                </div>
	                <?php } ?>
	            </div>
	        </div>
	    </div> -->
	    <div class="listing_box_area">
	    	<?php $i=1;
	    		foreach ($businesses as $key => $value): ?>
		    	<div class="listing_box_row">
		        	<h2><span><i class="fa fa-briefcase"></i></span><a href="<?=BASE_URL.'business/'.$businesses[$key]['Business']['slug'];?>"><?=$businesses[$key]['Business']['name'];?></a></h2>
		            <p><?php $this->Text->truncate( $businesses[$key]['Business']['description'], 50,
                                  array(
                                      'ellipsis' => '',
                                      'exact' => false
                                  ) ); ?></p>
		            <div class="listing_box_details">
		                <div class="listing_box_left">
		                    <div class="listing_box_img">
                    			<?php
                            		if( $businesses[$key]['Business']['img_src_small'] != "" ) {
                            			echo $this->Html->image('/'.$businesses[$key]['Business']['img_src_small'], array('alt' => ''));
                            		} else {
                            		 	echo $this->Html->image('/front_end/images/no_image.png', array('alt' => ''));
                            		}
                            	?>
		                    </div>
		                    <div class="listing_box_desc">
		                    	<div class="listing_box_desc_top">
		                        	<span class="listing_box_col">
		                            	<p>Pres. <?=$businesses[$key]['Business']['pname']?><br/>
		                                    <?=$businesses[$key]['Business']['street']?><br/>
		                                    <?php if( @$businesses[$key]['City']['city_name'] != "" ){
		                                    	echo @$businesses[$key]['City']['city_name']. ', ';
		                                    }
		                                    ?>
		                                    <?php
		                                    if( $businesses[$key]['Business']['state_iso'] != "" ){
		                                    	echo $businesses[$key]['Business']['state_iso'].', ';
		                                    }
		                                    ?><?=$businesses[$key]['Business']['zip_code']?><br/>
		                                    <?php if( $businesses[$key]['Business']['website'] != "" ) { ?>
		                                    	<span>Web:</span> <a href="<?=$businesses[$key]['Business']['website']?>"><?=$businesses[$key]['Business']['website']?></a>
		                                	<?php } ?>
		                                    </p>
		                            </span>
		                            <span class="listing_box_col right">
		                            	<p>
		                            		<?php if( $businesses[$key]['Business']['phone'] != "" ) { ?>
		                                	<span>Ph:</span> <?=$businesses[$key]['Business']['phone']?><br/>
		                                	<?php } ?>
		                                	<?php if( $businesses[$key]['Business']['alternate_email'] != "" ) { ?>
		                                    <span>e-mail:</span> <a href="mailto:<?=$businesses[$key]['Business']['alternate_email']?>"><?=$businesses[$key]['Business']['alternate_email']?></a>
		                                    <?php } ?>
		                                </p>
		                            </span>
		                        </div>
		                        <div class="listing_box_desc_bottom">
		                        	<?php
									$map_direction = '';
									$street        = @$businesses[$key]['Business']['street'];
									$city_name     = @$businesses[$key]['City']['city_name'];
									$state_iso     = @$businesses[$key]['Business']['state_iso'];
									$zip_code      = @$businesses[$key]['Business']['zip_code'];
									$country_iso   = @$businesses[$key]['Business']['country_iso'];
		                        	if( $street != "" ){
		                        		$map_direction .= str_replace(' ', '+', $street );
		                        		$map_direction .= ',+';
		                        	}
		                        	if( $city_name != "" ){
		                        		$map_direction .= str_replace(' ', '+', $city_name );
		                        		$map_direction .= ',+';
		                        	}
		                        	if( $state_iso != "" ){
		                        		$map_direction .= str_replace(' ', '+', $state_iso );
		                        		$map_direction .= ',+';
		                        	}
		                        	if( $zip_code != "" ){
		                        		$map_direction .= $zip_code;
		                        		$map_direction .= ',+';
		                        	}
		                        	if( $country_iso != "" ){
		                        		$map_direction .= $country_iso;
		                        	}
		                        	?>
		                        	<a href="https://www.google.com/maps/dir/<?=$map_direction?>" target="_blank"><i class="fa fa-map-marker"></i> Get Direction</a>
		                            <a href="#" class="cl"><i class="fa fa-check-circle"></i> Claim Your Listing</a>
		                        </div>
		                    </div>
		                </div>
		                <?php //pr($businesses); exit;?>
		                <div class="listing_box_right">
                        	<div class="listing_box_review">
                            	<?php
                            	if( count($businesses[$key]['Reviews']) > 0 ){
                            		$total_rating = 0;
                                	for( $i=0; $i<count($businesses[$key]['Reviews']); $i++ ){
                                		$total_rating = $total_rating + $businesses[$key]['Reviews'][$i]['rating'];
                                	}
                                	$avg = ( $total_rating / count($businesses[$key]['Reviews']) );
                                	$rating =  floor($avg * 2) / 2;
                            	 ?>
	                            	<div class="review_star"><?=$this->Star->renderStar($rating)?></div>
	                                <div class="review_cont"><?=$rating?><?php
	                                ?></div>
	                            <?php } else{
	                            	echo __('No rating yet..');
	                            }
	                            ?>
                            </div>
                            <div class="listing_box_rate">
                            <?php
                            if( count($businesses[$key]['Reviews']) > 0 ){
							 echo $this->Html->link( '('.count($businesses[$key]['Reviews']).' reviews)', array('controller' => 'reviews', 'action' => 'index', $businesses[$key]['Business']['id']) );
							 echo ' | ';
							}
							echo $this->Html->link( 'Rate it', array('controller' => 'reviews', 'action' => 'add', $businesses[$key]['Business']['id']) );
							?>
							</div>
                            <?php echo $this->Html->link('Read More', array( 'controller' => 'business', 'action' => $businesses[$key]['Business']['slug'] ), array('class' => 'read_more')); ?>
                        </div>
		            </div>
		        </div>
	        <?php endforeach; ?>
            <?php if( $this->Paginator->params['paging']['Business']['pageCount'] > 1 ){ ?>
		        <div class="listing_box_pagination">
		            <div class="result_pagination">
		                <ul>
		                	<?php
	                         echo $this->Paginator->prev( __('<i class="fa fa-angle-left"></i>'), array('escape'=>false, 'tag' => 'li'), null, array('escape'=>false, 'class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
	                         echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'active'));
	                         echo $this->Paginator->next( __('<i class="fa fa-angle-right"></i>'), array('escape'=>false, 'tag' => 'li'), null, array('escape'=>false, 'class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
	                      ?>
		                </ul>
		            </div>
		        </div>
	        <?php } ?>
	    </div>
	<?php endif; ?>
</div>