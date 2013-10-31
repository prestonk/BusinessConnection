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
<script>
function showHide() {
    document.getElementById("corp_block").style.display = (document.getElementById("yes_radio").checked)? "block" : "none";
}

</script>
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
include 'register2.php';
?>
<form action="user_form.php" method="POST" enctype="multipart/form-data">
Business Name: <input type="text" name="biz_name" /><br /><br />
Business Password: <input type="password" name="biz_pass" /><br /><br />
Email: <input type="text" name="work_email" /><br /><br />
Password: <input type="password" name="password" /><br /><br />
Password Confirm: <input type="password" name="password2" /><br /><br />
<div style="display: block; margin-bottom: 10px;">Corporate:</div>
	<input type="radio" onclick="showHide();" id="yes_radio" name="admin" value="yes" style="margin-top: 6px ;margin-right: 88%;">Yes<br/>	
	<input type="radio" id="no_radio" onclick="showHide();" name="admin" value="no" style="margin-top: 6px; margin-right: 88%;">No<br/><br />
<div id="corp_block" style="display: none;">Corporate Password: <input type="password" name="admin_pass" /><br /><br /></div>
First Name: <input type="text" name="fname" /><br /><br />
Last Name: <input type="text" name="lname" /><br /><br />
<div style="display: block; margin-bottom: 10px;">Gender:</div>
<input type="radio" name="gender" value="M" style="margin-top: 6px ;margin-right: 80%;">Male<br/>	
<input type="radio" name="gender" value="F" style="margin-top: 6px; margin-right: 80%;">Female<br/><br />
Job Title: <input type="text" name="title" /><br /><br />
Start year: <input type="text" name="yoe" /><br /><br />
Work Phone: <input type="text" name="work_phone" /><br /><br />
Upload Profile Picture: <input type="file" name="profile_pic" id="logo_uploader" /><br /><br /><br /><br/>
<input type="submit" value="Submit" name="biz_acnt_submit" id="submit" />
</form>
</div>	
</div>
	

	
	
	
	






	
</body>
</html>