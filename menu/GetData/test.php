<?php
require_once "libdb.php";
require_once "libfoodstuff.php";
require_once "libmenu.php";

$tmp = new Menu( "localhost", "root", "" );
$tempa = new Foodstuff( "localhost", "root", "" );

// var_dump( $tmp->GetMenuList( 0, 0, 0, "0000" ) );
var_dump( $tmp->GetMenuList( 0, 0, 0, "0100" ) );
// var_dump( $tmp->GetMenuList( 0, 0, 0, "0001" ) ); //de-ta?
// var_dump( $tmp->GetMenuList( 0, 0, 0, "MDS0" ) );
// var_dump( $tmp->GetFoodstuffList( 0, 0, 0, "0000" ) );

// var_dump( $tempa->GetIDfromFoodstuffName("あさつきとベーコンのオムレツ"));
var_dump( $tmp->GetFoodstuffListfromID(412101000002));
?>
