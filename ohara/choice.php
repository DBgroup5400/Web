<!--決定時 2
	選択時 10 --!>

<?php
header("Content-Type:text/html;charset=UTF-8");
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-env="Content-Type" conten="text/html;charset=UTF-8">
	<link rel="stylesheet"type="text/css"href="choice.css">
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
	
		<?php
		$hoge="セロリ";
		$huga="300";
		$money=0;
		$button=0;
		
		for($i = 0; $i <=10; $i++){
			$flag[$i] = 0;
		}
		if(isset($_POST['submit'])){
			$button=key($_POST['submit']);
			$flag[$button] = 1;
			$money=$_POST['hidden'][$button];
			$yosan=$_POST['kane'];
		}
		else{
			$yosan = 10;
		}

		$ju = 10;
		$yosan = $yosan - $money;

		for($i = 0; $i <= 10; $i++ ){
			$food[$i] = "うどん";
			$yen[$i] = $i;
		}
				
		 for($i = 0; $i <= 10; $i++ ){
            $subfood[$i] = "サラダ";
            $subyen[$i] = 4;
        }
		


		echo'<div class="menu_table">';
		echo' <table cellpadding="10">';
		echo'<form method="post"action="">';
		for($i = 1; $i <= 10; $i++ ){
			
				if($i == 1){
					if($yosan >= $ju){
					echo'<tr><td><input type="hidden"name="hidden['.$i.']"value="'.$ju.'"><input class="kadomaru"type="submit"name="submit['.$i.']"value='.$food[$i].''.　.''.$ju.''.円.'></td>';
					}
					else{
					echo'<tr><td><input class="kadomaru"type="button"value='.　.'></a></td>';
					}
				}
				if($i == 2){
                    if($yosan >= $yen[$i]){
                    echo'<td><input type="hidden"name="hidden['.$i.']"value="'.$yen[$i].'"><input class="kadomaru"type="submit"name="submit['.$i.']"value='.$food[$i].''.　.''.$yen[$i].''.円.'></td>';
                    }
                    else{
                    echo'<td><input class="kadomaru"type="button"value='.　.'></a></td>';
                    }
                }
				if($i == 3){
                    if($yosan >= $yen[$i]){
                    echo'<tr><td><input type="hidden"name="hidden['.$i.']"value="'.$yen[$i].'"><input class="kadomaru"type="submit"name="submit['.$i.']"value='.$food[$i].''.　.''.$yen[$i].''.円.'></td>';
                    }
                    else{
                    echo'<tr><td><input class="kadomaru"type="button"value='.　.'></a></td>';
                    }
                }
				if($i == 4){
                    if($yosan >= $yen[$i]){
                    echo'<td><input type="hidden"name="hidden['.$i.']"value="'.$yen[$i].'"><input class="kadomaru"type="submit"name="submit['.$i.']"value='.$food[$i].''.　.''.$yen[$i].''.円.'></td>';
                    }
                    else{
                    echo'<td><input class="kadomaru"type="button"value='.　.'></a></td>';
                    }
                }
				if($i == 5){
                    if($yosan >= $yen[$i]){
                    echo'<tr><td><input type="hidden"name="hidden['.$i.']"value="'.$yen[$i].'"><input class="kadomaru"type="submit"name="submit['.$i.']"value='.$food[$i].''.　.''.$yen[$i].''.円.'></td>';
                    }
                    else{
                    echo'<tr><td><input class="kadomaru"type="button"value='.　.'></a></td>';
                    }
                }
				if($i == 6){
                    if($yosan >= $yen[$i]){
                    echo'<td><input type="hidden"name="hidden['.$i.']"value="'.$yen[$i].'"><input class="kadomaru"type="submit"name="submit['.$i.']"value='.$food[$i].''.　.''.$yen[$i].''.円.'></td>';
                    }
                    else{
                    echo'<td><input class="kadomaru"type="button"value='.　.'></a></td>';
                    }
                }
                if($i == 7){
                    if($yosan >= $yen[$i]){
                    echo'<tr><td><input type="hidden"name="hidden['.$i.']"value="'.$yen[$i].'"><input class="kadomaru"type="submit"name="submit['.$i.']"value='.$food[$i].''.　.''.$yen[$i].''.円.'></td>';
                    }
                    else{
                    echo'<tr><td><input class="kadomaru"type="button"value='.　.'></a></td>';
                    }
                }
                if($i == 8){
                    if($yosan >= $yen[$i]){
                    echo'<td><input type="hidden"name="hidden['.$i.']"value="'.$yen[$i].'"><input class="kadomaru"type="submit"name="submit['.$i.']"value='.$food[$i].''.　.''.$yen[$i].''.円.'></td>';
                    }
                    else{
                    echo'<td><input class="kadomaru"type="button"value='.　.'></a></td>';
                    }
                }
                if($i == 9){
                    if($yosan >= $yen[$i]){
                    echo'<tr><td><input type="hidden"name="hidden['.$i.']"value="'.$yen[$i].'"><input class="kadomaru"type="submit"name="submit['.$i.']"value='.$food[$i].''.　.''.$yen[$i].''.円.'></td>';
                    }
                    else{
                    echo'<tr><td><input class="kadomaru"type="button"value='.　.'></a></td>';
                    }
                }
                if($i == 10){
                    if($yosan >= $yen[$i]){
                    echo'<td><input type="hidden"name="hidden['.$i.']"value="'.$yen[$i].'"><input class="kadomaru"type="submit"name="submit['.$i.']"value='.$food[$i].''.　.''.$yen[$i].''.円.'></td>';
                    }
                    else{
                    echo'<td><input class="kadomaru"type="button"value='.　.'></a></td>';
                    }
                }
		}
        echo'<input type="hidden"name="kane"value="'.$yosan.'">';


		echo'</form></table></div>';

		echo'<div class="menu_table2">';
		echo'<table cellpadding="10">';
		echo'<form method="post"action="">';
		for($i = 1; $i <= 10; $i++ ){
			
				if($i == 1){
					if($yosan >= $ju){
					echo'<tr><td><input type="hidden"name="hidden['.$i.']"value="'.$ju.'"><input class="kadomaru"type="submit"name="submit['.$i.']"value='.$food[$i].''.　.''.$ju.''.円.'></td>';
					}
					else{
					echo'<tr><td><input class="kadomaru"type="button"value='.　.'></a></td>';
					}
				}
				if($i == 2){
                    if($yosan >= $yen[$i]){
                    echo'<td><input type="hidden"name="hidden['.$i.']"value="'.$yen[$i].'"><input class="kadomaru"type="submit"name="submit['.$i.']"value='.$food[$i].''.　.''.$yen[$i].''.円.'></td>';
                    }
                    else{
                    echo'<td><input class="kadomaru"type="button"value='.　.'></a></td>';
                    }
                }
				if($i == 3){
                    if($yosan >= $yen[$i]){
                    echo'<tr><td><input type="hidden"name="hidden['.$i.']"value="'.$yen[$i].'"><input class="kadomaru"type="submit"name="submit['.$i.']"value='.$food[$i].''.　.''.$yen[$i].''.円.'></td>';
                    }
                    else{
                    echo'<tr><td><input class="kadomaru"type="button"value='.　.'></a></td>';
                    }
                }
				if($i == 4){
                    if($yosan >= $yen[$i]){
                    echo'<td><input type="hidden"name="hidden['.$i.']"value="'.$yen[$i].'"><input class="kadomaru"type="submit"name="submit['.$i.']"value='.$food[$i].''.　.''.$yen[$i].''.円.'></td>';
                    }
                    else{
                    echo'<td><input class="kadomaru"type="button"value='.　.'></a></td>';
                    }
                }
				if($i == 5){
                    if($yosan >= $yen[$i]){
                    echo'<tr><td><input type="hidden"name="hidden['.$i.']"value="'.$yen[$i].'"><input class="kadomaru"type="submit"name="submit['.$i.']"value='.$food[$i].''.　.''.$yen[$i].''.円.'></td>';
                    }
                    else{
                    echo'<tr><td><input class="kadomaru"type="button"value='.　.'></a></td>';
                    }
                }
				if($i == 6){
                    if($yosan >= $yen[$i]){
                    echo'<td><input type="hidden"name="hidden['.$i.']"value="'.$yen[$i].'"><input class="kadomaru"type="submit"name="submit['.$i.']"value='.$food[$i].''.　.''.$yen[$i].''.円.'></td>';
                    }
                    else{
                    echo'<td><input class="kadomaru"type="button"value='.　.'></a></td>';
                    }
                }
                if($i == 7){
                    if($yosan >= $yen[$i]){
                    echo'<tr><td><input type="hidden"name="hidden['.$i.']"value="'.$yen[$i].'"><input class="kadomaru"type="submit"name="submit['.$i.']"value='.$food[$i].''.　.''.$yen[$i].''.円.'></td>';
                    }
                    else{
                    echo'<tr><td><input class="kadomaru"type="button"value='.　.'></a></td>';
                    }
                }
                if($i == 8){
                    if($yosan >= $yen[$i]){
                    echo'<td><input type="hidden"name="hidden['.$i.']"value="'.$yen[$i].'"><input class="kadomaru"type="submit"name="submit['.$i.']"value='.$food[$i].''.　.''.$yen[$i].''.円.'></td>';
                    }
                    else{
                    echo'<td><input class="kadomaru"type="button"value='.　.'></a></td>';
                    }
                }
                if($i == 9){
                    if($yosan >= $yen[$i]){
                    echo'<tr><td><input type="hidden"name="hidden['.$i.']"value="'.$yen[$i].'"><input class="kadomaru"type="submit"name="submit['.$i.']"value='.$food[$i].''.　.''.$yen[$i].''.円.'></td>';
                    }
                    else{
                    echo'<tr><td><input class="kadomaru"type="button"value='.　.'></a></td>';
                    }
                }
                if($i == 10){
                    if($yosan >= $yen[$i]){
                    echo'<td><input type="hidden"name="hidden['.$i.']"value="'.$yen[$i].'"><input class="kadomaru"type="submit"name="submit['.$i.']"value='.$food[$i].''.　.''.$yen[$i].''.円.'></td>';
                    }
                    else{
                    echo'<td><input class="kadomaru"type="button"value='.　.'></a></td>';
                    }
                }
		}
	
		echo'<input type="hidden"name="kane"value="'.$yosan.'">';
		
		echo'</form>';
		echo'</form></table></div>';

		
		echo'<div class="menu_table3">';
		echo' <table cellpadding="10">';
		echo'<form method="post"action="">';
		for($i = 1; $i <= 10; $i++ ){
			
				if($i == 1){
					if($yosan >= $ju){
					echo'<tr><td><input type="hidden"name="hidden['.$i.']"value="'.$ju.'"><input class="kadomaru"type="submit"name="submit['.$i.']"value='.$food[$i].''.　.''.$ju.''.円.'></td>';
					}
					else{
					echo'<tr><td><input class="kadomaru"type="button"value='.　.'></a></td>';
					}
				}
				if($i == 2){
                    if($yosan >= $subyen[$i]){
                    echo'<td><input type="hidden"name="hidden['.$i.']"value="'.$subyen[$i].'"><input class="kadomaru"type="submit"name="submit['.$i.']"value='.$subfood[$i].''.　.''.$subyen[$i].''.円.'></td>';
                    }
                    else{
                    echo'<td><input class="kadomaru"type="button"value='.　.'></a></td>';
                    }
                }
				if($i == 3){
                    if($yosan >= $yen[$i]){
                    echo'<tr><td><input type="hidden"name="hidden['.$i.']"value="'.$yen[$i].'"><input class="kadomaru"type="submit"name="submit['.$i.']"value='.$food[$i].''.　.''.$yen[$i].''.円.'></td>';
                    }
                    else{
                    echo'<tr><td><input class="kadomaru"type="button"value='.　.'></a></td>';
                    }
                }
				if($i == 4){
                    if($yosan >= $yen[$i]){
                    echo'<td><input type="hidden"name="hidden['.$i.']"value="'.$yen[$i].'"><input class="kadomaru"type="submit"name="submit['.$i.']"value='.$food[$i].''.　.''.$yen[$i].''.円.'></td>';
                    }
                    else{
                    echo'<td><input class="kadomaru"type="button"value='.　.'></a></td>';
                    }
                }
				if($i == 5){
                    if($yosan >= $yen[$i]){
                    echo'<tr><td><input type="hidden"name="hidden['.$i.']"value="'.$yen[$i].'"><input class="kadomaru"type="submit"name="submit['.$i.']"value='.$food[$i].''.　.''.$yen[$i].''.円.'></td>';
                    }
                    else{
                    echo'<tr><td><input class="kadomaru"type="button"value='.　.'></a></td>';
                    }
                }
				if($i == 6){
                    if($yosan >= $yen[$i]){
                    echo'<td><input type="hidden"name="hidden['.$i.']"value="'.$yen[$i].'"><input class="kadomaru"type="submit"name="submit['.$i.']"value='.$food[$i].''.　.''.$yen[$i].''.円.'></td>';
                    }
                    else{
                    echo'<td><input class="kadomaru"type="button"value='.　.'></a></td>';
                    }
                }
                if($i == 7){
                    if($yosan >= $yen[$i]){
                    echo'<tr><td><input type="hidden"name="hidden['.$i.']"value="'.$yen[$i].'"><input class="kadomaru"type="submit"name="submit['.$i.']"value='.$food[$i].''.　.''.$yen[$i].''.円.'></td>';
                    }
                    else{
                    echo'<tr><td><input class="kadomaru"type="button"value='.　.'></a></td>';
                    }
                }
                if($i == 8){
                    if($yosan >= $yen[$i]){
                    echo'<td><input type="hidden"name="hidden['.$i.']"value="'.$yen[$i].'"><input class="kadomaru"type="submit"name="submit['.$i.']"value='.$food[$i].''.　.''.$yen[$i].''.円.'></td>';
                    }
                    else{
                    echo'<td><input class="kadomaru"type="button"value='.　.'></a></td>';
                    }
                }
                if($i == 9){
                    if($yosan >= $yen[$i]){
                    echo'<tr><td><input type="hidden"name="hidden['.$i.']"value="'.$yen[$i].'"><input class="kadomaru"type="submit"name="submit['.$i.']"value='.$food[$i].''.　.''.$yen[$i].''.円.'></td>';
                    }
                    else{
                    echo'<tr><td><input class="kadomaru"type="button"value='.　.'></a></td>';
                    }
                }
                if($i == 10){
                    if($yosan >= $yen[$i]){
                    echo'<td><input type="hidden"name="hidden['.$i.']"value="'.$yen[$i].'"><input class="kadomaru"type="submit"name="submit['.$i.']"value='.$food[$i].''.　.''.$yen[$i].''.円.'></td>';
                    }
                    else{
                    echo'<td><input class="kadomaru"type="button"value='.　.'></a></td>';
                    }
                }
		}
        echo'<input type="hidden"name="kane"value="'.$yosan.'">';


		echo'</form></table></div>';

		echo'<div class="menu_table4">';
		echo'<table cellpadding="10">';
		echo'<form method="post"action="">';
		for($i = 1; $i <= 10; $i++ ){
			
				if($i == 1){
					if($yosan >= $ju){
					echo'<tr><td><input type="hidden"name="hidden['.$i.']"value="'.$ju.'"><input class="kadomaru"type="submit"name="submit['.$i.']"value='.$food[$i].''.　.''.$ju.''.円.'></td>';
					}
					else{
					echo'<tr><td><input class="kadomaru"type="button"value='.　.'></a></td>';
					}
				}
				if($i == 2){
                    if($yosan >= $yen[$i]){
                    echo'<td><input type="hidden"name="hidden['.$i.']"value="'.$yen[$i].'"><input class="kadomaru"type="submit"name="submit['.$i.']"value='.$food[$i].''.　.''.$yen[$i].''.円.'></td>';
                    }
                    else{
                    echo'<td><input class="kadomaru"type="button"value='.　.'></a></td>';
                    }
                }
				if($i == 3){
                    if($yosan >= $yen[$i]){
                    echo'<tr><td><input type="hidden"name="hidden['.$i.']"value="'.$yen[$i].'"><input class="kadomaru"type="submit"name="submit['.$i.']"value='.$food[$i].''.　.''.$yen[$i].''.円.'></td>';
                    }
                    else{
                    echo'<tr><td><input class="kadomaru"type="button"value='.　.'></a></td>';
                    }
                }
				if($i == 4){
                    if($yosan >= $yen[$i]){
                    echo'<td><input type="hidden"name="hidden['.$i.']"value="'.$yen[$i].'"><input class="kadomaru"type="submit"name="submit['.$i.']"value='.$food[$i].''.　.''.$yen[$i].''.円.'></td>';
                    }
                    else{
                    echo'<td><input class="kadomaru"type="button"value='.　.'></a></td>';
                    }
                }
				if($i == 5){
                    if($yosan >= $yen[$i]){
                    echo'<tr><td><input type="hidden"name="hidden['.$i.']"value="'.$yen[$i].'"><input class="kadomaru"type="submit"name="submit['.$i.']"value='.$food[$i].''.　.''.$yen[$i].''.円.'></td>';
                    }
                    else{
                    echo'<tr><td><input class="kadomaru"type="button"value='.　.'></a></td>';
                    }
                }
				if($i == 6){
                    if($yosan >= $yen[$i]){
                    echo'<td><input type="hidden"name="hidden['.$i.']"value="'.$yen[$i].'"><input class="kadomaru"type="submit"name="submit['.$i.']"value='.$food[$i].''.　.''.$yen[$i].''.円.'></td>';
                    }
                    else{
                    echo'<td><input class="kadomaru"type="button"value='.　.'></a></td>';
                    }
                }
                if($i == 7){
                    if($yosan >= $yen[$i]){
                    echo'<tr><td><input type="hidden"name="hidden['.$i.']"value="'.$yen[$i].'"><input class="kadomaru"type="submit"name="submit['.$i.']"value='.$food[$i].''.　.''.$yen[$i].''.円.'></td>';
                    }
                    else{
                    echo'<tr><td><input class="kadomaru"type="button"value='.　.'></a></td>';
                    }
                }
                if($i == 8){
                    if($yosan >= $yen[$i]){
                    echo'<td><input type="hidden"name="hidden['.$i.']"value="'.$yen[$i].'"><input class="kadomaru"type="submit"name="submit['.$i.']"value='.$food[$i].''.　.''.$yen[$i].''.円.'></td>';
                    }
                    else{
                    echo'<td><input class="kadomaru"type="button"value='.　.'></a></td>';
                    }
                }
                if($i == 9){
                    if($yosan >= $yen[$i]){
                    echo'<tr><td><input type="hidden"name="hidden['.$i.']"value="'.$yen[$i].'"><input class="kadomaru"type="submit"name="submit['.$i.']"value='.$food[$i].''.　.''.$yen[$i].''.円.'></td>';
                    }
                    else{
                    echo'<tr><td><input class="kadomaru"type="button"value='.　.'></a></td>';
                    }
                }
                if($i == 10){
                    if($yosan >= $yen[$i]){
                    echo'<td><input type="hidden"name="hidden['.$i.']"value="'.$yen[$i].'"><input class="kadomaru"type="submit"name="submit['.$i.']"value='.$food[$i].''.　.''.$yen[$i].''.円.'></td>';
                    }
                    else{
                    echo'<td><input class="kadomaru"type="button"value='.　.'></a></td>';
                    }
                }
		}
	
		echo'<input type="hidden"name="kane"value="'.$yosan.'">';
		
		echo'</form>';
		echo'</form></table></div>';

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
        echo'<input class="button_9"type="button"value='.残予算.''.　.''.$yosan.''.円.'>';
		echo'<form action="choice.php"method="get">';
		echo'<input class="button_10"type="submit"value="やりなおし"></form>';
		echo'<form action="menu.php"method="get">';
        echo'<input class="button_11"type="submit"value="確定"></form>';

		?>

	</body>
</html>

<?php

?>
