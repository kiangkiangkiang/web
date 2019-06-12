function myFunction() {
var x = document.forms["myForm"]["account"].value;
var y = document.forms["myForm"]["password"].value;
if (x == "" && y == "" ) {
  alert("請輸入帳號和密碼");
  return false;
}
 if (x == "") {
  alert("請輸入帳號");
  return false;
}
 if (y == "") {
  alert("請輸入密碼");
  return false;
}
}


function confirmation() { 
  var gaccount = document.getElementById("caccount").value;
  var gname = document.getElementById("cname").value;
  var gmail = document.getElementById("cmail").value;
  var gpassword = document.getElementById("cpassword").value;
  var gcpassword =document.getElementById("dccpassword").value;
  var answer = confirm("確認註冊?")

  if (answer && (gaccount ==""||gname == ""||gmail == ""|| gpassword==""||gcpassword=="")){ 
   alert("尚未完成，請確認!")
  }
  else if(answer &&(gpassword!=gcpassword)){
    alert("密碼確認有誤，請重新輸入")
  }
  else if (answer && gpassword==gcpassword ){ 
    $.ajax({
      type: "POST",
      ///加了file上線要改回來
      url: "web_pass_sql.php",
      data : {
        gaccount:gaccount,
        gname:gname,
        gmail:gmail,
        gpassword:gpassword
      },
      dataType: "json",
      success: function(data) {
        alert(data);

        window.location = "web.html"; 
      },
      error: function(jqXHR) {
          alert("發生錯誤 狀態: "+jqXHR.readyState + "           " + jqXHR.status);
      }
    });

    /*var request = new XMLHttpRequest();
  request.open("POST", "web_pass_sql.php");

  // POST 參數須使用 send() 發送
  var data = {
        gaccount:gaccount,
        gname:gname,
        gmail:gmail,
        gpassword:gpassword
      };

  // POST 請求必須設置表頭在 open() 下面，send() 上面
  request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  request.send(data);

  request.onreadystatechange = function() {
      // 伺服器請求完成
      if (request.readyState === 4) {
          // 伺服器回應成功
          if (request.status === 200) {
              var type = request.getResponseHeader("Content-Type");   // 取得回應類型
              alert("success");
              // 判斷回應類型，這裡使用 JSON
              if (type.indexOf("application/json") === 0) {               
                  var data = JSON.parse(request.responseText);

                  if (data.name) {
                      document.getElementById("createResult").innerHTML = '員工：' + data.name + '，儲存成功！';
                  } else {
                      document.getElementById("createResult").innerHTML = data.msg;
                  }
              }
          } else {
              alert("發生錯誤" + request.status);
          }
      }
  }*/
  	alert("註冊成功!") 
  } 
  else{ 
    alert("取消註冊") 
  }


} 