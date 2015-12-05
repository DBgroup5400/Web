<?php


/*
if ($_FILES['upfile']['error'] == UPLOAD_ERR_OK) //アップロードの成功を確認

    {    

    $upload_file = "./" . $_FILES["upfile"]["name"];//ファイルの移動

    if (move_uploaded_file($_FILES["upfile"]['tmp_name'], $upload_file)) {

    }

    

    

    chmod($upload_file, 0644);//ファイルのパーミッションを変更

    

}
*/






if (!empty($_POST['title'])) {//名前が入力されていることを確認

           
/*
        $fp    = fopen('count.txt', 'r');//カウントファイルを開く

        $count = fgets($fp);//現在のカウントを取得

        $back1 = "backProfile";//

        $back2 = ".html";

        $back  = $back1 . $count . $back2;

        copy('Profile.html', $back);//今の状態のページを保存

        chmod("$back", 0777);//パーミッションの変更

        fclose($fp);//カウントファイルを閉じる
*/
        

        $page  = file_get_contents('Profile.html');//現在のHTMLを取得

        $files = 'Profile.html';

        $pos   = strrpos($page, '<!---->');//新たなdiv要素の追加位置を取得

        $pos   = $pos + 5;



	//div要素の文字列を作成開始

        $sec0  = "</table></div><div class=\"new_tile\"style=\"background-color:#";

        $color = "00a474";

        $sec1  = "\";><table border=\"0\">";

        $ima   = "";

        $sec2  = "";

        

        $sec3  = "

                <table border=\"0\"height=\"200\"width=\"300\">

                        <tr>

                        <td width=\"120\"><b>NAME</b></td><td>";

        

        $NAME = $_POST['title'];

        

        $sec4 = "</td></tr>

                        <tr>

                        <td><b>Author</b></td><td>";

        

        $SEX  = $_POST['author'];

        $sec5 = "</td>

                        </tr>

                        <tr>

                        <td><b>YEAR</b></td>

                        <td>";

        

        

        $year  = $_POST['year'];

        $sec6  = "</td>

                        </tr>

                        <tr>

                        <td><b>ISBN</b></td>

                        <td>";

        $place = $_POST['isbn'];

        $sec7  = "</td>

                        </tr>

                        <tr>

                        <td><b>Publisher</b></td>

                        <td>";

        $blood = $_POST['pub'];

        $sec8  = "</td>

                    </td>

                </tr></table>";

        

        $newpage = $sec0 .$color. $sec1 . $ima . $sec2 . $sec3 . $NAME . $sec4  .$SEX. $sec5 . $year . $sec6 . $place . $sec7 . $blood . $sec8;

        //div要素の文字列の作成終了



        $wordwrapStr = wordwrap($page, $pos, $newpage, true);//作成したdiv要素を<!---->部分に追加した文字列を作成

        

        echo $wordwrapStr;//作成したページの表示

        //file_put_contents($files, $wordwrapStr);//作成したページでProfile.htmlを上書き

        

        

        

/*       $fp    = fopen("count.txt", "w");//カウントを一つ増やす

        $count = $count + 1;

        fputs($fp, "$count");

        fclose($fp);
*/
   

} else {

    echo "Please enter name";//エラーの表示

}





?>
