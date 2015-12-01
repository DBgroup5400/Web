<?php
header("Content-Type:text/html;charset=UTF-8");
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-env="Content-Type" conten="text/html;charset=UTF-8">
	<link rel="stylesheet"type="text/css"href="Forecast.css">
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
		<a href="/menu/menu.php">
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
		
        <div class=title>
			<?php
				$hoge="セロリの茎"; 
				echo	"$hoge";
			?>
		</div>
		<div class="chart">
			 <img src="http://chart.apis.google.com/chart?chs=800x300&chd=t:0,10,20,34,100,42,53,2,53,63,1,34&cht=lc&chco=F4A460&chxt=x,y&chxr=0,1,12|1,0,200&chf=bg,s,E2E2E2">
		</div>

	</body>
</html>

<?php

?>
