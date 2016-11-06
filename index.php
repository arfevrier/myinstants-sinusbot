<?php
session_start();
require_once __DIR__.'/config.php';
if(isset($_POST['user'])){
	require_once __DIR__.'/private/sinusbot/sinusbot.class.php';
	$sinusbot_login = new Bot($sinusbot_ip, $sinusbot_port);
	$sinusbot_login->Login($_POST['user'], $_POST['pass']);
	if($sinusbot_login->GetInfo()){
		$_SESSION['login'] = $_POST['user'];
		$_SESSION['pass'] = $_POST['pass'];
		$_SESSION['deco'] = true;
	} else {
		$login_incorrect = "Invalid login (Use sinusbot login)";
	}
} elseif($webinterface_use_login_page == false && !$_SESSION['login']){
	$_SESSION['login'] = $sinusbot_login;
	$_SESSION['pass'] = $sinusbot_password;
};
if(!isset($_SESSION['login'])){
	include('private/login.php');
} else {
	require_once('private/class.php');
	
	if(!isset($_GET['page'])){
		include('private/header.php');
		include('private/home.php');
	} elseif($_GET['page'] == 'upload'){
		include('private/header.php');
		include('private/upload.php');
	} elseif($_GET['page'] == 'favori'){
		include('private/header.php');
		include('private/favori.php');
	} elseif($_GET['page'] == 'search'){
		include('private/search.php');
	} elseif($_GET['page'] == 'iframe'){
		include('private/iframe.php');
	} elseif($_GET['page'] == 'sinusbot'){
		include('private/sinusbot.php');
	} elseif($_GET['page'] == 'action'){
		include('private/action.php');
	} elseif($_GET['page'] == 'deco'){
		session_destroy();
		header('Location: ?');
	} else {
		include('private/header.php');
		echo '<div style="margin-top: 90px;">No page found.</div>';
	}
}
?>
