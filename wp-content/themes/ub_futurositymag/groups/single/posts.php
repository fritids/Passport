
<?php
	
	$gi = get_group_info();
	
	$posts = get_group_posts($gi->id);
	if (count($posts)){
		echo '<h3 class="school-section-header">Stories Related To '.$gi->name.'</h3>';
	}
	foreach($posts as $pi){
		include($_SERVER['DOCUMENT_ROOT'].THEME.'/tease-single.php');
	}
?>