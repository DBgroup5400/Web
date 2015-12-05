<?php



/************エントリーポイント**************/

	session_start();
	
	print <<< EOF
<html>
  <head>
    <meta http-equiv="Contents-Type" conten="text/html;charset=UTF-8">
    <title> Sign up </title>
  </head>

  <body>
    <center>
      <font size='10'> Sign &nbsp up<br><br> </font>
      <form method="post" action="SingupComplate.php">
      <table border = "1">
        <tbody>
EOF;
	printf("	
			<tr>
     	       <th> User &nbsp Name</th>
     	       <th> %s </th>
     	   	</tr>
			" , $_SESSION['Name']);

	printf("	
			<tr>
     	       <th>  Mail &nbsp Name</th>
     	       <th> %s </th>
     	   	</tr>
			" , $_SESSION['Mail']);


	printf("	
			<tr>
     	       <th> Adress &nbsp Name</th>
     	       <th> %s </th>
     	   	</tr>
			" , $_SESSION['Address']);

	print <<< EOF
          <tr>
            <th colspan=2> <input type="submit" name="send" value="OK"> </th>
          </tr>

        </tbody>
      </table>
      </form>
    </center>
  </body>
</html>
EOF;


?>

