<!DOCTYPE html>
<html>


<h1 class="intro" style="text-align: center;"><strong><span style="color: #ff0000;">WEB作業~~~&lt;3</span></strong></h1>
<h3>我是統計資訊的學生，我的人生除了統計以外沒樂趣了，有甚麼統計問題可以問我喔喔喔。</h3>
<p>&nbsp;</p>
<h3>這是我人生第一次寫的頁面，我以前連無名部落格都沒有，也不知道要分享甚麼，因此介紹一點歌給大家認識，這些都是冷門的，因為我討厭跟大家一樣ㄏㄏ。</h3>
<p>&nbsp;</p>
<p>&nbsp;-----------------------------分隔一下</p>
<p>&nbsp;</p>
<ol>
<ol>
<ol>
<li>房東的貓 柔軟
<h3><iframe width="560" height="315" src="https://www.youtube.com/embed/g5Dzd_64fII" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></h3>
<p>這首是我最近的新寵，因為學分太多，生活壓力太大，這首歌的旋律跟歌詞蠻能讓我放空不要一直思考，房東的貓大家都認識，但這首應該蠻少人知道的，喜歡這種旋律的人完全可以私我，我有一票後宮<img src="https://html5-editor.net/tinymce/plugins/emoticons/img/smiley-cool.gif" alt="cool" /></p>
</li>
<li>陳粒&nbsp;奇妙能力歌
<h3><iframe width="560" height="315" src="https://www.youtube.com/embed/p0GPJbdKhCw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></h3>
陳粒是我大學非常喜歡的歌手，我對他不熟單純覺得他的歌的旋律很美，歌詞很寫實，而這首歌和柔軟是我從實況主超負荷歌單找的，他的歌單我覺得很好聽大家可以參考喔~~。</li>
<li>告五人 披星戴月的想你
<h3><iframe width="560" height="315" src="https://www.youtube.com/embed/VpwAq7hiij0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></h3>
這首是我之前去唱歌朋友們點了我覺得很好聽後回家查，結果就不小心聽了n遍，我覺得歌詞很真誠，MV拍的很到位，大家有思念的人可以看看阿。</li>
<li>滅火器 長途夜車
<h3><iframe width="560" height="315" src="https://www.youtube.com/embed/c9PEYJdwdwI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></h3>
如果大家對人生找不太到方向，或是迷惘了，這首歌的歌詞蠻到位的，最近我剛好有點失去人生方向，加上壓力山大，不小聽到這首才覺得有歌懂我，差點聽到快哭了呢QQ</li>
<li>The Chainsmokers , Coldplay - Something Just Like This
<h3><iframe width="560" height="315" src="https://www.youtube.com/embed/FM7MFYoylVs?start=4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></h3>
剛剛說要介紹冷門，結果這首超紅哈哈，介紹這首歌的原因是因為歌詞吧，可能他原本是尋找某位生命中的知心者，但我聽到時的感覺是我的人生追求的並不是天生完美，我對自己追求的是簡單，是努力，並不需要天賦異稟，我相信自己努力改變天生的不足，其中有一段歌詞是"But she said, where d'you wanna go? How much you wanna risk?"&nbsp;我常反問自己面對目標時我願意付出多少代價，而這句歌詞有點貼近自己，所以這首歌不小心變成我的熱門歌單了。</li>
</ol>
</ol>
</ol> 
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
</script>
<script> 
     $(document).ready(function() {
       $("button").addClass("animated bounce");
       $(".well").addClass("animated shake");
       $("#target3").addClass("animated fadeOut");
       $("button").removeClass("btn-default");     
       $("h3").addClass("animated hinge");
       $(".test1").click(function(){
       	$("h3").hide();
       });
       $(".test2").click(function(){
      	 $("h3").show();
       });
       $(".test3").click(function(){
    $(".panel").slideDown("slow");
  });
  $(".test4").click(function(){
    $(".panel").slideUp("slow");
  });
  $("#send").click(function(){
  	if($("#music").text() == "")
    	alert("Thanks for your feedback <3");    
  });
  
  
});   
</script>
</head>
<!-- Only change code above this line. -->

<div class="container-fluid">
  <h3 class="text-primary text-center">jQuery HomeWork</h3>
  <div class="row">
    <div class="col-xs-6">
      <h4>#hide movie and slide down </h4>
      <div class="well" id="left-well">
        <button class="test1" id="target1">hide-movie~~</button>        
        <button class="test3" id="target3">Feedback</button>
      </div>
    </div>
    <div class="col-xs-6">
      <h4>#show movie and slide up </h4>
      <div class="well" id="right-well">
        <button class="test2" id="target4">show-movie~~</button>        
        <button class="test4" id="target6">NO Feedback</button>
      </div>
    </div>
  </div>
</div>

<div class="panel">
  <h1>Choose your favorite music !</h1> 
  <p class="message box">
    choose your favorite music on above ty~~
  </p>
  <p>
    <label for="name">Favorite music:
      <input type="text" id="music"/>
    </label>
    <button id="send">
      Send 
    </button>
  </p>
</div> 

</html>



