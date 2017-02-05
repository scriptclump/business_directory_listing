<!-- <div class="md-modal md-dark md-effect-3" id="dark-primary">
    <div class="md-content">
      <div class="modal-header">
        <h3>Copy</h3>
        <button type="button" class="close md-close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <div class="i-circle info"><i class="fa fa-check"></i></div>
          <h4><strong>Are you sure you want to copy the data ?</strong></h4>
          <h5>Copying the data will duplicate the record.</h5>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-mono2 btn-flat md-close" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary btn-mono2 btn-flat md-close" data-dismiss="modal">Proceed</button>
      </div>
    </div>
</div>

<div class="md-modal md-dark danger md-effect-3" id="dark-red">
    <div class="md-content">
      <div class="modal-header">
        <h3>Remove</h3>
        <button type="button" class="close md-close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <div class="i-circle warning"><i class="fa fa-warning"></i></div>
          <h4><strong>Are you sure you want to remove the data ?</strong></h4>
          <h5>Deleted data can't be recovered.</h5>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-mono2 btn-flat md-close" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger btn-mono2 btn-flat md-close" data-dismiss="modal">Proceed</button>
      </div>
    </div>
</div>
 -->
<div class="md-overlay"></div>
	<div class="page-head"><ol class="breadcrumb">
    <li class="active"><i class="fa fa-plus-square"></i>&nbsp;<?php echo $this->Html->link(__('New Category'), array('action' => 'add')); ?></li>
  </ol></div>
	<div class="block block-color primary">
	  <div class="header">
	    <h3><?php echo __('Categories'); ?></h3>
	  </div>

	  <div class="content">
	    <div class="table-responsive">
		    <table class="table table-bordered" id="datatable2" >
			    <thead>
			        <tr>
    						<th><?php echo __('ID'); ?></th>
    						<th><?php echo __('Title'); ?></th>
                <th><?php echo __('Parent Category'); ?></th>
                <th><?php echo __('Status'); ?></th>
    						<th><?php echo __('Created'); ?></th>
    						<th><?php echo __('Modified'); ?></th>
    						<th><?php echo __('Actions'); ?></th>
    					</tr>
			      </thead>
			      <tbody>
			        <?php
              foreach ($categories as $category): ?>
					<tr>
						<td><?php echo h($category['Category']['id']) ?></td>
						<td><?php echo h($category['Category']['title']);  ?></td>
            <td><?php if($category['ParentCategory']['id'] != 0) {
                          echo $this->Html->link($category['ParentCategory']['title'], array('controller' => 'categories', 'action' => 'view', $category['ParentCategory']['id']));
                      } else {
                          echo 'Itself a parent';
                      }  ?></td>
            <td><?php echo $this->Html->link($this->Html->image('icon_' . $category['Category']['status'] . '.png'), array('controller' => 'categories', 'action' => 'switch', 'status', $category['Category']['id']), array('class' => 'status', 'escape' => false)); ?></td>
						<td><?php echo h($category['Category']['created']); ?></td>
						<td><?php echo h($category['Category']['modified']); ?></td>
						<td><div class="btn-group">
			                 <button class="btn btn-default btn-xs" type="button">Actions</button><button data-toggle="dropdown" class="btn btn-xs btn-primary dropdown-toggle" type="button"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
			                 <ul role="menu" class="dropdown-menu">
			                    <li><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $category['Category']['id'])); ?></li>
			                    <!-- <li><a href="javascript:;" class="md-trigger" data-modal="dark-primary">Copy</a></li> -->
			                    <li><?php echo $this->Html->link(__('Details'), array('action' => 'view', $category['Category']['id'])); ?></li>
			                    <li class="divider"></li>
			                    <li><!-- <a href="javascript:;" class="md-trigger" data-modal="dark-red">Remove</a> -->
<?php //  echo $this->Form->postLink(__('Delete'),
//             array('action' => 'delete', $category['Category']['id']),
//             array('class'=>'md-trigger', 'escape' => false, 'data-modal' => "dark-red"),
//             __('asd', $category['Category']['id']));
//
            echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $category['Category']['id']), null, __('Are you sure you want to delete # %s?', $category['Category']['id']));
            ?>
			                   </li>
			                 </ul>
			              </div>
						</td>
					</tr>
					<?php endforeach; ?>
			    </tbody>
		    </table>
		</div>
	  </div>
	</div>


<?php echo $this->Html->css(
			array(
				'/back_end/js/jquery.datatables/bootstrap-adapter/css/datatables'
				)
			);
	  echo $this->Html->script(
			array(
				'/back_end/js/jquery.datatables/jquery.datatables.min',
				'/back_end/js/jquery.datatables/bootstrap-adapter/js/datatables'
				)
			);
?>

<script type="text/javascript">
  $(document).ready(function(){
    /*
     * Initialse DataTables, with no sorting on the 'details' column
     */
    var oTable = $('#datatable2').dataTable( {
        "aoColumnDefs": [
            { "bSortable": false, "aTargets": [ 3,6 ] }
        ],
        "aaSorting": [[0, 'desc']],
        "bStateSave": true
    });


    $('.dataTables_filter input').addClass('form-control').attr('placeholder','Search');
    $('.dataTables_length select').addClass('form-control');

  });
</script>