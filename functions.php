<?php
ob_start();
session_start();
$current_file = $_SERVER['SCRIPT_NAME'];

/*
SELECT businesses.biz_name, users.fname
FROM businesses
LEFT OUTER JOIN users ON users.biz_id = businesses.id
*/


function loggedin() {
	if (isset($_SESSION['user_id'])&&!empty($_SESSION['user_id'])) {
		if (isset($_SESSION['biz_id'])&&!empty($_SESSION['biz_id'])) {
			return true;
		}
	} else {
		return false;
	}
}

function getUserField($field) {
	$query = "SELECT `$field` FROM `users` WHERE `id`='".$_SESSION['user_id']."'";
	if ($query_run = mysql_query($query)) {
		if ($query_result = mysql_result($query_run, 0, $field)) {
			return $query_result;
		}
	}
}
function getBusinessField($field2) {
	$query = "SELECT `$field2` FROM `businesses` WHERE `id`='".$_SESSION['biz_id']."'";
	if ($query_run = mysql_query($query)) {
		if ($query_result = mysql_result($query_run, 0, $field2)) {
			return $query_result;
		}
	}
}


function getAdmin() {
	$query = "
	SELECT `admin`
	FROM `users`
	WHERE `id`='".$_SESSION['user_id']."'";
	if ($query_run = mysql_query($query)) {
		if ($query_result = mysql_result($query_run, 0, 'admin')) {
			return $query_result;
		}
	}
}

function displayPosts() {
	$query = "
	SELECT `id`, `post_data`, `docs`
	FROM `posts` 
	WHERE `biz_id`='".$_SESSION['biz_id']."' AND `board_type`='".basename($_SERVER['PHP_SELF'])."'
	ORDER BY `post_num` DESC";
	if ($query_run = mysql_query($query)) {
		while ($query_rows = mysql_fetch_assoc($query_run)) {
			$id = $query_rows['id'];
			$query12 = "SELECT `fname`, `lname`, `title` FROM `users` WHERE `id`='$id'";
			if ($query_run12 = mysql_query($query12)) {
				while ($query_rows12 = mysql_fetch_assoc($query_run12)) {
					$fname = $query_rows12['fname'];
					$lname = $query_rows12['lname'];
					$title = $query_rows12['title'];
				}
			}
			$post_data = $query_rows['post_data'];
			
			if (!empty($query_rows['docs'])) {
			$docs = $query_rows['docs'];
			echo  "<div id='post2'><span id='post2_name'>".$fname." ".$lname."</span>    (".$title.")  <br /><br />".$post_data."<br /><br /><a href='".$docs."'>Uploaded File</a><br /></div>";
			} else {			
			echo '<div id="post2"><span id="post2_name">'.$fname.' '.$lname.'</span>    ('.$title.')  <br /><br />'.$post_data.'<br /></div>';
			}
		}
	} else {
		echo 'Error.';
	}
}

function directory_return() {
	$field_order = 'fname';
	$how_order = 'ASC';
	if (isset($_GET['field_order'])&&isset($_GET['how_order'])) {
		$field_order = $_GET['field_order'];
		$how_order = $_GET['how_order'];
	}
	$query = "
	SELECT `fname`, `lname`, `title`, `gender`, `yoe`, `work_phone`, `work_email` 
	FROM `users` 
	WHERE `biz_id`='".$_SESSION['biz_id']."' 
	ORDER BY $field_order $how_order";
	if ($query_run = mysql_query($query)) {
		while ($query_rows = mysql_fetch_assoc($query_run)) {
			$fname = $query_rows['fname'];
			$lname = $query_rows['lname'];
			$title = $query_rows['title'];
			$gender = $query_rows['gender'];
			$yoe = $query_rows['yoe'];
			$work_phone = $query_rows['work_phone'];
			$work_email = $query_rows['work_email'];
			
			echo '<tr><td>'.$fname.'</td><td>'.$lname.'</td><td>'.$title.'</td><td>'.$gender.'</td><td>'.$yoe.'</td><td>'.$work_phone.'</td><td>'.$work_email.'</td></tr>';
		}
	}else {
		echo 'error';
	}
}





?>