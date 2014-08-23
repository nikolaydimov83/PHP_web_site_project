<?php 
	define("ROOT_URL", 'http://' . $_SERVER['HTTP_HOST'] . '/forom/');
	define("ROOT_PATH", dirname(__FILE__));
	
	require ("backend/dbloader.php");
	include_once("elements/topbar.php");
	include_once("elements/forum.php");
	include_once("elements/footer.php");
