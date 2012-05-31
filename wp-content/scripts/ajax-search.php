<?php
/*
define('WP_CACHE', true); //Added by WP-Cache Manager
define('DB_NAME', 'tckbase_dev');     // The name of the database
define('DB_USER', 'denizenmag');     // Your MySQL username
define('DB_PASSWORD', 'depanda007'); // ...and password
define('DB_HOST', 'mysql.denizenmag.com');  
*/
mysql_connect('mysql.denizenmag.com', 'denizenmag', 'depanda007');
mysql_select_db('tckbase_dev');

$q = (mysql_real_escape_string($_REQUEST['query']));
$sq = strtolower($q);
//wp_0dusy5_bp_groups
$query = "SELECT id, name, slug FROM wp_0dusy5_bp_groups WHERE LOWER(name) LIKE '".$sq."%'";
$result = mysql_query($query);
$names = array();
while($name = mysql_fetch_object($result)){
	$name->value = $name->name;
	$names[] = $name;
}
echo json_encode($names);
exit;