<div class="cities form">
<?php echo $this->Form->create('City'); ?>
	<fieldset>
		<legend><?php echo __('Add City'); ?></legend>
	<?php
		echo $this->Form->input('state_iso');
		echo $this->Form->input('city_name');
		echo $this->Form->input('zip_code');
		echo $this->Form->input('city_default');
		echo $this->Form->input('city_order');
		echo $this->Form->input('status',
			array(
			'options' => array('' => 'Select status', '1' => 'Active', '0' => 'Inactive'),
			'required' => 'required'
			));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Cities'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List States'), array('controller' => 'states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New State'), array('controller' => 'states', 'action' => 'add')); ?> </li>
	</ul>
</div>
