<?php
$nivel_dir="../"; 

require_once($nivel_dir.'includes/config.php');

$id= $_GET['id'];


$query = "DELETE FROM persona WHERE id = '".$id."';";

$result = mysql_query($query) or die(mysql_error());

$link = $_SERVER['HTTP_REFERER'];
header("Location: $link");

?>