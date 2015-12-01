<?php
  /*
    異なるn個から異なるm個を選び出す場合の、全てのパターンを得たい
    http://freefielder.jp/blog/2013/10/combinations-n-m.html 参照(2015/08/30)
  */
  /* 引数 $source：選択元要素の配列 */
  /* 引数 $m：$source から異なる $m 個を選ぶ */
  function getCpattern( $source, $m ){
    $n = sizeof($source);
    return ptn( $source, $n, array(), 0, $n-$m+1 );
  }

  /* ptn：内部で再帰的に呼び出される関数 */
  function ptn( $source, $n, $subset, $begin, $end ){
    $p = array();
    for( $i = $begin; $i<$end; $i++){
      $tmp =array_merge( $subset, (array)$source[$i] );
      if( $end+1 <= $n )
        $p = array_merge($p , ptn( $source, $n, $tmp, $i+1, $end+1 ) );
      else
        array_push( $p, $tmp );
    }
    return $p;
  }
?>
