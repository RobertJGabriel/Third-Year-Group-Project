<?php

require_once 'src/Google_Client.php'; // include the required calss files for google login
require_once 'src/contrib/Google_PlusService.php';
require_once 'src/contrib/Google_Oauth2Service.php';
session_start();
$client = new Google_Client();
$client->setApplicationName("Asig 18 Sign in with GPlus"); // Set your applicatio name
$client->setScopes(array('https://www.googleapis.com/auth/userinfo.email', 'https://www.googleapis.com/auth/plus.me')); // set scope during user login
    $client->setApplicationName("Google Calendar PHP Starter Application");
    $client->setClientId('41278269261-bcv220qt6qogppmm80n2vtlf2a1mh1j9.apps.googleusercontent.com');
    $client->setClientSecret('v5cw6av7SXNiFJtwGR8V1QZy');
    $client->setRedirectUri('http://localhost/');
$plus 		= new Google_PlusService($client);
$oauth2 	= new Google_Oauth2Service($client); // Call the OAuth2 class for get email address
if(isset($_GET['code'])) {
	$client->authenticate(); // Authenticate
	$_SESSION['access_token'] = $client->getAccessToken(); // get the access token here
	header('Location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']);
}

if(isset($_SESSION['access_token'])) {
	$client->setAccessToken($_SESSION['access_token']);
}

if ($client->getAccessToken()) {
  $user 		= $oauth2->userinfo->get();
  $me 			= $plus->people->get('me');
  $optParams 	= array('maxResults' => 100);
  $activities 	= $plus->activities->listActivities('me', 'public',$optParams);
  // The access token may have been updated lazily.
  $_SESSION['access_token'] 		= $client->getAccessToken();
  $email 							= filter_var($user['email'], FILTER_SANITIZE_EMAIL); // get the USER EMAIL ADDRESS using OAuth2
} else {
	$authUrl = $client->createAuthUrl();
}

if(isset($me)){ 
	$_SESSION['gplusuer'] = $me; // start the session
}

if(isset($_GET['logout'])) {
  unset($_SESSION['access_token']);
  unset($_SESSION['gplusuer']);
  session_destroy();
  header('Location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']); // it will simply destroy the current seesion which you started before
  #header('Location: https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']);
  
  /*NOTE: for logout and clear all the session direct goole jus un comment the above line an comment the first header function */
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gplus login using PHP with user email by asif18</title>
<style>
body{
	margin: 0;
	padding: 0;
	font-family: arial;
	color: #2C2C2C;
	font-size: 14px;
}
h1 a{
	color:#2C2C2C;
	text-decoration:none;
}
h1 a:hover{
	text-decoration:underline;
}
a{
	color: #069FDF;
}
.wrapper{
	margin: 0 auto;
	width: 1000px;
}
.mytable{
	width: 700px;
	margin: 0 auto;
	border:2px dashed #17A3F7;
	padding: 20px;
}
</style>
</head>
<body>
<div class="wrapper">
<h1><a href="http://www.asif18.com/11/google/login-with-google-plus-on-my-website-using-oauth-with-user-email/">Signin with gplus using PHP API with user email for your website</a></h1>
<?php 
if(isset($authUrl)) {
	echo "<a class='login' href='$authUrl'><img src=\"google-login-button-asif18.png\" alt=\"Google login using php api for your website\" title=\"login with google\" /></a>";
	} else {
	echo "<a class='logout' href='index.php?logout'>Logout</a>";
}
if(isset($_SESSION['gplusuer'])){ ?>
<br/><br/>
<table class="mytable">
<tr>
	<td>Name:</td>
	<td><?php print $me['displayName']; ?></td>
	<td rowspan="5" valign="top"><img src="https://plus.google.com/s2/photos/profile/<?php print $me['id']; ?>?sz=100" /></td><!-- user profile photo,it vary sizes you can set custom size here -->
</tr>
<tr>
	<td>Email</td>
	<td><span style="background:#FFFF00;"><?php print $user['email']; ?></span></td>
</tr>
<tr>
	<td>Gplus Id</td>
	<td><?php print $me['id']; ?></td>
</tr>
<tr>
	<td>Gender</td>
	<td><?php print $me['gender']; ?></td>
</tr>
<tr>
	<td>Relationship</td>
	<td><?php print $me['relationshipStatus']; ?></td>
</tr>
<tr>
	<td>Location</td>
	<td><?php print $me['placesLived'][0]['value']; ?></td>
</tr>
<tr>
	<td>Tagline</td>
	<td><?php print $me['tagline']; ?></td>
</tr>
</table>
<?php } ?>
</div>
</body>
</html>