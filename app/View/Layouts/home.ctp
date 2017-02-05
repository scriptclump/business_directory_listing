<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'Pittsburgh Black Business Directory');
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8" />
<!-- Set the viewport width to device width for mobile -->
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>Welcome to Pittsburgh Black Business Directory</title>
<?php
echo $this->Html->meta('icon');
echo $this->fetch('meta');
if( isset($meta_key) ){
    echo $this->Html->meta( 'keywords', $meta_key);
} else {
    echo $this->Html->meta( 'keywords', 'Welcome to Pittsburgh Black Business Directory.');
}
if( isset($meta_desc) ){
    echo $this->Html->meta( 'description', $meta_desc);
} else{
    echo $this->Html->meta( 'description', 'Welcome to Pittsburgh Black Business Directory.');
}

echo $this->Html->css(
    array(
        '/front_end/css/style',
        '/front_end/css/font-awesome',
        '/front_end/css/jquery.fancybox',
        '/front_end/jquery_ui/jquery-ui'
        )
    );
echo $this->Html->script(
    array(
        '/front_end/js/jquery-1.8.3.min',
        '/front_end/js/modernizr-1.7.min',
        '/front_end/js/selectivizr',
        '/front_end/js/jquery.nicescroll',
        '/front_end/js/jquery.fancybox',
        '/front_end/js/theme-functions',
        '/front_end/jquery_ui/jquery-ui'
        )
    );
$categories    = $this->requestAction('categories/display');
$listing_types = $this->requestAction('ListingTypes/display');
$states        = $this->requestAction('States/display');
$countries     = $this->requestAction('Countries/display');
?>
<!-- IE Fix for HTML5 Tags -->
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!-- css3-mediaqueries.js for IE8 or older -->
<!--[if lt IE 9]>
<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->

<script type="text/javascript">
$(function() {
    $('#category_submit').on('click', function() {
        var url = $('#catgegory').val();
        window.location.href = 'category/'+url;
        return false;
    });
    $( "#BusinessName" ).autocomplete({
        source: "AutoComplete/fetch/Business/name/",
        minLength: 2,
        select: function( event, ui ) {
        // log( ui.item ?
        // "Selected: " + ui.item.value + " aka " + ui.item.id :
        // "Nothing selected, input was " + this.value );
           window.location.href = "<?php echo BASE_URL.'businesses/search/name:' ?>" + ui.item.value
        }
    });
});
</script>
</head>

<body>
<div id="main_container">
<div class="row">
<div class="main_wrap">
<!-- header start here -->
<div class="header_container">
    <div class="header_top">
        <ul>
            <?php if (!$this->Session->read('Auth.User')) { ?>
                <li><a href="<?=BASE_URL.'login';?>">Login</a></li>
            <?php } else{ ?>
                <li><a href="<?=BASE_URL.'users/my_account';?>">My Account</a></li>
                <li><a href="<?=BASE_URL.'users/logout';?>">Logout</a></li>
            <?php } ?>
        </ul>
    </div>
    <div class="header_content">
        <div class="header_left">
            <div class="logo">
                <span>Greater Pittsburgh</span>
                Black Business Directory
                <span><strong>&amp; Resource Guide</strong></span>
            </div>
            <div class="service_box">
                <h2>5 Ways to Locate a Business or Service</h2>
                <ul>
                    <li>1. <a class="fancybox fancybox.iframe" href="http://www.pagegangster.com/p/5ajjb/">View/Download Black Business Directory</a></li>
                    <li>2. <a href="<?=BASE_URL?>categories">View All Categories</a></li>
                    <li>3. <a href="<?=BASE_URL?>contact-us">Order a Print Directory</a></li>
                    <li>
                        <div class="search_col">
                            <?php
                            echo $this->Session->flash();
                            echo $this->Form->create('Business', array(
    'url' => BASE_URL.'businesses/search'
));?>
                                <label>4. Search by Business Name</label>
                                <div class="form_box">
                                    <?php   echo $this->Form->input('name', array('label' => false,
                                        'div' => false, 'placeholder' => 'Enter Business Name', 'class' => 'ui-autocomplete-input'));?>
                                    <?php
                                        $options = array(
                                        'label' => 'Go',
                                        'div' => false
                                        );
                                        echo $this->Form->end($options);
                                    ?>
                                </div>
                            <?php echo $this->Form->end('Go'); ?>
                        </div>
                        <div class="search_col category">
                            <form>
                                <label>5. Search by Category</label>
                                <div class="form_box">
                                    <select name="category" id="catgegory">
                                        <option value="">Select Category</option>
                                        <?php
                                        if ( count($categories) > 0 ) :
                                            foreach ($categories as $key => $value):
                                                echo '<option value="'.$value.'">'.$key.'</option>';
                                            endforeach;
                                        endif;
                                        ?>
                                    </select>
                                    <input name="" type="submit" value="Go" id="category_submit">
                                </div>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="locating_box">The best site for locating Pittsburgh's Black businesses, churches, agencies, corporations and organizations.</div>
        </div>
        <div class="header_right"><a class="fancybox fancybox.iframe" href="http://www.pagegangster.com/p/5ajjb/"><?php echo $this->Html->image('/front_end/images/header_right_img.jpg', array('alt' => ''));?></a></div>
    </div>
</div>
<!-- header end here -->
<!-- content start here -->
<div class="content_container">
    <div class="content_left">
        <div class="ad_space"><?php echo $this->Html->image('/front_end/images/ad_space.png', array('alt' => ''));?></div>
        <div class="listing_box">
            <h2>Free Listing - Add your Business or Agency</h2>
            <div class="listing_box_top">
                <span class="appropriate">Select Appropriate Section for your Listing *</span>
                <!-- <span class="upgraded"><a href="<?=BASE_URL.'register';?>">Upgraded your listing now <i class="fa  fa-plus-circle"></i></a></span> -->
            </div>
            <div class="listing_form">
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
                    )//,
                    //'url' => array('action' => 'register')
                  );
                  echo $this->Form->create('User', $inputDefaults);
                ?>
                    <div class="listing_form_row">
                        <?php
                        $listing_types_option = array();
                        for($i=0; $i<count($listing_types); $i++){
                            $key = $listing_types[$i]['ListingType']['id'];
                            $value = $listing_types[$i]['ListingType']['title'];
                            $listing_types_option[$key] = $value;
                        }
                        $attributes = array('legend' => false, 'class' => 'listing_type');
                        echo $this->Form->radio('Business.listing_type_id', $listing_types_option, $attributes);
                        ?>
                    </div>
                    <div class="listing_form_row">
                        <div class="listing_form_col">
                            <?php echo $this->Form->input('Business.fname', array('type' => 'text', 'placeholder' => 'First Name*' )); ?>
                        </div>
                        <div class="listing_form_col">
                            <?php echo $this->Form->input('Business.lname', array('type' => 'text', 'placeholder' => 'Last Name*' )); ?>
                        </div>
                        <div class="listing_form_col">
                            <?php echo $this->Form->input('email', array('type' => 'email', 'placeholder' => 'Email*' )); ?>
                        </div>
                    </div>
                    <div class="listing_form_row">
                        <div class="listing_form_col">
                            <?php echo $this->Form->input('Business.name', array('type' => 'text', 'placeholder' => 'Business Name*' )); ?>
                        </div>
                        <div class="listing_form_col">
                            <?php echo $this->Form->input('Business.company', array('type' => 'text', 'placeholder' => 'Company' )); ?>
                        </div>
                         <div class="listing_form_col">
                            <?php echo $this->Form->input('Business.phone', array('type' => 'tel', 'placeholder' => 'Phone*' )); ?>
                         </div>
                    </div>
                    <div class="listing_form_row">
                         <div class="listing_form_col">
                            <?php echo $this->Form->input('Business.fax', array('type' => 'text', 'placeholder' => 'Fax' )); ?>
                         </div>
                        <div class="listing_form_col">
                            <?php echo $this->Form->input('Business.street', array('type' => 'text', 'placeholder' => 'Address Line 1' )); ?>
                        </div>
                        <div class="listing_form_col">
                            <?php echo $this->Form->input('Business.street2', array('type' => 'text', 'placeholder' => 'Address Line 2' )); ?>
                        </div>
                    </div>
                    <div class="listing_form_row">
                        <div class="listing_form_col">
                            <?php echo $this->Form->input(
                                    'Business.country_iso',
                                    array('options' => $countries, 'default' => 'US')
                                );
                            ?>
                        </div>
                        <div class="listing_form_col">
                            <?php echo $this->Form->input('Business.state_iso', array('options' => $states, 'empty' => '(choose state)*' )); ?>
                        </div>
                        <div class="listing_form_col">
                            <?php echo $this->Form->input('Business.city_id', array('empty' => '(choose city)*')); ?>
                        </div>
                    </div>
                    <div class="listing_form_row">
                        <div class="listing_form_col">
                            <?php echo $this->Form->input('Business.zip_code', array('type' => 'text', 'placeholder' => 'Zip Code *' )); ?>
                        </div>
                        <div class="listing_form_col">
                            <?php echo $this->Form->input(
                                    'Business.0.category_id',
                                    array('options' => $categories, 'empty' => '(choose category)')
                                );
                            ?>
                        </div>
                        <div class="listing_form_col">
                            <?php echo $this->Form->input(
                                    'Business.1.category_id',
                                    array('options' => $categories, 'empty' => '(choose category)')
                                );
                            ?>
                        </div>
                    </div>
                    <div class="listing_form_row">
                        <input name="" type="submit" value="Submit">
                    </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
    <?php echo $this->element('right_sidebar'); ?>
</div>
<!-- content end here -->
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
            "data[Business][name]"                      : "required",
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
            "data[Business][name]"                   : "<?=__('Please enter the business name')?>",
            "data[Business][state_iso]"              : "<?=__('Please select the state')?>",
            "data[Business][city_id]"                : "<?=__('Please select the city')?>",
            "data[Business][zip_code]"               : "<?=__('Please enter the zip code')?>",
            "data[Business][phone]"                  : "<?=__('Please enter the phone')?>"
        }
    });
});

$('#Business0CategoryId').change(function(){
    var that = $(this);
    $('#Business1CategoryId option').each(function() {
        if( $(this).val() == that.val() ) {
            $(this).prop('disabled',true);
        }
    });
});
$('#Business1CategoryId').change(function(){
    var that = $(this);
    $('#Business0CategoryId option').each(function() {
        if( $(this).val() == that.val() ) {
            $(this).prop('disabled',true);
        }
    });
});
$('.listing_type').on('click', function() {
    // var $this = $(this);
    // alert($this);
    // var ajaxurl = "<?php echo Router::url(array('controller'=>'your-controller','action'=>'your-action'));?>";
    // $.ajax({
    //     type: "POST",
    //     data: "course_id=" + $this.attr('id'),
    //     dataType: 'html',
    //     url: ajaxurl,
    //     beforeSend: function (){
    //         alert("sad");
    //         document.getElementById('SubBoxRight').innerHTML = '';
    //     },
    //     success: function (data){
    //         var id = $this.attr('id');
    //         $('.course_list').removeClass(' active');
    //         $('#'+id).addClass(" active");
    //         if(data != "Error"){
    //             document.getElementById('SubBoxRight').innerHTML = data;
    //         }else{
    //             document.getElementById('SubBoxRight').innerHTML = data;
    //         }
    //     }
    // });
});
</script>
<?php echo $this->element('footer'); ?>