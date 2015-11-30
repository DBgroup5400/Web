<?php

	session_start();
	
?>

<html>
<head>
	<meta http-env="Content-Type" conten="text/html;charset=UTF-8">
	<link rel="stylesheet"type="text/css"href="register.css">
	<title>Reciprice</title>

</head>
 	<body>
		<!--ヘッダ-->
		<div class="header">
			<a href="/top/top.html"><img src = "/Reciprice.png"width="350.7"height="92.4"></a>
        </div>

		
		<!--ヘッダ終わり-->

		<div class="table">
		登録が完了しました
		<table cellspacing="30">
		<tr>
			<td>ユーザID</td><td><?php echo $_POST["UserID"];?></td>
		</tr>
		<tr>
			<td>パスワード</td><td><?php echo "****";?></td>
		</tr>
		<tr>
			<td>市区町村</td><td><?php echo $_POST["WardID"];?></td>
		</tr>
		</table>
		
			<div class="button">
			<a href="/top/top.html"><input class="button_1"type="submit"name="register"value="topへ戻る"onclick="document.charset='UTF-8'"></a>
			</div>
		</div>

	</body>
</html>

