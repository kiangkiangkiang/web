<?php
	include("connectsql.php");
	header('Content-type: text/html; charset = utf8');
	$slcdb = mysqli_select_db($db_link,"webdatabase");
	if(!$slcdb)die("資料庫選擇失敗");

	/*$gname = $_POST["gname"];
	$gmail = $_POST["gmail"];
	$gaccount = $_POST["gaccount"];
	$gpassword = $_POST["gpassword"];*/

 	$findid_sql_query = "SELECT id FROM account ORDER BY id DESC LIMIT 1;";
    $sqlfin = mysqli_query($db_link, $findid_sql_query);
    $id = $sqlfin -> fetch_row();
    echo json_encode($id[0]);
    //INSERT INTO `account` (`id`, `nickname`, `account`, `password`, `mailaddress`) VALUES ('1', '警長', 'Caska', '123456789', 'wmwmwmw@yahoo.com.tw');

?>