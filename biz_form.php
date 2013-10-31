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
<div id="form_box">
<?php
include 'register1.php';




?>
<form action="biz_form.php" method="POST" enctype="multipart/form-data">
Business Name: <input type="text" name="biz_name" /><br /><br />
Business Password: <input type="password" name="biz_pass" /><br /><br />
Confirm Password: <input type="password" name="biz_pass2" /><br /><br />
Corporate Password: <input type="password" name="admin_pass" /><br /><br />
Confirm Password: <input type="password" name="admin_pass2" /><br /><br />
Upload Business Logo: <input type="file" name="logo" id="logo_uploader" /><br /><br /><br /><br/>
<input type="submit" value="Submit" name="biz_acnt_submit" id="submit" />
</form>
</div>	
</div>
	

	
	
	
	






	
</body>
</html>