<?php
	echo '<article id="nomad-listing-'.$nomad->ID.'" class="nomad-listing">';
	echo '<h3 class="nomad-listing-name"><a href="/nomads/show/'.$nomad->ID.'">'.$nomad->nickname.'</a></h3>';
	echo '<img class="nomad-listing-thumb" src="https://graph.facebook.com/'.$nomad->fbid.'/picture" />';
	echo '</article>';
	//print_r($nomad);