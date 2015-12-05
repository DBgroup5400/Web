<?php
header("Content-Type:text/html;charset=UTF-8");
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-env="Content-Type" conten="text/html;charset=UTF-8">
	<link rel="stylesheet"type="text/css"href="user2.css">
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
		<div class=like>
		好きな食べ物
		</div>
		<div class=dislike>
		嫌いな食べ物
		</div>

        <input class="box1"type="text"name="like_1"maxlength="10">
		<input class="box2"type="text"name="like_2"maxlength="10">
		<input class="box3"type="text"name="like_3"maxlength="10">
        <input class="box4"type="text"name="like_4"maxlength="10">
		<input class="box5"type="text"name="dislike_1"maxlength="10">
        <input class="box6"type="text"name="dislike_2"maxlength="10">
        <input class="box7"type="text"name="dislike_3"maxlength="10">
        <input class="box8"type="text"name="dislike_4"maxlength="10">

        <input class="button_submit"type="submit"name="register"value="変更を保存">
		
	</body>
</html>

<?php

?>
