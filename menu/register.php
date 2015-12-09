<?php
	$str = $_POST["testValue"];
	$now = new MenuNow( "localhost", "root", "",  $str);
	$decision = $now->ResistMenuLog($str, $week);
?>