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
        <input class="button_4"type="button"value="1週目">
        </a>
        <a href="menu2.php">
        <input class="button_5"type="button"value="2週目">
        </a>
        <a href="menu3.php">
        <input class="button_6"type="button"value="3週目">
        </a>
		<a href="menu4.php">
        <input class="button_7"type="button"value="4週目">
        </a>
		<a href="menu5.php">
        <input class="button_8"type="button"value="5週目">
        </a>
		
		<!--ヘッダとサイドおわり-->
 		<!--ページごとに週を送る→-日付を得る→日付ごとのメニューを表示→-それぞれのボタンにメニューIDを→遷移先にメニューID送る→IDをもとに材料表示-->
		<div class="menu_table">
    <table cellpadding="10">
		
		<?php
		if(isset($_GET['text']))
			$nametotal = $_GET['recipe'];

		$NameArray = explode( '|', $nametotal);
		// var_dump($NameArray);
		
		$hoge=$NameArray;
		$money="300";

		for($i = 1; $i <= 10; $i++){
			echo'<tr>';
			for($j = 1; $j <= 7; $j++){
				switch($i){
				case 1:case 2:
				case 3:case 4:
					echo "<td><a href='/item/item.php' style='text-decoration:none;'>";
					echo "<input class='kadomaru' type='button' value='$hoge[$i] $money 円'> </a></td>";
					break;
				case 5: case 6:
				case 7: case 8:
					echo'<td></td>';
					break;
				case 9:
					echo"<td><a href='choice.php'style='text-decoration:none;''>";
					echo"<input class='kadomaru_2' type='button' value='メニューの変更''></td>";
					break;
				case 10:
					echo"<td><input class='kadomaru_2'type='button'value='決定'></td>";
					break;
					
				default:
					echo "erorr!!<\br>";
				}		
			}
			echo '</tr>';
		}

		?>
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