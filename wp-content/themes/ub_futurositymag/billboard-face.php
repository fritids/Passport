<?php
	include('connect.php');
	$query = "SELECT *, users.name AS 'username' FROM users, markers WHERE users.user_id = markers.user_id ORDER BY RAND() LIMIT 3";
	$result = mysql_query($query);
	while($row = mysql_fetch_object($result)){
		print_r($row);
		echo '<div class="facedetail">';
		print '<a href="http://www.facebook.com/'.$row->fbname.'"><img src="https://graph.facebook.com/'.$row->fbname.'/picture"></a>';
		echo '<div class="faceinfo">';
		print '<h3 class="numbah">seven countries</h3>';
		print '<h4 class="namebah"><i>'.$row->username.'Steph Yiu:</i>';
		print '<span class="countrybah">Hong Kong, Taiwan, Singapore, Scotland, Oregon, Illinois and Massachusetts.</span>';
		echo '</h4>';
		echo '</div>';
		echo '</div>';
	}
?>

<div class="facedetail">
			<a href="http://www.facebook.com/crushgear"><img src="http://a0.twimg.com/profile_images/1137284429/40744_705506606965_2406301_39418455_4147621_n.jpg"></a>
			<div class="faceinfo">
			<h3 class="numbah">seven countries</h3>
			<h4 class="namebah"><i>Steph Yiu:</i>
			<span class="countrybah">Hong Kong, Taiwan, Singapore, Scotland, Oregon, Illinois and Massachusetts.</span>
			</h4>
			</div>
		</div>