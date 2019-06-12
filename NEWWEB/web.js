var currentifr = 0;
$(document).ready(function() {
    $("#liDTree").click(function() {
        hide_except("#DTree");
    });
    $("#liKmeans").click(function() {
        hide_except("#Kmeans");
    });
    $("#liKNN").click(function() {
        hide_except("#KNN");
    });
    $("#lihome").click(function() {
        hide_except("#home");
    });
    $("#liConclusion").click(function() {
        hide_except("#Conclusion");
    });
    $("#liAnalysis").click(function() {
        hide_except("#Analysis");
    });
});

function hide_except(Except) {
    $("#home").fadeOut();
    $("#Kmeans").fadeOut();
    $("#KNN").fadeOut();
    $("#Conclusion").fadeOut();
    $("#DTree").fadeOut();
    $("#Analysis").fadeOut();
    $(Except).fadeIn();

}

function myMove() {
    var elem = document.getElementById("first");
    var pos = 0;
    var id = setInterval(frame, 5);


    function frame() {
        if (pos == 350) {
            clearInterval(id);
        } else {
            pos++;
            elem.style.left = pos + "px";

        }
    }
}

function changepic1() {
    document.getElementById("picture1").src = "kmeans_feature.png";
    document.getElementById("article01").innerHTML = "Kmeans分析<br>犯罪率高的族群特徵<br>1·毒品案件數高<br>2·竊盜案件數高<br>3·交通案件數高<br>4· 學校數中等<br>5·派出所數中等";
}

function changepic2() {
    document.getElementById("picture1").src = "kmeans_feature0.png";
    document.getElementById("article01").innerHTML = "Kmeans分析<br>犯罪率低的族群特徵<br>1·毒品案件數低<br>2·竊盜案件數低<br>3·交通案件數低<br>4· 學校數較少";

}

function changepic3() {
    document.getElementById("picture1").src = "kmeans_weka.png";
    document.getElementById("article01").innerHTML = "Kmeans分析實作示意圖<br>以x軸為kmeans群集，y軸為派出所數量。<br>紅點代表有青少年犯罪";
}

function changepic4() {
    document.getElementById("picture1").src = "tree_interpret.png";
    document.getElementById("article01").innerHTML = "決策數分析<br>交通案件數高和派出所數量中,高的地區青少年犯罪率都較高";
}

function changepic5() {
    document.getElementById("picture1").src = "conclusion.png";
    document.getElementById("article01").innerHTML = "青少年犯罪與區域性質<br>1·派出所2·學校3·宗教團體";
}

function nextfun() {
    if (currentifr == 0) {
        document.getElementById("ifr").style.display = "none"
        document.getElementById("cfs").style.display = "block"
        currentifr = 1;
    } else if (currentifr == 1) {
        document.getElementById("cfs").style.display = "none"
        document.getElementById("tree").style.display = "block"
        currentifr = 2;
    } else if (currentifr == 2) {
        document.getElementById("tree").style.display = "none"
        document.getElementById("ifr").style.display = "block"
        currentifr = 0;
    }
}

function backfun() {
    if (currentifr == 0) {
        document.getElementById("ifr").style.display = "none"
        document.getElementById("tree").style.display = "block"
        currentifr = 2;
    } else if (currentifr == 1) {
        document.getElementById("cfs").style.display = "none"
        document.getElementById("ifr").style.display = "block"
        currentifr = 0;
    } else if (currentifr == 2) {
        document.getElementById("tree").style.display = "none"
        document.getElementById("cfs").style.display = "block"
        currentifr = 1;
    }
}


var mean = [];
var varience = [];
for(var i = 1;i<=5;i++)
{
    mean[i] = 0;
    varience[i] = 0;
}
function get_county(thecounty){

    /*if(thecounty!="")
    {
        var request = new XMLHttpRequest();
        request.open("GET", "sqlcounty.php?thecounty=" + thecounty);
        request.send();
    
        request.onreadystatechange = function() {
        // 伺服器請求完成
            if (request.readyState == 4 && request.status == 200) 
            {                        
                var data = JSON.parse(request.responseText);
                alert(data[1]);
            }
            else{
                alert("發生錯誤， 請求狀態: "+request.readyState + "    回傳狀態: " + request.status);
            }
        }
    }*/
    $.ajax({
        type: "GET",
        url: "sqlcounty.php?thecounty=" + thecounty,
        dataType: "json",
        success: function(data) {
            allcountydata = data;
            distinctDistrict = UniqueCountyAndCrimeRate(data);
            make_district_table(distinctDistrict);
        },
        error: function(jqXHR) {
            alert("發生錯誤: 請求狀態: "+jqXHR.readyState + "           " + jqXHR.status);
        }
    });
}

function UniqueCountyAndCrimeRate(inputArray) {

    districtArray = [];
    var temparray = [];
    districtcrime =[];
    for (var i = 0; i < inputArray.length; i++) 
    {
        mean[1] += parseInt(inputArray[i].drug);
        mean[2] += parseInt(inputArray[i].assembly);
        mean[3] += parseInt(inputArray[i].thief);
        mean[4] += parseInt(inputArray[i].divorce);
        mean[5] += parseInt(inputArray[i].traffic);
        varience[1] += (Math.pow(parseInt(inputArray[i].drug),2));
        varience[2] += (Math.pow(parseInt(inputArray[i].assembly),2));
        varience[3] += (Math.pow(parseInt(inputArray[i].thief),2));
        varience[4] += (Math.pow(parseInt(inputArray[i].divorce),2));
        varience[5] += (Math.pow(parseInt(inputArray[i].traffic),2));
        if ((jQuery.inArray(inputArray[i].district, districtArray)) == -1) 
        {
            districtArray.push(inputArray[i].district);
            temparray[inputArray[i].district] = parseInt(inputArray[i].teencrime);
        }
        else
        {
             temparray[inputArray[i].district] += parseInt(inputArray[i].teencrime);
        }
    }
    for (var i=1 ; i <=5;i++){
        mean[i] = mean[i]/inputArray.length;
        varience[i] = varience[i]/inputArray.length - Math.pow(mean[i],2);
    }
    console.log(mean);
    console.log(varience);
    Object.values(temparray).forEach(function(element){
        districtcrime.push(Math.round((element/24)*100)/100);
    });
    BarChart();


    /*for(var j = 0;j< districtArray.length ;j++)
    {   
        var counter = 0;
        for(var i = 0; i < inputArray.length; i++)
        {
            var temp =jQuery.inArray(inputArray[i].district, districtArray)
            if (temp!=-1)
            {
                counter = counter +  parseInt(inputArray[i].teencrime);
            }
        }
        districtArray[j]=counter;
        console.log(counter);
    }*/
    //console.log(districtArray);
    return districtArray;


}


function make_district_table(districtdata){
    /*var districtTable = document.getElementById("districtTable");
    var totalDistinct = districtdata.length;
    var rowpercolumn = 6;
    for (i=1;i<=totalDistinct/rowpercolumn;i++)
    {
        var tr = districtTable.insertRow(6);
        for(j=i*rowpercolumn;j<=i*rowpercolumn+j;j++)
        {
          tr.innerHTML = "<input name='name[]' type='text' size='12'>";
        }
    }*/

    //建立縣市的動態表格
    if (document.getElementById("myTable"))
    {
        var table = document.getElementById("myTable");

        for(;table.rows.length>0;)
        {
            table.deleteRow(0);
        }
    }
    var x = document.createElement("TABLE");
    x.setAttribute("id", "myTable");
    document.getElementById("districtTable").appendChild(x);

    var totalDistinct = districtdata.length;
    var rowpercolumn = 8;
    for (i=0;i<=totalDistinct/rowpercolumn;i++)
    { 
        var y = document.createElement("TR");
        y.setAttribute("id", "myTr"+i);
        y.setAttribute("align","center");
        document.getElementById("myTable").appendChild(y);
        for(j=i*rowpercolumn;j<=(i+1)*rowpercolumn-1;j++)
        {
            if (!districtdata[j])
            {
                break;
            }
            var a = document.createElement("a");
            a.setAttribute("href","#");
            var z = document.createElement("th");
            z.setAttribute("onMouseOver","this.style.backgroundColor='skyblue'");
            z.setAttribute("onMouseOut","this.style.backgroundColor='white'");
            z.setAttribute("onclick","sss(\""+districtdata[j]+"\")");
            var t = document.createTextNode(districtdata[j]);
            z.appendChild(t);
            a.appendChild(z);
            document.getElementById("myTr"+i).appendChild(a);
        }
    }
    //區犯罪做圖
    //取得縣市資料
}

function sss (district){

    _geocoder(district);
    google.maps.event.addDomListener(
    window, 'load', init);
    $("#analysisSection").fadeIn();
    document.getElementById("selectdistrict").innerHTML=district+"(105年10月~107年9月)統計資料";
    //drug=1,police=2,assembly=3,religion=4,thief=5,school=6,divorce=7,traffic=8;
    var anadistrict = [];
    for (var i = 0; i < 9; i++) 
    {
        anadistrict[i]=0;
    }
    for (var i = 0; i < allcountydata.length; i++) 
    {
        if (allcountydata[i].district == district) 
        {
            anadistrict[1] += parseInt(allcountydata[i].drug);
            anadistrict[2] += parseInt(allcountydata[i].police);
            anadistrict[3] += parseInt(allcountydata[i].assembly);
            anadistrict[4] += parseInt(allcountydata[i].religion);
            anadistrict[5] += parseInt(allcountydata[i].thief);
            anadistrict[6] += parseInt(allcountydata[i].school);
            anadistrict[7] += parseInt(allcountydata[i].divorce);
            anadistrict[8] += parseInt(allcountydata[i].traffic);
        
        }

    }
    for(var i =1;i<anadistrict.length;i++)
    {
        anadistrict[i]=anadistrict[i]/24;
    }
    var std = function(y,i){
        console.log(y +"   :   "+(y-mean[i])/Math.sqrt(varience[i])+3);
        return ((y-mean[i])/Math.sqrt(varience[i])+3);
    }
    console.log(anadistrict);
    console.log("mean"+mean[4]);
    console.log("div"+anadistrict[7]);
    RadarChart1(district,std(anadistrict[1],1),std(anadistrict[3],2),
                std(anadistrict[5],3),std(anadistrict[7],4),std(anadistrict[8],5));
    BarChart2(district,anadistrict[2],anadistrict[4],anadistrict[6])
}
function BarChart() {
    //for (var i = 0; i < districtcrime.length; i++)
     //  console.log(districtcrime[i]);
    $('#BarChart0').remove(); // this is my <canvas> element
    $('#graph-container').append('<canvas id="BarChart0"><canvas>');
    var ctx_bar = document.getElementById('BarChart0').getContext('2d');
    var chart = new Chart(ctx_bar, {
        type: 'horizontalBar',
        theme: "light1",
        data: {
            labels: districtArray,
            datasets: [{
                //label: districtArray,
                data: districtcrime,
                backgroundColor: "rgb(92, 173, 173)",
                borderWidth: 1,
            }]
        },
        options: {
            title: {
            display: true,
            text: "各區域青少年犯罪率(105年10月~107年9月)",
            fontSize:35,
            fontFamily:"Microsoft JhengHei",
            fontColor:"black"
        },
            scales: {
                yAxes: [{
                    categoryPercentage: 0.9, //柱子寬度(類別比例)                            
                    gridLines: {
                        offsetGridLines: true
                    },
                    ticks: {
                        beginAtZero: true //從零開始
                    }
                }],
                xAxes: [{
                    ticks: {
                        beginAtZero: true,
                        //steps: 10,//每一格刻度間距10
                        //stepValue: 10,
                        //max: 10 //設定最大值
                    },
                    categoryPercentage: 0.01, //刻度寬度
                }],
            }
        }
    });
}
function RadarChart1(dis,da1,da2,da3,da4,da5) {
    console.log(da4);
    $('#RadarChart1').remove(); // this is my <canvas> element
    $('#chartplace2').append('<canvas id="RadarChart1"><canvas>');
    var ctx_Radar = document.getElementById('RadarChart1').getContext('2d');
    var Radar = new Chart(ctx_Radar, {
        type: 'radar',
        data: {
            labels: ["毒品案件","集會遊行","竊盜","離婚筆數","交通事故"],
            datasets: [{
                label: '青少年犯罪率前五大特徵',
                data: [da1,da2,da3,da4,da5],
                backgroundColor: "rgba(255, 99, 132,0.6)",
                pointRadius: 1, //點的半徑
                pointBackgroundColor: "red", //點的顏色
            }]
        },
        options: {
            labels: {
                    // This more specific font property overrides the global property
                    fontSize: 30
                },
            legend: {
                labels: {
                    // This more specific font property overrides the global property
                    fontSize: 15,
                    ontFamily:"Microsoft JhengHei",
                    fontColor:"black"
                }
            },
            title: {
            display: true,
            text: "影響青少年犯罪可能因素雷達圖",
            fontSize:20,
            fontFamily:"Microsoft JhengHei",
            fontColor:"black"
        },
            scale: {
                ticks: {
                    beginAtZero: true,
                    min: 0,
                    max: 6,
                    stepSize: 0.5
                },
                pointLabels:{
                    fontSize:20,
                    ontFamily:"Microsoft JhengHei",
                    fontColor:"black"
                }
            }
        }
    });
}
function BarChart2(dis,da1,da2,da3) {
    //for (var i = 0; i < districtcrime.length; i++)
     //  console.log(districtcrime[i]);
    $('#BarChart1').remove(); // this is my <canvas> element
    $('#chartplace1').append('<canvas id="BarChart1"><canvas>');
    var ctx_bar2 = document.getElementById('BarChart1').getContext('2d');
    var chart = new Chart(ctx_bar2, {
        type: 'horizontalBar',
        theme: "light1",
        data: {
            labels: ["警察局數","廟宇數","學校數"],
            datasets: [{
                label: "建物數",
                data: [da1,da2,da3],
                backgroundColor: ["rgb(0 220 130)","rgb(253, 83, 60)","rgb(72 118 255)"],
                borderWidth: 1,
            }]
        },
        options: {
            title: {
                    display: true,
                    text: "地方指標性建物",
                    fontSize:20,
                    fontFamily:"Microsoft JhengHei",
                    fontColor:"black"
                },
            scales: {
                yAxes: [{
                    categoryPercentage: 0.9, //柱子寬度(類別比例)                            
                    gridLines: {
                        offsetGridLines: true
                    },
                    ticks: {
                        beginAtZero: true //從零開始
                    }
                }],
                xAxes: [{
                    ticks: {
                        beginAtZero: true,
                        //steps: 10,//每一格刻度間距10
                        //stepValue: 10,
                        //max: 10 //設定最大值
                    },
                    categoryPercentage: 0.01, //刻度寬度
                }]
            }
        }
    });
}

geocoder = new google.maps.Geocoder();

function init() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: {
            lat: 25.0339687,
            lng: 121.5622835
        },
        zoom: 11.5
    });

}


function _geocoder(address) {
    geocoder.geocode({
        address: address
    }, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            var LatLng = results[0].geometry.location;
            map = new google.maps.Map(document.getElementById('map'), {
                center: results[0].geometry.location,
                zoom: 11.5
            });
            var n1 = new google.maps.Marker({
                position: results[0].geometry.location,
                map: map,
            });

        } else {
            alert("fail = " + status);
        }
    });
}
