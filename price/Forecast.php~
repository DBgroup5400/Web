<?php
session_start();

// ログイン状態のチェック
if (!isset($_SESSION["USERID"])) {
  header("Location: ../top/login_2.php");
  exit;
}


		header("Content-Type: text/html; charset=UTF-8");

/*****************************************
	区の名前から区のIDに変換します
	$name 区のID
****************************************/
	function NAME_2_ID($name){
		$link = mysql_connect('localhost','root','');
		if(!$link){
			die("connection faild name id".mysql_error());
		}
		//print("connection suceed</br>");
		/*insert data into private data*/	
		$db_selected = mysql_select_db('Neighbor',$link);

		if(!$db_selected){
			die("select faild".mysql_error());		
		}	
		mysql_query('SET NAMES utf8',$link);
		$query = sprintf("SELECT * FROM Neighbor.City_ID WHERE City_Name = '%s'",$name);
//		print($query);
		$result  = mysql_query($query);		
		// 結果のチェック
		// MySQL に送られたクエリと返ってきたエラーをそのまま表示します。デバッグに便利です。
		if (!$result) {
   		$message  = 'Invalid query: ' . mysql_error() . "\n";
   		$message .= 'Whole query: ' . $query;
 		  die($message);
		}
		$data = mysql_fetch_array($result);
//		print_r($data);
		mysql_close($link);

		return $data['City_ID'];			
	}
/********************************
	区のIDから名前に変換します
	$ID 区のID
********************************/

	function ID_2_NAME($ID){
		$link = mysql_connect('localhost','root','');
		if(!$link){
			die("connection faild id name".mysql_error());
		}
		//print("connection suceed</br>");
		/*insert data into private data*/	
		$db_selected = mysql_select_db('Neighbor',$link);

		if(!$db_selected){
			die("select faild".mysql_error());		
		}	
		mysql_query('SET NAMES utf8',$link);
		$query = sprintf("SELECT City_Name FROM City_ID WHERE City_ID = '%s' ",$ID);
		//print($query);
		$result  = mysql_query($query);		
		// 結果のチェック
		// MySQL に送られたクエリと返ってきたエラーをそのまま表示します。デバッグに便利です。
		if (!$result) {
   		$message  = 'Invalid query: ' . mysql_error() . "\n";
   		$message .= 'Whole query: ' . $query;
 		  die($message);
		}
		$data = mysql_fetch_array($result);
		//print_r($data);
		mysql_close($link);
		return $data['City_Name'];
	}
/*****************************************
	ユーザーIDから住んでいる区を出します
	$USER_ID
*****************************************/
	function USERID_2_CITY($USR_ID){

		$link = mysql_connect('localhost','root','');
		if(!$link){
			die("connection faild".mysql_error());
		}

		$db_selected = mysql_select_db('Users_Geo',$link);
		if(!$db_selected){
			die("select faild".mysql_error());		
		}	
		mysql_query('SET NAMES utf8',$link);
		
		$query = sprintf("SELECT City_ID FROM User_Geo WHERE User_ID = '%s'; ",$USR_ID);
//		print($query."\n");
		$result  = mysql_query($query);		

		$data = mysql_fetch_array($result);
		//print_r($data);
		mysql_close($link);
		return $data['City_ID'];		

	}
/*****************************************************************************
	ある区に隣接する区のIDをリストアップ
	＄ID　区のID
*****************************************************************************/
	function NEIGHBOR($ID){

		
		$link = mysql_connect('localhost','root','');
		if(!$link){
			die("connection faild".mysql_error());
		}
		//print("connection suceed</br>");
		/*insert data into private data*/	
		$db_selected = mysql_select_db('Neighbor',$link);

		if(!$db_selected){
			die("select faild".mysql_error());		
		}	
		mysql_query('SET NAMES utf8',$link);

		$query = sprintf(" SELECT * FROM  Neighbor.Neighbors WHERE City = '%d'; ",$ID);
//		printf($query."\n");
		$result  = mysql_query($query);	
		$data = mysql_fetch_array($result);

		mysql_close($link);

		//print_r($data);

		return $data;		
			
	}
/*****************************************************
	ユーザーAの位置とユーザーBの位置の距離を検索する。 
	$lat1	ユーザAの緯度
	$lng1	ユーザAの経度	
	$lat1	ユーザBの緯度
	$lng1	ユーザBの経度	
*****************************************************/
function getPointsDistance($lat1, $lng1, $lat2, $lng2){
//	printf("X1= %f, Y1 = %f, X2 = %f, Y2 = %f_\n",$lat1, $lng1, $lat2, $lng2);
     $pi1 = pi();
     $lat1 = $lat1*$pi1/180;
     $lng1 = $lng1*$pi1/180;
     $lat2 = $lat2*$pi1/180;
     $lng2 = $lng2*$pi1/180;
     $deg = sin($lat1)*sin($lat2) + cos($lat1)*cos($lat2)*cos($lng2-$lng1);
     return round(6378140*(atan2(-$deg,sqrt(-$deg*$deg+1))+$pi1/2), 0)/1000.0;
}
/*********************************************************
	ユーザーのIDから近隣に住んでいるユーザーをリストアップ
	$ID  ユーザーID
*********************************************************/
	function negibhor_list($ID){
		$city =  USERID_2_CITY($ID);
		$neighbor = NEIGHBOR($city);

		$query = "SELECT * FROM Users_Geo.User_Geo WHERE ";
		
//		print_r($neighbor);	

		$i = 1;

		$get = sprintf("City_ID = '%s'", $neighbor[0]);

		$query = $query.$get;

//		echo $query.'\n';		

		$link = mysql_connect('localhost','root',''); 
		if(!$link){
			die("connection faild".mysql_error());
		}
	
		//listing negighbors city query
		while($neighbor[$i] != NULL){
			$get = sprintf("OR City_ID = '%s'", $neighbor[$i]);
			$query = $query.$get;
			$i++;		
		}
//		echo $query."\n";		

		

		$db_selected = mysql_select_db('Users_Geo',$link);
		if(!$db_selected){
			die("select faild".mysql_error());		
		}	
		mysql_query('SET NAMES utf8',$link);
		$result  = mysql_query($query) ;

		$cnt = 0; // array counter
		while( ($data = mysql_fetch_array($result) )  != NULL){
			global	$users;		
			$users[$cnt] = array('ID'=> $data['User_ID'],'POS_X' => $data['Pos_X'], 'POS_Y' => $data['Pos_Y'], 'DIS' => 0); // copy result to array
//			printf("%d,%f,%f\n",$users[$cnt]["ID"], $users[$cnt]["POS_X"], $users[$cnt]["POS_Y"]);			
		 	$cnt++;			
		}
		
//		printf("cnt = %d\n",$cnt);

		$query = sprintf("SELECT Pos_X ,Pos_Y FROM Users_Geo.User_Geo WHERE User_ID = %s",$ID);		// get sercher address
//		echo "\n".$query."\n";
		$result  = mysql_query($query) ;
		$data = mysql_fetch_array($result);

		$user_x = $data['Pos_X'];
		$user_y	= $data['Pos_Y'];

//		printf("x = %f, y = %f \n ", $user_x, $user_y);
	
		$cnt = 0;

		foreach( $users as &$each){
			$dist = getPointsDistance( $user_x, $user_y, $each['POS_X'] ,$each['POS_Y']);
			$each['DIS'] = $dist;
//			printf("%d,%f,%f dist = %f\n",$users[$cnt]['ID'], $users[$cnt]['POS_X'], $users[$cnt]['POS_Y'],$dist);					 
			$cnt++;
		}

		
		foreach($users as $key => $row){
				$DIS[$key] = $row["DIS"];
		}
		array_multisort($DIS,SORT_ASC,$users); //sort by distance

//		print_r($users);
		
		mysql_close($link);

		return $users;
		
	}


/*************************************************************************
	$time
	
*************************************************************************/
function TimeLine($time){
	foreach($time as $key => $value){
		$key_id[$key] = $value[0];
	}
	array_multisort($key_id, SORT_ASC, $time);
	$before = NULL;

	$datetime1 = new DateTime($time[0][0]);

	foreach($time as $key => $value){

		$datetime2 = new DateTime($time[$key][0]);
		$interval = $datetime1->diff($datetime2);
		$a =  intval($interval->format('%a'));
		$time[$key][2] = $a;
//		echo $a."\n";		
//		echo $time[$key][0]."\n";
//		echo $time[$key][1]."\n";
	}
	$timeline = NULL;
	$before = -1;
	$sum = 0;
	$cnt = 0;
	$overlap = 1; //
//	print_r($time);

	foreach($time as $key => $value){

		if( $before == $time[$key][2]){  	
			$sum += $time[$key][1];
	//		echo $sum."\n";
			$overlap++;
			$timeline[$before][0] = $time[$key][2];
			$timeline[$before][1] = $sum / $overlap;
		}else{
 			$sum = $time[$key][1];
			$overlap = 1;
			$timeline[ $time[$key][2] ][0] = $time[$key][2];
			$timeline[ $time[$key][2] ][1] = $time[$key][1];
		}

		$before = $time[$key][2];
	}
	$Tmax = 0;
	foreach($timeline as  $key => $value){
		if( $Tmax < $timeline[$key][1] ) $Tmax = $timeline[$key][1];
	}	
	$Tscale = end($timeline)[0] - $timeline[0][0];
	$Pscale = $Tmax;
	
	foreach($timeline as  $key => $value){
		$timeline[$key][0] = ($timeline[$key][0] / $Tscale)*100;
		$timeline[$key][1] = ($timeline[$key][1] / $Pscale)*100;
	}	
	$timeline[0]['Tscale'] = $Tscale;
	$timeline[0]['Pscale'] = $Pscale; 

	
//	print_r($timeline);
	return $timeline;
}
/**************************************************************************	
    time chart
	$round 検索範囲
	$ID 検索者ID
	$list 検索したい食品のIDリスト　
***************************************************************************/

	function SerchTimeChart($round, $ID, $FoodID){
		$users = negibhor_list($ID);

//		print_r($users);
		$link = mysql_connect('localhost','root','');
		if(!$link){
			die("connection faild".mysql_error());
		}
		//print("connection suceed</br>");
		/*insert data into private data*/	
		$db_selected = mysql_select_db('Users_Geo',$link);

		if(!$db_selected){
			die("select faild".mysql_error());		
		}	
		mysql_query('SET NAMES utf8',$link);

		$query = NULL;

		foreach($users as &$private){
			if($private['DIS'] < $round){
				if($query != NULL)	$query = $query."UNION ALL ";
				$tmp = sprintf("SELECT * FROM  U%s WHERE ID  = '%s' ",$private['ID'],$FoodID);
				$query = $query.$tmp;
			}
		}
//		echo $query."\n";

		$result = mysql_query($query);	
		$time = NULL;
		$cnt = 0;
		while( $data = mysql_fetch_array($result)){
			$date = $data['Day'];
			$price = $data['Price'];
//			printf("%s, %d \n",$date ,$price);
			$time[$cnt] = array($date, $price);
			$cnt ++;
//			print_r($data);
		}		
//		print_r($time);
		$timeline = TimeLine($time);
//		echo $query."\n";
		mysql_close($link);
		return $timeline;	
	/*
		while($list[$i] != NULL){
			$tmp = sprintf(" AND ID = '%s'",$list[$i]);			
			$where = $where.$tmp;
			$i++;
		}
	
		printf("where = %s",$where);
		
		$i = 0;
		$query = sprintf(" select * from U%06d %s ",$users[$i]['ID'], $where);
		$i++;
		while($users[$i]['DIS'] < $round && $users[$i]['DIS'] != NULL ){
			$tmp = sprintf("UNION select * from U%06d %s ",$users[$i]['ID'], $where);
			$query = $query.$tmp;
			$i++;
		}
		
		
	*/
		

	}

/**************************************************************************	
	ユーザーから一定距離に住んでいるユーザーの買い物履歴から価格を予測します.
	$round 検索範囲
	$ID 検索者ID
	$list 検索したい食品のIDリスト　
***************************************************************************/

	function SerchPrice($round, $ID, $list){
		$users = negibhor_list($ID);

//		print_r($users);
		$link = mysql_connect('localhost','root','');
		if(!$link){
			die("connection faild_serch".mysql_error());
		}
		//print("connection suceed</br>");
		/*insert data into private data*/	
		$db_selected = mysql_select_db('Users_Geo',$link);

		if(!$db_selected){
			die("select faild".mysql_error());		
		}	
		mysql_query('SET NAMES utf8',$link);

		$query = 0;
		$i = 0;
		$result = 0;
		foreach	($list as &$food){
			$query = NULL;
			foreach($users as &$private){
				if($private['DIS'] < $round){
					if($query != NULL)	$query = $query." UNION ALL ";
					$tmp = sprintf("SELECT * FROM  U%s WHERE ID  = '%s'",$private['ID'],$food);
					$query = $query.$tmp;
				}
			}
			//echo $query."\n";
			$sum = 0;
			$num = 0;

			$result	= mysql_query($query) or die('query error'.mysql_error());
			while(( $data = mysql_fetch_array($result) ) != NULL){
				//printf("%s,%s\n",$data['Date'],$data['Price']);
				$num += 1;				
				$sum += $data['Price'];			
			}

			if($num == 0){
				$query = sprintf("SELECT * FROM  UXXXXXX WHERE ID  = '%s'",$food);
				$result = mysql_query($query) or die('query error'.mysql_error());				
				$data = mysql_fetch_array($result);
				$list[$i] = $data['Price'];
			}else{
				$list[$i] = $sum / $num;
			} 
			$i++;
//			echo $query."\n";
		}
		mysql_close($link);
		return $list;	

		

	}
/*************************************************


*************************************************/
function char($timeline){

	foreach($timeline as $key => $value){
		if($key > 0){
			$x = $x.",";
			$y = $y.",";		
		}	
		$x = $x.sprintf("%d",$timeline[$key][0]);
		$y = $y.sprintf("%d",$timeline[$key][1]);
	}

	return array($x,$y,$timeline[0]['Tscale'],$timeline[0]['Pscale']);

}
/***************************************************:

****************************************************/
function FoodID2Name($ID){
	$link = mysql_connect('localhost','root','');
	if(!$link){
		die("connection faild food2name".mysql_error());
	}
	//print("connection suceed</br>");
	/*insert data into private data*/	
	$db_selected = mysql_select_db('Foodstuff',$link);

	if(!$db_selected){
		die("select faild".mysql_error());		
	}	
	mysql_query('SET NAMES utf8',$link);
	$query = sprintf("SELECT Foodstuff_Name FROM Foodstuff_List  WHERE Foodstuff_ID  = '%s'",$ID);
	$result	= mysql_query($query) or die('query error'.mysql_error());
	$data = mysql_fetch_array($result);
	mysql_close($link);
	
	return $data['Foodstuff_Name'];

}


	/*$x = char(SerchTimeChart(2.0,'000011','110000023'));
	print_r($x)*/
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-env="Content-Type" conten="text/html;charset=UTF-8">
	<link rel="stylesheet"type="text/css"href="Forecast.css">
	<title>Reciprice</title>

</head>
 	<body>
		<!--ヘッダとサイド-->
		<div class="side">
		</div>
		<div class="header">		
		<a href="/top/main.php"><img src = "../Reciplan.png"width="350.7"height="92.4"></a>
		</div>
		<a href="/user/user.php">
		<input class="button_1"type="button"value="ユーザ管理">
		</a>
		<a href="/menu/menu.php">
        <input class="button_2"type="button"value="献立表示">
		</a>
		<a href="price.php">
        <input class="button_3"type="button"value="価格予測">
		</a>
		<a href="price.php">
        <input class="button_4"type="button"value="野菜・果物類">
        </a>
        <a href="price2.php">
        <input class="button_5"type="button"value="肉類">
        </a>
        <a href="price3.php">
        <input class="button_6"type="button"value="魚類">
        </a>
		<a href="price4.php">
        <input class="button_7"type="button"value="乳製品">
        </a>
		<a href="price5.php">
        <input class="button_8"type="button"value="炭水化物">
        </a>
		
		<!--ヘッダとサイドおわり-->
 		<!--ページごとに週を送る→-日付を得る→日付ごとのメニューを表示→-それぞれのボタンにメニューIDを→遷移先にメニューID送る→IDをもとに材料表示-->
		
        <div class=title>
			<?php
				session_start();
				$list[0] = $_POST['1'];
				$price = SerchPrice(2.0, $_SESSION["USERID"] ,$list );	
				printf("%s の価格はおよそ\\ %0.1d です",FoodID2Name($_POST['1']),$price[0])

			?>
		</div>
		<div class="chart">
		<?php	

			session_start();
			$data = char(SerchTimeChart(2.0,$_SESSION["USERID"],$_POST['1']));		
			printf("<img src=\"http://chart.apis.google.com/chart?chs=500x300&chd=t:%s|%s&chxt=x,y&chxr=0,0,%fE2|1,0,%fE1&cht=lxy\">",$data[0],$data[1],(float)$data[2]/100,(float)$data[3]/10);
		?>	
		</div>

	</body>
</html>

<?php

?>
