<?php
if($sinusbot_ssl_activated == false){
	require_once __DIR__.'/sinusbot/sinusbot.class.php';
} else {
	require_once __DIR__.'/sinusbot/sinusbot.class.ssl.php';
};
$sinusbot = new Bot($sinusbot_ip, $sinusbot_port);
$sinusbot->Login($_SESSION['login'], $_SESSION['pass']);
if($sinusbot_instances_uuid){
	$sinusbot->selectInstance($sinusbot_instances_uuid);
} else {
	$instances_array = $sinusbot->GetInstances();
	$sinusbot->selectInstance($instances_array['0']['uuid']);
}
function html_to_obj($html) {libxml_use_internal_errors(true);$dom = new DOMDocument();$dom->loadHTML($html);return element_to_obj($dom->documentElement);};
function element_to_obj($element) {
    $obj = array( "tag" => $element->tagName );foreach ($element->attributes as $attribute) {
        $obj[$attribute->name] = $attribute->value;}foreach ($element->childNodes as $subElement) {
        if ($subElement->nodeType == XML_TEXT_NODE) {
            $obj["html"] = $subElement->wholeText;}else {
            $obj["children"][] = element_to_obj($subElement);}}return $obj;};

function read_file_db($link){
	$url = $link;
	if (file_exists($url)) {
    	$db_json_array = json_decode(file_get_contents($url), true);
	} else {
		$db_json_array = array();
	}
	return $db_json_array;
};
function put_file_db($link, $db_json_array){
	$url = $link;
	file_put_contents($url, json_encode($db_json_array));
};
function button_construct($button_id, $button_link, $button_name, $button_color, $button_etoile){
	$final = '<div class="instant"><div class="circle small-button-background" style="'.$button_color.'"></div><div class="small-button" onclick="play(\''.$button_link.'\')"></div>
<div class="small-button-shadow" style="margin-bottom:5px;"></div><div style="color:#428bca;display:initial;"><span id="'.$button_id.'" onclick="etoileclick(\''.$button_id.'\', \''.$button_link.'\', \''.$button_name.'\', \''.$button_color.'\')" class="'.$button_etoile.' glyphicon glyphicon-star"></span><span onclick="playlocal(\''.$button_link.'\')" class="glyphicon glyphicon-play-circle" aria-hidden="true"></span> '.$button_name.'</div></div>';
	return $final;
};
function get_array_button($number, $type=NULL){
	if(isset($type)){
		$number = urlencode(urldecode($number));
		$url = 'http://www.myinstants.com/search/?name='.$number;
	} else {
		$url = 'http://www.myinstants.com/?page='.$number;
	}
	$first_step = explode('<div id="instants_container">', file_get_contents($url));
	$second_step = explode('<h3 id="moar_header"' , $first_step[1] );
	if($second_step[0]=="%0A%3C%2Fdiv%3E%0A"){
		exit;
	};
	$html_decode = html_to_obj($second_step[0]);
	$html_decode = $html_decode['children'][0]['children'];
	return $html_decode;
}
function get_button_page($number, $type=NULL){
	$final = '';
	$file_json_db = read_file_db("private/db.json");
	$html_decode = get_array_button($number, $type);

	for ($a = 0; $a <= count($html_decode)-1; $a++){
		$inonuniqid = uniqid();
		$inonclickjava = substr($html_decode[$a]['children'][1]['onclick'],6,-2);
		$inonnamejava = $html_decode[$a]['children'][3]['html'];
		$inoncolorjava = $html_decode[$a]['children'][0]['style'];
		if (isset($file_json_db[substr($html_decode[$a]['children'][1]['onclick'],6,-2)])){
			$etoile = "etoile-jaune";
			} else {
			$etoile = "etoile-gris";
			};
		$final = $final.button_construct($inonuniqid, $inonclickjava, $inonnamejava, $inoncolorjava, $etoile);
	}
	
	return $final;
	};
?>