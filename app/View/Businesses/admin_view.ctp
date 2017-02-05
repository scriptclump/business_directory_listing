	<div class="page-head"><ol class="breadcrumb">
   		<li><i class="fa fa-pencil-square-o"></i>&nbsp;<?php echo $this->Html->link(__('Edit Business'), array('action' => 'edit', $business['Business']['id'])); ?> </li>
		<li><i class="fa fa-times"></i>&nbsp;<?php echo $this->Form->postLink(__('Delete Business'), array('action' => 'delete', $business['Business']['id']), null, __('Are you sure you want to delete # %s?', $business['Business']['id'])); ?> </li>
		<li><i class="fa fa-bars"></i>&nbsp;<?php echo $this->Html->link(__('List Business'), array('action' => 'index')); ?> </li>
  </ol></div>
	<div class="block block-color primary">
	  <div class="header">
	    <h3><?php echo __('Business'); ?></h3>
	  </div>
	  <div class="content">
	    <div class="table-responsive">
			<table class="table-bordered table-striped">
                <tbody>
                    <tr>
                    	<td width="25%" valign="top"><strong><?php echo __('ID'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($business['Business']['id']); ?></td>
                    </tr>
					<tr>
                        <td width="25%" valign="top"><strong><?php echo __('Name'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($business['Business']['name']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Membership'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo $this->Html->link($business['Membership']['title'], array('controller' => 'memberships', 'action' => 'view', $business['Membership']['id'])); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Title'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($business['Business']['title']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Person Name'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($business['Business']['pname']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Content'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo $business['Business']['description']; ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Phone'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($business['Business']['phone']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Email'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($business['Business']['alternate_email']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Website'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($business['Business']['website']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Facebook'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($business['Business']['facebook']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Twitter'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($business['Business']['twitter']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Street'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($business['Business']['street']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Street2'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($business['Business']['street2']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('City'); ?></strong></td>
                        <td width="75%" valign="top"><?php
                        if(count($cities) > 0){
                            echo h($cities['City']['city_name']);
                        } ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('State'); ?></strong></td>
                        <td width="75%" valign="top"><?php
                        if($states['State']['state_name'] =! "?land"){
                            echo h($states['State']['state_name']);
                        } ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Zip Code'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($business['Business']['zip_code']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Meta Title'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($business['Business']['meta_title']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Meta Keyword'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($business['Business']['meta_keyword']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Meta Description'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($business['Business']['meta_desc']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Status'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($business['Business']['status']==0?"Inactive":"Active"); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Created'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($business['Business']['created']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Modified'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($business['Business']['modified']); ?></td>
                    </tr>
                </tbody>
            </table>
		</div>
	  </div>
</div>

<div class="block block-color primary">
    <div class="header">
        <h3><?php echo __('Assigned Categories'); ?></h3>
    </div>
    <div class="content">
        <div class="table-responsive">
            <?php
            if (!empty($business['Category'])): ?>
                <table class="table table-bordered" id="datatable2" >
                    <thead>
                        <tr>
                            <th><strong><?php echo __('Id'); ?></strong></th>
                            <th><strong><?php echo __('Title'); ?></strong></th>
                            <th><strong><?php echo __('Created'); ?></strong></th>
                            <th><strong><?php echo __('Modified'); ?></strong></th>
                            <th><strong><?php echo __('Action'); ?></strong></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($business['Category'] as $category): ?>
                        <tr>
                            <td><?php echo $category['id']; ?></td>
                            <td><?php echo $category['title']; ?></td>
                            <td><?php echo $category['created']; ?></td>
                            <td><?php echo $category['modified']; ?></td>
                            <td><?php echo $this->Html->link(__('View'), array('controller' => 'categories', 'action' => 'view', $category['id'])); ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</div>