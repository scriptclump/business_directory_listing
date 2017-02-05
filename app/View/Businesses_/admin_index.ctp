<div class="businesses index">
	<h2><?php echo __('Businesses'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('membership_id'); ?></th>
			<th><?php echo $this->Paginator->sort('listing_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('pname'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('phone'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('website'); ?></th>
			<th><?php echo $this->Paginator->sort('facebook'); ?></th>
			<th><?php echo $this->Paginator->sort('twitter'); ?></th>
			<th><?php echo $this->Paginator->sort('street'); ?></th>
			<th><?php echo $this->Paginator->sort('street2'); ?></th>
			<th><?php echo $this->Paginator->sort('city_id'); ?></th>
			<th><?php echo $this->Paginator->sort('state_iso'); ?></th>
			<th><?php echo $this->Paginator->sort('zip_code'); ?></th>
			<th><?php echo $this->Paginator->sort('meta_title'); ?></th>
			<th><?php echo $this->Paginator->sort('meta_keyword'); ?></th>
			<th><?php echo $this->Paginator->sort('meta_desc'); ?></th>
			<th><?php echo $this->Paginator->sort('slug'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($businesses as $business): ?>
	<tr>
		<td><?php echo h($business['Business']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($business['Membership']['title'], array('controller' => 'memberships', 'action' => 'view', $business['Membership']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($business['ListingType']['title'], array('controller' => 'listing_types', 'action' => 'view', $business['ListingType']['id'])); ?>
		</td>
		<td><?php echo h($business['Business']['name']); ?>&nbsp;</td>
		<td><?php echo h($business['Business']['title']); ?>&nbsp;</td>
		<td><?php echo h($business['Business']['pname']); ?>&nbsp;</td>
		<td><?php echo h($business['Business']['description']); ?>&nbsp;</td>
		<td><?php echo h($business['Business']['phone']); ?>&nbsp;</td>
		<td><?php echo h($business['Business']['email']); ?>&nbsp;</td>
		<td><?php echo h($business['Business']['website']); ?>&nbsp;</td>
		<td><?php echo h($business['Business']['facebook']); ?>&nbsp;</td>
		<td><?php echo h($business['Business']['twitter']); ?>&nbsp;</td>
		<td><?php echo h($business['Business']['street']); ?>&nbsp;</td>
		<td><?php echo h($business['Business']['street2']); ?>&nbsp;</td>
		<td><?php echo h($business['Business']['city_id']); ?>&nbsp;</td>
		<td><?php echo h($business['Business']['state_iso']); ?>&nbsp;</td>
		<td><?php echo h($business['Business']['zip_code']); ?>&nbsp;</td>
		<td><?php echo h($business['Business']['meta_title']); ?>&nbsp;</td>
		<td><?php echo h($business['Business']['meta_keyword']); ?>&nbsp;</td>
		<td><?php echo h($business['Business']['meta_desc']); ?>&nbsp;</td>
		<td><?php echo h($business['Business']['slug']); ?>&nbsp;</td>
		<td><?php echo h($business['Business']['status']); ?>&nbsp;</td>
		<td><?php echo h($business['Business']['created']); ?>&nbsp;</td>
		<td><?php echo h($business['Business']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $business['Business']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $business['Business']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $business['Business']['id']), null, __('Are you sure you want to delete # %s?', $business['Business']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Business'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Memberships'), array('controller' => 'memberships', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Membership'), array('controller' => 'memberships', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Listing Types'), array('controller' => 'listing_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Listing Type'), array('controller' => 'listing_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
