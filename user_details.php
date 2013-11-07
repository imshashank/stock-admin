<?php
include('header.php');
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}

//Prevent the user visiting the logged in page if he is not logged in
if(!isUserLoggedIn()) { header("Location: login.php"); die(); }

if(!empty($_POST))
{
	$errors = array();
	$successes = array();
	$password = $_POST["password"];
	$password_new = $_POST["passwordc"];
	$password_confirm = $_POST["passwordcheck"];
	
	$errors = array();
	$email = $_POST["email"];
	
	//Perform some validation
	//Feel free to edit / change as required
	
	//Confirm the hashes match before updating a users password
	$entered_pass = generateHash($password,$loggedInUser->hash_pw);
	
	if (trim($password) == ""){
		$errors[] = lang("ACCOUNT_SPECIFY_PASSWORD");
	}
	else if($entered_pass != $loggedInUser->hash_pw)
	{
		//No match
		$errors[] = lang("ACCOUNT_PASSWORD_INVALID");
	}	
	if($email != $loggedInUser->email)
	{
		if(trim($email) == "")
		{
			$errors[] = lang("ACCOUNT_SPECIFY_EMAIL");
		}
		else if(!isValidEmail($email))
		{
			$errors[] = lang("ACCOUNT_INVALID_EMAIL");
		}
		else if(emailExists($email))
		{
			$errors[] = lang("ACCOUNT_EMAIL_IN_USE", array($email));	
		}
		
		//End data validation
		if(count($errors) == 0)
		{
			$loggedInUser->updateEmail($email);
			$successes[] = lang("ACCOUNT_EMAIL_UPDATED");
		}
	}
	
	if ($password_new != "" OR $password_confirm != "")
	{
		if(trim($password_new) == "")
		{
			$errors[] = lang("ACCOUNT_SPECIFY_NEW_PASSWORD");
		}
		else if(trim($password_confirm) == "")
		{
			$errors[] = lang("ACCOUNT_SPECIFY_CONFIRM_PASSWORD");
		}
		else if(minMaxRange(8,50,$password_new))
		{	
			$errors[] = lang("ACCOUNT_NEW_PASSWORD_LENGTH",array(8,50));
		}
		else if($password_new != $password_confirm)
		{
			$errors[] = lang("ACCOUNT_PASS_MISMATCH");
		}
		
		//End data validation
		if(count($errors) == 0)
		{
			//Also prevent updating if someone attempts to update with the same password
			$entered_pass_new = generateHash($password_new,$loggedInUser->hash_pw);
			
			if($entered_pass_new == $loggedInUser->hash_pw)
			{
				//Don't update, this fool is trying to update with the same password Â¬Â¬
				$errors[] = lang("ACCOUNT_PASSWORD_NOTHING_TO_UPDATE");
			}
			else
			{
				//This function will create the new hash and update the hash_pw property.
				$loggedInUser->updatePassword($password_new);
				$successes[] = lang("ACCOUNT_PASSWORD_UPDATED");
			}
		}
	}
	if(count($errors) == 0 AND count($successes) == 0){
		$errors[] = lang("NOTHING_TO_UPDATE");
	}
}

require_once("models/header.php");

?>
<body>
<?include('navbar.php');?>
<?include('sidebar.php');?>
		<!--Start Content -->

		<div id="content">
		<ul class="breadcrumb">
	<li><a href="index.html?lang=en" class="glyphicons home"><i></i>Stock Leap</a></li>
	<li class="divider"></li> 
	<li><?php echo $loggedInUser->username;?></li>
</ul>
<div class="separator"></div>

<div class="heading-buttons">
	<h3 class="glyphicons display"><i></i> Dashboard</h3>
	
	<div class="clearfix" style="clear: both;"></div>
</div>
<div class="separator"></div>
<?php include('menubar.php');?>

<div class="separator bottom"></div>
<div style="max-width:85%;">
<div class="widget widget-2 widget-tabs widget-tabs-2 tabs-right border-bottom-none">
	<div class="widget-head">
		<ul>
			<li class="active"><a class="glyphicons settings" href="#account-settings" data-toggle="tab"><i></i>Account settings</a></li>
			<li><a class="glyphicons user" href="#account-details" data-toggle="tab"><i></i>Account details</a></li>
		</ul>
	</div>
</div>

	<div class="innerLR">
<?php echo resultBlock($errors,$successes); ?>
	<form name='updateAccount' action="<?php echo $_SERVER['PHP_SELF'];?>" class="form-horizontal" method="post">
	<div class="tab-content" style="padding: 0;">

		<div class="tab-pane" id="account-details">
		
			<div class="widget widget-2">
				<div class="widget-head">
					<h4 class="heading glyphicons edit"><i></i>Personal details</h4>
				</div>
				<div class="widget-body" style="padding-bottom: 0;">
					<div class="row-fluid">
						<div class="span6">
							<div class="control-group">
								<label class="control-label">Name</label>
								<div class="controls">
									<input type="text" value="<?php echo $loggedInUser->displayname; ?>" class="span10" />
									<span style="margin: 0;" class="btn-action single glyphicons circle_question_mark" data-toggle="tooltip" data-placement="top" data-original-title="First name is mandatory"><i></i></span>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Date of birth</label>
								<div class="controls">
									<div class="input-append">
										<input type="text" id="datepicker" class="span12" value="13/06/1988" />
										<span class="add-on glyphicons calendar"><i></i></span>
									</div>
								</div>
							</div>
						</div>
						<div class="span6">
							<div class="control-group">
								<label class="control-label">Gender</label>
								<div class="controls">
									<select class="span12">
										<option>Male</option>
										<option>Female</option>
									</select>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Age</label>
								<div class="controls">
									<input type="text" value="25" class="input-mini" />
								</div>
							</div>
						</div>
					</div>
					<hr class="separator bottom" />
					<div class="control-group row-fluid">
						<label class="control-label">About me</label>
						<div class="controls">
							<textarea id="mustHaveId" class="wysihtml5 span12" rows="5">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.</textarea>
						</div>
					</div>
					<div class="form-actions" style="margin: 0;">
						<button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>Save changes</button>
						<button type="button" class="btn btn-icon btn-default glyphicons circle_remove"><i></i>Cancel</button>
					</div>
				</div>
			</div>
		</div>

		<div class="tab-pane active" id="account-settings">

			<div class="widget widget-2">
				<div class="widget-head">
					<h4 class="heading glyphicons settings"><i></i>Account settings</h4>
				</div>

				<div class="widget-body" style="padding-bottom: 0;">
					<div class="row-fluid">
						<div class="span3">
							<strong>Change password</strong>
							<p class="muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
						</div>
						<div class="span9">
							<label for="inputUsername">Username</label>
							<input name="username" type="text" id="inputUsername" class="span10" value="<?php echo $loggedInUser->username; ?>" disabled="disabled" />
							<label for="inputEmail">E-mail</label>
								<div class="input-prepend">
									<span class="add-on glyphicons envelope"><i></i></span>
									<input name='email' type="text" id="inputEmail" class="input-large" placeholder="<?php echo $loggedInUser->email; ?>" value="<?php echo $loggedInUser->email; ?>" />

							<span style="margin: 0;" class="btn-action single glyphicons circle_question_mark" data-toggle="tooltip" data-placement="top" data-original-title="Username can't be changed"><i></i></span>
							<div class="separator"></div>
									
							<label for="inputPasswordOld">Old password</label>
							<input name='password' type="password" id="inputPasswordOld" class="span10" value="" placeholder="Leave empty for no change" />
							<span style="margin: 0;" class="btn-action single glyphicons circle_question_mark" data-toggle="tooltip" data-placement="top" data-original-title="Leave empty if you don't wish to change the password"><i></i></span>
							<div class="separator"></div>
							
							<label for="inputPasswordNew">New password</label>
							<input name='passwordc' type="password" id="inputPasswordNew" class="span12" value="" placeholder="Leave empty for no change" />
							<div class="separator"></div>
							
							<label for="inputPasswordNew2">Repeat new password</label>
							<input name='passwordcheck' type="password" id="inputPasswordNew2" class="span12" value="" placeholder="Leave empty for no change" />

							<div class="separator"></div>
						</div>
					</div>
					<hr class="separator bottom" />
					<div class="row-fluid">
						<div class="span3">
							<strong>Contact details</strong>
							<p class="muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
						</div>
						<div class="span9">
							<div class="row-fluid">
							<div class="span6">
								<label for="inputPhone">Phone</label>
								<div class="input-prepend">
									<span class="add-on glyphicons phone"><i></i></span>
									<input type="text" id="inputPhone" class="input-large" placeholder="01234567897" />
								</div>
								<div class="separator"></div>
									
								<label for="inputEmail">E-mail</label>
								<div class="input-prepend">
									<span class="add-on glyphicons envelope"><i></i></span>
									<input type="text" id="inputEmail" class="input-large" placeholder="contact@mosaicpro.biz" />
								</div>
								<div class="separator"></div>
									
								<label for="inputWebsite">Website</label>
								<div class="input-prepend">
									<span class="add-on glyphicons link"><i></i></span>
									<input type="text" id="inputWebsite" class="input-large" placeholder="http://www.mosaicpro.biz" />
								</div>
								<div class="separator"></div>
							</div>
							<div class="span6">
								<label for="inputFacebook">Facebook</label>
								<div class="input-prepend">
									<span class="add-on glyphicons facebook"><i></i></span>
									<input type="text" id="inputFacebook" class="input-large" placeholder="/mosaicpro" />
								</div>
								<div class="separator"></div>
								
								<label for="inputTwitter">Twitter</label>
								<div class="input-prepend">
									<span class="add-on glyphicons twitter"><i></i></span>
									<input type="text" id="inputTwitter" class="input-large" placeholder="/mosaicpro" />
								</div>
								<div class="separator"></div>
								
								<label for="inputSkype">Skype ID</label>
								<div class="input-prepend">
									<span class="add-on glyphicons skype"><i></i></span>
									<input type="text" id="inputSkype" class="input-large" placeholder="mySkypeID" />
								</div>
								<div class="separator"></div>
								
								<label for="inputYahoo">Yahoo ID</label>
								<div class="input-prepend">
									<span class="add-on glyphicons yahoo"><i></i></span>
									<input type="text" id="inputYahoo" class="input-large" placeholder="myYahooID" />
								</div>
								<div class="separator"></div>
							</div>
							</div>
						</div>
					</div>
					<div class="form-actions" style="margin: 0; padding-right: 0;">
						<button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok pull-right"><i></i>Save changes</button>

<h3 style=" margin-bottom: -6px;">Companies in Portfolio</h3> <a hreaf="./acccount.php">Edit</a> 

<div id="responsecontainer" align="center">
</div>

					</div>
				</div>
			</div>
			
		</div>
	</div>
	</form>
	
</div>



	
</div>
<br/>
</div>

		<!-- End Wrapper -->
		</div>
<?php
include('footer.php');		
?>
