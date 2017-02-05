    <div class="page-head"><ol class="breadcrumb">
        <li><i class="fa fa-pencil-square-o"></i>&nbsp;<?php echo $this->Html->link(__('Edit Advertisement'), array('action' => 'edit', $advertisement['Advertisement']['id'])); ?> </li>
        <li><i class="fa fa-times"></i>&nbsp;<?php echo $this->Form->postLink(__('Delete Advertisement'), array('action' => 'delete', $advertisement['Advertisement']['id']), null, __('Are you sure you want to delete # %s?', $advertisement['Advertisement']['id'])); ?> </li>
        <li><i class="fa fa-plus-square"></i>&nbsp;<?php echo $this->Html->link(__('New Advertisement'), array('action' => 'add')); ?> </li>
  </ol></div>
    <div class="block block-color primary">
      <div class="header">
        <h3><?php echo __('Advertisement'); ?></h3>
      </div>
      <div class="content">
        <div class="table-responsive">
            <table class="table-bordered table-striped">
                <tbody>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('ID'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($advertisement['Advertisement']['id']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Advertisement Position'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo ($advertisement['Advertisement']['ad_pos'] == '1') ? "Top Banner" : "Left Side Banner"; ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Advertisement Type'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo ($advertisement['Advertisement']['ad_type'] == "0") ? "Image" : "Google adsense"; ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Title'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($advertisement['Advertisement']['title']); ?></td>
                    </tr>
                    <?php if($advertisement['Advertisement']['ad_type'] == "0"){ ?>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Image'); ?></strong></td>
                        <td width="75%" valign="top"><?php if($advertisement['Advertisement']['file_src'] != "") {
                                      echo $this->Html->image('/'.$advertisement['Advertisement']['file_src'], array('alt' => h($advertisement['Advertisement']['title'])  ));
                                  } else {
                                      echo 'No Image';
                                  }  ?></td>
                    </tr>
                    <?php } ?>
                    <?php if($advertisement['Advertisement']['ad_type'] == "1"){ ?>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Google Adsense'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo  h($advertisement['Advertisement']['google_adsense']); ?></td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Status'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($advertisement['Advertisement']['status']==0?"Inactive":"Active"); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Created'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($advertisement['Advertisement']['created']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Modified'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($advertisement['Advertisement']['modified']); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
      </div>
