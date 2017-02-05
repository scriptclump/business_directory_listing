<div class="reviews_box">
	<h1>Login</h1>
	<div class="rate_it_form">
		<?php
			echo $this->Session->flash();
			echo $this->Form->create('User', array(
			    'url' => array(
			        'controller' => 'users',
			        'action' => 'login'
			    )
			));
		?>
	    	<div class="rate_it_form_top">
	        	<div class="rate_it_form_col">
	               <?php
					echo $this->Form->input('User.username');
					echo $this->Form->input('User.password');
	               ?>
	            </div>
	        </div>
	    <?php echo $this->Form->end('Submit'); ?>
	</div>
</div>

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
    $("#UserLoginForm").validate({
        rules: {
            "data[User][username]"                        : {
                                                          required: true,
                                                          email: true
                                                        },
            "data[User][password]"               : "required"
        },
        messages: {
            "data[User][username]"                      : {
                                                          required: "<?=__('Please enter the email address')?>",
                                                          email: "<?=__('Please enter the correct email address')?>"
                                                        },
            "data[User][password]"            : "<?=__('Please enter the password')?>"
        }
    });
});
</script>