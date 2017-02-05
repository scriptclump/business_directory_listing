<div class="reviews_box">
	<h1>Register</h1>
    <div class="rate_it_form">
    	<?php
          echo $this->Session->flash();
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
          echo $this->Form->create('User', $inputDefaults);
        ?>
            <div class="rate_it_form_row">
            	<div class="rate_it_form_col">
                	<label>First Name: <span>*</span></label>
                    <?php echo $this->Form->input('Business.fname', array('type' => 'text' )); ?>
                </div>
                <div class="rate_it_form_col right">
                	<label>Last Name: <span>*</span></label>
                   <?php echo $this->Form->input('Business.lname', array('type' => 'text' )); ?>
                </div>
            </div>
            <div class="rate_it_form_row">
            	<div class="rate_it_form_col">
                	<label>Email: <span>*</span></label>
                    <?php echo $this->Form->input('email', array('type' => 'email' )); ?>
                </div>
                <div class="rate_it_form_col right">
                	<label>Company:</label>
                    <?php echo $this->Form->input('Business.company', array('type' => 'text' )); ?>
                </div>
            </div>
            <div class="rate_it_form_row">
            	<div class="rate_it_form_col">
                	<label>Address Line1:</label>
                    <?php echo $this->Form->input('Business.street', array('type' => 'text' )); ?>
                    <span class="sub_des">Street Address, P.O. box</span>
                </div>
                <div class="rate_it_form_col right">
                	<label>Address Line2:</label>
                    <?php echo $this->Form->input('Business.street2', array('type' => 'text' )); ?>
                    <span class="sub_des">Apartment, suite, unit, building, floor, etc.</span>
                </div>
            </div>
            <div class="rate_it_form_row">
            	<div class="rate_it_form_col">
                	<label>Country: <span>*</span></label>
                    <?php echo $this->Form->input(
                        'Business.country_iso',
                        array('options' => $countries, 'default' => 'US')
                    );

                     ?>
                </div>
                <div class="rate_it_form_col right">
                	<label>State: <span>*</span></label>
                   <?php echo $this->Form->input('Business.state_iso', array('options' => $states, 'empty' => '(choose one)' )); ?>
                </div>
            </div>
            <div class="rate_it_form_row">
            	<div class="rate_it_form_col">
                	<label>City: <span>*</span></label>
                    <?php echo $this->Form->input('Business.city_id', array()); ?>
                </div>
                <div class="rate_it_form_col right">
                	<label>Zipcode: <span>*</span></label>
                    <?php echo $this->Form->input('Business.zip_code', array()); ?>
                </div>
            </div>
            <div class="rate_it_form_row">
            	<div class="rate_it_form_col">
                	<label>Phone: <span>*</span></label>
                    <?php echo $this->Form->input('Business.phone', array()); ?>
                </div>
                <div class="rate_it_form_col right">
                	<label>Fax:</label>
                    <?php echo $this->Form->input('Business.fax', array()); ?>
                </div>
            </div>
            <input name="" type="submit" value="Submit">
        <?php echo $this->Form->end(); ?>
    </div>
</div>
<?php
$this->Js->get('#BusinessStateIso')->event('change',
  $this->Js->request(array(
                    'controller'=>'users',
                    'action'=>'state_to_cityAjax'
                    ), array(
                        'update'=>'#BusinessCityId',
                        'async' => true,
                        'method' => 'post',
                        'dataExpression'=>true,
                        'data'=> $this->Js->serializeForm(array(
                          'isForm' => true,
                          'inline' => true
                          ))
                    ))
  );
?>

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
    $("#UserRegisterForm").validate({
        rules: {
            "data[Business][fname]"                    : "required",
            "data[Business][lname]"                    : "required",
            "data[User][email]"                        : {
                                                          required: true,
                                                          email: true
                                                        },
            "data[Business][country_iso]"               : "required",
            "data[Business][state_iso]"                 : "required",
            "data[Business][city_id]"                   : "required",
            "data[Business][zip_code]"                  : "required",
            "data[Business][phone]"                     : "required"
        },
        messages: {
            "data[Business][fname]"                  : "<?=__('Please enter the first name')?>",
            "data[Business][lname]"                  : "<?=__('Please enter the last name')?>",
            "data[User][email]"                      : {
                                                          required: "<?=__('Please enter the email address')?>",
                                                          email: "<?=__('Please enter the correct email address')?>"
                                                        },
            "data[Business][country_iso]"            : "<?=__('Please select the country')?>",
            "data[Business][state_iso]"              : "<?=__('Please select the state')?>",
            "data[Business][city_id]"                : "<?=__('Please select the city')?>",
            "data[Business][zip_code]"               : "<?=__('Please enter the zip code')?>",
            "data[Business][phone]"                  : "<?=__('Please enter the phone')?>"
        }
    });
});
</script>