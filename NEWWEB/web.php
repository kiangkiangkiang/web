<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <!-- initial-scale=1.0 設定畫面的初始縮放比例為100% -->
      <?php
        include("connectsql.php");
        header('Content-type: text/html; charset = utf8');
        //使用引入檔，提高安全性
        $slcdb = mysqli_select_db($db_link,"test");
        if(!$slcdb)die("資料庫選擇失敗");
    ?>
    <script type="text/javascript" src="web.js"></script>
    <link rel="stylesheet" type="text/css" href="mystyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script type="text/javascript" src="sqlscript.php"></script>
    <!--動態各市區的表格-->

    <script type="text/javascript">
      function make_county_table(thecounty){
        var citydata = thecounty;
        alert(citydata);
        var sURL = '/NEWWEB/web.php?thecountyname=' + citydata;
        console.log(sURL);
        document.location.href = sURL;
        alert("choose"+citydata);
        var an = new Array();
        //an = ["12"]

        an =   new Promise(function(resolve,reject){
          an = <?php
              $slcdb = mysqli_select_db($db_link,"webdatabase");
              if(!$slcdb)die("資料庫選擇失敗");

              echo "[";
              if(isset($_GET["thecountyname"]))
              {
                $county = $_GET["thecountyname"];
                $sql_query = "SELECT DISTINCT district FROM crime where county = "."\"$county\"";

                $result = mysqli_query($db_link, $sql_query);
                $row = mysqli_fetch_array($result);
                if (!$row) {
                  echo "11". mysqli_error($db_link);
                  printf("Error: %s\n", mysqli_error($db_link));
                  exit();
                } 
                while($row_result=mysqli_fetch_row($result))
                {
                  foreach($row_result as $item =>$value)
                  {
                    echo "\"".$value."\",";
                  }
                }
             }
              echo "]";
          ?>;
          return an;
      });

        alert(an[1]);
      }

    </script>

    

</head>
<header>
    <div class="title">
        <img id="icon" src="./fju sis icon0.png">
        <a href="#home"></a>
        <font id="font" face="DFKai-sb">青少年犯罪 </font>
        <font id="font" face="DFKai-sb" style="font-size : 48px;">Open Data Analysis</font>
    </div>
      <div id = "readdata"  style="display:none">
     <?php
        $sql_query = "SELECT *  FROM realhouse  Limit 1";
        $result = mysqli_query($db_link, $sql_query);
        while($row_result=mysqli_fetch_row($result))
        {
          foreach($row_result as $item =>$value)
          {
            echo $value.",";
          }
        }
        ?>
  </div>
</header>

<body>
    <ul class="row" style="display:flex">
        <div class="col">
            <li id="lihome"><a href="#">首頁</a></li>
        </div>
        <div class="col">
            <li id="liDTree">
                <a href="#">決策樹分析</a>
            </li>
        </div>
        <!--<div class="col"><li class="col"><a href="#news">關聯分析</a></li></div>
    <div class="col"><li class="col"><a href="#news">階層式群集分析</a></li></div>-->
        <div class="col">
            <li class="col" id="liKmeans"><a href="#">K-means分析</a></li>
        </div>
        <div class="col">
            <li class="col" id="liKNN"><a href="#">KNN分析</a></li>
        </div>
        <div class="col">
            <li class="col" id="liAnalysis"><a href="#">分析</a></li>
        </div>
        <div class="col">
            <li class="col" id="liConclusion"><a href="#">結論</a></li>
        </div>
    </ul>
    <br>

    <div id="home">
        <div id="font1 " class="head " style="text-align:center ">
            <h1 style="font-family: Microsoft JhengHei; "><b>機器學習結合Web 分析六都犯罪率<b></h1>
      <h3 style="font-family:DFKai-sb; ">判斷在六都中是否青少年犯罪與以下變數有關</h3>
      <br><br>
      <video width="900 " controls=" ">
        <source src="DM.mp4 " type="video/mp4 ">
      </video>
    </div>
    <br><br>
    <h3 style="text-align:center;font-family:DFKai-sb; ">變數說明</h3>
    <div id="font1 " class="list " style="text-align:center ">
      <table style="font-size:18px;border:3px rgb(0, 0, 0) double;padding:5px;" rules="all" cellpadding='5'>
        <tr>
          <th>變數</th>
          <th>說明</th>
        </tr>
        <tr>
          <td>市區</td>
          <td>六都各區 (台北市/新北市/桃園市/台中市/台南市/高雄市)</td>
        </tr>
        <tr>
          <td>年份</td>
          <td>105年、106年、107年</td>
        </tr>
        <tr>
          <td>月份</td>
          <td>1-12月</td>
        </tr>
        <tr>
          <td>毒品案件數</td>
          <td>各區每年每月毒品 (吸毒) 交易案件數量</td>
        </tr>
        <tr>
          <td>派出所數量</td>
          <td>各區派出所、警察局數量</td>
        </tr>
        <tr>
          <td>集會次數</td>
          <td>每月各區集會遊行數量</td>
        </tr>
        <tr>
          <td>宗教團體數</td>
          <td>各區一般寺廟<br>地方以及全國性財團法人寺廟、教會堂、基金會</td>
        </tr>
        <tr>
          <td>竊盜案件數</td>
          <td>各區每月住宅、機車、汽車竊盜數量</td>
        </tr>
        <tr>
          <td>學校數</td>
          <td>各市各區國小、國中、高中學校總數量 </td>
        </tr>
        <tr>
          <td>離婚筆數</td>
          <td>各區離婚筆數</td>
        </tr>
        <tr>
          <td>交通案件數</td>
          <td>六都各區事故案件次數</td>
        </tr>
        <tr>
          <td>目標變數 : 青少年竊盜犯罪數</td>
          <td>各區每年每月青少年 (12歲以上、未滿24歲)竊盜犯罪</td>
        </tr>
      </table>
    </div>
    <div class="source ">
      <h3 style="text-align:center; ">變數來源</h3>
      <ol>
        <li>青少年犯罪
          <br><a href="https://data.gov.tw/dataset/42519 ">https://data.gov.tw/dataset/42519</a>
        </li> 
        <li>犯罪資料
          <br><a href="https://data.gov.tw/dataset/14200 ">https://data.gov.tw/dataset/14200</a>
        </li>
        <li>毒品犯罪資料
          <br><a href="https://data.gov.tw/dataset/57268 ">https://data.gov.tw/dataset/57268</a>
        </li> 
        <li>交通意外
          <br><a href="https://data.gov.tw/dataset/12818 ">https://data.gov.tw/dataset/12818 </a>                      
           
          <br><a href="https://data.gov.tw/dataset/12197 ">https://data.gov.tw/dataset/12197</a>  
        </li>  
        <li>警察機關
          <br><a href="https://www.npa.gov.tw/NPAGip/wSite/lp?ctNode=12577&CtUnit=2004&BaseDSD=7 ">
            https://www.npa.gov.tw/NPAGip/wSite/lp?ctNode=12577&CtUnit=2004&BaseDSD=7</a>
        </li>         
        <li>學校
          <br><a href="https://depart.moe.edu.tw/ED4500/News.aspx?n=63F5AB3D02A8BBAC&sms=1FF9979D10DBF9F3 ">
            https://depart.moe.edu.tw/ED4500/News.aspx?n=63F5AB3D02A8BBAC&sms=1FF9979D10DBF9F3
          </a>
        </li>     
        <li>宗教團體
          <br><a href="https://religion.moi.gov.tw/Religion/FoundationTemple?ci=1 ">
            https://religion.moi.gov.tw/Religion/FoundationTemple?ci=1
          </a>
        </li>
        <li>集會遊行資訊
          <br><a href="https://data.moi.gov.tw/MoiOD/Data/DataDetail.aspx?oid=2E2E281C-5E92-446F-B1E7-3A975C0AF0D1 ">
            https://data.moi.gov.tw/MoiOD/Data/DataDetail.aspx?oid=2E2E281C-5E92-446F-B1E7-3A975C0AF0D1
          </a>
        </li>
        
      </ol>
    </div> 
    </div>

    <div id="DTree" style="text-align:center;width:80%;margin-left:10%;margin-bottom:3%;">
      <div>
      <h1 style="text-align: center">
        Decision-trees
      </h1>
      </div>
      <div id="dataframe" style="text-align: center;margin-top:3%;" class="list ">
          <table id="DT_data">
              <tr>
                  <th>ID</th>
                  <th>Refund</th>
                  <th>Marital status</th>
                  <th>Taxabla Income</th>
                  <th>Buy</th>
              </tr>
              <tr>
                  <td>1</td>
                  <td>YES</td>
                  <td>Single</td>
                  <td>125K</td>
                  <td>NO</td>
              </tr>
              <tr>
                  <td>2</td>
                  <td>NO</td>
                  <td>Married</td>
                  <td>100K</td>
                  <td>NO</td>
              </tr>
              <tr>
                  <td>3</td>
                  <td>NO</td>
                  <td>Single</td>
                  <td>70K</td>
                  <td>NO</td>
              </tr>
              <tr>
                  <td>4</td>
                  <td>YES</td>
                  <td>Married</td>
                  <td>120K</td>
                  <td>NO</td>
              </tr>
              <tr>
                  <td>5</td>
                  <td>NO</td>
                  <td>Divorced</td>
                  <td>95K</td>
                  <td>YES</td>
              </tr>
              <tr>
                  <td>6</td>
                  <td>NO</td>
                  <td>Single</td>
                  <td>90K</td>
                  <td>YES</td>
              </tr>
          </table>
      </div>
      <div id="dt_img">
          <img src="DT2.png">
      </div>
      <div style="font-size: 48px;">   
          
        步驟   
                
      </div>
      <div id="work_flow_img" >
          <a class="nextback" id="back" onclick="backfun()">Back&nbsp&nbsp&nbsp</a>   
        <img src="work_flow.png">
        <a class="nextback" id="next" onclick="nextfun()">&nbsp&nbspNext</a> 
        <br>
        <br>
        <br>
      </div>
      
      <iframe src="data.html" width="800px" height="600px" frameborder="1" scrolling="yes"
        style="top:50%;text-align: center;" id="ifr" ></iframe>      
        <div id="tree" style="margin:0%;display:none"><img src="tree.png" style="width:100%;height:100%;transform: scale(1.8);overflow:hidden;"></div>
        <div id="cfs" style="margin:0%;display:none"><img src="cfs.png" style="width:100%;height:100%;transform: scale(1.8);overflow:hidden;"></div>
      <div>
        <br>
        <br>
        <br>
        <br>
        <br>
      </div>
    </div>
    
  <div id="Kmeans" style="text-align:center;width:80%;margin-left:10%;margin-bottom:3%;">
	<section class="6u">
		<div >
			<header>
				<h2>Kmeans 群集分析</h2>
			</header>
			<p>K-means 分群 (K-means Clustering)，其實就有點像是以前學數學時，找重心的概念。</p>
			<p>演算法：</p>
			<p>1. 我們先決定要分k組，並隨機選k個點做群集中心。</p>
			<p>2. 將每一個點分類到離自己最近的群集中心(可用直線距離)。</p>
			<p>3. 重新計算各組的群集中心(常用平均值)。</p>
			<p>反覆 2、3 動作，直到群集不變，群集中心不動為止。</p>
			<p>(黃色是群集中心的初始點，綠色為新的群集中心。)</p>
			<p href="#" class="image full"><img src="images/kmeans/pic01.png" width="300" height="300"></p>
			<p href="#" class="image full"><img src="images/kmeans/pic02.png" width="300" height="300"></p>
			<p href="#" class="image full"><img src="images/kmeans/pic03.png" width="300" height="300"></p>
			<p>新的群集中心會不斷的更新，直到不動為止。</p>
			</br>
			<p>結論：</p>
			<p>kmeans是一種非監督學習的演算法，餵給它的資料集是無label的資料，是雜亂無章的，經過聚類後才變得有點順序，先無序，後有序</p>
		</div>
	</section>	
  </div>
  
  <div id="KNN" style="text-align:center;width:80%;margin-left:10%;margin-bottom:3%; ">
		<section class="6u">
		<div >
			<header>
				<h2>KNN (K-nearest neighbor)</h2>
			</header>
			<p>KNN (K-nearest neighbor)，最近鄰居法 是一種監督式學習演算法，一個物件的分類是由其鄰居的「多數表決」來決定的。</p>
			</br>
			<p>距離的判斷為歐幾里得距離 (Euclidean distance)。</p>
			<p href="#" class="image full"><img src="images/knn/pic01.png" width="520" height="150"></p>
			<p>演算法：</p>
			<p>1. 計算測試物件與訓練集中所有物件的距離。</p>
			<p>2. 找出上步計算的距離中最近的K個物件，作為測試物件的鄰居。</p>
			<p>3. 找出K個物件中出現頻率最高的物件，其所屬的類別就是該測試物件所屬的類別。</p>
			</br>
			<p>在k-NN分類中，輸出是一個分類族群。一個物件的分類是由其鄰居的「多數表決」確定的，</p>
			<p>k個最近鄰居（k為正整數，通常較小）中最常見的分類決定了賦予該物件的類別。</p>
			<p>K值設定過小會降低分類精度；若設定過大，且測試樣本屬於訓練集中包含資料較少的類，則會增加噪聲，降低分類效果。</p>
			
			<p href="#" class="image full"><img src="images/knn/pic02.png" width="300" height="200"></p>
			<p>從上圖中我們可以看到，圖中的資料集是良好的資料，即都打好了label，一類是藍色的正方形，一類是紅色的三角形，那個綠色的圓形是我們待分類的資料。</p>
			<p>如果K=3，那麼離綠色點最近的有2個紅色三角形和1個藍色的正方形，這3個點投票，於是綠色的這個待分類點屬於紅色的三角形</p>
			<p>如果K=5，那麼離綠色點最近的有2個紅色三角形和3個藍色的正方形，這5個點投票，於是綠色的這個待分類點屬於藍色的正方形</p>
			</br>
			<p>結論：</p>
			<p>KNN是一種監督學習的演算法，餵給它的資料集是帶label的資料，已經是完全正確的資料</p>
		</div>
	</section>	
  </div>
  <div id="Analysis" style="text-align:center;width:80%;margin-left:10%;margin-bottom:3%; ">
      <div>
      <table id = "citytable" align="center" >
        <tr>
          　<a href="#"><th id=taTaipei onMouseOver="this.style.backgroundColor='skyblue';" onMouseOut="this.style.backgroundColor='white';">台北市</th></a>
          <a href="#" ><th onclick="make_county_table('新北市')" id=taNewTaipei onMouseOver="this.style.backgroundColor='skyblue';" onMouseOut="this.style.backgroundColor='white';">新北市</th></a>
         <a href="#"><th id=taTaoyuan onMouseOver="this.style.backgroundColor='skyblue';" onMouseOut="this.style.backgroundColor='white';">桃園市</th></a>
          <a href="#"><th id=taTaichung onMouseOver="this.style.backgroundColor='skyblue';" onMouseOut="this.style.backgroundColor='white';">台中市</th></a>
          <a href="#"><th id=taTainan onMouseOver="this.style.backgroundColor='skyblue';" onMouseOut="this.style.backgroundColor='white';">台南市</th></a>
         <a href="#"><th id=taKaoshiung onMouseOver="this.style.backgroundColor='skyblue';" onMouseOut="this.style.backgroundColor='white';">高雄市</th></a>
        </tr>
      </table>
    </div>
  </div>
    </div>
  <div id="Conclusion"style="text-align:center;width:80%;margin-left:10%;margin-bottom:3%; ">
      <div id=pictureway >
          <img id="picture1" src="kmeans_feature.png" style="width:100%;height:100%;">
      </div>     
      <p id=article01 style="font-size: 24px;">
          Kmeans分析<br>
          犯罪率高的族群特徵<br>
          1·毒品案件數高<br>
          2·竊盜案件數高<br>
          3·交通案件數高<br>       
          4·學校數中等<br>
          5·派出所數中等
        </p> 
      <div id=thumbnailway>
          <table>
             <tr>
               <th>
               </th>   
               <th><img  onclick="changepic1()" src ="kmeans_feature.png"></th>            
              <th><img  onclick="changepic2()" src ="kmeans_feature0.png"></th> 
              <th><img  onclick="changepic3()" src ="kmeans_weka.png"></th>
              <th><img  onclick="changepic4()" src ="tree_interpret.png"></th>
              <th><img  onclick="changepic5()" src ="conclusion.png"></th>              
            </tr>
          </table>
      </div>
      <div id=articleway>
          
      </div>
  </div>  

</body>

</html>