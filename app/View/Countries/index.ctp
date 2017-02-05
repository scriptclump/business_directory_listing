<div class="countries index">
	<h2><?php echo __('Countries'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('country_iso'); ?></th>
			<th><?php echo $this->Paginator->sort('country_name'); ?></th>
			<th><?php echo $this->Paginator->sort('country_printable_name'); ?></th>
			<th><?php echo $this->Paginator->sort('country_iso3'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($countries as $country): ?>
	<tr>
		<td><?php echo h($country['Country']['country_iso']); ?>&nbsp;</td>
		<td><?php echo h($country['Country']['country_name']); ?>&nbsp;</td>
		<td><?php echo h($country['Country']['country_printable_name']); ?>&nbsp;</td>
		<td><?php echo h($country['Country']['country_iso3']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $country['Country']['country_iso'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $country['Country']['country_iso'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $country['Country']['country_iso']), null, __('Are you sure you want to delete # %s?', $country['Country']['country_iso'])); ?>
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
		<li><?php echo $this->Html->link(__('New Country'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List States'), array('controller' => 'states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New State'), array('controller' => 'states', 'action' => 'add')); ?> </li>
	</ul>
</div>
