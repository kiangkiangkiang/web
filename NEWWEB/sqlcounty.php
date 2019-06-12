<?php
    include("connectsql.php");
    header('Content-type: text/html; charset = utf8');
    $slcdb = mysqli_select_db($db_link,"webdatabase");
    if(!$slcdb)die("資料庫選擇失敗");

    $an = array();
    if(isset($_GET["thecounty"]))
    {
      $county = $_GET["thecounty"];
      $sql_query = "SELECT * FROM crime where county = "."\"$county\"";
      $result = mysqli_query($db_link, $sql_query);
      /*$row = mysqli_fetch_array($result);
      if (!$row) {
        printf("Error: %s\n", mysqli_error($db_link));
        exit();
      } */
      //while($row_result = mysqli_fetch_row($result))
      //{
        foreach($result as $item =>$value)
        {
          $an[] = $value;
        }
      //}
      echo json_encode($an);
   }
?>