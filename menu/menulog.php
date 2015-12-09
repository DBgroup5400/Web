<?php
require_once'liblog.php';
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
<!--決定時 2
	選択時 10 --!>

<?php
header("Content-Type:text/html;charset=UTF-8");
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-env="Content-Type" conten="text/html;charset=UTF-8">
	<link rel="stylesheet"type="text/css"href="menu2.css">
	<title>Reciplan</title>

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
        <a href="menu2.php">
        <input class="button_5"type="button"value="履歴表示">
        </a>
      

		<!--ヘッダとサイドおわり-->
 		<!--ページごとに週を送る→-日付を得る→日付ごとのメニューを表示→-それぞれのボタンにメニューIDを→遷移先にメニューID送る→IDをもとに材料表示-->
		<div class="menu_table">
    	<table cellpadding="10">

		<?php
		
			//$query = "SELECT * from UM".$_uid.";";
			//$result = $this->_db_throw_query( "Users_Geo", $query );
			$log = new MenuLog('localhost', 'root','', $_SESSION["USERID"] );
			/*$list = array(
  'Mon' => array(
      'main' => '月曜main', 
      'dish' => '月曜dish', 
      'sub' =>  '月曜sub',
  ),
  'Tue' => array(
      'main' => '火曜main', 
      'dish' => '火曜dish', 
      'sub' =>  '火曜sub1|火曜sub2',
  ),
 'Wed' => array(
      'main' => '水曜main', 
      'dish' => '水曜dish', 
      'sub' =>  '水曜sub1|水曜sub2',
  ),
 'Thu' => array(
      'main' => '木曜main', 
      'dish' => '木曜dish', 
      'sub' =>  '木曜sub1|木曜sub2',
  ),
 'Fri' => array(
      'main' => '金曜main', 
      'dish' => '金曜dish', 
      'sub' =>  '金曜sub1|金曜sub2',
  ),
 'Sat' => array(
      'main' => '土曜main', 
      'dish' => '土曜dish', 
      'sub' =>  '土曜sub1|土曜sub2',

  ),
 'Sun' => array(
      'main' => '日曜main', 
      'dish' => '日曜dish', 
      'sub' =>  '日曜sub1|日曜sub2',
  ),
);*/
			//$decision =  $log->ResistMenuLog( $_SESSION["USERID"], $list );

			$menulog = $log -> GetMenuLog($_SESSION["USERID"]);
			//var_dump($menulog);
		?>

		<?php for($i = 1; $i <= 4; $i++): ?>
			<!--横向き-->
			<?php for($j = 1; $j <= 7; $j++): ?>
				<?php switch($i):
				case 1:
				//主菜
					switch($j):
						case 1:
						//日曜
							$menu_name = $menulog["Sun"]["main"];
							echo "<tr><td><input class='kadomaru' type='button' value='".$menu_name."'></td>";
							break;
						case 2:
						//月曜
							$menu_name = $menulog["Mon"]["main"];
							echo "<td><input class='kadomaru' type='button' value='".$menu_name."'></td>";
							break;

						case 3:
						//火曜
							$menu_name = $menulog["Tue"]["main"];
							echo "<td><input class='kadomaru' type='button' value='".$menu_name."'></td>";
							break;
						case 4:
						//水曜
							$menu_name = $menulog["Wed"]["main"];
							echo "<td><input class='kadomaru' type='button' value='".$menu_name."'></td>";
							break;

						case 5:
						//木曜
							$menu_name = $menulog["Thu"]["main"];
							echo "<td><input class='kadomaru' type='button' value='".$menu_name."'></td>";
							break;
						case 6:
						//金曜
							$menu_name = $menulog["Fri"]["main"];
							echo "<td><input class='kadomaru' type='button' value='".$menu_name."'></td>";
							break;
						case 7:
						//土曜
							$menu_name = $menulog["Sat"]["main"];
							echo "<td><input class='kadomaru' type='button' value='".$menu_name."'></td></tr>";
							break;	
						default:
					endswitch;
					break;
				case 2:
				//主食
					switch($j):
						case 1:
						//日曜
							$menu_name = $menulog["Sun"]["dish"];
							echo "<tr><td><input class='kadomaru' type='button' value='".$menu_name."'></td>";
							break;
						case 2:
						//月曜
							$menu_name = $menulog["Mon"]["dish"];
							echo "<td><input class='kadomaru' type='button' value='".$menu_name."'></td>";
							break;

						case 3:
						//火曜
							$menu_name = $menulog["Tue"]["dish"];
							echo "<td><input class='kadomaru' type='button' value='".$menu_name."'></td>";
							break;
						case 4:
						//水曜
							$menu_name = $menulog["Wed"]["dish"];
							echo "<td><input class='kadomaru' type='button' value='".$menu_name."'></td>";
							break;

						case 5:
						//木曜
							$menu_name = $menulog["Thu"]["dish"];
							echo "<td><input class='kadomaru' type='button' value='".$menu_name."'></td>";
							break;
						case 6:
						//金曜
							$menu_name = $menulog["Fri"]["dish"];
							echo "<td><input class='kadomaru' type='button' value='".$menu_name."'></td>";
							break;
						case 7:
						//土曜
							$menu_name = $menulog["Sat"]["dish"];
							echo "<td><input class='kadomaru' type='button' value='".$menu_name."'></td></tr>";
							break;	
						default:
					endswitch;
					break;
				case 3:
				//サブ1
					switch($j):
						case 1:
						//日曜
							$Sun_subs = explode("|",$menulog["Sun"]["sub"]);
							echo "<tr><td><input class='kadomaru' type='button' value='".$Sun_subs[0]."'></td>";
							break;
						case 2:
						//月曜
							$Mon_subs = explode("|",$menulog["Mon"]["sub"]);
							echo "<td><input class='kadomaru' type='button' value='".$Mon_subs[0]."'></td>";
							break;

						case 3:
						//火曜
							$Tue_subs = explode("|",$menulog["Tue"]["sub"]);
							echo "<td><input class='kadomaru' type='button' value='".$Tue_subs[0]."'></td>";
							break;
						case 4:
						//水曜
							$Wed_subs = explode("|",$menulog["Wed"]["sub"]);
							echo "<td><input class='kadomaru' type='button' value='".$Wed_subs[0]."'></td>";
							break;

						case 5:
						//木曜
							$Thu_subs = explode("|",$menulog["Thu"]["sub"]);
							echo "<td><input class='kadomaru' type='button' value='".$Thu_subs[0]."'></td>";
							break;
						case 6:
						//金曜
							$Fri_subs = explode("|",$menulog["Fri"]["sub"]);
							echo "<td><input class='kadomaru' type='button' value='".$Fri_subs[0]."'></td>";
							break;
						case 7:
						//土曜
							$Sat_subs = explode("|",$menulog["Sat"]["sub"]);
							echo "<td><input class='kadomaru' type='button' value='".$Sat_subs[0]."'></td></tr>";
							break;
						default:
					endswitch;
					break;
				case 4:
				//サブ2
					switch($j):
						case 1:
						//日曜
							echo "<tr><td><input class='kadomaru' type='button' value='".$Sun_subs[1]."'></td>";
							break;
						case 2:
						//月曜
							echo "<td><input class='kadomaru' type='button' value='".$Mon_subs[1]."'></td>";
							break;

						case 3:
						//火曜
							echo "<td><input class='kadomaru' type='button' value='".$Tue_subs[1]."'></td>";
							break;
						case 4:
						//水曜
							echo "<td><input class='kadomaru' type='button' value='".$Wed_subs[1]."'></td>";
							break;

						case 5:
						//木曜
							echo "<td><input class='kadomaru' type='button' value='".$Thu_subs[1]."'></td>";
							break;
						case 6:
						//金曜
							echo "<td><input class='kadomaru' type='button' value='".$Fri_subs[1]."'></td>";
							break;
						case 7:
						//土曜
							echo "<td><input class='kadomaru' type='button' value='".$Sat_subs[1]."'></td></tr>";
							break;
						default:
					endswitch;
					break;
				case 5: case 6:
				case 7: case 8:
				case 9:	case 10:
				default:
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
