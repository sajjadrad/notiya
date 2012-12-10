<?php
	ob_start();
	@session_start();
	if(isset($_SESSION['_validUser']))
	{
		header('Location: user/index.php');
	}
	else
	{
		include ('controls/conf.php');
		require('libs/Smarty.class.php');
		$smarty = new Smarty;
		$smarty->debugging = false;
		$smarty->caching = false;
		$smarty->cache_lifetime = 120;
		$smarty->assign("login","not",true);
		if(isset($_POST['email']) and isset($_POST['password']))
		{
			$_email=$_POST['email'];
			$_password=$_POST['password'];
			$user=R::findOne('users','email=?',array($_email));
			if($user)
			{
				if($user->password==sha1($_password))
				{
					$_SESSION['_validUser']=$user->id;
					header('Location: user/index.php');
				}
				else
				{
					$smarty->assign("error","ایمیل یا کلمه عبور اشتباه است.",true);
					$smarty->display('login.tpl');
				}
			}
			else
			{
				$smarty->assign("error","ایمیل یا کلمه عبور اشتباه است.",true);
				$smarty->display('login.tpl');
			}
				
		}
		else
			$smarty->display('login.tpl');
	}
	ob_flush();
	//
?>