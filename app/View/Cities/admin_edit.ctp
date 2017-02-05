<div class="cities form">
<?php echo $this->Form->create('City'); ?>
	<fieldset>
		<legend><?php echo __('Edit City'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('City.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('City.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Cities'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List States'), array('controller' => 'states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New State'), array('controller' => 'states', 'action' => 'add')); ?> </li>
	</ul>
</div>
