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
		<a href="main.php"><img src = "Reciprise_title.png"width="350.7"height="92.4"></a>
		</div>
		<a href="user.php">
		<input class="button_1"type="button"value="ユーザ管理">
		</a>
		<a href="menu.php">
        <input class="button_2"type="button"value="献立表示">
		</a>
		<a href="price.php">
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
		$hoge='セロリ';
		for($i = 1; $i <= 5; $i++ ){
			echo'<tr>';
			for($j = 1; $j <= 3; $j++){
				echo'<td><input class="kadomaru"type="button"value="'.$hoge.'"></td><td></td>';	
			}
			echo '</tr>';
		}

		?>
		</table>
		<table class="Day" cellpadding="20">
		<tr>
		<?php
		for($i = 1;$i <= 3; $i++){
			if($i==1)
				echo'<td>材料</td>';
			else if($i==2)
                echo'<td></td><td></td><td>量</td>';
			else if($i==3)
				echo'<td></td><td></td><td>価格</td>';
		}
		
		?>
		</tr>
		</table>
		</div>
	</body>
</html>

<?php

?>
