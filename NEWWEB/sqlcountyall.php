<?php
  include("connectsql.php");
  header('Content-type: text/html; charset = utf8');
  $slcdb = mysqli_select_db($db_link,"webdatabase");
  if(!$slcdb)die("資料庫選擇失敗");

  //測試用
  //$county = "新北市";

  //0607  直接改為取整個縣市的資料
  if(isset($_GET["thecounty"]))
  {
    $county = $_GET["thecounty"];
    $sql_query = "SELECT * FROM crime 
                  where county = "."\"$county\"";
    $rawdistrictdata = mysqli_query($db_link, $sql_query);

    //$row = mysqli_fetch_array($rawdistrictdata);
    //用剛剛得到的區資料陣列districtdata每個區做查詢的動作
    /*foreach($districtdata as $thedistrict)
    {
      $sql_query_sumdistrict = "SELECT COUNT(*) FROM crime 
                                WHERE district = "."\"$thedistrict\"";
      $sql_query_districthascrime ="SELECT COUNT(*) FROM crime 
                                    WHERE district = "."\"$thedistrict\""." and teencrime = 1";
      $sumdistrict = mysqli_query($db_link, $sql_query_sumdistrict);
      $districthascrime = mysqli_query($db_link, $sql_query_districthascrime);
      echo(print_r($sumdistrict));
      $crime_rate = $districthascrime / $sumdistrict;
      $crime_rate_array[] = $crime_rate;
    }*/
    /*$row = mysqli_fetch_array($result);
    if (!$row) {
      printf("Error: %s\n", mysqli_error($db_link));
      exit();
    } */
    $an = array();
    //while($row_result=mysqli_fetch_row($rawdistrictdata))
    //{
      foreach($rawdistrictdata as $item =>$value)
      {
        $an[] = $value;
      }
    //}
    //print_r($an);
    echo json_encode($an);
  }
?>