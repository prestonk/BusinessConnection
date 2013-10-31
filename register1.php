<?php

function checkData($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if (
	isset($_POST['biz_name'])&&
	isset($_POST['biz_pass'])&&
	isset($_POST['biz_pass2'])&&
	isset($_POST['admin_pass'])&&
	isset($_POST['admin_pass2'])
	) {
	$biz_name = checkData($_POST['biz_name']);
	$biz_pass = checkData($_POST['biz_pass']);
	$biz_pass2 = checkData($_POST['biz_pass2']);
	$biz_pass_hash = md5($biz_pass);
	$admin_pass = checkData($_POST['admin_pass']);
	$admin_pass2 = checkData($_POST['admin_pass2']);
	$admin_pass_hash = md5($admin_pass);
	if (
		!empty($biz_name)&&
		!empty($biz_pass)&&
		!empty($biz_pass2)&&
		!empty($admin_pass)&&
		!empty($admin_pass2)
		) {
			$biz_pass_length = strlen($biz_pass);
			$admin_pass_length = strlen($admin_pass);
			if (($biz_pass_length>=6)&&($admin_pass_length>=6)) {
			if ($biz_pass!=$biz_pass2) {
				echo 'The "Business Passwords" do not match.<br /><br />';
			} else {
				if ($admin_pass!=$admin_pass2) {
					echo 'The "Corporate Passwords" do not match.<br /><br />';
				} else {
					$query = "SELECT `biz_name` FROM `businesses`  WHERE `biz_name`='$biz_name'";
					$query_run = mysql_query($query);
					
					if (mysql_num_rows($query_run)==1) {
						echo 'The Business Name "'.$biz_name.'" already exists.<br /><br />';		
					} else {
						
						if (isset($_FILES['logo'])) {
							$name = $_FILES['logo']['name'];
							$type = $_FILES['logo']['type'];
							$temp_name = $_FILES['logo']['tmp_name'];
							$size = $_FILES['logo']['size'];
							$max_size = 1048576;
							$extension = strtolower(substr($name, strpos($name, '.') + 1));
							if (!empty($name)) {
								if (($extension=='jpg'||$extension=='jpeg'||$extension=='png')&&($type=='image/jpeg'||$type=='image/jpg'||$type=='image/png')&&$max_size>=$size) {
								$location = 'logo/'.$name;
								move_uploaded_file($temp_name, 'logo/'.$name);
								$query = "INSERT INTO `businesses` VALUES ('','".mysql_real_escape_string($location)."','".mysql_real_escape_string($biz_name)."','".mysql_real_escape_string($biz_pass_hash)."','".mysql_real_escape_string($admin_pass_hash)."')";
								if ($query_run = mysql_query($query)) {		
									header('Location:user_form.php');
								} else {
									echo 'Sorry, we\'re not able to register you at this moment, please try again later.';
								}			
								
								
								
								
							} else {
								echo 'Logo must be \'jpg\', \'jpeg\', or \'png\' and must be 1mb or less';
							}
							}
						}			
					}
				}
			}
			
			
		} else {
			echo 'Please make your password 6 characters or longer.<br /><br />';
		}
		} else {
			echo 'Please fill in all fields.<br /><br />';
		}
	
	
}

?>