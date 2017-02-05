	<div class="page-head"><ol class="breadcrumb">
   		<!-- <li><i class="fa fa-pencil-square-o"></i>&nbsp;<?php echo $this->Html->link(__('Edit Review'), array('action' => 'edit', $review['Review']['id'])); ?> </li> -->
   		<li><i class="fa fa-bars"></i>&nbsp;<?php echo $this->Html->link(__('List Reviews'), array('action' => 'index')); ?> </li>
		<li><i class="fa fa-times"></i>&nbsp;<?php echo $this->Form->postLink(__('Delete Review'), array('action' => 'delete', $review['Review']['id']), null, __('Are you sure you want to delete # %s?', $review['Review']['id'])); ?> </li>
		<!-- <li><i class="fa fa-plus-square"></i>&nbsp;<?php echo $this->Html->link(__('New Review'), array('action' => 'add')); ?> </li> -->
  </ol></div>
	<div class="block block-color primary">
	  <div class="header">
	    <h3><?php echo __('Review'); ?></h3>
	  </div>
	  <div class="content">
	    <div class="table-responsive">
			<table class="table-bordered table-striped">
                <tbody>
                    <tr>
                    	<td width="25%" valign="top"><strong><?php echo __('ID'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($review['Review']['id']); ?></td>
                    </tr>
                    <tr>
                    	<td width="25%" valign="top"><strong><?php echo __('Business'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo $this->Html->link($review['Business']['name'], array('controller' => 'businesses', 'action' => 'view', $review['Business']['id'])); ?></td>
                    </tr>
                    <tr>
                    	<td width="25%" valign="top"><strong><?php echo __('Name'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($review['Review']['name']); ?></td>
                    </tr>
                    <tr>
                    	<td width="25%" valign="top"><strong><?php echo __('Email'); ?></strong></td>
                        <td width="75%" valign="top"><a href="mailto:<?php echo h($review['Review']['email']); ?>"><?php echo h($review['Review']['email']); ?></a></td>
                    </tr>
                    <tr>
                    	<td width="25%" valign="top"><strong><?php echo __('Subject'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($review['Review']['comment_title']); ?></td>
                    </tr>
                    <tr>
                    	<td width="25%" valign="top"><strong><?php echo __('Comment'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($review['Review']['comment']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Status'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($review['Review']['status']==0?"Pending":"Approved"); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Created'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($review['Review']['created']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Modified'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($review['Review']['modified']); ?></td>
                    </tr>
                </tbody>
            </table>
		</div>
	  </div>