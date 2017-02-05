<?php
$this->request->data = $user;
unset($this->request->data['User']['password']);
?>
<div class="listing_box_area review_list">
	<?php
				$inputDefaults = array(
					'class' => 'form-horizontal',
					'inputDefaults' => array(
						'label'      => false,
						'div'        => false,
						'error'      => array(
						'attributes' => array('wrap' => 'span', 'class' => 'help-inline')
						)
					),
					'type' => 'file',
					'url'  => array('controller' => 'Users', 'action' => 'my_account')
				);
				echo $this->Form->create('User', $inputDefaults);
				echo $this->Form->input('User.id');
				echo $this->Form->input('Business.id');
				echo $this->Session->flash();
			?>
				<div class="listing_box_row">
						<h2><span class="acc"><i class="fa fa-briefcase"></i></span>Claim your listing – add photos, more details</h2>
						<div class="listing_box_details">
								<div class="listing_box_left">
										<div class="listing_box_img"><div id="single">
												<?php
												if( $user['Business']['img_src_small'] == "" ){
													echo $this->Html->image('/front_end/images/listing_img.png', array('alt' => ''));
												} else{
													echo $this->Html->image( '/'.$user['Business']['img_src_small'], array('alt' => '', 'title' => ''));
												}
												?></div>
												<div class="upload_photo">
														<input type="file" id="fileInput" name="data[Business][img_src]" />
														<button type="button" onclick="chooseFile();">Upload Logo/Photo</button>
												</div>
										</div>
										<div class="listing_box_desc">
												<h2><?php if($user['Business']['pname'] != ""){ ?> Pres. <?=$user['Business']['pname']?><br/><?php  } ?></h2>
												<p><?php if($user['Business']['street'] != ""){ ?><?=$user['Business']['street']?><br/><?php  } ?>
												<?php if($user['Business']['street2'] != ""){ ?><?=$user['Business']['street2']?><br/><?php  } ?>
												<?php if($user['Business']['city_id'] != ""){ ?><?=$user['Business']['city_id']?>,<?php  } ?>
												<?php if($user['Business']['state_iso'] != ""){ ?><?=$user['Business']['state_iso']?>,<?php  } ?>
												<?php if($user['Business']['zip_code'] != ""){ ?><?=$user['Business']['zip_code']?><?php  } ?><br/>
												<?php if($user['Business']['website'] != ""){ ?>
													<span>Web:</span> <a href="<?=$user['Business']['website']?>" target="_blank"><?=$user['Business']['website']?></a>
												<?php  } ?></p>
											<?php if($user['Business']['phone'] != ""){ ?><p>
											<span>Ph:</span> <?=$user['Business']['phone']?><br/>
																				</p><?php  } ?>
											<?php if($user['Business']['website'] != ""){ ?>
												<p><span>Web:</span> <a href="<?=$user['Business']['website']?>" target="_blank"><?=$user['Business']['website']?></a></p>
											<?php  } ?>
										</div>
								</div>
						</div>
				</div>
				<div class="my_account_row">
					<label>Provide links to social media sites:</label>
						<textarea name="data[Business][social_media_links]" class="social" placeholder="Type/Paste link here"><?=$user['Business']['social_media_links']?></textarea>
						<div class="soacial_link">
							<a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
								<a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
								<a href="#" class="linked"><i class="fa fa-linkedin"></i></a>
								<a href="#" class="feed"><i class="fa fa-rss"></i></a>
						</div>
				</div>
				<div class="my_account_row">
					<label>Description:</label>
						<textarea name="data[Business][description]" placeholder="Describe your business/service/products, include, if applicable, hours/days of operation"><?=$user['Business']['description']?></textarea>
				</div>
				<div class="my_account_row">
					<label>Upload photos here:</label>
						<div class="photo_col">
							<ul id="list2">
								<?php
								for($i=0; $i<count($user['Business']['BusinessesImages']); $i++){?>
									<li>
									<?php
									echo $this->Html->image( '/'.$user['Business']['BusinessesImages'][$i]['img_src_small'], array('alt' => '', 'title' => '/'.$user['Business']['BusinessesImages'][$i]['img_src'], 'class' => 'thumb'));
									?><span class="cancel_del"><i class="fa fa-times-circle" onclick="delImage(<?=$user['Business']['BusinessesImages'][$i]['id']?>)"></i></span>
									</li>
								<?php
								}
								?>
							</ul>
						</div>
						<div class="photo_col"><ul id="list"></ul></div>
						<div class="multi_upload_photo">
							<input type="file" id="files" name="data[BusinessesImage][][img_src]" multiple />
							<button type="button" onclick="chooseFile2();">Upload</button>
						</div>
				</div>
				<div class="my_account_row">
					<input name="" type="submit" value="Submit for approval" />
				</div>
		<?php echo $this->Form->end(); ?>
	 <!--  <div class="review_box_area">
			<h2>Reviews</h2>
				<div class="review_listing_box">
					<div class="review_listing_row">
						<ul>
								<li class="listing_auth"><span>
									<?php echo $this->Html->image('/front_end/images/review_ist_icon.png', array('alt' => ''));?></span> Sarah Quis</li>
									<li class="listing_email">Email: <a href="mailto:sarah@siteurl.com">sarah@siteurl.com</a></li>
									<li class="status">Status: <i class="fa fa-check-circle approved"></i></li>
									<li class="details"><a href="#">Details</a></li>
									<li class="delete"><a href="#"><i class="fa fa-times-circle"></i> Delete</a></li>
							</ul>
					</div>
					<div class="review_listing_row">
						<ul>
								<li class="listing_auth"><span><?php echo $this->Html->image('/front_end/images/review_ist_icon.png', array('alt' => ''));?></span> Sarah Quis</li>
									<li class="listing_email">Email: <a href="mailto:sarah@siteurl.com">sarah@siteurl.com</a></li>
									<li class="status">Status: <i class="fa fa-check-circle approve"></i></li>
									<li class="details"><a href="#">Details</a></li>
									<li class="delete"><a href="#"><i class="fa fa-times-circle"></i> Delete</a></li>
							</ul>
					</div>
					<div class="review_listing_row">
						<ul>
								<li class="listing_auth"><span><?php echo $this->Html->image('/front_end/images/review_ist_icon.png', array('alt' => ''));?></span> Sarah Quis</li>
									<li class="listing_email">Email: <a href="mailto:sarah@siteurl.com">sarah@siteurl.com</a></li>
									<li class="status">Status: <i class="fa fa-check-circle approve"></i></li>
									<li class="details"><a href="#">Details</a></li>
									<li class="delete"><a href="#"><i class="fa fa-times-circle"></i> Delete</a></li>
							</ul>
					</div>
				</div>
		</div> -->
</div>

<script>
$(document).ready(function () {
		$(document).on('click', 'span.cancel', function (e) {
				console.log("C");
				e.preventDefault();
				$(this).closest(".photo_col li").fadeOut();
		});
});
function handleFileSelect(evt) {
		var files = evt.target.files; // FileList object
		// Loop through the FileList and render image files as thumbnails.
		for (var i = 0, f; f = files[i]; i++) {
			// Only process image files.
			if (!f.type.match('image.*')) {
				continue;
			}
			var reader = new FileReader();
			// Closure to capture the file information.
			reader.onload = (function(theFile) {
				return function(e) {
					// Render thumbnail.
					var span = document.createElement('li');
					span.innerHTML = ['<img class="thumb" src="', e.target.result,
														'" title="', escape(theFile.name), '"/> <span class="cancel"><i class="fa fa-times-circle"></i></span>'].join('');
					document.getElementById('list').insertBefore(span, null);
				};
			})(f);
			// Read in the image file as a data URL.
			reader.readAsDataURL(f);
		}
	}
	document.getElementById('files').addEventListener('change', handleFileSelect, false);


// Single upload
function handleFileSelectSingle(evt) {
		var files = evt.target.files; // FileList object

		// Loop through the FileList and render image files as thumbnails.
		for (var i = 0, f; f = files[i]; i++) {

			// Only process image files.
			if (!f.type.match('image.*')) {
				continue;
			}

			var reader = new FileReader();

			// Closure to capture the file information.

						reader.onload = (function(theFile) {
						return function(e) {
							document.getElementById('single').innerHTML = ['<img class="thumb" src="',
							e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
				};
			})(f);


			// Read in the image file as a data URL.
			reader.readAsDataURL(f);
		}
}

document.getElementById('fileInput').addEventListener('change', handleFileSelectSingle, false);



function delImage( id ){
	var conf = confirm("Are you sure, you want to remove this image?");
	if( conf ){
		window.location.href= '<?php echo Router::url( array("controller" => "BusinessesImages", "action" => "delete",) ); ?>/' + id;
	}
}
</script>