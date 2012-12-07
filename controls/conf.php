<?php
	require('rb.php');
	$dbname='notiya';
	$dbUser='root';
	$dbPass='';
	R::setup('mysql:host=localhost;dbname='.$dbname,$dbUser,$dbPass);
?>