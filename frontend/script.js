<<<<<<< HEAD
=======
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

>>>>>>> 1c2fcc3d897d318a18c135a89835ed3abd7973a9
$(document).ready(function () {
  //Init Event Listener

<<<<<<< HEAD
  const tmpls = document.querySelectorAll(".tmpl");
  tmpls.forEach((tmpl) =>
    tmpl.addEventListener("change", (event) => {
      tmplS = tmpl.value.split(",");
      setAllConf(tmplS[0], tmplS[1], tmplS[2], tmplS[3], tmplS[4], tmplS[5]);
    })
  );

  const dataVars = document.querySelectorAll(".var");
  dataVars.forEach((dataVar) =>
    dataVar.addEventListener("change", (event) => {
      if (dataVar.getAttribute("type") == "checkbox") {
        if (dataVar.checked == false) {
          val = "";
        } else {
          val = dataVar.checked;
        }
      }else{
        val = dataVar.value
=======

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
>>>>>>> 1c2fcc3d897d318a18c135a89835ed3abd7973a9
      }
      if (dataVar.getAttribute("type") == "radio") {
        setCookie(dataVar.getAttribute("name"), val);
      } else {
        setCookie(dataVar.getAttribute("id"), val);
      }
    })
  );

  const sliders = document.querySelectorAll(".var-slide");
  sliders.forEach((slider) =>
    slider.addEventListener("change", (event) => {
      document.getElementById(slider.dataset.target).innerHTML = slider.value;
    })
  );
  //Init Event Listener

  //Start On Load Functions
  checkCookie();
  //End On Load Functions

  //Start Functions Set
  function setSliderVal(target, val) {
    document.getElementById(target).value = val;
    document.getElementById(target + "Val").innerHTML = val;
  }

  function setCbCond(target, val) {
    document.getElementById(target).checked = val;
  }

  function checkCookie() {
    console.log("Checking");
    if (typeof getCookie("tmpl") != "undefined") {
      setAllConf(
        getCookie("varOne"),
        getCookie("varTwo"),
        getCookie("varThree"),
        getCookie("CbX"),
        getCookie("CbY"),
        getCookie("CbYN")
      );
    }
  }

  function setAllConf(var1, var2, var3, var4, var5, var6) {
    setSliderVal("varOne", var1);
    setSliderVal("varTwo", var2);
    setSliderVal("varThree", var3);
    setCbCond("cbX", var4);
    setCbCond("cbY", var5);
    setCbCond("cbYN", var6);
  }

  function setCookie(cname, cvalue) {
    const d = new Date();
    d.setTime(d.getTime() + 30 * 24 * 60 * 60 * 1000);
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }

  function getCookie(cname) {
    let name = cname + "=";
    let ca = document.cookie.split(";");
    for (let i = 0; i < ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == " ") {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }

  //ENd Functions Set
});
