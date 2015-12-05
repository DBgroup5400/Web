<?php
require_once "libdb.php";
require_once "libcity.php";
require_once "libfoodstuff.php";

$foodstuff = new Foodstuff( "localhost", "root", "");

  /* method that get id from foodstuff name */
$id = $foodstuff->GetIDfromFoodstuffName( "セロリ" );

  /* method that get price of foodstuff ( $_UserID, $_FoodstuffID )*/
$price = $foodstuff->GetFoodstuffPrice( "XXXXXX", $id );
var_dump( $price );

$foodstuff->RegPrice( "XXXXXX", $id, "10000", "3", NULL );
$price = $foodstuff->GetFoodstuffPrice( "XXXXXX", $id );
var_dump( $price );
?>
