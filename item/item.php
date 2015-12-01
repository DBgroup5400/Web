<?php
header("Content-Type:text/html;charset=UTF-8");
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-env="Content-Type" conten="text/html;charset=UTF-8">
	<link rel="stylesheet"type="text/css"href="item.css">
	<title>Reciprice</title>

</head>
 	<body>
		<!--ヘッダとサイド-->
		<div class="side">
		</div>
		<div class="header">
		<a href="/top/main.php"><img src = "/Reciprise_title.png"width="350.7"height="92.4"></a>
		</div>
		<a href="/user/user.php">
		<input class="button_1"type="button"value="ユーザ管理">
		</a>
		<a href="/menu/menu.php">
        <input class="button_2"type="button"value="献立表示">
		</a>
		<a href="/price/price.php">
        <input class="button_3"type="button"value="価格予測">
		</a>
		<!--メニューの数はメニューIDより取得予定-->
		<a href="item.php">
        <input class="button_4"type="button"value="材料1">
        </a>
        <a href="item2.php">
        <input class="button_5"type="button"value="材料2">
        </a>
        <a href="item3.php">
        <input class="button_6"type="button"value="材料3">
        </a>
		<a href="item4.php">
        <input class="button_7"type="button"value="材料4">
        </a>
		<a href="item5.php">
        <input class="button_8"type="button"value="材料5">
        </a>

		<!--ヘッダとサイドおわり-->
 		<!--ページごとに週を送る→-日付を得る→日付ごとのメニューを表示→-それぞれのボタンにメニューIDを→遷移先にメニューID送る→IDをもとに材料表示-->
		<div class="menu_table">
    <table cellpadding="10">

		<?php

		require_once "../libmenu/user.php";
		$tmp = user();
		// var_dump( $tmp->GetFoodstuffListfromID("101100100003"));
		// $stuff = $tmp->GetFoodstuffListfromID("101100100003");
		// var_dump( count($stuff) );
		var_dump($_GET['recipe']);

		// var_dump( $tmp->GetIDfromMenuName($_GET['recipe']));
		$ID = $tmp->GetIDfromMenuName($_GET['recipe']);
		// var_dump( $tmp->GetFoodstuffListfromID($ID));
		$stuff = $tmp->GetFoodstuffListfromID($ID);
		// var_dump($stuff);

		$amount = array();
		$stuffname = array();
		$kakaku = array();

		for($i = 1; $i <= count($stuff); $i++ ):
			echo'<tr>';
			for($j = 1; $j <= 3; $j++):
				switch($j):
					case 1:
					?>
						<td>
						<input class="kadomaru"type="button" value="<?= $stuff[($i-1)]["Name"] ?>">
						</td><td></td>
					<?php
						break;
					case 2: ?>
						<td>
						<input class="kadomaru"type="button" value="<?= $stuff[($i-1)]["Amount"] ?>">
						</td><td></td>
					<?php
						break;
					case 3: ?>
						<td>
						<input class="kadomaru"type="button" value="<?= $stuff[($i-1)]["Unit"] ?>">
						</td><td></td>
					<?php

						break;
					?>

				<?php
				endswitch;
			endfor;
			echo '</tr>';
		endfor;

		?>
		</table>
		<table class="Day" cellpadding="20">
		<tr>
		<?php
		for($i = 1;$i <= 3; $i++):
			switch($i):
			case 1:
				echo'<td>材料</td>';
				break;
			case 2:
        echo'<td></td><td></td><td>量</td>';
        break;
			case 3:
				echo'<td></td><td></td><td>価格</td>';
				break;
			endswitch;
		endfor;

		?>
		</tr>
		</table>

		<form>
			<div style="text-align:center">
			<center>
			<p> <input type="button" value="前のページへ戻る" onclick="history.back()"> </p>
			</center>
			</div>
		</form>

		</div>


	</body>
</html>

<?php

?>
