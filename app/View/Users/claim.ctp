<div class="reviews_box">
	<h1>Claim the "<?=$business['Business']['name']?>" as your listing</h1>
	<div class="rate_it_form">
		<?php
			echo $this->Session->flash();
            $inputDefaults = array(
                    'class'         => 'form-horizontal',
                    'inputDefaults' => array(
                       // 'label'         => false,
                        'div'           => false,
                        'error'         => array(
                            'attributes'    => array('wrap' => 'span', 'class' => 'help-inline')
                            )
                        ),
                        'url' => array(
                            'controller' => 'users',
                            'action' => 'claim/'.$this->params['pass'][0]
                        )
                  );
			echo $this->Form->create('User', $inputDefaults);
		?>
	    	<div class="rate_it_form_top">
	        	<div class="rate_it_form_col">
	               <?php
					echo $this->Form->input('Business.fname', array('label' => 'First Name'));
					echo $this->Form->input('Business.lname', array('label' => 'Last Name'));
                    echo $this->Form->input('email', array('type' => 'email'));
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
            "data[Business][fname]"                 : "required",
            "data[Business][lname]"                 : "required",
            "data[User][email]"                     :   {
                                                          required: true,
                                                          email: true
                                                        }
        },
        messages: {
            "data[Business][fname]"                 : "<?=__('Please enter first name')?>",
            "data[Business][lname]"                 : "<?=__('Please enter last name')?>",
            "data[User][email]"                     : {
                                                        required: "<?=__('Please enter email')?>",
                                                        email: "<?=__('Please enter the correct email address')?>"
                                                    }
        }
    });
});
</script>