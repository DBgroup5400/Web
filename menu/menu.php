<?php
session_start();

// ログイン状態のチェック
if (!isset($_SESSION["USERID"])) {
  header("Location: ../top/login_2.php");
  exit;
}
if (isset($_POST["logout"])) {
  // セッション変数のクリア
$_SESSION = array();
// クッキーの破棄は不要
//if (ini_get("session.use_cookies")) {
//    $params = session_get_cookie_params();
//    setcookie(session_name(), '', time() - 42000,
//        $params["path"], $params["domain"],
//        $params["secure"], $params["httponly"]
//    );
//}
// セッションクリア
@session_destroy();
  header("Location: ../top/top.html");
}
?>


<?php
header("Content-Type:text/html;charset=UTF-8");
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-env="Content-Type" conten="text/html;charset=UTF-8">
	<link rel="stylesheet"type="text/css"href="menu.css">
	<title>Reciplan</title>
	<script src="http://code.jquery.com/jquery-1.6.2.min.js"></script>
    <script>
    $(document).ready(function()
    {

        /**
         * 送信ボタンクリック
         */
        $('#send').click(function()
        {
            //POSTメソッドで送るデータを定義します var data = {パラメータ名 : 値};
            // var request = {request : $('#request').val()};

            var recipeMon = {recipeMon : $('#recipeMon').val()};
            var recipeTue = {recipeTue : $('#recipeTue').val()};
            var recipeWed = {recipeWed : $('#recipeWed').val()};
            var recipeThu = {recipeThu : $('#recipeThu').val()};
            var recipeFri = {recipeFri : $('#recipeFri').val()};
            var recipeSat = {recipeSat : $('#recipeSat').val()};
            var recipeSun = {recipeSun : $('#recipeSun').val()};
            var id = {id : $('#id').val()};

            /**
             * Ajax通信メソッド
             * @param type  : HTTP通信の種類
             * @param url   : リクエスト送信先のURL
             * @param data  : サーバに送信する値
             */
            $.ajax({
                type: "POST",
                url: "log_reg.php",
                data: {
                    // request: request,
                    id: id,
                    recipeMon: recipeMon,
										recipeTue: recipeTue,
										recipeWed: recipeWed,
										recipeThu: recipeThu,
										recipeFri: recipeFri,
										recipeSat: recipeSat,
										recipeSun: recipeSun,
                },
                /**
                 * Ajax通信が成功した場合に呼び出されるメソッド
                 */
                success: function(data, dataType)
                {
                    alert(data);
                    window.location.href = './menulog.php';
                },
                error: function(XMLHttpRequest, textStatus, errorThrown)                {
                    //エラーメッセージの表示
                    alert('Error : ' + errorThrown);
                }
            });

            //サブミット後、ページをリロードしないようにする
            return false;
        });
    });
    </script>

</head>
 	<body>
		<!--ヘッダとサイド-->
		<div class="side">
		</div>
		<div class="header">
		<a href="../top/main.php"><img src = "../Reciplan.png"width="350.7"height="92.4"></a>
		</div>
		<a href="../user/user.php">
		<input class="button_1"type="button"value="ユーザ管理">
		</a>
		<a href="menu.php">
        <input class="button_2"type="button"value="献立表示">
		</a>
		<a href="../price/price.php">
        <input class="button_3"type="button"value="価格予測">
		</a>
		<a href="menu.php">
        <input class="button_4"type="button"value="献立表示">
        </a>
        <a href="menulog.php">
        <input class="button_5"type="button"value="履歴表示">
        </a>

		<!--ヘッダとサイドおわり-->
 		<!--ページごとに週を送る→-日付を得る→日付ごとのメニューを表示→-それぞれのボタンにメニューIDを→遷移先にメニューID送る→IDをもとに材料表示-->

		<div class="menu_table">
    	<table cellpadding="10">

		<?php
		if(isset($_GET['text']))
			$nametotal = $_GET['recipe'];

		// hairetu tosite data uketoru
		// $array = $_GET['sunday'];
		// var_dump($array);

		require_once "liblog.php";
    require_once "libnow.php";
		require_once "ramdom.php";

    
		$logWeek = array(
		  'Mon' => array('main' => '','dish' => '', 'sub' => ''),
		  'Tue' => array('main' => '','dish' => '', 'sub' => ''),
		  'Wed' => array('main' => '','dish' => '', 'sub' => ''),
		  'Thu' => array('main' => '','dish' => '', 'sub' => ''),
		  'Fri' => array('main' => '','dish' => '', 'sub' => ''),
		  'Sat' => array('main' => '','dish' => '', 'sub' => ''),
		  'Sun' => array('main' => '','dish' => '', 'sub' => ''),
		);
  


		// $nowWeek = array(
		//   'Mon' => array('main' => '','dish' => '', 'sub' => ''),
		//   'Tue' => array('main' => '','dish' => '', 'sub' => ''),
		//   'Wed' => array('main' => '','dish' => '', 'sub' => ''),
		//   'Thu' => array('main' => '','dish' => '', 'sub' => ''),
		//   'Fri' => array('main' => '','dish' => '', 'sub' => ''),
		//   'Sat' => array('main' => '','dish' => '', 'sub' => ''),
		//   'Sun' => array('main' => '','dish' => '', 'sub' => ''),
		// );

		// $log = new MenuLog( "localhost", "root", "", $_SESSION["USERID"]);
		// $decision = $log->ResistMenuLog($_SESSION["USERID"], $logWeek);
		// $menulog  = $log->GetMenuLog($_SESSION["USERID"]);

		// $now = new MenuLog( "localhost", "root", "", $_SESSION["USERID"]);
		// $decision = $now->ResistMenuLog($_SESSION["USERID"], $nowWeek);
		// $nowlog  = $now->GetMenuLog($_SESSION["USERID"]);
  
    $obj= new hoge;

		$now = new MenuNow( "localhost", "root", "",  $_SESSION["USERID"]);
		$nowlog  = $now->GetMenuLog($_SESSION["USERID"]);

  //   var_dump("" == $nowlog["Mon"]["main"]);
  //   var_dump("" == $nowlog["Sun"]["main"]);
  //   var_dump(count($nowlog["Sun"]["main"]));
		// var_dump($nowlog);

		$Week[7][4];

/*		$Sunday = $_GET['Sunday'];
		$tmp = explode( '|', $Sunday);
		$subArray = explode( ';', $tmp[2]);
		unset($tmp[2]);
		array_merge($tmp);
		unset($subArray[0]);
		array_merge($subArray);
		$Week[0] = array_merge($tmp, $subArray);*/

		$kind = array("Sun", "Mon","Tue", "Wed", "Thu", "Fri", "Sat");
		// var_dump($kind);
		foreach ($kind as $key => $value) {
			$subArray = explode( ';', $nowlog[$value]["sub"]);
			$Week[$key][0] =  $nowlog[$value]["dish"];
			$Week[$key][1] =  $nowlog[$value]["main"];
			$Week[$key][2] =  $subArray[1];
			$Week[$key][3] =  $subArray[2];
		}

		$NameArray = explode( '|', $nametotal);

		// var_dump($nametotal);
		// var_dump($NameArray);
		// var_dump($Week);

		$hoge=$NameArray;

		$now = new MenuNow( "localhost", "root", "", $_SESSION["USERID"]);

		?>

		<?php for($i = 1; $i <= 11; $i++): ?>
		<tr>
			<?php for($j = 1; $j <= 7; $j++): ?>
				<?php switch($i):
				case 1:case 2:
				case 3:case 4:
				?>
				<?php
					$hoge = $Week[($j-1)][$i-1];
					$url = "./../item/item.php?recipe=".urlencode($hoge);
				?>
					<td>
					<a href= <?= $url ?> style='text-decoration:none;'>
					<input class='kadomaru' type='button' value='<?= $hoge?>'>
					<!-- <input type='hidden' name='recipe' value='$NameArray[$i]]'> -->
					</a>
					</td>

				<?php	break; ?>

				<?php
				case 5:break;
				case 6:break;
				case 7:break;
				case 8:
        // $sum_total = array();
        for($counter = 0; $counter < 4; $counter++){
          if ("" == $Week[$j-1][$counter])
            $sum_total[$j-1] += 0;
          else {
            $sum_total[$j-1] += $obj->totalPrice_fromMenuName($_SESSION["USERID"], $Week[($j-1)][$counter]);
          }
          // $sum_total = 1000;
        }

        ?>
					<td><input class="kadomaru_22" type="button" value="<?= $sum_total[$j-1]?> 円"></td>
        <?php
					break;

				case 9:
          $TOTAL = 0;
          foreach ($sum_total as $key => $value) {
            $TOTAL += $value;
          }
					if($j == 1):
          ?>
						<tr><td><input class='kadomaru_22' type='button' value='<?= $TOTAL?> 円'>
          <?php
          endif;
					break;
				case 10:
				?>
				<?php

				// $url = "./choice1.php?message=".urlencode($Sunday);
				$url = "./choice1.php?message=".$j;
				?>


				<td>
						<a href=<?= $url ?> style='text-decoration:none;'>
						<form name="aaa" action="./choice1.php" method="get" >
							<input class='kadomaru_2' type='button' value='メニューの変更'>
							<!-- <input type='hidden' name='message' value='aaa'> -->
							<!-- <input type='hidden' name='kind' value='<?= $j ?>'> -->
						</form>
						</a>
				</td>
				<?php break; ?>

				<?php
				case 11;

					if($j == 1):
					foreach ($kind as $key => $value)
						$recipe[$key] = $nowlog[$value]["dish"]."|".$nowlog[$value]["main"]."|".$nowlog[$value]["sub"];
					 ?>
				  <input id="recipeMon" value='<?= $recipe[1] ?>' type="hidden" />
				  <input id="recipeTue" value='<?= $recipe[2] ?>' type="hidden" />
				  <input id="recipeWed" value='<?= $recipe[3] ?>' type="hidden" />
				  <input id="recipeThu" value='<?= $recipe[4] ?>' type="hidden" />
				  <input id="recipeFri" value='<?= $recipe[5] ?>' type="hidden" />
				  <input id="recipeSat" value='<?= $recipe[6] ?>' type="hidden" />
				  <input id="recipeSun" value='<?= $recipe[0] ?>' type="hidden" />

				  <input id="id" value='<?= $_SESSION["USERID"] ?>' type="hidden" />
					<tr><td><input input class='kadomaru_2' id="send" value="保存" type="submit" /></td>

					<?php endif; ?>


				<?php
					break;

				default:
					echo "erorr!!<\br>";
				?>

				<?php endswitch; ?>
			<?php endfor; ?>

		<?php endfor; ?>

		</table>
		<table class="Day" cellpadding="10"><tr>
		<?php
		for($i = 1;$i <= 7; $i++){
			switch($i){
			case 1:	echo'<td>日曜日</td>'; break;
			case 2: echo'<td>月曜日</td>'; break;
			case 3: echo'<td>火曜日</td>'; break;
			case 4: echo'<td>水曜日</td>'; break;
			case 5: echo'<td>木曜日</td>'; break;
			case 6: echo'<td>金曜日</td>'; break;
			case 7: echo'<td>土曜日</td>'; break;
			}
		}
		?>
		</tr></table>
		</div>

		<div>
		<table class="item" cellpadding="27">

    <?php
    for($i = 1;$i <= 5; $i++){
    	switch($i){
			case 1:	echo'<tr><td>主菜</td></tr>'; break;
			case 2: echo'<tr><td>主食</td></tr>'; break;
			case 3: echo'<tr><td>サブ1</td></tr>';break;
			case 4: echo'<tr><td>サブ2</td></tr>';break;
    	}
    }
        ?>

    </table>
		</div>
	</body>
</html>
