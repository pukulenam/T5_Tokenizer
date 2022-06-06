<?php ?>
<html>
<body>
<div id="new">
</div>
<script>
function tambah(acak){
   var tag = document.createElement("pre");
   var text = document.createTextNode("");
   tag.setAttribute("id", acak);
   tag.appendChild(text);
   var element = document.getElementById("new");
   element.appendChild(tag);
}

function cek(str) {
  var acak = Math.floor(Math.random() * 999999999999999999999999999999999);
  str = "aaa";
  if (str.length == 0) {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        tambah(acak);
        document.getElementById(String(acak)).innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "monitor_q.php?q=" + str, true);
    xmlhttp.send();
  }
}

function timeout() {
    setTimeout(function () {
        cek("aaa");
        timeout();
    }, 1000);
   }

timeout();


</script>
</body>
</html>