<?php
header("Content-Type:text/html;charset=UTF-8");
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-env="Content-Type" conten="text/html;charset=UTF-8">
	<link rel="stylesheet"type="text/css"href="login_2.css">
	<title>Reciprice</title>

</head>
 	<body>
		<!--ヘッダ-->
		<div class="header">		
		<a href="top.html"><img src = "/Reciprice.png"width="350.7"height="92.4"></a>
		</div>
		<!--ヘッダ終わり-->

		<div class="table">
		<form method="post"action="main.php"accept-charset="UTF-8">
		<table cellspacing="30">
		<tr>
			<td>ユーザID</td><td><input type="text"name="UserID"pattern="^[a-zA-Z0-9]+$"maxlength="20"required></td>
		</tr>
		<tr>
			<td>パスワード</td><td><input type="password"name="password"pattern="^[a-zA-Z0-9]+$"maxlength="20"required></td>
		</tr>
		</table>
			<div class="button">
			<input class="button_1"type="submit"name="register"value="ログイン"onclick="document.charset='utf-8';">
			</div>
		</div>

	</body>
</html>


<?php
session_start();
?>
