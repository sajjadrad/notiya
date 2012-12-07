<?php
	require('libs/Smarty.class.php');
	$smarty = new Smarty;

	$smarty->debugging = false;
	$smarty->caching = true;
	$smarty->cache_lifetime = 120;
	$smarty->display('index.tpl');
?>