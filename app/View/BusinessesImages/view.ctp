<div class="businessesImages view">
<h2><?php echo __('Businesses Image'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($businessesImage['BusinessesImage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($businessesImage['User']['id'], array('controller' => 'users', 'action' => 'view', $businessesImage['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Img Src'); ?></dt>
		<dd>
			<?php echo h($businessesImage['BusinessesImage']['img_src']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Img Src Small'); ?></dt>
		<dd>
			<?php echo h($businessesImage['BusinessesImage']['img_src_small']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Img Src Medium'); ?></dt>
		<dd>
			<?php echo h($businessesImage['BusinessesImage']['img_src_medium']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Businesses Image'), array('action' => 'edit', $businessesImage['BusinessesImage']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Businesses Image'), array('action' => 'delete', $businessesImage['BusinessesImage']['id']), null, __('Are you sure you want to delete # %s?', $businessesImage['BusinessesImage']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Businesses Images'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Businesses Image'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
