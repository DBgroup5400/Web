<?php
require_once "../libmenu/user.php";

class hoge{
  /* protected propaties*/
  protected $tmp;

  public function __construct(){
    $this->tmp = user();
  }

  public function isUniqueArray( $rensou, $name ){
    $array = array_keys($rensou);

    foreach ($array as $key => $value) {
      if($value == $name)
        return false;
    }
    return true;
  }

  public function totalPrice_fromMenuName( $SessionId, $MenuName ){
    $MenuID = $this->tmp->GetIDfromMenuName( $MenuName );
    $price = $this->tmp->GetMenuPrice( $SessionId, $MenuID );
    return $price;
  }

  public function GET_MONEY( $ID, $yosan, $kind ){
    $recipe = array();
    $Recipe_kind;
    $count = 0;
    $ten_miss = 0;

    switch ($kind):
      case 1:
        $Recipe_kind = "0100";
      break;
      case 2:
        $Recipe_kind = "1000";
      break;
      case 3:
        $Recipe_kind = "0010";
      break;
      case 4:
        $Recipe_kind = "0001";
      break;
    endswitch;

    while($count < 10 && $ten_miss < 10){
      $recipe_info = $this->tmp->GetMenuList( 0, 0, 0, $Recipe_kind );
      $index = rand(0,count($recipe_info)-1);
      $recipi_name = $recipe_info[$index]["Name"];
      $sum_money = $this->totalPrice_fromMenuName( $ID, $recipi_name );

      if($sum_money < $yosan && $this->isUniqueArray($recipe, $recipi_name) ){
        $recipe += array($recipi_name => $sum_money);
        $count++;
        $ten_miss = 0;
      }

      $ten_miss++;
    }

    return $recipe;
  }
}
?>