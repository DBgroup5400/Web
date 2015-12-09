<?php



/************エントリーポイント**************/

	session_start();
	
	print <<< EOF
<html>
<head>
	<meta http-env="Content-Type" conten="text/html;charset=UTF-8">
	<link rel="stylesheet"type="text/css"href="register.css">
	<title>Reciplan</title>

</head>

  <body>
<div class="header">
<a href="../top/top.html"><img src = "../Reciplan.png"width="350.7"height="92.4"></a>
</div>

    <div class="table">
		登録が完了しました
		<table cellspacing="30">
        
EOF;
	printf("	
			<tr>
     	       <td> User &nbsp Name</td>
     	       <td> %s </td>
     	   	</tr>
			" , $_SESSION['Name']);

	printf("	
			<tr>
     	       <td>  Mail &nbsp Name</td>
     	       <td> %s </td>
     	   	</tr>
			" , $_SESSION['Mail']);


	printf("	
			<tr>
     	       <td> Adress &nbsp Name</td>
     	       <td> %s </td>
     	   	</tr>
			" , $_SESSION['Address']);

	print <<< EOF
          

        
      </table>
      
    <div class="button">
			<a href="/top/top.html"><input class="button_1"type="submit"name="register"value="topへ戻る"onclick="document.charset='UTF-8'"></a>
			</div>
		</div>

  </body>
</html>
EOF;
/*****************************************
	区の名前から区のIDに変換します
	$Name 区のID
****************************************/
	function Name_2_ID($Name){
		$link = mysql_connect( "localhost", "Reciplan", "reciplan" );
		if( !$link )
			die( "Connection Failed.".mysql_error() );

  		$dbselect = mysql_select_db('Neighbor', $link );
  		if( !$dbselect )
    		die( "DB Select Failed.".mysql_error() );

  		$chartype = mysql_query( "SET NAMES utf8", $link );
  		if( !$chartype )
    		die( "Query Failed.".mysql_error() );

		$Name = mb_convert_encoding($Name, "UTF8", "auto");

		$query = sprintf("SELECT City_ID.City_ID  FROM City_ID WHERE City_Name = '%s' ",$Name);
		//print($query);
		$result  = mysql_query($query);		
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

/***************************************************
	ユーザーを位置情報データベースに格納するための関数。
	引数
		$ID 		ユーザのID
		$Address	ユーザの住所
***************************************************/
	function Reg_to_Geo($User_ID,$Address){
		$geo = Geo($Address);

//		printf("x = %f, y = %f, city = %s",$geo[0],$geo[1],$geo[2]);
		$City_ID =  Name_2_ID($geo[2]);
//conect database
		$link = mysql_connect( "localhost", "Reciplan", "reciplan" );
		if( !$link )
			die( "Connection Failed.".mysql_error() );

  		$dbselect = mysql_select_db( 'Users_Geo', $link );
  		if( !$dbselect )
    		die( "DB Select Failed.".mysql_error() );

  		$chartype = mysql_query( "SET NAMES utf8", $link );
  		if( !$chartype )
    		die( "Query Failed.".mysql_error() );
// 	query

//insert data into User_Geo
		$query = sprintf("INSERT INTO Users_Geo.User_Geo VALUES ('%06s,',%d,%f,%f)",$User_ID ,$City_ID,$geo[0],$geo[1] );
//		printf("query = %s\n",$query);
		$result  = mysql_query($query);		
		// MySQL に送られたクエリと返ってきたエラーをそのまま表示します。デバッグに便利です。
		if (!$result) {
   		$message  = 'Invalid query: ' . mysql_error() . "\n";
   		$message .= 'Whole query: ' . $query;
 		  die($message);
		}		

//create table
		$query = sprintf("CREATE TABLE U%06d ( ID char(9) NOT NULL, Price float NOT NULL, Mount float NOT NULL, Day date NOT NULL )",$User_ID);
//		printf("\nquery = %s\n",$query);
		$result  = mysql_query($query);		
		// MySQL に送られたクエリと返ってきたエラーをそのまま表示します。デバッグに便利です。
		if (!$result) {
   		$message  = 'Invalid query: ' . mysql_error() . "\n";
   		$message .= 'Whole query: ' . $query;
 		  die($message);
		}		
		
//	exit
		$flag = mysql_close( $link );
  		if( !$flag )
   			die( "Close Failed.".mysql_error() );

	}
/***********************************
  住所情報文字列をGPS情報に変換
  引数
   $Adress 住所平文
  
  返り値
   $x
   $y
   $e_ID
***********************************/

 function Geo($Address){

   $Address = urlencode($Address);
   $x = 0; 
   $y = 0;
   $City_ID = NULL;

   $url = sprintf("http://maps.google.com/maps/api/geocode/json?address=%s&language=ja&sensor=false",$Address);
//   print($url."<br/>");
   
   $json = file_get_contents($url);
   //print($json);
   $arr = json_decode($json,false);
  
   if ($arr === NULL ) {
    print("non data</br>");
        return NULL;//?データがない時の処理?
   }else{
         //?存在しているときの処理?
//    print("data is enable<br/>");
    //var_dump($arr);
    $neko = count($arr->results[0]->address_components);
    $x =  $arr->results[0]->geometry->location->lat;
    $y =  $arr->results[0]->geometry->location->lng;
    $City_ID = $arr->results[0]->address_components[$neko - 4 ]->long_name;
   }
   if($x == NULL||$y == NULL||$City_ID == NULL){
    return NULL;
   }

 //  print("x is ".$x." y is ".$y."city is ".$City_ID." <br/>");
   return array($x,$y,$City_ID);
 }

/************************************************
	ユーザをユーザーデータベースに格納するための関数
	$Passwd　パスワード
	$Name ユーザーの名前
	$Mail ユーザーのメールアドレス
	$Address 　ユーザーの住所
************************************************/
	function Reg_to_Users(  $Passwd, $Name, $Mail, $Address){

		$Passwd = password_hash($Passwd,PASSWORD_DEFAULT);
		$Date = date("Y/m/d");
//		printf("Passwd is %s,Name is %s, Mail is %s, Address is %s, Date is %s\n",$Passwd, $Name, $Mail, $Address,$Date);
		$link = mysql_connect( "localhost", "Reciplan", "reciplan" );
		if( !$link )
			die( "Connection Failed.".mysql_error() );
		//set character code  		
		$chartype = mysql_query( "SET NAMES utf8", $link );
  		if( !$chartype )
    		die( "Query Failed.".mysql_error() );
		
  		$dbselect = mysql_select_db('Users', $link );
  		if( !$dbselect )
    		die( "DB Select Failed.".mysql_error() );

  	
		$query = "SELECT max(ID) from Users.Users";
  		$result = mysql_query( $query );
  		
		if( !$result )
    		die( "Query Failed.".mysql_error() );

  		$data = mysql_fetch_assoc( $result );
 		$user_id = intval( $data["max(ID)"]) + 1;
		printf("\n\ndata = %d\n\n",$user_id);

		
		$query = sprintf("INSERT INTO  Users.Users VALUES('%06d','%s','%s','%s','%s','0','%s')",$user_id, $Passwd,$Mail,	$Name,	$Address,$Date);

		printf("\n%s\n",$query);
 		$result = mysql_query( $query );
		if( !$result )
    		die( "Query Failed.".mysql_error() );

  		$flag = mysql_close( $link );
  		if( !$flag )
   			die( "Close Failed.".mysql_error() );
		
		Reg_to_Geo($user_id,$Address);	
		return 1;

  	}
/****エントリーポイント***/
	session_start();
	echo 'regist ';	
	$complate =  Reg_to_Users(  $_SESSION['Password'], $_SESSION['Name'], $_SESSION['Mail'], $_SESSION['Address']);
	if($complate){
		 echo 'complate'; 
	}else{
		 echo 'faild';
	}

	if(isset($COOKIE[PHPSESSID])){
		setcookie("PHPSESSID", '',time - 1800,'/');	
	}
	session_destroy();

?>

