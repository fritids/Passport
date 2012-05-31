<?php
	include($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');
	//print_r($_POST);
	//print_r($_FILES);
	
	$gid = intval($_POST['gid']);
	
	
	foreach($_FILES as $file){
		$name = $file['name'];
		$bits = $file['tmp_name'];
		$type = $file['type'];
		if (strpos($type, 'image') > -1){
			$rs = wp_upload_bits( $name, null, file_get_contents($bits));
			$rs['gid'] = $gid;
			groups_update_groupmeta($gid, 'avatar', $rs['url']);
		} else {
			echo 'no can do';
		}
		echo json_encode($rs);
		exit;
	}
?>