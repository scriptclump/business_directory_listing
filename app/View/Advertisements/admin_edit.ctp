<?php echo $this->Html->script('ckeditor/ckeditor');?>
<div class="page-head">
	<ol class="breadcrumb">
		<li><i class="fa fa-bars"></i>&nbsp;<?php echo $this->Html->link(__('List Advertisements'), array('action' => 'index')); ?></li>
		<li><i class="fa fa-times"></i>&nbsp;<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Advertisement.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Advertisement.id'))); ?></li>
 	</ol>
</div>
<div class="block block-color primary">
  <div class="header">
    <h3><?php echo __('Edit Advertisement'); ?></h3>
  </div>
  <div class="content">
	<?php
		$inputDefaults = array(
			'class' => 'form-horizontal',
			'inputDefaults' => array(
				'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
				'label' => array('class' => 'col-sm-2 control-label'),
				'class' => 'form-control',
				'div' => 'form-group',
				'between' => '<div class="col-sm-10">',
				'error' => array(
					'attributes' => array('wrap' => 'span', 'class' => 'help-inline')
				),
				'after' => '</div>'
			),
			'novalidate' => true,
			'parsley-validate' => '',
			'type' => 'file'
		);
		echo $this->Form->create('Advertisement', $inputDefaults);
		echo $this->Form->input('id');
		echo $this->Form->input('cmspage_id', array('class' => 'form-control parsley-validated', 'required' => 'required' ));
		echo $this->Form->input('title', array('class' => 'form-control parsley-validated', 'required' => 'required' ));
		echo $this->Form->input('ad_pos', array('options' => array('' => '(choose one)', '1' => 'Top Banner', '0' => 'Left Side Banner'),
			'required' => 'required'));
		echo $this->Form->input('ad_type', array('options' => array('' => '(choose one)', '1' => 'Google Adsense', '0' => 'Image'),
			'required' => 'required'));
		echo $this->Form->input('google_adsense', array(
		    'div' => array(
		        'id' => 'google_adsense_id',
		        'title' => 'google_adsense_id',
		        'style' => 'display:none',
		        'class' => 'form-group'
		    ),
					'required' => 'required'
		));
		if( $this->data['Advertisement']['file_src_small'] != "" && $this->data['Advertisement']['ad_type'] == "0" ){
			echo '<div class="form-group required">
					<label class="col-sm-2 control-label" for="AdvertisementTitle">Uploaded Image</label>
					<div class="col-sm-10">';
					echo $this->Html->image('/'.$this->data['Advertisement']['file_src_small'], array('alt' => h($this->data['Advertisement']['title'])  ));
			echo '</div>
				   </div>';
		}
		echo $this->Form->input('file_src', array(
		    'div' => array(
		        'id' => 'file_id',
		        'title' => 'file_id',
		        'style' => 'display:none',
		        'class' => 'form-group'
		    ),	'required' => 'required','type' => 'file', 'label' => array('class' => 'col-sm-2 control-label', 'text' => 'Upload Ad. Banner')
		));
		// echo $this->Form->input('file_src', array(
		//     'div' => array(
		//         'id' => 'file_id',
		//         'title' => 'file_id',
		//         'style' => 'display:none',
		//         'class' => 'form-group'
		//     ),	'required' => 'required','type' => 'file', 'label' => array('class' => 'col-sm-2 control-label', 'text' => 'Upload Ad. Banner')
		// ));
		echo $this->Form->input('sort_order', array('class' => 'form-control parsley-validated', 'required' => 'required' ));
		echo $this->Form->input('status', array('options' => array('' => '(choose one)', '1' => 'Active', '0' => 'Inactive'),
			'required' => 'required'));
		?>
	<div class="form-group">
	  <div class="col-sm-offset-2 col-sm-10">
	      <?php
			echo $this->Form->button('Submit', array(
			    'type' => 'submit',
			    'class' => 'btn btn-primary',
			    'data-dismiss'  => 'modal'
			));
			echo $this->Form->button('Reset', array(
			    'type' => 'reset',
			    'class' => 'btn btn-default',
			    'data-dismiss'  => 'modal'
			));
			?>
	  </div>
	</div>
	<?php echo $this->Form->end(); ?>
  </div>
</div>
<script>
$( document ).ready(function() {
	$('#AdvertisementAdType').on('change', function() {
		//alert( $(this).val() ); // or $(this).val()
		if( $(this).val() == 0 ) {
			$('#file_id').show();
			$('#google_adsense_id').hide();
		}
		if( $(this).val() == 1 ) {
			$('#file_id').hide();
			$('#google_adsense_id').show();
		}
		if( $(this).val() == "" ) {
			$('#file_id').hide();
			$('#google_adsense_id').hide();
		}
	});
	<?php if ( $this->data['Advertisement']['ad_type'] == "0" ){ ?>
		$('#file_id').show();
		$('#google_adsense_id').hide();
	<?php } ?>
	<?php if ( $this->data['Advertisement']['ad_type'] == "1" ){ ?>
		$('#file_id').hide();
		$('#google_adsense_id').show();
	<?php } ?>
});
</script>