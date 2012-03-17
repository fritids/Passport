<?php $icon_dir=opendir("../icons/moreIcons2/");
require( '../../../../wp-load.php' );

$result = mysql_query("SELECT option_value FROM wp_options WHERE option_name = 'siteurl'");

$sitename = mysql_fetch_row($result);

$sitename = $sitename[0];
	
	$files = scandir('../icons/moreIcons2/');
	foreach($files as $iconsArray){
		//echo $iconsArray;
		if (!ereg("^\.{1,2}$", $iconsArray )&& !ereg("\.db", $iconsArray)) {
			$icon_str  = "<li><img src='".$sitename."/wp-content/plugins/wp-admin-icons/icons/moreIcons2/".$iconsArray."' class='iconsImage'></li>";
			
			
			echo $icon_str;
		}
	

	}
	
?>
