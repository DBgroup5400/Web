<?php

	$link = mysql_connect('localhost','root','pqmzrsk');
	if(!$link){
		die("connection Failed.\n".mysql_error());
	}
	printf("Connection Succeeded.\n");

	$db_selected = mysql_select_db('bookdb',$link);
	
	if(!$db_selected){
		die("Connection Failed.\n".mysql_error());
	}
	print("Select the Database.\n");
	
	$reselt = mysql_query('select * from btable2');
	if(!$reselt){
		die("Query Failed.\n".mysql_error);
	}
	while($row = mysql_fetch_assoc($reselt)){
		print($row['no']);
		print("\t");
		print($row['isbook']);
		print("\t");
		print($row['name']);
		print("\t");
		print($row['name']);
		print("\t");
		print($row['title']);
		print($row['pub']);
		print($row['year']);
		print($row['ISBN10']);
	}

	if($close_flag){
		print("Disconnection Succeeded.\n");
	}
?>
