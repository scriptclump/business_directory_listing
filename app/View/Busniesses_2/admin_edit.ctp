<?php echo $this->Html->script('ckeditor/ckeditor');?>
<div class="page-head">
	<ol class="breadcrumb">
		<li><i class="fa fa-bars"></i>&nbsp;<?php echo $this->Html->link(__('List Businesses'), array('action' => 'index')); ?></li>
		<li><i class="fa fa-times"></i>&nbsp;<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Business.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Business.id'))); ?></li>
 	</ol>
</div>
<div class="block block-color primary">
  <div class="header">
    <h3><?php echo __('Edit Business'); ?></h3>
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
			'parsley-validate' => ''
		);
		echo $this->Form->create('Business', $inputDefaults);
		echo $this->Form->input('id');
		echo $this->Form->input('membership_id');
		echo $this->Form->input('name');
		echo $this->Form->input('title');
		echo $this->Form->input('pname');
		echo $this->Form->input('description');
		echo $this->Form->input('phone');
		echo $this->Form->input('email');
		echo $this->Form->input('website');
		echo $this->Form->input('facebook');
		echo $this->Form->input('twitter');
		echo $this->Form->input('street');
		echo $this->Form->input('street2');
		echo $this->Form->input('city_id');
		echo $this->Form->input('state_id');
		echo $this->Form->input('zip_code');
		echo $this->Form->input('meta_title');
		echo $this->Form->input('meta_keyword');
		echo $this->Form->input('meta_desc');
		echo $this->Form->input('slug');
		echo $this->Form->input('status');
		// echo $this->Form->input('membership_id', array('class' => 'form-control parsley-validated', 'required' => 'required' ));
		// echo $this->Form->input('name', array('class' => 'form-control parsley-validated', 'required' => 'required' ));
		// echo $this->Form->input('title', array('class' => 'form-control parsley-validated', 'required' => 'required' ));
		// echo $this->Form->input('pname', array('class' => 'form-control parsley-validated', 'required' => 'required' ));
		// echo $this->Form->input('description', array('class' => 'ckeditor parsley-validated', 'required' => 'required', 'id' => 'description', 'label' => array('class' => 'col-sm-2 control-label', 'text' => 'Content')) );
		// echo $this->Form->input('phone', array('class' => 'form-control parsley-validated', 'required' => 'required' ));
		// echo $this->Form->input('email', array('class' => 'form-control parsley-validated', 'required' => 'required' ));
		// echo $this->Form->input('website', array('class' => 'form-control parsley-validated', 'required' => 'required' ));
		// echo $this->Form->input('facebook', array('class' => 'form-control parsley-validated', 'required' => 'required' ));
		// echo $this->Form->input('twitter', array('class' => 'form-control parsley-validated', 'required' => 'required' ));
		// echo $this->Form->input('street', array('class' => 'form-control parsley-validated', 'required' => 'required' ));
		// echo $this->Form->input('street2', array('class' => 'form-control parsley-validated', 'required' => 'required' ));
		// echo $this->Form->input('city_id', array('class' => 'form-control parsley-validated', 'required' => 'required' ));
		// echo $this->Form->input('state_id', array('class' => 'form-control parsley-validated', 'required' => 'required' ));
		// echo $this->Form->input('zip_code', array('class' => 'form-control parsley-validated', 'required' => 'required' ));
		?>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="CmspageTitle">&nbsp;</label>
			<div class="col-sm-10" align="center"><strong>Below fields are for SEO purpose only</strong></div>
		</div>
		<?php
		// echo $this->Form->input('meta_title', array('class' => 'form-control parsley-validated', 'required' => 'required' ));
		// echo $this->Form->input('meta_keyword', array('class' => 'form-control parsley-validated', 'required' => 'required' ));
		// echo $this->Form->input('meta_desc', array('class' => 'form-control parsley-validated', 'required' => 'required', 'label' => array('class' => 'col-sm-2 control-label', 'text' => 'Meta Description') ));
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