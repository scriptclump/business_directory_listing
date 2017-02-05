<div class="busniesses form">
<?php echo $this->Form->create('Busniess'); ?>
	<fieldset>
		<legend><?php echo __('Edit Busniess'); ?></legend>
	<?php
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
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Busniess.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Busniess.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Busniesses'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Memberships'), array('controller' => 'memberships', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Membership'), array('controller' => 'memberships', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cities'), array('controller' => 'cities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New City'), array('controller' => 'cities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List States'), array('controller' => 'states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New State'), array('controller' => 'states', 'action' => 'add')); ?> </li>
	</ul>
</div>
