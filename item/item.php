<?php
require_once "libdb.php";
require_once "libcity.php";
require_once "libfoodstuff.php";
session_start();

// ログイン状態のチェック
if (!isset($_SESSION["USERID"])) {
  header("Location: ../top/login_2.php");
  exit;
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-env="Content-Type" conten="text/html;charset=UTF-8">
	<link rel="stylesheet"type="text/css"href="item.css">
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
		<a href="../menu/menu.php">
        <input class="button_2"type="button"value="献立表示">
		</a>
		<a href="../price/price.php">
        <input class="button_3"type="button"value="価格予測">
		</a>
		<!--メニューの数はメニューIDより取得予定-->
	

		<!--ヘッダとサイドおわり-->
 		<!--ページごとに週を送る→-日付を得る→日付ごとのメニューを表示→-それぞれのボタンにメニューIDを→遷移先にメニューID送る→IDをもとに材料表示-->
<form method="post"action=""accept-charset="UTF-8">		
	<div class="menu_table">
    <table cellpadding="10">

		<?php

		require_once "../libmenu/user.php";
			$tmp = user();
		// var_dump( $tmp->GetFoodstuffListfromID("101100100003"));
		// $stuff = $tmp->GetFoodstuffListfromID("101100100003");
		//311201000014
		// var_dump( count($stuff) );
		

		// var_dump( $tmp->GetIDfromMenuName($_GET['recipe']));
			$ID = $tmp->GetIDfromMenuName($_GET['recipe']);
		//var_dump($ID);
		// var_dump( $tmp->GetFoodstuffListfromID($ID));
			$stuff = $tmp->GetFoodstuffListfromID($ID);
		// var_dump($stuff);
		
		//var_dump($zid);
		
		$amount = array();
		$stuffname = array();
		$kakaku = array();

		for($i = 1; $i <= count($stuff); $i++ ):
			echo'<tr>';
			for($j = 1; $j <= 4; $j++):
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
						<input class="kadomaru"type="button" value="<?= $stuff[($i-1)]["Amount"].$stuff[($i-1)]["Unit"]  ?>">
						</td><td></td>
					<?php
						break;
					case 3: ?>
						<td>
						<?php
							//価格入力が終わったらコメントアウト外す
						$zid = $tmp->GetIDfromFoodstuffName($stuff[($i-1)]["Name"]);
						$price = $tmp->GetFoodstuffPrice($_SESSION["USERID"], $zid);
						?>
						<input class="kadomaru"type="button" value="<?= $price.円?>">
						</td><td></td>
					<?php
						break;
					case 4: ?>
						<td>
					<?php
        		echo '<input class="items"type="text"name="'.$i.'"pattern="^[0-9]+$"maxlength="6">';
					?>	
						</td><td></td>

						
        						
					<?php

						break;
					?>

				<?php
				endswitch;
			endfor;
			echo '</tr>';
			
			if(empty($_POST[$i])){
			//空
			}
			else{
				$id2 = $tmp->GetIDfromFoodstuffName( $stuff[($i-1)]["Name"]);
				$Date = date('Y-m-d');
				$tmp->RegPrice( $_SESSION["USERID"], $id2, $_POST[$i], $stuff[($i-1)]["Amount"], $Date );
				//echo$i.'番目＝'.$_POST[$i].'<br>';
				
			}
			
		endfor;
		

		
		?>
		</table>
		<table class="Day" cellpadding="20">
		<tr>
		<?php
		for($i = 1;$i <= 4; $i++):
			switch($i):
			case 1:
				echo'<td>';
				echo '材料名';
				echo'</td>';
				break;
			case 2:
        echo'<td></td><td></td><td>量</td>';
        break;
			case 3:
				echo'<td></td><td></td><td>価格</td>';
				break;
			case 4:
				echo'<td></td><td></td><td>購入価格[円]</td>';
				break;
			endswitch;
		endfor;

		?>
		</tr>
		</table>

		<form>
			<div style="text-align:center">
			<center>
			<!-- <form action="../menu/menu.php" method="get"> -->
				<!-- <input class="kadomaru_2"type="submit"value="前のページへ戻る"> -->
			<!-- </form> -->
			<p> <input class="kadomaru_2"type="button" value="前のページへ戻る" onclick="history.back()"> </p>
			<p><input class="button_submit"type="submit"name="register"value="変更を保存"></p>
			</center>
			</div>
		</form>

		</div>


	</body>
</html>

<?php

?>
