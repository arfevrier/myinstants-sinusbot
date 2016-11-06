<?php
if($_GET['action']=="play" && $_GET['url']){
	$sinusbot->Playurl($_GET['url'], "buttonsong");
	$resultprint['result']="Played";
} elseif($_GET['action']=="volume" && $_GET['value']){
	$sinusbot->volumeset($_GET['value']);
	$resultprint['result']="Volume set ".$_GET['value'];
} elseif($_GET['action']=="random"){
	$array_list_button = get_array_button(rand(1,419));
	$link_to_play = substr($array_list_button[rand(0,119)]['children'][1]['onclick'],6,-2);
	$sinusbot->Playurl("http://www.myinstants.com".$link_to_play, "buttonsong");
	$resultprint['result']="Played random music: ".$link_to_play;
} elseif($_GET['action']=="stop"){
	$sinusbot->PlayStop();
	$resultprint['result']="Stopped";
} elseif($_GET['action']=="info"){
	$resultprint['result']=$sinusbot->GetInstanceStatus();
} else {
	$resultprint['result']="No valide request";
};
print_r($resultprint);
?>