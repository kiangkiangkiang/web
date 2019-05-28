<?php
$db_host = "localhost";
$db_username = "root";
$db_password = "1234";
$db_link = mysqli_connect($db_host,$db_username,$db_password);
if(!$db_link){die("connect faliled");}
mysqli_query($db_link,"SET NAMES 'utf8'");
	/*上面那行的意義
	SET character_set_client = utf8;
	SET character_set_results = utf8;
	SET character_set_connection = utf8;*/
?>