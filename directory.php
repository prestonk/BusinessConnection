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
<link rel="stylesheet" type="text/css" href="css/directory.css" />

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
	
	
	<div id="sidebar">
	
	<div id="logo_box">
		<div id="logo">
		<img src="<?php echo getBusinessField('logo'); ?>" id="logo_pic" />
		</div>
		<div id="comp_name">
		<?php
		echo getBusinessField('biz_name');
		?>
		</div>
	</div>
	
	<!-- PHP NEEDED
		Dynamic link content
	-->
	<ul id="side_list">
		<li><a href="directory.php">Directory</a></li>
		<li><a href="bulletin_board.php">Bulletin Board</a></li>
		<li><a href="suggestion_box.php">Suggestion Box</a></li>
	</ul>
	</div>	
	
	
	
	<div id="content_box">
	<div id="content_title">
	Directory
	</div>
	<div id="directory">
		<div id="selector_box">
		<form action="directory.php" method="GET">
			Sort By:
			<select name="field_order">
				<option value="fname" selected>First</option>
				<option value="lname">Last</option>
				<option value="title">Title</option>
				<option value="gender">Gender</option>
				<option value="yoe">Start</option>
				<option value="work_phone">Work Phone</option>
				<option value="work_email">Work Email</option>
			</select>
			<select name="how_order">
				<option value="ASC" selected>Ascending</option>
				<option value="DESC">Descending</option>
			</select>
			<input type="submit" value="Go" name="go_button" />
		</form>
		</div>
		<table id="directory_table">
		<tr cellspacing="0">
		<th>First</th>
		<th>Last</th>
		<th>Title</th>
		<th>Gender</th>
		<th>Start</th>
		<th>Work Phone</th>
		<th>Work Email</th>
		</tr>
		<?php
		directory_return();
		?>
		</table>
	</div>
	</div>
	
	
	
	
	
	
	
	
	<div class="footer">
	
	
	</div>
	
	
</div>
	
	
	
</div>
	

	
	
	
	






	
</body>
</html>