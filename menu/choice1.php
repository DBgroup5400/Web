<?php
// セッション開始
session_start();

// ログイン状態のチェック
if (!isset($_SESSION["USERID"])) {
  header("Location: ../top/login_2.php");
  exit;
}


$db['host'] = "localhost";  // DBサーバのurl
$db['user'] = "root";
$db['pass'] = "";
$db['dbname'] = "Users";

// エラーメッセージの初期化
$errorMessage = "";
?>


<!DOCTYPE html>
<html>
<head>
	<meta http-env="Content-Type" conten="text/html;charset=UTF-8">
	<link rel="stylesheet"type="text/css"href="choice.css">
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

            var recipe = {recipe : $('#recipe').val()};
            var kind = {kind : $('#kind').val()};
            // var id = {id : $('#id').val()};
            var name = {name : $('#name').val()};

            /**
             * Ajax通信メソッド
             * @param type  : HTTP通信の種類
             * @param url   : リクエスト送信先のURL
             * @param data  : サーバに送信する値
             */
            $.ajax({
                type: "POST",
                url: "nowlog_reg.php",
                data: {
                    // request: request,
                    name: name,
                    kind: kind,
                    recipe: recipe
                },
                /**
                 * Ajax通信が成功した場合に呼び出されるメソッド
                 */
                success: function(data, dataType)
                {
                    alert(data);
                    window.location.href = './menu.php';
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


	<!--ヘッダとサイドおわり-->
	<!--ページごとに週を送る→-日付を得る→日付ごとのメニューを表示→-それぞれのボタンにメニューIDを→遷移先にメニューID送る→IDをもとに材料表示-->

<?php
function printButton( $yosan, $yen, $i, $food, $table_number){
	if($yosan >= $yen){
		if($i % 2 == 1 && $table_number != 0){ //choicedテーブル以外
			 echo "<tr>";
		}
		echo "<td><input type='hidden' name='hidden[$i]' value='$yen'>";
		if($table_number != 0)
			 echo "<input class='kadomaru' type='submit' name='submit[$i]' value='$food $yen 円'>";
		else
			echo "<input class='kadomaru2' type='submit' name='submit[$i]' value='$food $yen'>";
		echo "<input type='hidden' name='food[$i]' value='$food'>";
		echo "</td>";
	}
	else{
		echo $i % 2 == 1 ? '<tr>' : '';
		echo'<td><input class="kadomaru"type="button"value='.'></a></td>';
	}
}
?>

<?php
	$money=0;
	$button=0;

	for($i = 0; $i <=10; $i++)
		$flag[$i] = 0;

	//			DISH             MAIN
	// ガーリックトースト｜チキンソテー｜味噌汁;サンマの味噌に
	if(isset($_POST['submit'])){
		$button=key($_POST['submit']);
		$flag[$button] = 1;
		$money=$_POST['hidden'][$button];
		$name=$_POST['food'][$button];
		$yosan=$_POST['kane'];
		// $nametotal = $_POST['recipe']."|".$name;
		$DAY = $_POST['day_recipe'];
		switch($_POST['kind']):
		case "1":
			$DISH = $_POST['food'][$button];
			$MAIN = $DAY[1];
			$SUBtotal = $DAY[2];
			$nametotal = $DISH."|".$DAY[1]."|".$DAY[2];
			break;
		case '2':
			$MAIN = $_POST['food'][$button];
			$DISH = $DAY[0];
			$SUBtotal = $DAY[2];
			$nametotal = $DAY[0]."|".$MAIN."|".$DAY[2];
			break;
		case '3':
			$SUB = $_POST['food'][$button];
			$SUBtotal = $DAY[2].";".$name;
			$DISH = $DAY[0];
			$MAIN = $DAY[1];
			$nametotal = $DAY[0]."|".$DAY[1]."|".$SUBtotal;
			break;
		default:
			$DISH = "ERROR!";
			break;
		endswitch;
		// $SUBtotal = $SUB.";".$name;


		// $nametotal = $DISH."|".$MAIN."|".$SUBtotal;

	}else{
		// mysqlへの接続
  		$mysqli = new mysqli($db['host'], $db['user'], $db['pass']);
		if ($mysqli->connect_errno) {
			print('<p>データベースへの接続に失敗しました。</p>' . $mysqli->connect_error);
			exit();
		}

		// データベースの選択
		$mysqli->select_db($db['dbname']);

		//予算の更新
		//$query = "update Users set Max_Pricw = ".$_POST["price"]." where ID = '" . $_SESSION["USERID"] . "'";

		$query = "SELECT * FROM Users WHERE ID = '".$_SESSION["USERID"]."'";
		$result = $mysqli->query($query);
		if (!$result) {
			print('クエリーが失敗しました。' . $mysqli->error);
			$mysqli->close();
			exit();
    	}

    	// 予算の取り出し
		while ($row = $result->fetch_assoc())
			$yosan = $row['Max_Pricw'];
		// データベースの切断
		$mysqli->close();
	}
?>


<?php
		$yosan = $yosan - $money;

		/*
		現状ランダムな金額を挿入していきている．
		また，今のままだとページリセットがかかるごとに，データベースもしくはデータが更新されてしまうため，トランザクションが多いかも？
		そもそも出力する献立は，1000円以下なら1000円以下の料理しか表示しないようにしたい．(選択して消えた部分に対して更にデータ挿入．)
		 */

		require_once "ramdom.php";
		require_once "liblog.php";
		require_once "libnow.php";

		/*
		$nowWeek = array(
		  'Mon' => array('main' => 'aaa','dish' => 'aaa', 'sub' => 'aa'),
		  'Tue' => array('main' => '','dish' => '', 'sub' => ''),
		  'Wed' => array('main' => '','dish' => '', 'sub' => ''),
		  'Thu' => array('main' => '','dish' => '', 'sub' => ''),
		  'Fri' => array('main' => '','dish' => '', 'sub' => ''),
		  'Sat' => array('main' => '','dish' => '', 'sub' => ''),
		  'Sun' => array('main' => '','dish' => '', 'sub' => ''),
		);

		*/
		$source = array();
		$obj= new hoge;

		$kind = 1; // 1:dish, 2:main, 3:sub, 4:soup
		$recipe = $obj->GET_MONEY($_SESSION["USERID"], $yosan, $kind);

		$sunday = $_GET['message'];

		echo'<div class="menu_table"><table cellpadding="10">';
		echo'<form method="post"action="">';
		// var_dump($name);
		$i = 1;
		foreach ($recipe as $key => $value) {
			printButton($yosan, $value, $i, $key,1);
			$i++;
		}
		// var_dump($recipe);

		// var_dump($_GET['message']);
		// var_dump($_GET['kind']);
		// var_dump($DAY[0]);
		// var_dump($nowWeek);
		echo'<input type="hidden"name="kane"value="'.$yosan.'">';
		echo'<input type="hidden"name="recipe"value="'.$nametotal.'">';
		// echo'<input type="hidden"name="recipe"value="'.$DISH.'">';
		echo'<input type="hidden"name="kind"value="1">';
		?>
		<input type="hidden" name="day_recipe[]" value=<?= $DISH ?>>
		<input type="hidden" name="day_recipe[]" value=<?= $MAIN ?>>
		<input type="hidden" name="day_recipe[]" value=<?= $SUBtotal ?>>
		<?php
		echo'</form></table>';
		echo'</div>';

		// -----------------------------------------------------------

		echo'<div class="menu_table3"><table cellpadding="10">';
		echo'<form method="post"action="">';
		$i = 1;

		$kind = 2; // 1:dish, 2:main, 3:sub, 4:soup
		$recipe = $obj->GET_MONEY($_SESSION["USERID"], $yosan, $kind);

		foreach ($recipe as $key => $value) {
			printButton($yosan, $value, $i, $key,1);
			$i++;
		}
		echo'<input type="hidden"name="kane"value="'.$yosan.'">';
		echo'<input type="hidden"name="recipe"value="'.$nametotal.'">';
		echo'<input type="hidden"name="kind"value="2">';
		?>
		<input type="hidden" name="day_recipe[]" value=<?php echo $DISH ?>>
		<input type="hidden" name="day_recipe[]" value=<?php echo $MAIN ?>>
		<input type="hidden" name="day_recipe[]" value=<?php echo $SUBtotal ?>>
		<?php
		echo'</form></table>';
		echo'</div>';

		// -----------------------------------------------------------
		echo'<div class="menu_table4"><table cellpadding="10">';
		echo'<form method="post"action="">';
		$i = 1;

		$kind = 3; // 1:dish, 2:main, 3:sub, 4:soup
		$recipe = $obj->GET_MONEY($_SESSION["USERID"], $yosan, $kind);

		foreach ($recipe as $key => $value) {
			printButton($yosan, $value, $i, $key,1);
			$i++;
		}
		echo'<input type="hidden"name="kane"value="'.$yosan.'">';
		echo'<input type="hidden"name="recipe"value="'.$nametotal.'">';
		echo'<input type="hidden"name="kind"value="3">';
		?>
		<input type="hidden" name="day_recipe[]" value=<?php echo $DISH ?>>
		<input type="hidden" name="day_recipe[]" value=<?php echo $MAIN ?>>
		<input type="hidden" name="day_recipe[]" value=<?php echo $SUBtotal ?>>
		<?php
		echo'</form></table>';
		echo'</div>';

		// -----------------------------------------------------------

		echo'<div class="choiced">';
		echo'<table cellpadding="10">';
		echo'<form method="post"action="">';

		$NameArray = explode( '|', $nametotal);
		// var_dump($NameArray[2]);
		$tmp = $NameArray[2];
		unset($NameArray[2]);
		// var_dump($NameArray);
		// var_dump($tmp);
		$array_tmp = explode( ';', $tmp);
		unset($array_tmp[0]);
		array_merge($array_tmp);

		// var_dump($array_tmp);
		$NameArray = array_merge($NameArray, $array_tmp);
		// $NameArray = $NameArray + $array_tmp;
		// var_dump($NameArray);
		for($i = 0; $i < count($NameArray) && count($NameArray) != 1; $i++ )
			printButton($yosan, $NameArray[$i], $i, $food,0);

		echo'</form>';
		echo'</form></table></div>';
		// -----------------------------------------------------------

	?>

	</table>

	<div>

		<table class="Day2" cellpadding="10">
			<tr>
				<?php
				for($i = 1;$i <= 4; $i++){
					if($i==1)
						echo'<td>主菜</td>';
					else if($i==2)
						echo'<td>主食</td>';
					else if($i==3)
						echo'<td>サブ</td>';
				}
				?>
			</tr>
		</table>
	</div>

	<?php
	//sunday
	echo'<input class="button_9"type="button"value='.'残予算'.''.$yosan.''.'円'.'>';
	echo'<form action="./choice1.php"method="get">';
	echo'<input class="button_10"type="submit"value="やりなおし">';
	echo "</form>";

	// echo'<form action="menu.php" method="get">';
	// var_dump($nametotal);
	// var_dump($sunday);
	?>
	<form method="post">

	<!-- // echo'<input class="button_11"type="submit" name=text value=確定 >'; -->
	<?php
		switch ($_GET['message']):
			case '1':
				$kind = "Sun";
				break;
			case "2":
				$kind = "Mon";
				break;
			case "3":
				$kind = "Tue";
				break;
			case "4":
				$kind = "Wed";
				break;
			case "5":
				$kind = "Thu";
				break;
			case "6":
				$kind = "Fri";
				break;
			case "7":
				$kind = "Sat";
				break;
			default:
				$kind = "ERROR!";
				break;
		endswitch;
		// var_dump($kind);
	?>

  <input id="recipe" value='<?= $nametotal ?>' type="hidden" />
  <input id="kind" value=<?= $kind ?> type="hidden" />
  <input id="name" value=<?= $_SESSION["USERID"] ?> type="hidden" />
	<input class="button_11" id="send" value="確定" type="submit" />

	<!--
	if((count($NameArray)-1) != 0)
		$array = explode( '|', $nametotal);
	else
		$array = explode( '|', $sunday);

	$i = 1;

	?> -->

	<input type="hidden" name="sunday[]" value=<?php echo $array[0]?>>
	<input type="hidden" name="sunday[]" value=<?php echo $array[1]?>>
	<input type="hidden" name="sunday[]" value=<?php echo $array[2]?>>
	<input type="hidden" name="sunday[]" value=<?php echo $array[3]?>>

	<?php
	if((count($NameArray)-1) != 0)
		echo'<input type="hidden" name="Sunday" value="'.$nametotal.'">';
	else
		echo'<input type="hidden" name="Sunday" value="'.$sunday.'">';

	echo"</form>";

	?>

</body>
</html>
