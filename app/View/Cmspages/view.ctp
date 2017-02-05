<div class="inner_content">
	<?php
	for($i=0; $i<count($cmspage['Advertisement']); $i++){
		if( $cmspage['Advertisement'][$i]['ad_type'] == 1 ){
			if( $cmspage['Advertisement'][$i]['ad_type'] == 1 ){
				echo $this->Html->image('/'.$cmspage['Advertisement'][$i]['file_src'], array('alt' => ''));
			} else{
				echo $cmspage['Advertisement'][$i]['google_adsense'];
			}
		}
		echo '<br /><br />';
	}
	?>
	<h1><?=$cmspage['Cmspage']['title']?></h1>
	<?=$cmspage['Cmspage']['body']?>
</div>