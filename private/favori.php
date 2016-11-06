<?php
$final ='';
$file_json = read_file_db("private/db.json");

foreach ($file_json as $array_link => $array_name_and_color) {
	$inonuniqid = uniqid();
    $value_click = $array_link;
	$value_name = $array_name_and_color[0];
	$value_color = $array_name_and_color[1];
	
	$final = $final.button_construct($inonuniqid, $value_click, $value_name, $value_color, "etoile-jaune");
}
echo '<div id="instants_container">'.$final.'</div>';
?>