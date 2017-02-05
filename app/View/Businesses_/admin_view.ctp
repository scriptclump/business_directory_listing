<div class="businesses view">
<h2><?php echo __('Business'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($business['Business']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Membership'); ?></dt>
		<dd>
			<?php echo $this->Html->link($business['Membership']['title'], array('controller' => 'memberships', 'action' => 'view', $business['Membership']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Listing Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($business['ListingType']['title'], array('controller' => 'listing_types', 'action' => 'view', $business['ListingType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($business['Business']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($business['Business']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pname'); ?></dt>
		<dd>
			<?php echo h($business['Business']['pname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($business['Business']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($business['Business']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($business['Business']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Website'); ?></dt>
		<dd>
			<?php echo h($business['Business']['website']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Facebook'); ?></dt>
		<dd>
			<?php echo h($business['Business']['facebook']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Twitter'); ?></dt>
		<dd>
			<?php echo h($business['Business']['twitter']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Street'); ?></dt>
		<dd>
			<?php echo h($business['Business']['street']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Street2'); ?></dt>
		<dd>
			<?php echo h($business['Business']['street2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City Id'); ?></dt>
		<dd>
			<?php echo h($business['Business']['city_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State Iso'); ?></dt>
		<dd>
			<?php echo h($business['Business']['state_iso']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Zip Code'); ?></dt>
		<dd>
			<?php echo h($business['Business']['zip_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meta Title'); ?></dt>
		<dd>
			<?php echo h($business['Business']['meta_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meta Keyword'); ?></dt>
		<dd>
			<?php echo h($business['Business']['meta_keyword']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meta Desc'); ?></dt>
		<dd>
			<?php echo h($business['Business']['meta_desc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($business['Business']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($business['Business']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($business['Business']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($business['Business']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Business'), array('action' => 'edit', $business['Business']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Business'), array('action' => 'delete', $business['Business']['id']), null, __('Are you sure you want to delete # %s?', $business['Business']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Businesses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Business'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Memberships'), array('controller' => 'memberships', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Membership'), array('controller' => 'memberships', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Listing Types'), array('controller' => 'listing_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Listing Type'), array('controller' => 'listing_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Categories'); ?></h3>
	<?php if (!empty($business['Category'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Lft'); ?></th>
		<th><?php echo __('Rght'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Body'); ?></th>
		<th><?php echo __('Meta Title'); ?></th>
		<th><?php echo __('Meta Keyword'); ?></th>
		<th><?php echo __('Meta Desc'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($business['Category'] as $category): ?>
		<tr>
			<td><?php echo $Category['id']; ?></td>
			<td><?php echo $category['parent_id']; ?></td>
			<td><?php echo $category['lft']; ?></td>
			<td><?php echo $category['rght']; ?></td>
			<td><?php echo $category['title']; ?></td>
			<td><?php echo $category['body']; ?></td>
			<td><?php echo $category['meta_title']; ?></td>
			<td><?php echo $category['meta_keyword']; ?></td>
			<td><?php echo $category['meta_desc']; ?></td>
			<td><?php echo $category['slug']; ?></td>
			<td><?php echo $category['status']; ?></td>
			<td><?php echo $category['created']; ?></td>
			<td><?php echo $category['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'categories', 'action' => 'view', $category['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'categories', 'action' => 'edit', $category['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'categories', 'action' => 'delete', $category['id']), null, __('Are you sure you want to delete # %s?', $category['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
