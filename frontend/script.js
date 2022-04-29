$(document).ready(function () {
  //Init Event Listener

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
