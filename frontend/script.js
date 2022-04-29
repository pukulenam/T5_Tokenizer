var var1;
var var2;
var var3;
var cek1;
var cek2;
var cek3;
timeout();

function setCookie(cname, cvalue, exdays) {
const d = new Date();
d.setTime(d.getTime() + (exdays*24*60*60*1000));
let expires = "expires="+ d.toUTCString();
document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
let name = cname + "=";
let ca = document.cookie.split(';');
for(let i = 0; i < ca.length; i++) {
  let c = ca[i];
  while (c.charAt(0) == ' ') {
    c = c.substring(1);
  }
  if (c.indexOf(name) == 0) {
    return c.substring(name.length, c.length);
  }
}
return "";
}

if(getCookie("var1") != ""){
  document.getElementById("varOneVal").innerHTML = getCookie("var1");
  document.getElementById("varTwoVal").innerHTML = getCookie("var2");
  document.getElementById("varThreeVal").innerHTML = getCookie("var3");
  document.getElementById("varOne").value = getCookie("var1");
  document.getElementById("varTwo").value = getCookie("var2");
  document.getElementById("varThree").value = getCookie("var3");
}

document.getElementById("cbX").checked = (getCookie("cek1") === 'true');
document.getElementById("cbY").checked = (getCookie("cek2") === 'true');
document.getElementById("cbYN").checked = (getCookie("cek3") === 'true');

$(document).ready(function () {
  $(document).on("change", ".var-slide", function () {
    console.log($(this).val());
    $("#" + $(this).data("id")).html($(this).val());
  });
});


function _var1(){
  document.getElementById('tc').checked = true;
  var1 = document.getElementById("varOne").value;
}

function _var2(){
  document.getElementById('tc').checked = true;
  var2 = document.getElementById("varTwo").value;
}

function _var3(){
  document.getElementById('tc').checked = true;
  var3 = document.getElementById("varThree").value;
}

function getradio(_text){
  if(_text == "c") {
    return;
  }
  var myArray = _text.split(",");
  document.getElementById('varOne').value = var1 = myArray[0];
  document.getElementById('varTwo').value = var2 = myArray[1];
  document.getElementById('varThree').value = var3 = myArray[2];
  document.getElementById("cbX").checked = cek1 = (myArray[3] === 'true');
  document.getElementById("cbY").checked = cek2 = (myArray[4] === 'true');
  document.getElementById("cbYN").checked = cek3 = (myArray[5] === 'true');
}

function timeout() {
  setTimeout(function () {
      if(typeof var1 == "undefined"){
        if(getCookie("var1") == ""){
          var1 = var2 = var3 = 2.5;
        }
        else {
        var1 = getCookie("var1");
        var2 = getCookie("var2");
        var3 = getCookie("var3");
        cek1 = getCookie("cek1");
        cek2 = getCookie("cek2");
        cek3 = getCookie("cek3");
        }
      }

      cek1 = document.getElementById("cbX").checked;
      cek2 = document.getElementById("cbY").checked;
      cek3 = document.getElementById("cbYN").checked;

      document.getElementById("varOneVal").innerHTML = var1;
      document.getElementById("varTwoVal").innerHTML = var2;
      document.getElementById("varThreeVal").innerHTML = var3;

      setCookie("var1",var1,1);
      setCookie("var2",var2,1);
      setCookie("var3",var3,1);
      setCookie("cek1",cek1,1);
      setCookie("cek2",cek2,1);
      setCookie("cek3",cek3,1);

      timeout();
  }, 50);
}  