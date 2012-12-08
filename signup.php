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
		$_user=R::findOne('users','email=?',array($_email));
		if(count($_user)==0)
		{
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
			{
				$smarty->assign("error","کلمه عبور و تاییده برابر نیستند.",true);
				$smarty->display('signup.tpl');
			}
		}
		else
		{
			$smarty->assign("error","این ایمیل موجود می باشد.",true);
			$smarty->display('signup.tpl');
		}
	}
	else
		$smarty->display('signup.tpl');
?>