<?php
header("Content-type: text/plain; charset=UTF-8");
if (isset($_POST['id']["id"]))
{
    //ここに何かしらの処理を書く（DB登録やファイルへの書き込みなど）
		require_once "liblog.php";
		require_once "libnow.php";

		$kind = array("Sun", "Mon","Tue", "Wed", "Thu", "Fri", "Sat");

		$log = new MenuLog( "localhost", "root", "", $_POST['id']["id"]);
		$menulog  = $log->GetMenuLog($_POST['id']["id"]);
		var_dump($_POST['id']["id"]);
		// var_dump($_POST['kind']["kind"]);
		// var_dump($_POST['recipe']);
		foreach ($kind as $key => $value) {
			$tmp = explode("|", $_POST['recipe'.$value]["recipe".$value]);
			// var_dump($tmp);
			$tmpArray = explode(";", $tmp[2]);
			$menulog[$value]["main"] = $tmp[0];
			$menulog[$value]["dish"] = $tmp[1];
			$menulog[$value]["sub"] = $tmpArray[1]."|".$tmpArray[2];
		}

		$decision = $log->ResistMenuLog($_POST['id']["id"], $menulog);

}
else
{
    echo 'The parameter of "request" is not found.';
}
?>