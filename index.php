<?php
	require 'functions.php';
	require 'connect.inc.php';
	if (loggedin()) {
		header('Location: home.php');
	}
?>
<!doctype html>
<html lang="en">
<!--
	Created by: Preston Knibbe	
-->
<head>
<meta charset="utf-8" />
<title>Business Connection</title>
<link rel="stylesheet" type="text/css" href="css/bizcon.css" />
<link rel="stylesheet" type="text/css" href="css/index.css" />
<?php 

?>
</head>






<body>
<div class="container">





<div class="header">

	<div id="index_logo">
		<a href="index.php"><img src="img/biz_con_logo_med.png" id="index_logo_pic" /></a>
	</div>
	
</div>

<br /><br /><br /><br /><br /><br />





<div class="section">
	
<div id="index_pic_box">
	<img src="img/index_pic3.jpg" />
</div>

<div id="index_login_form">
	<span>Log In</span><br /><br /><br />
	<?php
		include 'login.php';
	?>
</div>

<div id="index_info_block">
	<div id="index_info_title">Don't have Business Connection?</div>
	<div id="index_info_box">
	<span id="index_info_box_title">What is Business Connection?</span>
	<ul>
		&nbsp;&nbsp;&nbsp;Business Connection is an enterprise social network designed with the business owner in mind. It consists of a central
		posting board that permits communication between all members of a company no matter how large or small, as well as many other
		helpful features.
		
	</div>
	<div id="index_info_box">
	<span id="index_info_box_title">How will it help?</span>
	<ul>
		<li>Better communicaiton between the employer and the employee</li>
		<li>Connects mulitple departments within large businesses</li>
		<li>Eliminates need for lengthy email trees to send out memos and other company information</li>
	</div>
	<div id="index_info_box" style="width: 90%;">
	<form>
		<a href="registration.php"><div id="sign_up">Sign Up, It's Free</div></a>
	</form>
	</div>
</div>


</div>
	

	
	
	
	






	
</body>
</html>