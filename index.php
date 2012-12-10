<?php
	@session_start();
	require('libs/Smarty.class.php');
	$smarty = new Smarty;

	$smarty->debugging = false;
	$smarty->caching = true;
	$smarty->cache_lifetime = 120;
	if(isset($_SESSION['_validUser']))
	{
		$smarty->assign("nav","true",true);
	}
	$smarty->display('index.tpl');
	//
?>