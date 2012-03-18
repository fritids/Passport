<?php
	echo '<article id="school-listing-'.$school->id.'" class="school-listing">';
	echo '<h3 class="school-listing-name"><a href="/schools/show/'.$school->id.'">'.$school->name.'</a></h3>';
	echo '</article>';
?>