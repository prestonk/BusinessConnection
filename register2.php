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
	isset($_POST['password'])&&
	isset($_POST['password2'])&&
	isset($_POST['admin'])&&
	isset($_POST['fname'])&&
	isset($_POST['lname'])&&
	isset($_POST['gender'])&&
	isset($_POST['title'])&&
	isset($_POST['yoe'])&&
	isset($_POST['work_phone'])&&
	isset($_POST['work_email'])
	) {
	$biz_name = checkData($_POST['biz_name']);
	$biz_pass = checkData($_POST['biz_pass']);
	$biz_pass_hash = md5($biz_pass);
	$password = checkData($_POST['password']);
	$password_hash = md5($password);
	$password2 = checkData($_POST['password2']);
	$admin = checkData($_POST['admin']);
	$fname = checkData($_POST['fname']);
	$lname = checkData($_POST['lname']);
	$gender = checkData($_POST['gender']);
	$title = checkData($_POST['title']);
	$yoe = checkData($_POST['yoe']);
	$work_phone = checkData($_POST['work_phone']);
	$work_email = checkData($_POST['work_email']);
	if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$work_email)) {
		echo 'Invalid email format.<br /><br />'; 
	} 
	if (
		!empty($biz_name)&&
		!empty($biz_pass)&&
		!empty($password)&&
		!empty($password2)&&
		!empty($admin)&&
		!empty($fname)&&
		!empty($lname)&&
		!empty($yoe)&&
		!empty($work_phone)&&
		!empty($work_email)
		) {		
		
			$query1 = "SELECT `biz_pass` FROM `businesses` WHERE `biz_name`='$biz_name'";
			$query_run1 = mysql_query($query1);
			$query_result1 = mysql_fetch_row($query_run1)[0];
			if($query_result1==$biz_pass_hash) {
			
			$query3 = "SELECT `id` FROM `businesses` WHERE `biz_name`='$biz_name'";
			$query_run3 = mysql_query($query3);
			$biz_id = mysql_fetch_row($query_run3)[0];
	
			if($admin=='yes'&&isset($_POST['admin_pass'])) {
				$admin_pass = $_POST['admin_pass'];
				$admin_pass_hash = md5($admin_pass);
				if(!empty($admin_pass)) {
				
				$query2 = "SELECT `admin_pass` FROM `businesses` WHERE `biz_name`='$biz_name'";
				$query_run2 = mysql_query($query2);
				$query_result2 = mysql_fetch_row($query_run2)[0];
				
				if($query_result2==$admin_pass_hash) {
					
					
					
								$password_length = strlen($password);
								if ($password_length>=6) {
								if ($password!=$password2) {
									echo 'The passwords do not match.<br /><br />';
								} else {
								$query = "SELECT `work_email` FROM `users`  WHERE `work_email`='$work_email'";
								$query_run = mysql_query($query);
								
								if (mysql_num_rows($query_run)==1) {
									echo 'The Email "'.$work_email.'" is already in use.<br /><br />';		
								} else {
								
									$yoe_length = strlen($yoe);
									if($yoe_length==4) {
									
									
									if (isset($_FILES['profile_pic'])) {
										$name = $_FILES['profile_pic']['name'];
										$type = $_FILES['profile_pic']['type'];
										$temp_name = $_FILES['profile_pic']['tmp_name'];
										$size = $_FILES['profile_pic']['size'];
										$max_size = 1048576;
										$extension = strtolower(substr($name, strpos($name, '.') + 1));
										if (!empty($name)) {
											if (($extension=='jpg'||$extension=='jpeg'||$extension=='png')&&($type=='image/jpeg'||$type=='image/jpg'||$type=='image/png')&&$max_size>=$size) {
											$location = 'profile_pics/'.$name;
											move_uploaded_file($temp_name, 'profile_pics/'.$name);
									$query = "INSERT 
									INTO `users` VALUES ('','".mysql_real_escape_string($biz_id)."',,'".mysql_real_escape_string($password_hash)."','".mysql_real_escape_string($admin)."','".mysql_real_escape_string($fname)."','".mysql_real_escape_string($lname)."','".mysql_real_escape_string($location)."','".mysql_real_escape_string($gender)."','".mysql_real_escape_string($title)."','".mysql_real_escape_string($yoe)."','".mysql_real_escape_string($work_phone)."','".mysql_real_escape_string($work_email)."')";
									if ($query_run = mysql_query($query)) {		
									
									header('Location:index.php');
									
									}
									else {
									echo 'Sorry, we\'re not able to register you at this moment, please try again later.';
									}
									} else {
											echo 'Logo must be \'jpg\', \'jpeg\', or \'png\' and must be 1mb or less';
										}
										}
									}			

								
								
								
							
									
									} else {
										echo 'Please provide a 4 digit start year.';
									}									
									}
								}
								} else {
									echo 'Please make your password 6 characters or longer.<br /><br />';
								}				
					
					
					
					
					
					
				} else {
				 echo 'The Corporate password is incorrect.<br /><br />';
				}
				
				} 
			} else {
			
			
			
						$password_length = strlen($password);
								if ($password_length>=6) {
								if ($password!=$password2) {
									echo 'The passwords do not match.<br /><br />';
								} else {
								$query = "SELECT `work_email` FROM `users`  WHERE `work_email`='$work_email'";
								$query_run = mysql_query($query);
								
								if (mysql_num_rows($query_run)==1) {
									echo 'The Email "'.$work_email.'" is already in use.<br /><br />';		
								} else {
								
									$yoe_length = strlen($yoe);
									if($yoe_length==4) {
									
									if (isset($_FILES['profile_pic'])) {
										$name = $_FILES['profile_pic']['name'];
										$type = $_FILES['profile_pic']['type'];
										$temp_name = $_FILES['profile_pic']['tmp_name'];
										$size = $_FILES['profile_pic']['size'];
										$max_size = 1048576;
										$extension = strtolower(substr($name, strpos($name, '.') + 1));
										if (!empty($name)) {
											if (($extension=='jpg'||$extension=='jpeg'||$extension=='png')&&($type=='image/jpeg'||$type=='image/jpg'||$type=='image/png')&&$max_size>=$size) {
											$location = 'profile_pics/'.$name;
											move_uploaded_file($temp_name, 'profile_pics/'.$name);
									$query = "INSERT 
									INTO `users` VALUES ('','".mysql_real_escape_string($biz_id)."','".mysql_real_escape_string($password_hash)."','".mysql_real_escape_string($admin)."','".mysql_real_escape_string($fname)."','".mysql_real_escape_string($lname)."','".mysql_real_escape_string($location)."','".mysql_real_escape_string($gender)."','".mysql_real_escape_string($title)."','".mysql_real_escape_string($yoe)."','".mysql_real_escape_string($work_phone)."','".mysql_real_escape_string($work_email)."')";
									if ($query_run = mysql_query($query)) {		
									
									header('Location:index.php');
									
									}
									else {
									echo 'Sorry, we\'re not able to register you at this moment, please try again later.';
									}
									} else {
											echo 'Logo must be \'jpg\', \'jpeg\', or \'png\' and must be 1mb or less';
										}
										}
									}			

								
								
								
							
									
									} else {
										echo 'Please provide a 4 digit start year.';
									}									
									}
								}
								} else {
									echo 'Please make your password 6 characters or longer.<br /><br />';
								}	
			
			
			
			
			
			
			}
	} else {
		echo 'There are no businesses matching that name and password.';
	}
		
}
else {
	echo 'Please fill in all fields.<br /><br />';
}
	
	
}

?>