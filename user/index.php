<?php
	@session_start();
	if(isset($_SESSION['_validUser']))
	{
		require('../libs/Smarty.class.php');
		$smarty = new Smarty;
		$smarty->debugging = false;
		$smarty->caching = true;
		$smarty->cache_lifetime = 120;
		$smarty->assign("nav","true",true);
		$smarty->display('../templates/user.tpl');
	}
	else
	{
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../login.php">';
	}
?>