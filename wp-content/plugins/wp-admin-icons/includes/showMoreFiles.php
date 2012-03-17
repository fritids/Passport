<?php $icon_dir=opendir("../icons/moreIcons/");
require( '../../../../wp-load.php' );

$result = mysql_query("SELECT option_value FROM wp_options WHERE option_name = 'siteurl'");

$sitename = mysql_fetch_row($result);

$sitename = $sitename[0];
	$files = scandir('../icons/moreIcons/');
	foreach($files as $iconsArray){
		//echo $iconsArray;
		if (!ereg("^\.{1,2}$", $iconsArray )&& !ereg("\.db", $iconsArray)) {
			$icon_str  = "<li><img src='".$sitename."/wp-content/plugins/wp-admin-icons/icons/moreIcons/".$iconsArray."' class='iconsImage'></li>";
			
			
			echo $icon_str;
		}
	

	}
	/*
	while ($iconsArray=readdir($icon_dir)) {
		
		
				
		if (!ereg("^\.{1,2}$", $iconsArray )&& !ereg("\.db", $iconsArray)) {
			$icon_str  = "<li><img src='".$sitename."/wp-content/plugins/wp-admin-icons/icons/moreIcons/".$iconsArray."' class='iconsImage'></li>";
			
			echo $result[0];
			
			echo $icon_str;
		}
	}*/
	
?>
