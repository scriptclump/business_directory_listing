<div class="reviews_box">
	<h1>Kindly, pay using PayPal in order to claim this listing.</h1>
    <p><?php echo $this->Session->flash(); ?></p>
	<div class="rate_it_form">
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
            <input type="hidden" name="cmd" value="_s-xclick">
            <input type="hidden" name="hosted_button_id" value="ABAJXFX3BXVTN">
            <input type="image" style="border:none" src="https://www.paypalobjects.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
        </form>
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
            "data[User][username]"                      : {
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