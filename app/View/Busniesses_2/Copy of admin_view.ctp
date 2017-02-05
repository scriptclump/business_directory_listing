<div class="busniesses view">
<h2><?php echo __('Busniess'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($busniess['Busniess']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Membership'); ?></dt>
		<dd>
			<?php echo $this->Html->link($busniess['Membership']['title'], array('controller' => 'memberships', 'action' => 'view', $busniess['Membership']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($busniess['Busniess']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($busniess['Busniess']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pname'); ?></dt>
		<dd>
			<?php echo h($busniess['Busniess']['pname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($busniess['Busniess']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($busniess['Busniess']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($busniess['Busniess']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Website'); ?></dt>
		<dd>
			<?php echo h($busniess['Busniess']['website']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Facebook'); ?></dt>
		<dd>
			<?php echo h($busniess['Busniess']['facebook']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Twitter'); ?></dt>
		<dd>
			<?php echo h($busniess['Busniess']['twitter']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Street'); ?></dt>
		<dd>
			<?php echo h($busniess['Busniess']['street']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Street2'); ?></dt>
		<dd>
			<?php echo h($busniess['Busniess']['street2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo $this->Html->link($busniess['City']['id'], array('controller' => 'cities', 'action' => 'view', $busniess['City']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo $this->Html->link($busniess['State']['state_iso'], array('controller' => 'states', 'action' => 'view', $busniess['State']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Zip Code'); ?></dt>
		<dd>
			<?php echo h($busniess['Busniess']['zip_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meta Title'); ?></dt>
		<dd>
			<?php echo h($busniess['Busniess']['meta_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meta Keyword'); ?></dt>
		<dd>
			<?php echo h($busniess['Busniess']['meta_keyword']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meta Desc'); ?></dt>
		<dd>
			<?php echo h($busniess['Busniess']['meta_desc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($busniess['Busniess']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($busniess['Busniess']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($busniess['Busniess']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($busniess['Busniess']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Busniess'), array('action' => 'edit', $busniess['Busniess']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Busniess'), array('action' => 'delete', $busniess['Busniess']['id']), null, __('Are you sure you want to delete # %s?', $busniess['Busniess']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Busniesses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Busniess'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Memberships'), array('controller' => 'memberships', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Membership'), array('controller' => 'memberships', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cities'), array('controller' => 'cities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New City'), array('controller' => 'cities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List States'), array('controller' => 'states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New State'), array('controller' => 'states', 'action' => 'add')); ?> </li>
	</ul>
</div>
