 <div id="head-nav" class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-collapse">
        <ul class="nav navbar-nav navbar-right user-nav">
          <li class="dropdown profile_menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img alt="Avatar" src="<?php echo $this->webroot; ?>/back_end/images/admin-icon.png" /><span>Administrator</span> <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="<?=BASE_URL?>" target="_blank">Visit the Website</a></li>
              <li><?php echo $this->Html->link('Dashboard',array(
                          'controller' => 'dashboards',
                          'action' => 'index'
                      )); ?>
              </li>
              <li><?php echo $this->Html->link('Settings',array(
                          'controller' => 'users',
                          'action' => 'settings/'.$_SESSION['Auth']['Admin']['id']
                      )); ?>
              </li>
              <!-- <li><a href="http://localhost/ci/current/admin/message/">Messages</a></li> -->
              <li class="divider"></li>
              <li><?php echo $this->Html->link('Sign Out',array(
                          'controller' => 'users',
                          'action' => 'admin_logout'
                      )); ?></li>
            </ul>
          </li>
        </ul>
        <!-- <ul class="nav navbar-nav not-nav">
          <li class="button dropdown">
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class=" fa fa-inbox"></i></a>
            <ul class="dropdown-menu messages">
              <li>
                <div class="nano nscroller">
                  <div class="content">
                    <ul>
                      <li>
                        <a href="#">
                          <img src="images/avatar6-2.jpg" alt="avatar" /><span class="date pull-right">13 Sept.</span> <span class="name">Daniel</span> Hey! How are you?
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <img src="images/avatar6-2.jpg" alt="avatar" /><span class="date pull-right">20 Oct.</span><span class="name">Adam</span> Hi! Can you fix my phone?
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <img src="images/avatar6-2.jpg" alt="avatar" /><span class="date pull-right">2 Nov.</span><span class="name">Michael</span> Regards!
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <img src="images/avatar6-2.jpg" alt="avatar" /><span class="date pull-right">2 Nov.</span><span class="name">Lucy</span> Hello, my name is Lucy
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <ul class="foot"><li><a href="http://localhost/ci/current/admin/message/">View all messages </a></li></ul>
              </li>
            </ul>
          </li>
        </ul> -->
      </div>
    </div>
</div>