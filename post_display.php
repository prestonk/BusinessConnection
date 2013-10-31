<?php

$query1 = "SELECT `$field` FROM `users` WHERE `id`='".$_SESSION['user_id']."'";
	if ($query_run = mysql_query($query)) {
		if ($query_result = mysql_result($query_run, 0, $field)) {
			return $query_result;
		}
	}


function displayPosts() {
	$query = "
	SELECT `post_data`, `docs` `timestamp`
	FROM `posts` 
	WHERE `biz_id`='".$_SESSION['biz_id']."' AND `board_type`='".basename($_SERVER['PHP_SELF'])."'
	ORDER BY `post_num` DESC";
	if ($query_run = mysql_query($query)) {
		while ($query_rows = mysql_fetch_assoc($query_run)) {
			$post_data = $query_rows['post_data'];
			if (!empty($query_rows['docs'])) {
			$docs = $query_rows['docs'];
			}
			$timestamp = $query_rows['timestamp'];
			
			echo '<div id="post">'.$post_data.'</div>';
		}
	}
}

displayPosts();

?>