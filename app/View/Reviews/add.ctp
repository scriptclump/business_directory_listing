<div class="bread_crumb">
	<?php
        $this->request->data['Review']['business_id'] = $businesses['Business']['id'];
		$this->Html->addCrumb('Home', '/');
		$this->Html->addCrumb('Categories', '/categories');
		$this->Html->addCrumb($businesses['Business']['name'], array('controller' => 'business', 'action' => $businesses['Business']['slug']));;
		echo $this->Html->getCrumbList();
	?>
</div>

<div class="reviews_box">
    <?php echo $this->Session->flash(); ?>
	<h1>Rate the <?=$businesses['Business']['name']?></h1>
    <div class="rate_it">
    	<span>Rate it</span>
        <div class="rate_it_img" id="rate_star">
        </div>
        <div id="score"></div>
    </div>
    <div class="rate_it_form">
        <?php
          $inputDefaults = array(
            'class'         => 'form-horizontal',
            'inputDefaults' => array(
                'label'         => false,
                'div'           => false,
                'error'         => array(
                'attributes'    => array('wrap' => 'span', 'class' => 'help-inline')
                )
            ),
            //'url' => array('action' => 'register')
          );
          echo $this->Form->create('Review', $inputDefaults);
          echo $this->Form->input('business_id', array('type' => 'hidden') );
          echo $this->Form->input('rating', array('type' => 'hidden') );
        ?>
        	<div class="rate_it_form_top">
            	<div class="rate_it_form_col">
                	<label>Name: <span>*</span></label>
                    <?php echo $this->Form->input('name'); ?>
                    <label>Comment Title: <span>*</span></label>
                    <?php echo $this->Form->input('comment_title'); ?>
                    <label>E-mail: <span>*</span></label>
                    <?php echo $this->Form->input('email'); ?>
                    <label>City, State: <span>*</span></label>
                    <?php echo $this->Form->input('city'); ?>
                </div>
                <div class="rate_it_form_col right">
                	<label>Comment: <span>*</span></label>
                    <?php echo $this->Form->input('comment'); ?>
                </div>
            </div>
            <div class="rate_it_form_bottom">
            	<label>Please enter the result of the given math. This is required to prevent SPAM, automated submission of reviews.</label>
                <?php
                    $captcha_settings['model'] = 'Review';
                    $captcha_settings['field'] = 'security_code';
                    $captcha_settings['type']  = 'math'; // image
                    $this->Captcha->render($captcha_settings);
                ?>
            </div>
            <input name="" type="submit" value="Send">
        <?php echo $this->Form->end(); ?>
    </div>
</div>
<?php
echo $this->Html->script(
    array(
        '/front_end/raty/jquery.raty.min'
        )
    );
?>
<script>
 $(function() {
    $.fn.raty.defaults.path = '<?=$this->webroot?>front_end/raty/img/';
    $.fn.raty.defaults.width = 187;
    $.fn.raty.defaults.half = true;
    $.fn.raty.defaults.name = 'sdfsf';
    // $.fn.raty.defaults.hints = true;
    //
    $('#rate_star').raty({
      click: function(score, evt) {
         document.getElementById("ReviewRating").value = score;
      }
    });
});

</script>
<!-- Form validation -->
<?php
echo $this->Html->css(
    array(
        '/front_end/jquery_validate/css/screen'
        )
    );
echo $this->Html->script(
    array(
        '/front_end/jquery_validate/jquery.validate.min'
        )
    );
?>
<script type="text/javascript">
$(document).ready(function() {
    $("#ReviewAddForm").validate({
        rules: {
            "data[Review][name]"                    : "required",
            "data[Review][comment_title]"           : "required",
            "data[Review][email]"                   : {
                                                          required: true,
                                                          email: true
                                                        },
            "data[Review][city]"                    : "required",
            "data[Review][comment]"                 : "required",
            "data[Review][security_code]"           : "required",
            "data[Review][rating]"                  : "required"
        },
        messages: {
            "data[Review][name]"                    : "<?=__('Please enter the name')?>",
            "data[Review][comment_title]"           : "<?=__('Please enter the comment title')?>",
            "data[User][email]"                     : {
                                                          required: "<?=__('Please enter the email address')?>",
                                                          email: "<?=__('Please enter the correct email address')?>"
                                                        },
            "data[Review][city]"                    : "<?=__('Please enter the city, state')?>",
            "data[Review][comment]"                 : "<?=__('Please enter the comment')?>",
            "data[Review][security_code]"           : "<?=__('Please enter the math result')?>",
            "data[Review][rating]"                  : "<?=__('Please select the stars')?>"
        }
    });
});
</script>

