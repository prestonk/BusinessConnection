<?php
	require 'connect.inc.php';
	require 'functions.php';
	if (!loggedin()) {
		header('Location: index.php');
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
<link rel="stylesheet" type="text/css" href="css/admin.css" />

</head>






<body>
<div class="container">





<div class="header">

	<div id="bizcon_box">
		<img src="img/biz_con_logo.png" id="biz_con_logo" />
	</div>
	<div id="link_bar">
	
		<?php 
		if (getAdmin()=='yes') {
		include 'admin_button.php';
		}
		?>			
		
		
		<a href="home.php"><div id="link">
		<img src="img/paper.png" id="paper" />
		</div></a>
				
		
		<a href="account.php"><div id="link">
		<img src="img/one_dude.png" id="one_dude" />
		</div></a>
		
		
		<?php
		/*
		<a href="schedule.php"><div id="link">
		<img src="img/calendar.png" id="calendar" />
		</div></a>
		*/
		?>
				
		
		
		<a href="logout.php"><div id="link">
		<img src="img/door.png" id="door" />
		</div></a>
		
		
		
	</div>

</div>
<br />
<br />
<br />
<br />



<div class="section">
	
	<div id="admin_box">
		<div id="admin_info_box">
		Corporate Board
		</div>
		
		<?php
		/*
		<div id="admin_info_box">
		Create Department
		</div>
		
		<div id="admin_info_box">
		Create Project
		</div>
		
		<div id="admin_info_box">
		Edit Corporate Staff
		</div>
		
		<div id="admin_info_box">
		Edit Company Staff
		</div>
		
		<div id="admin_info_box">
		Create Company Event
		</div>
		
		<div id="admin_info_box">
		Start Meeting
		</div>
		
		<div id="admin_info_box">
		Schedule Meeting
		</div>
		*/
		?>
	</div>

</div>
	
	
	
</div>
	

	
	
	
	






	
</body>
</html>