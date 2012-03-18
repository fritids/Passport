<h2 class="nomad-page-name"><?php echo $object->nickname; ?></h2>

<?php
	//print_r($schools);
	if (count($schools)){
		echo "<h3 class='profile-section-name'>Schools I've attended</h3>";
	}
	foreach($schools as $school){
		$this->render_view('schools/_item', array('locals' => array('school' => $school)));
	}
	echo "<h3 class='profile-section-name'>Denizen Comments</h3>";
	foreach($comments as $comment){
		$this->render_view('comments/_item', array('locals' => array('comment' => $comment)));
	}