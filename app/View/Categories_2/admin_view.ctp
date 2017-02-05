<div class="categories view">
<h2><?php echo __('Category'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($category['Category']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Listing Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($category['ListingType']['title'], array('controller' => 'listing_types', 'action' => 'view', $category['ListingType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($category['ParentCategory']['title'], array('controller' => 'categories', 'action' => 'view', $category['ParentCategory']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lft'); ?></dt>
		<dd>
			<?php echo h($category['Category']['lft']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rght'); ?></dt>
		<dd>
			<?php echo h($category['Category']['rght']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($category['Category']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Body'); ?></dt>
		<dd>
			<?php echo h($category['Category']['body']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meta Title'); ?></dt>
		<dd>
			<?php echo h($category['Category']['meta_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meta Keyword'); ?></dt>
		<dd>
			<?php echo h($category['Category']['meta_keyword']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meta Desc'); ?></dt>
		<dd>
			<?php echo h($category['Category']['meta_desc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($category['Category']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($category['Category']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($category['Category']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($category['Category']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Category'), array('action' => 'edit', $category['Category']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Category'), array('action' => 'delete', $category['Category']['id']), null, __('Are you sure you want to delete # %s?', $category['Category']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Listing Types'), array('controller' => 'listing_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Listing Type'), array('controller' => 'listing_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Businesses'), array('controller' => 'businesses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Business'), array('controller' => 'businesses', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Categories'); ?></h3>
	<?php if (!empty($category['ChildCategory'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Listing Type Id'); ?></th>
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
	<?php foreach ($category['ChildCategory'] as $childCategory): ?>
		<tr>
			<td><?php echo $childCategory['id']; ?></td>
			<td><?php echo $childCategory['listing_type_id']; ?></td>
			<td><?php echo $childCategory['parent_id']; ?></td>
			<td><?php echo $childCategory['lft']; ?></td>
			<td><?php echo $childCategory['rght']; ?></td>
			<td><?php echo $childCategory['title']; ?></td>
			<td><?php echo $childCategory['body']; ?></td>
			<td><?php echo $childCategory['meta_title']; ?></td>
			<td><?php echo $childCategory['meta_keyword']; ?></td>
			<td><?php echo $childCategory['meta_desc']; ?></td>
			<td><?php echo $childCategory['slug']; ?></td>
			<td><?php echo $childCategory['status']; ?></td>
			<td><?php echo $childCategory['created']; ?></td>
			<td><?php echo $childCategory['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'categories', 'action' => 'view', $childCategory['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'categories', 'action' => 'edit', $childCategory['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'categories', 'action' => 'delete', $childCategory['id']), null, __('Are you sure you want to delete # %s?', $childCategory['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Businesses'); ?></h3>
	<?php if (!empty($category['Business'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Membership Id'); ?></th>
		<th><?php echo __('Listing Type Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Pname'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Phone'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Website'); ?></th>
		<th><?php echo __('Facebook'); ?></th>
		<th><?php echo __('Twitter'); ?></th>
		<th><?php echo __('Street'); ?></th>
		<th><?php echo __('Street2'); ?></th>
		<th><?php echo __('City Id'); ?></th>
		<th><?php echo __('State Iso'); ?></th>
		<th><?php echo __('Zip Code'); ?></th>
		<th><?php echo __('Meta Title'); ?></th>
		<th><?php echo __('Meta Keyword'); ?></th>
		<th><?php echo __('Meta Desc'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($category['Business'] as $business): ?>
		<tr>
			<td><?php echo $business['id']; ?></td>
			<td><?php echo $business['membership_id']; ?></td>
			<td><?php echo $business['listing_type_id']; ?></td>
			<td><?php echo $business['name']; ?></td>
			<td><?php echo $business['title']; ?></td>
			<td><?php echo $business['pname']; ?></td>
			<td><?php echo $business['description']; ?></td>
			<td><?php echo $business['phone']; ?></td>
			<td><?php echo $business['email']; ?></td>
			<td><?php echo $business['website']; ?></td>
			<td><?php echo $business['facebook']; ?></td>
			<td><?php echo $business['twitter']; ?></td>
			<td><?php echo $business['street']; ?></td>
			<td><?php echo $business['street2']; ?></td>
			<td><?php echo $business['city_id']; ?></td>
			<td><?php echo $business['state_iso']; ?></td>
			<td><?php echo $business['zip_code']; ?></td>
			<td><?php echo $business['meta_title']; ?></td>
			<td><?php echo $business['meta_keyword']; ?></td>
			<td><?php echo $business['meta_desc']; ?></td>
			<td><?php echo $business['slug']; ?></td>
			<td><?php echo $business['status']; ?></td>
			<td><?php echo $business['created']; ?></td>
			<td><?php echo $business['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'businesses', 'action' => 'view', $business['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'businesses', 'action' => 'edit', $business['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'businesses', 'action' => 'delete', $business['id']), null, __('Are you sure you want to delete # %s?', $business['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Business'), array('controller' => 'businesses', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
