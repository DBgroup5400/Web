<?php

require_once "user.php";
$tmp = user();
// $tmp = new Menu( "localhost", "root", "" );
// var_dump( $tmp->GetMenuList( 0, 0, 0, "0100" ) );
// var_dump( $tmp->GetFoodstuffList( 0, 0, 0, "0000" ) );
// var_dump( $tmp->GetFoodstuffListfromID(200301000004));
// var_dump( $tmp->GetFoodstuffListfromID("300101000001"));
// var_dump( $tmp->GetFoodstuffListfromID("220301000033"));
var_dump( $tmp->GetFoodstuffListfromID("101100100003"));
var_dump( $tmp->GetFoodstuffListfromID("211201000024"));
var_dump( $tmp->GetIDfromMenuName("牛肉と里芋のスープ煮"));

?>