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
		<a href="main.php"><img src = "Reciprice.png"width="350.7"height="92.4"></a>
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
		$hoge="セロリ";
		$huga="300";
		for($i = 1; $i <= 10; $i++ ){
			echo'<tr>';
			for($j = 1; $j <= 7; $j++){
				if(5 <= $i && $i  <= 8){
					echo'<td></td>';
				}
				else if($i == 9){
					echo'<td><a href="choice.php"style="text-decoration:none;"><input class="kadomaru_2"type="button"value="メニューの変更"></td>';
				}
				else if($i == 10){
					echo'<td><input class="kadomaru_2"type="button"value="決定"></td>';	
				}
				else{
					echo'<td><a href="item.php"style="text-decoration:none;"><input class="kadomaru"type="button"value='.$hoge.''.　.''.$huga.''.円.'></a></td>';
				}
			}
			echo '</tr>';
		}

		?>
		</table>
		<table class="Day" cellpadding="10">
		<tr>
		<?php
		for($i = 1;$i <= 7; $i++){
			if($i==1)
				echo'<td>日曜日</td>';
			else if($i==2)
                echo'<td>月曜日</td>';
			else if($i==3)
				echo'<td>火曜日</td>';
			else if($i==4)
                echo'<td>水曜日</td>';
            else if($i==5)
                echo'<td>木曜日</td>';
            else if($i==6)
                echo'<td>金曜日</td>';
			else if($i==7)
                echo'<td>土曜日</td>';
		}
		?>
		</tr>
		</table>
		</div>

		<div>
		<table class="item" cellpadding="27">
        
        <?php
        for($i = 1;$i <= 5; $i++){
			if($i ==1)
            	echo'<tr><td>主菜</td></tr>';
			else if($i ==2)
                echo'<tr><td>主食</td></tr>';
			else if($i ==3)
                echo'<tr><td>サブ1</td></tr>';
			else if($i ==4)
                echo'<tr><td>サブ2</td></tr>';
		  //	else if($i ==5)
            //    echo'<tr><td></td></tr>';

        }
        ?>
        
        </table>
		</div>
	</body>
</html>

<?php

?>
