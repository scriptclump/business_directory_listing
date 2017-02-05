<?php echo $this->Html->script('ckeditor/ckeditor');?>
<div class="page-head">
	<ol class="breadcrumb">
   		<li><i class="fa fa-bars"></i>&nbsp;<?php echo $this->Html->link(__('List Advertisements'), array('action' => 'index')); ?></li>
 	</ol>
</div>
<div class="block block-color primary">
  <div class="header">
    <h3><?php echo __('Add Advertisement'); ?></h3>
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

		$file_settings = array(
			'class' => 'form-horizontal',
			'inputDefaults' => array(
				'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
				'label' => array('class' => 'col-sm-2 control-label'),
				'class' => 'form-control sd',
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
		echo $this->Form->input('cmspage_id', array('class' => 'form-control parsley-validated', 'required' => 'required', 'label' => array('class' => 'col-sm-2 control-label', 'text' => 'Page') ));
		echo $this->Form->input('title', array('class' => 'form-control parsley-validated', 'required' => 'required' ));
		echo $this->Form->input('ad_pos', array('options' => array('' => '(choose one)', '1' => 'Top Banner', '0' => 'Left Side Banner'),
			'required' => 'required', 'label' => array('class' => 'col-sm-2 control-label', 'text' => 'Ad. Position') ));
		echo $this->Form->input('ad_type', array('options' => array('' => '(choose one)', '1' => 'Google Adsense', '0' => 'Image'),
			'required' => 'required', 'label' => array('class' => 'col-sm-2 control-label', 'text' => 'Ad. Type') ));
		echo $this->Form->input('google_adsense', array(
		    'div' => array(
		        'id' => 'google_adsense_id',
		        'title' => 'google_adsense_id',
		        'style' => 'display:none',
		        'class' => 'form-group'
		    ),
					'required' => 'required'
		));
		echo $this->Form->input('file_src', array(
		    'div' => array(
		        'id' => 'file_id',
		        'title' => 'file_id',
		        'style' => 'display:none',
		        'class' => 'form-group'
		    ),	'required' => 'required','type' => 'file', 'label' => array('class' => 'col-sm-2 control-label', 'text' => 'Upload Ad. Banner')
		));
		// echo $this->Form->input('file_src', array('class' => 'form-control parsley-validated', 'required' => 'required','type' => 'file', 'label' => array('class' => 'col-sm-2 control-label', 'text' => 'Upload Ad Banner') ));
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
});
</script>