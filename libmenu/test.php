<?php
require_once "user.php";
require_once "../menu/ramdom.php";

$tmp = user();
// $tmp = new Menu( "localhost", "root", "" );
// var_dump( $tmp->GetMenuList( 0, 0, 0, "0010" ) );
// var_dump( $tmp->GetFoodstuffList( 0, 0, 0, "0000" ) );
// var_dump( $tmp->GetFoodstuffListfromID(200301000004));
// var_dump( $tmp->GetFoodstuffListfromID("300101000001"));
// var_dump( $tmp->GetFoodstuffListfromID("220301000033"));
// var_dump( $tmp->GetFoodstuffListfromID("101100100003"));
$obj= new hoge;
$sum_kol = $obj->totalPrice_fromMenuName("000001", "肉じゃが");

// var_dump( $tmp->GetIDfromMenuName("肉じゃが") );
// var_dump( $tmp->GetFoodstuffListfromID("211201000010"));

var_dump($sum_kol);

// $zid = $tmp->GetIDfromFoodstuffName("しらたき");
// $price = $tmp->GetFoodstuffPrice("000001",$zid);
// var_dump($price);
// var_dump($tmp->GetMenuPrice( "000001","340301000080"));
// var_dump($tmp->GetMenuPrice( "000001","320301000039"));
// var_dump($tmp->GetMenuPrice( "000001","311201000013"));
// var_dump($tmp->GetMenuPrice( "000001","511300100018"));

?>