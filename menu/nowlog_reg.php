<?php
header("Content-type: text/plain; charset=UTF-8");
if (isset($_POST['name']['name']))
{
    //ここに何かしらの処理を書く（DB登録やファイルへの書き込みなど）
		require_once "liblog.php";
		require_once "libnow.php";
		$now = new MenuNow( "localhost", "root", "", $_POST['name']['name']);
		$nowlog  = $now->GetMenuLog($_POST['name']['name']);
		// var_dump($nowlog);
		// var_dump($_POST['data']);
		var_dump($_POST['name']['name']);
		// var_dump($_POST['kind']["kind"]);
		// var_dump($_POST['recipe']);
		$tmp = explode("|", $_POST['recipe']["recipe"]);

		// foreach ($tmp as $key => $value) {
			// $tmpArray[$key] = explode("|", $tmp[$key]);
		// }

		// var_dump($tmp);
		// var_dump($tmpArray);
		// var_dump($nowlog);

		$nowlog[$_POST['kind']["kind"]]["main"] = $tmp[0];
		$nowlog[$_POST['kind']["kind"]]["dish"] = $tmp[1];
		$nowlog[$_POST['kind']["kind"]]["sub"]  = $tmp[2];

		$decision = $now->ResistMenuLog($_POST['name']['name'], $nowlog);

		var_dump($now->GetMenuLog($_POST['name']['name']));
}
else
{
    echo 'The parameter of "request" is not found.';
}
?>