<?php

function checkData($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if (isset($_POST['email'])&&isset($_POST['password'])) {
	$email = checkData($_POST['email']);
	$password = checkData($_POST['password']);
	$password_hash = md5($password);
	
	if (!empty($email)&&!empty($password)) {
		$query = "SELECT `id`, `biz_id` FROM `users` WHERE `work_email`='$email' AND `password`='$password_hash'";
			if ($query_run = mysql_query($query)) {
				$query_num_rows = mysql_num_rows($query_run);
				
				if ($query_num_rows==0) {
					echo '<span style="color: #E60D0D; font-size: 14pt; font-weight: bold;">Invalid email/password combination</span>';
				}else if ($query_num_rows==1) {
					$user_id = mysql_result($query_run, 0, 'id');
					$_SESSION['user_id'] = $user_id;
					$biz_id = mysql_result($query_run, 0, 'biz_id');
					$_SESSION['biz_id'] = $biz_id;
					header('Location: home.php');
				}
			}
	} else {
		echo '<span style="color: #E60D0D; font-size: 14pt; font-weight: bold;">Please fill in all log in areas</span>';
	}
}



?>

<form action="<?php echo $current_file; ?>" method="POST">
		<input type="text" name="email" value="Email" id="log_text" /><br /><br />
		<input type="password" name="password" value="Password" id="log_text" /><br /><br />
		<input type="submit" name="login_button" value="Log In" id="log_button" />
</form>