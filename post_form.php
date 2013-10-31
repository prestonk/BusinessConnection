<form action="<?php echo basename($_SERVER['PHP_SELF']); ?>" method="POST"  enctype="multipart/form-data" style="font-family: calibri_light, calibri, sans-serif; font-size: 14pt;">
	<textarea cols="80" rows="6" name="post_data"></textarea><br /><br />
	<input type="file" name="uploaded_docs" style="font-size: 12pt;" /><br /><br/>
	<input type="submit" value="Post" name="post_submit" style="height: 25px; width: 60px; font-size: 12pt;" />
</form>

<?php
	function checkData($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
	}
	
	
	
	if (isset($_POST['post_data'])) {
		$post_data = checkData($_POST['post_data']);	
		if (!empty($post_data)) {
				$id = getUserField('id');
				$biz_id = getUserField('biz_id');
				$board_type = basename($_SERVER['PHP_SELF']);
				$timestamp = date("m/d/Y h:i a", strtotime("-6 hours"));
					if (isset($_FILES['uploaded_docs'])) {
						$name = $_FILES['uploaded_docs']['name'];
						$type = $_FILES['uploaded_docs']['type'];
						$temp_name = $_FILES['uploaded_docs']['tmp_name'];
						$size = $_FILES['uploaded_docs']['size'];
						$max_size = 1048576;
						$extension = strtolower(substr($name, strpos($name, '.') + 1));
						if (!empty($name)) {
							if (
							$extension=='doc'||
							$extension=='dot'||
							$extension=='docx'||
							$extension=='docm'||
							$extension=='dotx'||
							$extension=='dotm'||
							$extension=='xls'||
							$extension=='xlt'||
							$extension=='xlm'||
							$extension=='xlsx'||
							$extension=='xlsm'||
							$extension=='xltx'||
							$extension=='xltm'||
							$extension=='ppt'||
							$extension=='pps'||
							$extension=='pptx'||
							$extension=='pptm'||
							$extension=='potx'||
							$extension=='potm'||
							$extension=='ppam'||
							$extension=='ppsx'||
							$extension=='ppsm'||
							$extension=='rtf'||
							$extension=='pdf') {
							if ($max_size>=$size) {
								$location = 'uploaded_docs/'.$name;
								move_uploaded_file($temp_name, 'uploaded_docs/'.$name);
								$query = "INSERT INTO `posts` VALUES ('', '".mysql_real_escape_string($biz_id)."', '".mysql_real_escape_string($id)."', '".mysql_real_escape_string($post_data)."', '".mysql_real_escape_string($board_type)."', '".mysql_real_escape_string($location)."', '".mysql_real_escape_string($timestamp)."')";
								if ($query_run = mysql_query($query)) {
									header ('Location: '.$board_type);
								} else {
									'We could not process your request at this time.';
								}
								
							} else {
								echo 'The file you have uploaded is over the 1mb size limit.';
							}} else {
								echo 'The file you have uploaded is not an acceptable file type.';
							}
						} else {			
							$query = "INSERT INTO `posts` VALUES ('', '".mysql_real_escape_string($biz_id)."', '".mysql_real_escape_string($id)."', '".mysql_real_escape_string($post_data)."', '".mysql_real_escape_string($board_type)."', '', '".mysql_real_escape_string($timestamp)."')";
							if ($query_run = mysql_query($query)) {
								header ('Location: '.$board_type);
							} else {
								'We could not process your request at this time.';
							}
						}	
					} 
				} else {
					echo 'There is no text in the post box.';
				}
	}
	
	
	
	
	
	
	
?>

