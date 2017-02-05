<div class="bread_crumb">
	<?php
		$this->Html->addCrumb('Home', '/');
		$this->Html->addCrumb('Categories', '/categories');
		//$this->Html->addCrumb($category_businesses['Category']['title'], array('controller' => 'category', 'action' => $category_businesses['Category']['slug']));
		echo $this->Html->getCrumbList();
	?>
</div>
<div class="reviews_box">
   <h1>Reviews of <?=$review['Business']['name']?></h1>
</div>
<div class="categories_box_area">
           <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr>
              <td><strong><?php echo __('Business'); ?></strong>:</td>
              <td><?php echo h($review['Business']['name']); ?></td>
            </tr>
            <tr>
              <td><strong><?php echo __('Title'); ?></strong>:</td>
              <td><?php echo h($review['Review']['comment_title']); ?></td>
            </tr>
            <tr>
              <td><strong><?php echo __('Comment'); ?></strong>:</td>
              <td><?php echo h($review['Review']['comment']); ?></td>
            </tr>
            <tr>
              <td><strong><?php echo __('Rating'); ?></strong>:</td>
              <td><?php echo h($review['Review']['rating']); ?></td>
            </tr>
            <tr>
              <td><strong><?php echo __('Name'); ?></strong>:</td>
              <td><?php echo h($review['Review']['name']); ?></td>
            </tr>
            <tr>
              <td><strong><?php echo __('Email'); ?></strong>:</td>
              <td><?php echo h($review['Review']['email']); ?></td>
            </tr>
            <tr>
              <td><strong><?php echo __('City'); ?></strong>:</td>
              <td><?php echo h($review['Review']['city']); ?></td>
            </tr>
           </table>
         </div>