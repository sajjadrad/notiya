<?php
	@session_start();
	include ('controls/conf.php');
	require('libs/Smarty.class.php');
	$smarty = new Smarty;
	$smarty->debugging = false;
	$smarty->caching = false;
	$smarty->cache_lifetime = 120;
	if(isset($_POST['submit']))
	{
		$_email=$_POST['email'];
		$_password=$_POST['password'];
		$_confirm=$_POST['confirm'];
		if($_password==$_confirm)
		{
			$user=R::dispense('users');
			$user->email=$_email;
			$user->password=sha1($_password);
			$user->permission=2;
			R::store($user);
			echo "User Created";
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=login.php">';
		}
	}
	else
		$smarty->display('signup.tpl');
?>