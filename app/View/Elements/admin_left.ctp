 <div class="cl-sidebar">
    <div class="cl-toggle"><i class="fa fa-bars"></i></div>
    <div class="cl-navblock">
      <div class="menu-space">
        <div class="content">
          <div class="sidebar-logo">
            <div class="logo">
                <a href="#">Pittsburgh
<br>
Black Business Directory</a>
            </div>
          </div>
          <? //echo $this->params['controller']; echo '<br />'; echo  $this->params['action'];?>
          <ul class="cl-vnavigation">
            <li <?php echo ($this->params['controller'] == 'dashboards')? 'class="active"' : ''?> >
            <?php echo $this->Html->link('<i class="fa fa-home"></i><span>Dashboard</span>',
									    array(
									        'controller' => 'dashboards',
									        'action' => 'index'
									    ),
									    array('escape' => false)
      			); ?>
      			</li>
            <li class="parent"><?php echo $this->Html->link('<i class="fa fa-file-text"></i><span>Page Module</span>',
                      array(
                          'controller' => 'cmspages',
                          'action' => 'index'
                      ),
                      array('escape' => false)
               ); ?>
              <ul class="sub-menu">
                <li <?php echo ( $this->params['controller'] == 'cmspages' && $this->params['action'] !='admin_add' && $this->params['action'] !='admin_order' )? 'class="active"' : ''?> ><?php echo $this->Html->link('<i class="fa fa-bars"></i> Pages',
                      array(
                          'controller' => 'cmspages',
                          'action' => 'index'
                      ),
                      array('escape' => false)
                 ); ?></li>
                <li <?php echo ( $this->params['controller'] == 'cmspages' && $this->params['action'] =='admin_add' )? 'class="active"' : ''?> ><?php echo $this->Html->link('<i class="fa fa-plus-square"></i> New Page',
                      array(
                          'controller' => 'cmspages',
                          'action' => 'add'
                      ),
                      array('escape' => false)
                 ); ?>
                </li>
              </ul>
            </li>
            <li class="parent"><?php echo $this->Html->link('<i class="fa fa-picture-o"></i><span>Inner Page Banner Module</span>',
                      array(
                          'controller' => 'SlidingBanners',
                          'action' => 'index'
                      ),
                      array('escape' => false)
               ); ?>
              <ul class="sub-menu">
                <li <?php echo ( $this->params['controller'] == 'SlidingBanners' && $this->params['action'] !='admin_add' && $this->params['action'] !='admin_order' )? 'class="active"' : ''?> ><?php echo $this->Html->link('<i class="fa fa-bars"></i> Inner Page Banners',
                      array(
                          'controller' => 'SlidingBanners',
                          'action' => 'index'
                      ),
                      array('escape' => false)
                 ); ?></li>
               <!--  <li <?php echo ( $this->params['controller'] == 'SlidingBanners' && $this->params['action'] =='admin_add' )? 'class="active"' : ''?> ><?php echo $this->Html->link('<i class="fa fa-plus-square"></i> New Inner Page Banner',
                      array(
                          'controller' => 'SlidingBanners',
                          'action' => 'add'
                      ),
                      array('escape' => false)
                 ); ?>
                </li> -->
              </ul>
            </li>
            <li class="parent"><?php echo $this->Html->link('<i class="fa fa-sitemap"></i><span>Listing Type Module</span>',
                      array(
                          'controller' => 'listing_types',
                          'action' => 'index'
                      ),
                      array('escape' => false)
               ); ?>
              <ul class="sub-menu">
                <li <?php echo ( $this->params['controller'] == 'listing_types' && $this->params['action'] !='admin_add' && $this->params['action'] !='admin_order' )? 'class="active"' : ''?> ><?php echo $this->Html->link('<i class="fa fa-bars"></i> Listing Types',
                      array(
                          'controller' => 'listing_types',
                          'action' => 'index'
                      ),
                      array('escape' => false)
                 ); ?></li>
                <li <?php echo ( $this->params['controller'] == 'listing_types' && $this->params['action'] =='admin_add' )? 'class="active"' : ''?> ><?php echo $this->Html->link('<i class="fa fa-plus-square"></i> New Listing Type',
                      array(
                          'controller' => 'listing_types',
                          'action' => 'add'
                      ),
                      array('escape' => false)
                 ); ?>
                </li>
              </ul>
            </li>
            <li class="parent"><?php echo $this->Html->link('<i class="fa fa-sitemap"></i><span>Category Module</span>',
                      array(
                          'controller' => 'categories',
                          'action' => 'index'
                      ),
                      array('escape' => false)
               ); ?>
              <ul class="sub-menu">
                <li <?php echo ( $this->params['controller'] == 'categories' && $this->params['action'] !='admin_add' && $this->params['action'] !='admin_order' )? 'class="active"' : ''?> ><?php echo $this->Html->link('<i class="fa fa-bars"></i> Categories',
                      array(
                          'controller' => 'categories',
                          'action' => 'index'
                      ),
                      array('escape' => false)
                 ); ?></li>
                <li <?php echo ( $this->params['controller'] == 'categories' && $this->params['action'] =='admin_add' )? 'class="active"' : ''?> ><?php echo $this->Html->link('<i class="fa fa-plus-square"></i> New Category',
                      array(
                          'controller' => 'categories',
                          'action' => 'add'
                      ),
                      array('escape' => false)
                 ); ?>
                </li>
              </ul>
            </li>
            <li class="parent"><?php echo $this->Html->link('<i class="fa fa-user"></i><span>User Module</span>',
                      array(
                          'controller' => 'users',
                          'action' => 'index'
                      ),
                      array('escape' => false)
               ); ?>
              <ul class="sub-menu">
                <li <?php echo ( $this->params['controller'] == 'users' && $this->params['action'] !='admin_add' && $this->params['action'] !='admin_order' )? 'class="active"' : ''?> ><?php echo $this->Html->link('<i class="fa fa-bars"></i> Users',
                      array(
                          'controller' => 'users',
                          'action' => 'index'
                      ),
                      array('escape' => false)
                 ); ?></li>
                <!-- <li <?php echo ( $this->params['controller'] == 'users' && $this->params['action'] =='admin_add' )? 'class="active"' : ''?> ><?php echo $this->Html->link('<i class="fa fa-plus-square"></i> New User',
                      array(
                          'controller' => 'users',
                          'action' => 'add'
                      ),
                      array('escape' => false)
                 ); ?>
                </li> -->
              </ul>
            </li>
            <li class="parent"><a href="#"><i class="fa fa-bold"></i><span>Business Module</span></a>
              <ul class="sub-menu">
                <li <?php echo ( $this->params['controller'] == 'businesses' && $this->params['action'] !='admin_add' && $this->params['action'] !='admin_order' )? 'class="active"' : ''?> ><?php echo $this->Html->link('<i class="fa fa-bars"></i> Business',
                      array(
                          'controller' => 'businesses',
                          'action' => 'index'
                      ),
                      array('escape' => false)
                 ); ?></li>
                <li <?php echo ( $this->params['controller'] == 'businesses' && $this->params['action'] =='admin_add' )? 'class="active"' : ''?> ><?php echo $this->Html->link('<i class="fa fa-plus-square"></i> New Busniesse',
                      array(
                          'controller' => 'businesses',
                          'action' => 'add'
                      ),
                      array('escape' => false)
                 ); ?>
                </li>
               </ul>
            </li>
            <li class="parent"><?php echo $this->Html->link('<i class="fa fa-volume-up"></i><span>Review Module</span>',
                      array(
                          'controller' => 'reviews',
                          'action' => 'index'
                      ),
                      array('escape' => false)
               ); ?>
              <ul class="sub-menu">
                <li <?php echo ( $this->params['controller'] == 'reviews' && $this->params['action'] !='admin_add' && $this->params['action'] !='admin_order' )? 'class="active"' : ''?> ><?php echo $this->Html->link('<i class="fa fa-bars"></i> Reviews',
                      array(
                          'controller' => 'reviews',
                          'action' => 'index'
                      ),
                      array('escape' => false)
                 ); ?></li>
              </ul>
            </li>
            <li class="parent"><a href="#"><i class="fa fa-user"></i><span>Membership Module</span></a>
              <ul class="sub-menu">
                <li <?php echo ( $this->params['controller'] == 'memberships' && $this->params['action'] !='admin_add' && $this->params['action'] !='admin_order' )? 'class="active"' : ''?> ><?php echo $this->Html->link('<i class="fa fa-male"></i> Memberships',
                      array(
                          'controller' => 'memberships',
                          'action' => 'index'
                      ),
                      array('escape' => false)
                 ); ?></li>
               </ul>
            </li>
            <li class="parent"><?php echo $this->Html->link('<i class="fa fa-road"></i><span>State Module</span>',
                      array(
                          'controller' => 'states',
                          'action' => 'index'
                      ),
                      array('escape' => false)
               ); ?>
              <ul class="sub-menu">
                <li <?php echo ( $this->params['controller'] == 'states' && $this->params['action'] !='admin_add' && $this->params['action'] !='admin_order' )? 'class="active"' : ''?> ><?php echo $this->Html->link('<i class="fa fa-bars"></i> States',
                      array(
                          'controller' => 'states',
                          'action' => 'index'
                      ),
                      array('escape' => false)
                 ); ?></li>
               <!--  <li <?php echo ( $this->params['controller'] == 'states' && $this->params['action'] =='admin_add' )? 'class="active"' : ''?> ><?php echo $this->Html->link('<i class="fa fa-road"></i> New Banner',
                      array(
                          'controller' => 'states',
                          'action' => 'add'
                      ),
                      array('escape' => false)
                 ); ?>
                </li> -->
              </ul>
            </li>
            <li class="parent"><?php echo $this->Html->link('<i class="fa fa-road"></i><span>City Module</span>',
                      array(
                          'controller' => 'cities',
                          'action' => 'index'
                      ),
                      array('escape' => false)
               ); ?>
              <ul class="sub-menu">
                <li <?php echo ( $this->params['controller'] == 'cities' && $this->params['action'] !='admin_add' && $this->params['action'] !='admin_order' )? 'class="active"' : ''?> ><?php echo $this->Html->link('<i class="fa fa-bars"></i> Cities',
                      array(
                          'controller' => 'cities',
                          'action' => 'index'
                      ),
                      array('escape' => false)
                 ); ?></li>
                <!-- <li <?php echo ( $this->params['controller'] == 'cities' && $this->params['action'] =='admin_add' )? 'class="active"' : ''?> ><?php echo $this->Html->link('<i class="fa fa-plus-square"></i> New city',
                      array(
                          'controller' => 'cities',
                          'action' => 'add'
                      ),
                      array('escape' => false)
                 ); ?>
                </li> -->
              </ul>
            </li>
            <li class="parent"><?php echo $this->Html->link('<i class="fa fa-volume-up"></i><span>Advertisement Module</span>',
                      array(
                          'controller' => 'advertisements',
                          'action' => 'index'
                      ),
                      array('escape' => false)
               ); ?>
              <ul class="sub-menu">
                <li <?php echo ( $this->params['controller'] == 'advertisements' && $this->params['action'] !='admin_add' && $this->params['action'] !='admin_order' )? 'class="active"' : ''?> ><?php echo $this->Html->link('<i class="fa fa-bars"></i> Advertisement',
                      array(
                          'controller' => 'advertisements',
                          'action' => 'index'
                      ),
                      array('escape' => false)
                 ); ?></li>
                <li <?php echo ( $this->params['controller'] == 'advertisements' && $this->params['action'] =='admin_add' )? 'class="active"' : ''?> ><?php echo $this->Html->link('<i class="fa fa-plus-square"></i> New Advertisement',
                      array(
                          'controller' => 'advertisements',
                          'action' => 'add'
                      ),
                      array('escape' => false)
                 ); ?>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      <div class="text-right collapse-button" style="padding:7px 9px;">
        <button id="sidebar-collapse" class="btn btn-default" style=""><i style="color:#fff;" class="fa fa-angle-left"></i></button>
      </div>
    </div>
  </div>