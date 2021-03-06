<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Finance Buddy</title>
	<script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/md5.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/style.css">
</head>
<body>

<script>

	function submitLogin()
	{
		//first encrypt password
		document.getElementById("real_password").value = CryptoJS.MD5(document.getElementById("password").value);
		document.getElementById("real_conf_password").value = CryptoJS.MD5(document.getElementById("conf_password").value);
		
		document.getElementById("password").value = "";
		document.getElementById("conf_password").value = "";
		//submit
		document.getElementById("submit_sigup").submit();
	}

</script>

<div id="reg_container">
	<div id="reg_topbar">
		<span class="reg_topbar_link" style="float:left"><a href="<?=base_url()?>login">Back to FinanceBuddy</a></span>
		<span class="reg_topbar_link" style="float:right">Have an account?&nbsp;&nbsp;<a href="<?=base_url()?>login" style="font-weight: 700">Sign In</a></span>
	</div>
	<div id="reg_form_container">
		<div id="reg_form_title"></div>
		<?php
			//login is the controller, signin is the function
			$form = array(
				'class' => 'form',
				'id' => 'signup'
				);
			$firstname = array(
	              'name'        => 'firstname',
	              'id'          => 'firstname',
	              'class'		=> 'half',
				  'type'		=> 'text',
	              'value'       => set_value('firstname', ''),
	              'maxlength'   => '45',
	              'size'        => '75',
	              'placeholder'	=> 'First'
	            );
			$lastname = array(
	              'name'        => 'lastname',
	              'id'          => 'lastname',
	              'class'		=> 'half',
				  'type'		=> 'text',
	              'value'       => set_value('lastname', ''),
	              'maxlength'   => '45',
	              'size'        => '75',
	              'placeholder'	=> 'Last'
	            );
			$username = array(
	              'name'        => 'username',
	              'id'          => 'username',
				  'type'		=> 'text',
	              'value'       => set_value('username', ''),
	              'maxlength'   => '45',
	              'size'        => '75',
	              'placeholder'	=> 'Username'
	            );
			$email = array(
	              'name'        => 'email',
	              'id'          => 'email',
				  'type'		=> 'text',
	              'value'       => set_value('email', ''),
	              'maxlength'   => '45',
	              'size'        => '75',
	              'placeholder'	=> 'Email'
	            );
			$password = array(
	              'name'        => 'password',
	              'id'          => 'password',
				  'type'		=> 'password',
	              'value'       => '',
	              'maxlength'   => '100',
	              'size'        => '100',
	              'placeholder'	=> 'Password'
	            );
			$conf_password = array(
	              'name'        => 'conf_password',
	              'id'          => 'conf_password',
				  'type'		=> 'password',
	              'value'       => '',
	              'maxlength'   => '100',
	              'size'        => '100',
	              'placeholder'	=> 'Confirm'
	            );
			$submit = array(
					'name' => 'submit_reg',
	    			'id' => 'submit_sigup',
	    			'value' => 'Register',
	    			'type' => 'submit',
	    			'content' => 'Register',
					'onClick' => 'submitLogin()'
				);
			
				echo form_open(base_url().'registration', $form);
		?>
		<div class="reginput half">
			<?php echo form_input($firstname); ?>
		</div>
		<div class="reginput half" style="margin-right: 0;">
			<?php echo form_input($lastname); ?>
		</div>
		<div class="reginput">
			<?php echo form_input($username); ?>
		</div>
		<div style="clear: both"></div>
		<div class="reginput_hint">
			
		</div>
		<br>
		<div class="reginput">
			<?php echo form_input($email); ?>
		</div>
		<div class="reginput">
			<?php echo form_input($password); ?>
			<input type="hidden" id="real_password" name="real_password" value= "" />
		</div>
		<div class="reginput">
			<?php echo form_input($conf_password); ?>
			<input type="hidden" id="real_conf_password" name="real_conf_password" value= "" />
		</div>
		<div style="clear: both"></div>
		<div class="errors">
			<?php if (isset($registration_error)) {
				echo $registration_error;
			   }
			   echo validation_errors('<p>');
			?>
		</div>
		<br>
		<div class="reg_submit">
			<?php echo form_button($submit); ?>
		</div>
		<?php echo form_close(); ?>
	</div>
</div>
</body>
</html>