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

</head>






<body>
<div class="container">
<?php 
		if (getAdmin()=='no') {
		header('Location: home.php');
		}
?>	




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
	
	
	<ul id="side_list">
		<li><a href="directory.php">Directory</a></li>
		<li><a href="bulletin_board.php">Bulletin Board</a></li>
		<li><a href="suggestion_box.php">Suggestion Box</a></li>
	</ul>
	</div>	
	
	
	
	<div id="content_box">
	<div id="post">
		<?php
			include 'post_form.php';
		?>
	</div>
		<?php
			displayPosts();
			
		?>
	</div>
	
	
	
	
	
	
	
	
	<div class="footer">
	
	
	</div>
	
	
</div>
	
	
	
</div>
	

	
	
	
	






	
</body>
</html>