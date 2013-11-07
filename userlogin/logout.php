<?php
/*
UserCake Version: 2.0.2
http://usercake.com
*/

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}

//Log the user out
if(isUserLoggedIn())
{
	$loggedInUser->userLogOut();
}

if(!empty($websiteUrl)) 
{
	$add_http = "";
	
	if(strpos($websiteUrl,"http://") === false)
	{
		$add_http = "http://";
	}
	
//	header("Location: ".$add_http.$websiteUrl);
	header("Location: http://localhost/user/userlogin/account.php");
	die();
}
else
{
//	header("Location: http://localhost/user/userlogin/account.php".$_SERVER['HTTP_HOST']);
	header("Location: http://localhost/user/userlogin/account.php");
	die();
}	

?>

