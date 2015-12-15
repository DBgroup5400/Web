<?php
	//[ ramdom.php ]
	/*
	debugデータを元のデータから弾いた組み合わせをsy津力するようなアルゴリズムの構成を作る.    ◯
	debugデータからでなく繰り返し処理で, 前のデータの食事内容を取得し, 置き換え.						 ☓
	実装方法は, 全組み合わせを作成したあと, ランダムにそれらのフラグをつけていく.
	*/

	// $obj = new hoge;
	// var_dump($obj->GET_MONEY("000001", 10000, 1));
	
	// $buf = $obj_hogehoge->SELECT();

	// print_r($buf);
/*
class hogehoge{
	function SELECT(){
		# 別ファイルの読み込み
		require('combine.php');

		# 定数
		// define('GET_RAMDOM' 1);    	// ランダムで取得してくる 1食分
		define('ONE_WEEK', 10);     	// 何食分か    現在は料理名データが少ないため5食で制限
		define('GET_COMBINATION', 3); // 主菜と副菜の組み合わせ

		# 初期化
		$arrayNum = array();
		$source_diff =array();
		$parse = array();
		$tmp = array();
		$source = array();				//料理名を格納した配列データ
		$buf = array(); 					//選択した料理組み合わせのバッファ
		$buf_num = 0;

		#料理名の取得
		$obj= new hoge;
		$source = $obj->GET_DATA();

		# 元データから弾く
		$source_diff = array_diff($source, $parse);

		for($counter = 1 ; $counter <= ONE_WEEK ; $counter++ ){
			# 前回データの初期化
			$arrayNum = array();

			# 配列の添字の振り直し
			$source_diff = array_merge($source_diff);

			# 全パターンの格納
			$p = getCPattern($source_diff, GET_COMBINATION ); //返ってくるのは全ての組み合わせを格納した配列

		  # 文字列の連結
			foreach($p as $combineKeys1 => $i_val){
				foreach($i_val as $combineKeys2 => $j_val ){
					$str = $str. $j_val;
					if( count($i_val)-1  != $combineKeys2)  // 配列の最後でなければ, ","文字を入れる
						$str = $str. ",";
				}
				$arrayNum += array($str => 0); //連想配列として格納
				$str = "";
			}

			# 初期化
			$shift = 0;  //

			# シードの取得
			srand((float) microtime() * (10000000 + $shift) );

			# GET_RAMDOM分取得
			$rand_keys = array_rand($arrayNum);

			$arrayNum[$rand_keys]++;
			$shift++;

			// foreach ($arrayNum as $key => $val)
				// if($val == 1)
					// print(sprintf("%-20s=>%8d\n", $key, $val));

			foreach ($arrayNum as $key => $val)
				if($val == 1){
					$buf[$buf_num] = $key;
					$buf_num++;
				}


			#要素の追加
			foreach ($arrayNum as $key => $val)
				if($val == 1)
					$tmp = str_getcsv($key, ","); // カンマで文字列を区切る.
				$parse = array_merge($parse, $tmp);
				$source_diff = array_diff($source, $parse);
		}

		return $buf;
	}
}
*/

class hoge{/*
	function GET_DATA(){
		$source = array( "ハンバーグ", "野菜サラダ", "コーンスープ", "野菜炒め", "シーザーサラダ", "コンソメスープ"); //元の要素を格納した配列
	  array_push($source, "焼き肉", "味噌汁", "テールスープ", "エビチリ", "お好み焼き", "カルボナーラ", "ポテトサラダ");
	  array_push($source, "かつおのたたき", "卵スープ", "唐揚げ", "すし", "さんまの塩焼き", "サバの味噌煮", "カレー", "ラーメン");
	  array_push($source, "春巻き", "エビフライ", "ブリ大根", "カキフライ", "白菜と春雨のスープ", "もやし炒め", "菜の花のおひたし", "大根サラダ");
	  array_push($source, "じゃがいものコロッケ", "ピーマンの千切りサラダ", "そら豆の甘辛煮", "わかめときゅうりの酢の物", "ベーコンとクレソン炒め", "キャベツメンチ");
	  array_push($source, "牛肉のトマトソース煮", "薄切り牛肉のカツ", "豚肉のしょうが焼き", "豚の角煮", "豚汁", "肉だんご(豚)");

	  return $source;
	}*/
	//$kindによって取得するカテゴリ変更
	function totalPrice_fromMenuName($SessionId, $MenuName){
		require_once "../libmenu/user.php";
		$tmp = user();
		$MenuID = $tmp->GetIDfromMenuName($MenuName);
		// $StuffArray= $tmp->GetFoodstuffListfromID($MenuID);
		// for($i = 0; $i < count($StuffArray); $i++) {
  // 		// var_dump($StuffArray[$i]["Name"]);
 	// 		$StuffID = $tmp->GetIDfromFoodstuffName($StuffArray[$i]["Name"]);
  // 		$price = $tmp->GetFoodstuffPrice("000001",$StuffID);
  // 		// var_dump($price);
  // 		$sum += $price;
		// }
		$sum = $tmp->GetMenuPrice( $SessionId, $MenuID );
		return $sum;
	}

	function GET_NAME($kind){

		$recipi_name = array();

		//$kindを参照して, dish, main, sub, soupを分けて, 料理名を持ってくる関数
		array_push($recipi_name , "ハンバーグ", "焼き肉", "エビチリ", "お好み焼き", "カルボナーラ"); //ダミー
		array_push($recipi_name , "薄切り牛肉のカツ", "豚肉のしょうが焼き", "豚の角煮", "豚汁", "肉だんご(豚)");	//ダミー
		array_push($recipi_name , "コロッケ", "エビフライ", "サバの味噌煮", "カレー", "サンマの塩焼き");	//ダミー
		array_push($recipi_name , "かつおのたたき", "春巻き", "唐揚げ", "すし", "ラーメン");	//ダミー

		return $recipi_name[(rand(0, count($recipi_name))%10)];
	}

	function GET_MATERIAL($id){
		//$kindによって取得するカテゴリ変更

		$material_name = array();

		//$kindを参照して, dish, main, sub, soupを分けて, 料理名を持ってくる関数
		array_push($material_name , "豚肉", "牛肉", "とうもろこし", "たまご", "ベーコン"); //ダミー
		array_push($material_name , "ハーブ", "じゃがいも", "にんじん", "だいこん", "ピーマン");	//ダミー
		array_push($material_name , "玉ねぎ");	//ダミー

		return $material_name;
	}

	function GET_MONEY_MATERIAL($material_id){
		// printf("material_id:%d\n", $material_id);
		// $material_moeny = 材料IDから金額取得関数($);
		$money_data = array( 3, 5, 6, 8, 6, 7, 9, 2, 3, 2, 2, 1);
		// print_r($money_data);
		return $money_data[$material_id];
	}

	function toID($recipi_name){
		//料理名から料理IDを取得
		// $ID = 00000000 ;
		$ID = rand(1, 10);
		return $ID;
	}


	function isUniqueArray ($rensou, $name) {
		$array = array_keys($rensou);

		foreach ($array as $key => $value) {
			if($value == $name)
				return false;
		}
		return true;
	}

	function GET_MONEY($ID, $yosan, $kind){
		//料理IDから値段を取得
		$obj= new hoge;

		//from test.php
		// require_once "./GetData/libdb.php";
		// require_once "./GetData/libfoodstuff.php";
		// require_once "./GetData/libmenu.php";
		require_once "../libmenu/user.php";
		$tmp = user();
		// $tmp = new Menu( "localhost", "root", "" );
		// var_dump( $tmp->GetMenuList( 0, 0, 0, "0011" ) );

		$recipe = array();
		$count = 0;
		$ten_miss = 0;

		switch ($kind):
			case 1:
				$Recipe_kind = "0100";
			break;
			case 2:
				$Recipe_kind = "1000";
			break;
			case 3:
				$Recipe_kind = "0010";
			break;
			case 4:
				$Recipe_kind = "0001";
			break;
		endswitch;

		while($count < 10 && $ten_miss < 10){
		// while($count < 10){

			// 料理名(dish)を取得
			$recipe_info = $tmp->GetMenuList( 0, 0, 0, $Recipe_kind);
			$index = rand(0,count($recipe_info)-1);
			// var_dump($recipe[$index]["Name"]);
			$recipi_name = $recipe_info[$index]["Name"];
			// $recipi_name = $obj->GET_NAME(0);
			// var_dump($recipi_name);
			//料理ID取得
		  $sum_money = $obj->totalPrice_fromMenuName($ID, $recipi_name);
		  /*
			$id = $obj->toID($recipi_name);
			// print_r($id);

			// 料理の材料取得
			$material = array();
			$material = $obj->GET_MATERIAL($id);
			// print_r($material);

			//各材料のIDを取得
			$material_id = array();
			foreach ($material as $key => $value)
				$material_id[$key] = $obj->toID($value);
			// print_r($material_id);

			//材料の金額の合計
			$sum_money = 0;
			foreach ($material_id as $key => $id)
				$sum_money += $obj->GET_MONEY_MATERIAL($id);
			*/
			// var_dump($sum_money);
			
			if($sum_money < $yosan && $obj->isUniqueArray($recipe, $recipi_name) ){
				$recipe += array($recipi_name => $sum_money);
				$count++;
				$ten_miss = 0;
			}

			$ten_miss++;
			// printf("ten_miss:%d\n", $ten_miss);
			// var_dump($ten_miss);
		}//end while
		// print_r($recipe);
		return $recipe;
	}// end function

}//end class

?>