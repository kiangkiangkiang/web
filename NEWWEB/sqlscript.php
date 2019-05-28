<?php
        include("connectsql.php");
        header('Content-type: text/html; charset = utf8');
        //使用引入檔，提高安全性
        $slcdb = mysqli_select_db($db_link,"test");
        if(!$slcdb)die("資料庫選擇失敗");
        /*
        
        $sql_query = "SELECT *  FROM realhouse  Limit 1";
        $result = mysqli_query($db_link, $sql_query);
        while($row_result=mysqli_fetch_row($result)){
          foreach($row_result as $item =>$value)
          {
            echo $value.",";
          }
        }*/
      ?>