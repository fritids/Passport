<?php	
	echo '<div id="add-school-modal" class="modal modal-style-medium">';
	echo '<form>';
	include('add-school-row.php');
	echo '<input type="submit" class="prevent-default button-large profile-add-school-submit" value="Add School" />';
	echo '</form>';
	echo '<p class="add-school-extra-info">If you attended the same school twice, enter it twice with the two different time spans you attended.</p>';
	echo '</div>';