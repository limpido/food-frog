<?php
@$db = new mysqli('localhost','f32ee','f32ee','foodfrog');

if ($db->connect_error){
	echo "Database is not online"; 
	exit;
}

if (!$db->select_db("foodfrog"))
	exit("<p>Unable to locate the foodfrog database</p>");
?>