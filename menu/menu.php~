<?php
session_start();

// ログイン状態のチェック
if (!isset($_SESSION["USERID"])) {
  header("Location: /top/login_2.php");
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
  header("Location: /top/top.html");
}
?>
<!--決定時 2
	選択時 10 --!>

<?php
header("Content-Type:text/html;charset=UTF-8");
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-env="Content-Type" conten="text/html;charset=UTF-8">
	<link rel="stylesheet"type="text/css"href="menu.css">
	<title>Reciprice</title>

</head>
 	<body>
		<!--ヘッダとサイド-->
		<div class="side">
		</div>
		<div class="header">
		<a href="/top/main.php"><img src = "/Reciprice.png"width="350.7"height="92.4"></a>
		</div>
		<a href="/user/user.php">
		<input class="button_1"type="button"value="ユーザ管理">
		</a>
		<a href="menu.php">
        <input class="button_2"type="button"value="献立表示">
		</a>
		<a href="/price/price.php">
        <input class="button_3"type="button"value="価格予測">
		</a>
		<a href="menu.php">
        <input class="button_4"type="button"value="献立表示">
        </a>
        <a href="menu2.php">
        <input class="button_5"type="button"value="履歴表示">
        </a>

		<!--ヘッダとサイドおわり-->
 		<!--ページごとに週を送る→-日付を得る→日付ごとのメニューを表示→-それぞれのボタンにメニューIDを→遷移先にメニューID送る→IDをもとに材料表示-->
		<div class="menu_table">
    	<table cellpadding="10">

		<?php
		if(isset($_GET['text']))
			$nametotal = $_GET['recipe'];

		//hairetu tosite data uketoru
		// $array = $_GET['sunday'];
		// var_dump($array);

		require_once "../liblog/liblog.php";

		/*$logWeek = array(
		  'Mon' => array(
		      'main' => '001',
		      'dish' => '函館',
		      'sub' => 'yamada@example.com',
		  ),
		  'Tue' => array(
		      'main' => '001',
		      'dish' => '函館',
		      'sub' => 'yamada@example.com',
		  ),
		  'Wed' => array(
		      'main' => '001',
		      'dish' => '函館',
		      'sub' => 'yamada@example.com',
		  ),
		  'Thu' => array(
		      'main' => '001',
		      'dish' => '函館',
		      'sub' => 'yamada@example.com',
		  ),
		  'Fri' => array(
		      'main' => '001',
		      'dish' => '函館',
		      'sub' => 'yamada@example.com',
		  ),
		  'Sat' => array(
		      'main' => '001',
		      'dish' => '函館',
		      'sub' => 'yamada@example.com',
		  ),
		 	'Sun' => array(
		      'main' => '001',
		      'dish' => '函館',
		      'sub' => 'yamada@example.com',
		  )
		);*/

		$log = new MenuLog( "localhost", "root", "", $_SESSION["USERID"]);
		//$decision = $log->ResistMenuLog($_SESSION["USERID"], $logWeek);
		$menulog  = $log->GetMenuLog($_SESSION["USERID"]);

		//var_dump($_SESSION["USERID"]);

		$Week[7][4];

		$Sunday = $_GET['Sunday'];
		$tmp = explode( '|', $Sunday);
		$subArray = explode( ';', $tmp[2]);
		unset($tmp[2]);
		array_merge($tmp);
		unset($subArray[0]);
		array_merge($subArray);
		$Week[0] = array_merge($tmp, $subArray);
		// var_dump($Week[0]);

		// $Monday = $_GET['Monday'];
		// $Week[1] = explode( '|', $Monday);
		// $Tuesday = $_GET['Thesday'];
		// $Week[2] = explode( '|', $Thesday);
		// $Wednesday = $_GET['Wednesday'];
		// $Week[3] = explode( '|', $Wednesday);
		// $Thursday = $_GET['Thursday'];
		// $Week[4] = explode( '|', $thursday);
		// $Friday = $_GET['Friday'];
		// $Week[5] = explode( '|', $Friday);
		// $Saturday = $_GET['Saturday'];
		// $Week[6] = explode( '|', $Saturday);

		$NameArray = explode( '|', $nametotal);

		// var_dump($nametotal);
		// var_dump($NameArray);
		// var_dump($Week[1][1]);

		$hoge=$NameArray;
		?>

		<?php for($i = 1; $i <= 10; $i++): ?>

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
					
					echo'<td><input class="kadomaru_2" type="button" value="0 円"></td>';
					break;
				case 9:
				?>
				<?php $url = "./choice1.php?message=".urlencode($Sunday) ?>
				<td>
						<a href=<?= $url ?> style='text-decoration:none;'>
						<form name="aaa" action="./choice1.php" method="get" >
							<input class='kadomaru_2' type='button' value='メニューの変更'>
							<input type='hidden' name='message' value='aaa'>
						</form>
						</a>
				</td>
				<?php
					break;
				case 10:
					if($j == 1)
						echo"<td><input class='kadomaru_2'type='button'value='決定'></td>";
					break;

				default:
					echo "erorr!!<\br>";
				?>
				<?php endswitch; ?>
			<?php endfor; ?>
			</tr>
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
