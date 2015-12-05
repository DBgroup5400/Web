<!DOCTYPE html>
<html>
<head>
	<meta http-env="Content-Type" conten="text/html;charset=UTF-8">
	<link rel="stylesheet"type="text/css"href="register.css">
	<title>Reciprice</title>

</head>
 	<body>
		<!--ヘッダ-->
		<div class="header">
			<a href="top.html"><img src = "Reciprice.png"width="350.7"height="92.4"></a>
        </div>

		
		<!--ヘッダ終わり-->

		<div class="table">
		<form method="post"action="register_2.php"eaccept-charset="UTF-8">

		<table cellspacing="30">
		<tr>
			<td>ユーザID</td><td><input type="text"name="UserID"pattern="^[a-zA-Z0-9]+$"maxlength="20"required></td>
		</tr>
		<tr>
			<td>パスワード</td><td><input type="text"name="password"pattern="^[a-zA-Z0-9]+$"maxlength="40"required></td>
		</tr>
		<tr>
			<td>市区町村</td><td><input type="text"name="WardID"maxlength="20"required></td>
		</tr>
		</table>
		
			<div class="button">
			<input class="button_1"type="submit"name="register"value="新規登録"onclick="document.charset='UTF-8'">
			</div>
		</div>

	</body>
</html>


<?php


?>
