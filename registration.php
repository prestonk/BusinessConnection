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
<link rel="stylesheet" type="text/css" href="css/registration.css" />

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

<div id="form_que_box">
Start New Business Account
<a href="biz_form.php"><div id="form_button">Go</div></a>
</div>
<div id="form_que_box">
Create New Personal Account
<a href="user_form.php"><div id="form_button">Go</div></a>
</div>

<div id="info">

<span>Step 1:</span> Register your business first.<br /><br />
<span>Step 2:</span> You and your employees create personal accounts.<br /><br />
<span>Step 3:</span> Log in.<br /><br />
<span>Step 4:</span> Enjoy!<br />
</div>
</div>
</div>
	

	
	
	
	






	
</body>
</html>