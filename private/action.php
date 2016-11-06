<?php
if ($_GET['action']=="add" && $_GET['url'] && $_GET['name'] && $_GET['color']){
	$url = $_GET['url'];
	$name = $_GET['name'];
	$color = $_GET['color'];
	$file = read_file_db("private/db.json");
	$file[$url] = array($name, $color);
	put_file_db("private/db.json", $file);
} elseif ($_GET['action']=="delete" && $_GET['url']){
	$url = $_GET['url'];
	$file = read_file_db("private/db.json");
	unset($file[$url]);
	put_file_db("private/db.json", $file);
} else {
	$file = read_file_db("private/db.json");
	echo "<pre>";
	print_r($file);
	echo "</pre>";
}
?>