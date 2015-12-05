<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Contents-Type" conten="text/html;charset=UTF-8">
    <title> Sign up </title>
  </head>

  <body>
    <center>
      <font size='10'> Sign &nbsp up<br><br> </font>
      <form method="post" action="">
      <table>
        <tbody>
          <tr>
            <th> User &nbsp Name</th>
            <th> <input type="text" name="username"> </th>
          </tr>
          <tr>
            <th> Password</th>
            <th> <input type="password" name="password"> </th>
          </tr>
          <tr>
            <th> Password Retype</th>
            <th> <input type="password" name="password_r"> </th>
          </tr>
		  <tr>
            <th> Mail </th>
            <th> <input type="text" name="mail"> </th>
          </tr>
          <tr>
            <th> Adress</th>
            <th> <input type="text" name="address"> </th>
          </tr>
          <tr>
            <th colspan=2> <input type="submit" name="send" value="send"> </th>
          </tr>
        </tbody>
      </table>
      </form>
    </center>
  </body>
</html>

<?php
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
//			print($url."<br/>");
			
			$json = file_get_contents($url);
			//print($json);
			$arr = json_decode($json,false);
		
			if ($arr === NULL ) {
				print("non data</br>");
  		  		return NULL;//〜データがない時の処理〜
			}else{
  		    	//〜存在しているときの処理〜
//				print("data is enable<br/>");
				//var_dump($arr);
				$neko = count($arr->results[0]->address_components);
				$x =  $arr->results[0]->geometry->location->lat;
				$y =  $arr->results[0]->geometry->location->lng;
				$City_ID = $arr->results[0]->address_components[$neko - 4 ]->long_name;
			}
			if($x == NULL||$y == NULL||$City_ID == NULL){
				return NULL;
			}

	//		print("x is ".$x." y is ".$y."city is ".$City_ID." <br/>");
			return array($x,$y,$City_ID);
	}
	/**************************
	有効なメールアドレスかどうか確かめる
	**************************/

	function Is_Mail($text) {
	if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $text)) {
	        return TRUE;
	    } else {
	        return FALSE;
	    }
	}

	/***************エントリーポイント*************/
	session_start();

  	$dbname = "Users"; //select User Database
  	$Password = "reciplan"; 
  	$Username = "reciplan";	
  
  	$index_POST = array( 0 => "username",
    	1 => "password",
    	2 => "location", );
  	$index_AUTH = array( 0 => "id",
    	1 => "name",
    	2 => "password", );
  	$index_DATA = array( 0 => "id",
    	1 => "name",
    	2 => "location", );
	
  	echo "<center>";
	/*
  	if( $_POST["send"] != "send" )
    	die( "" );

  	for( $i = 0; $i < 3; $i++ ){
    	if( !$_POST[$index_POST[$i]] )
    	  die( "<br>require ".$index_POST[$i] );
  	}
	*/
	//メールアドレスチェック
	if(Is_Mail($_POST['mail']) == FALSE) die( "<br>Individual MailAddress");
	//パスワードチェック
	if($_POST['password'] != $_POST['password_r']) die( "<br>Password is not mach");
	//住所チェック
	if(Geo($_POST['address']) == NULL) die( "<br>Individual Address");
	
	$_SESSION['Address'] 	= 	$_POST['address']; 
	$_SESSION['Mail'] 		= 	$_POST['mail']; 
	$_SESSION['Password'] 	= 	$_POST['password']; 
	$_SESSION['Name'] 		= 	$_POST['username']; 
		
	header("Location: ./SignupCheck.php");	
	echo "</center>";
?>