<?php
// セッション開始
session_start();

// ログイン状態のチェック
if (!isset($_SESSION["USERID"])) {
  header("Location: /top/login_2.php");
  exit;
}


$db['host'] = "localhost";  // DBサーバのurl
$db['user'] = "root";
$db['pass'] = "";
$db['dbname'] = "Users";

// エラーメッセージの初期化
$errorMessage = "";

// ボタンが押された場合
if (isset($_POST["price"])) {


    // mysqlへの接続
    $mysqli = new mysqli($db['host'], $db['user'], $db['pass']);
    if ($mysqli->connect_errno) {
      print('<p>データベースへの接続に失敗しました。</p>' . $mysqli->connect_error);
      exit();
    }

    // データベースの選択
    $mysqli->select_db($db['dbname']);

    

    // クエリの実行
    $query = "update Users set Max_Pricw = ".$_POST["price"]." where ID = '" . $_SESSION["USERID"] . "'";
    $result = $mysqli->query($query);
    if (!$result) {
      print('クエリーが失敗しました。' . $mysqli->error);
      $mysqli->close();
      exit();
    }


    // データベースの切断
    $mysqli->close();
}
 
?>


<!DOCTYPE html>
<html>
<head>
	<meta http-env="Content-Type" conten="text/html;charset=UTF-8">
	<link rel="stylesheet"type="text/css"href="user.css">
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
        <a href="user5.php">
        <input class="button_5"type="button"value="ログアウト">
        </a>

		
		<!--ヘッダとサイドおわり-->
 		
		
        <form method="post"action=""accept-charset="UTF-8">
		<div class=price_input>
		円
		</div>
        <input class="box1"type="text"name="price"pattern="^[0-9]+$"maxlength="6"required>
        <input class="button_submit"type="submit"name="register"value="変更を保存">
		
	</body>
</html>
