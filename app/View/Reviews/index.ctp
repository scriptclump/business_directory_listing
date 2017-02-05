<div class="bread_crumb">
   <?php
      $this->Html->addCrumb('Home', '/');
      $this->Html->addCrumb('Categories', '/categories');
     // $this->Html->addCrumb($category_businesses['Category']['title'], array('controller' => 'category', 'action' => $category_businesses['Category']['slug']));
      echo $this->Html->getCrumbList();
   ?>
</div>
<div class="reviews_box">
   <h1>Reviews of <?=$reviews[0]['Business']['name']?></h1>
</div>
<div class="listing_box_area review_list">
   <div class="review_box_area">
      <div class="review_listing_box">
         <?php foreach ($reviews as $review) {// pr($reviews); ?>
         <div class="review_listing_row">
            <ul>
               <li class="listing_auth"><strong>Name: </strong> <?php echo h($review['Review']['name']); ?></li>
               <li class="listing_email"><strong>Email: </strong> <a href="mailto:<?php echo h($review['Review']['email']); ?>"><?php echo h($review['Review']['email']); ?></a></li>
               <li class="status"><strong>Date:</strong> <?php echo h($review['Review']['created']); ?></li>
               <li class="details"><?php echo $this->Html->link( 'View', array('controller' => 'reviews', 'action' => 'view', $review['Review']['id']) ); ?></li>
              <!--    <li class="right_btn"><a class="approved" href="javascript:void(0);">approved</a></li> -->
            </ul>
         </div>
         <?php } ?>
      </div>
   </div>
</div>
<?php
if( $this->Paginator->params['paging']['Review']['pageCount'] > 1 ){ ?>
   <div class="listing_box_pagination">
      <div class="result_pagination">
          <ul>
            <?php
                echo $this->Paginator->prev( __('<i class="fa fa-angle-left"></i>'), array('escape'=>false, 'tag' => 'li'), null, array('escape'=>false, 'class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
                echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'active'));
                echo $this->Paginator->next( __('<i class="fa fa-angle-right"></i>'), array('escape'=>false, 'tag' => 'li'), null, array('escape'=>false, 'class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
             ?>
          </ul>
      </div>
   </div>
<?php } ?>
