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
    $("#taTaipei").click(function(){
          make_county_table("台北市");
      });
      $("#taTaoyuan").click(function(){
          make_county_table("桃園市");
      });
      $("#taTaichung").click(function(){
          make_county_table("台中市");
      });
      $("#taTainan").click(function(){
          make_county_table("台南市");
      });
      $("#taKaoshiung").click(function(){
          make_county_table("高雄市");
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