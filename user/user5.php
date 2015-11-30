<?php
header("Content-Type:text/html;charset=UTF-8");
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-env="Content-Type" conten="text/html;charset=UTF-8">
	<link rel="stylesheet"type="text/css"href="user5.css">
	<title>Reciprice</title>

</head>
 	<body>
		<!--ヘッダとサイド-->
		<div class="side">
		</div>
		<div class="header">		
		<a href="/top/main.php"><img src = "/Reciprice.png"width="350.7"height="92.4"></a>
		</div>
		<a href="user.php">
		<input class="button_1"type="button"value="ユーザ管理">
		</a>
		<a href="/menu/menu.php">
        <input class="button_2"type="button"value="献立表示">
		</a>
		<a href="/price/price.php">
        <input class="button_3"type="button"value="価格予測">
		</a>
		<a href="user.php">
        <input class="button_4"type="button"value="食費">
        </a>
        <a href="user2.php">
        <input class="button_5"type="button"value="好き嫌い">
        </a>
        <a href="user3.php">
        <input class="button_6"type="button"value="優先事項">
        </a>
		<a href="user4.php">
        <input class="button_7"type="button"value="価格入力">
        </a>
		<a href="user5.php">
        <input class="button_8"type="button"value="ログアウト">
        </a>
		
		<!--ヘッダとサイドおわり-->
 		
		
        <form method="post"action=""accept-charset="UTF-8">
		<input class="delete"type="submit"name="delete"value="ユーザを削除">
        <input class="button_submit"type="submit"name="logout"value="ログアウト">
		</form>	
	</body>
</html>


<?php

?>
