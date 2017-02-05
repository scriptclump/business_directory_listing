<div class="busniesses index">
	<h2><?php echo __('Busniesses'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('membership_id'); ?></th>
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
			<th><?php echo $this->Paginator->sort('state_id'); ?></th>
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
	<?php foreach ($busniesses as $busniess): ?>
	<tr>
		<td><?php echo h($busniess['Busniess']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($busniess['Membership']['title'], array('controller' => 'memberships', 'action' => 'view', $busniess['Membership']['id'])); ?>
		</td>
		<td><?php echo h($busniess['Busniess']['name']); ?>&nbsp;</td>
		<td><?php echo h($busniess['Busniess']['title']); ?>&nbsp;</td>
		<td><?php echo h($busniess['Busniess']['pname']); ?>&nbsp;</td>
		<td><?php echo h($busniess['Busniess']['description']); ?>&nbsp;</td>
		<td><?php echo h($busniess['Busniess']['phone']); ?>&nbsp;</td>
		<td><?php echo h($busniess['Busniess']['email']); ?>&nbsp;</td>
		<td><?php echo h($busniess['Busniess']['website']); ?>&nbsp;</td>
		<td><?php echo h($busniess['Busniess']['facebook']); ?>&nbsp;</td>
		<td><?php echo h($busniess['Busniess']['twitter']); ?>&nbsp;</td>
		<td><?php echo h($busniess['Busniess']['street']); ?>&nbsp;</td>
		<td><?php echo h($busniess['Busniess']['street2']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($busniess['City']['id'], array('controller' => 'cities', 'action' => 'view', $busniess['City']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($busniess['State']['state_iso'], array('controller' => 'states', 'action' => 'view', $busniess['State']['id'])); ?>
		</td>
		<td><?php echo h($busniess['Busniess']['zip_code']); ?>&nbsp;</td>
		<td><?php echo h($busniess['Busniess']['meta_title']); ?>&nbsp;</td>
		<td><?php echo h($busniess['Busniess']['meta_keyword']); ?>&nbsp;</td>
		<td><?php echo h($busniess['Busniess']['meta_desc']); ?>&nbsp;</td>
		<td><?php echo h($busniess['Busniess']['slug']); ?>&nbsp;</td>
		<td><?php echo h($busniess['Busniess']['status']); ?>&nbsp;</td>
		<td><?php echo h($busniess['Busniess']['created']); ?>&nbsp;</td>
		<td><?php echo h($busniess['Busniess']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $busniess['Busniess']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $busniess['Busniess']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $busniess['Busniess']['id']), null, __('Are you sure you want to delete # %s?', $busniess['Busniess']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Busniess'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Memberships'), array('controller' => 'memberships', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Membership'), array('controller' => 'memberships', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cities'), array('controller' => 'cities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New City'), array('controller' => 'cities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List States'), array('controller' => 'states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New State'), array('controller' => 'states', 'action' => 'add')); ?> </li>
	</ul>
</div>
