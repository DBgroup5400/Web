<?php
	require_once "libdb.php";
	require_once "libfoodstuff.php";
	require_once "libmenu.php";

	function user(){
		$tmp = new Menu( "localhost", "root", "" );
		return $tmp;
	}
?>
