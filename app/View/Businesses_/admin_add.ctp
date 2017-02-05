<div class="businesses form">
<?php echo $this->Form->create('Business'); ?>
	<fieldset>
		<legend><?php echo __('Add Business'); ?></legend>
	<?php
		echo $this->Form->input('membership_id');
		echo $this->Form->input('listing_type_id');
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
		echo $this->Form->input('state_iso');
		echo $this->Form->input('zip_code');
		echo $this->Form->input('meta_title');
		echo $this->Form->input('meta_keyword');
		echo $this->Form->input('meta_desc');
		echo $this->Form->input('slug');
		echo $this->Form->input('status');
		echo $this->Form->input('Category', array('multiple' => 'checkbox'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Businesses'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Memberships'), array('controller' => 'memberships', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Membership'), array('controller' => 'memberships', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Listing Types'), array('controller' => 'listing_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Listing Type'), array('controller' => 'listing_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
