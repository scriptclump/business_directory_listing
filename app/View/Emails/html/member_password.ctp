<?php echo __('Hello %s', $fname. '' .$lname); ?>,<br/><br/>
Your login detail is given below:
<table border="1" cellpadding="8" cellspacing="0" align="center" bgcolor="#F5F5F5">
  <tr>
    <td valign="top">&nbsp;</td>
    <td valign="top"><?=__("You can login to the website using folowing email address, password.")?></td>
  </tr>
  <tr>
    <td valign="top"><strong><?=__('E-mail')?></strong>:</td>
    <td valign="top"><a href="mailto:<?=$email?>"><?=$email?></a></td>
  </tr>
  <tr>
    <td valign="top"><strong><?=__('Password')?></strong>:</td>
    <td valign="top"><?=$password?></td>
  </tr>
</table>
<br />
<br />
Thanks,<br/>
ICargoBox Team<br/ >