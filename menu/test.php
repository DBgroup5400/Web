<html>

<head>
<title>form.name - formタグのname値を取得/設定</title>
</head>

<body>

<!--formタグのname値を取得/設定のサンプル-->
<form method="post" action="test.php" id="frm" name="form1">
<input type="text" name="testname" value="aaa">
<select name="day" id="day">
<option value="1">1の値
<option value="2">2の値
<option value="3">3の値
<option value="4">4の値
<option value="5">5の値
</select>
<input type="submit" value="submit">
</form>

<script type="text/javascript">
var element = document.getElementById("frm");
document.write("FORMのnameの値は→"+element.name);
</script>

</body>
</html>