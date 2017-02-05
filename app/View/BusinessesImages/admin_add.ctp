<div class="businessesImages form">
<?php echo $this->Form->create('BusinessesImage'); ?>
	<fieldset>
		<legend><?php echo __('Add Businesses Image'); ?></legend>
	<?php
		echo $this->Form->input('business_id');
		echo $this->Form->input('img_src');
		echo $this->Form->input('img_src_small');
		echo $this->Form->input('img_src_medium');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Businesses Images'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Businesses'), array('controller' => 'businesses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Business'), array('controller' => 'businesses', 'action' => 'add')); ?> </li>
	</ul>
</div>
