<?php
session_start();

// ログイン状態のチェック
if (!isset($_SESSION["USERID"])) {
  header("Location: ../top/login_2.php");
  exit;
}


header("Content-Type:text/html;charset=UTF-8");
?>
<?php
	function lister($data){
		$foodlist = 0;
		$link = mysql_connect('localhost','root','');
		if(!$link){
			die("connection faild".mysql_error());
		}
		//print("connection suceed</br>");
		/*insert data into private data*/	
		$db_selected = mysql_select_db('Foodstuff',$link);

		if(!$db_selected){
			die("select faild".mysql_error());		
		}	
		mysql_query('SET NAMES utf8',$link);
		$query = sprintf("SELECT * FROM Foodstuff.Foodstuff_List WHERE Foodstuff_ID LIKE '%s%%'",$data);
		//echo $query;
		$result  = mysql_query($query);
		while( ($data = mysql_fetch_array($result)) != 0){
			printf("<option value=\"%s\"> %s</option>\n",$data['Foodstuff_ID'], $data['Foodstuff_Name']);
		
			$Foodlist = array( $data['Foodstuff_Name'], $data['Foodstuff_ID']);
		}

		mysql_close($link);
		return $Foodlist;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-env="Content-Type" conten="text/html;charset=UTF-8">
	<link rel="stylesheet"type="text/css"href="price4.css">
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
		<a href="price.php">
        <input class="button_3"type="button"value="価格予測">
		</a>
		<a href="price.php">
        <input class="button_4"type="button"value="野菜・果物類">
        </a>
        <a href="price2.php">
        <input class="button_5"type="button"value="肉類">
        </a>
        <a href="price3.php">
        <input class="button_6"type="button"value="魚類">
        </a>
		<a href="price4.php">
        <input class="button_7"type="button"value="乳製品">
        </a>
		<a href="price5.php">
        <input class="button_8"type="button"value="炭水化物">
        </a>
		
		<!--ヘッダとサイドおわり-->
 		<!--ページごとに週を送る→-日付を得る→日付ごとのメニューを表示→-それぞれのボタンにメニューIDを→遷移先にメニューID送る→IDをもとに材料表示-->
		<div class="menu_table">	
        	<form method="POST"action="Forecast.php">
			<p>卵:
			<select name="1"class="sel"required>
			<option value=""></option>
			<?php
				lister('41');
			?>
			</select>	
			<input type="submit"value="予測を見る"class="Forecast">
			</form>
		</div>
		<div class="menu_table2">

			<form method="POST"action="Forecast.php">
            <p>牛乳:
            <select name="1"class="sel"required>
            <option value=""></option>
            <?php
				lister('42');
			?>
            </select>
            <input type="submit"value="予測を見る"class="Forecast">
            </form>
		
		</div>
		<div class="menu_table3">

            <form method="POST"action="Forecast.php">
            <p>その他:
            <select name="1"class="sel"required>
            <option value=""></option>
            <?php
				lister('50');
			?>
            </select>
            <input type="submit"value="予測を見る"class="Forecast">
            </form>

        </div>
		

	</body>
</html>

<?php

?>
