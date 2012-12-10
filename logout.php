<?php
	ob_start();
	@session_start();
	if(isset($_SESSION['_validUser']))
	{
		unset($_SESSION['_validUser']);
		header('Location: index.php');
	}
	ob_flush();
	//
?>