<?php
	ob_start();
	@session_start();
	include ('controls/conf.php');
	require('libs/Smarty.class.php');
	$smarty = new Smarty;
	$smarty->debugging = false;
	$smarty->caching = false;
	$smarty->cache_lifetime = 120;
	$smarty->assign("login","not",true);
	$smarty->display('login.tpl');
	ob_flush();
?>