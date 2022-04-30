$(document).ready(function () {
  //Init Event Listener
  const tmpls = document.querySelectorAll(".tmpl");
  const dataVars = document.querySelectorAll(".var");
  const sliders = document.querySelectorAll(".var-slide");
  const varcs = document.querySelectorAll(".var-c");

  tmpls.forEach((tmpl) =>
    tmpl.addEventListener("change", (event) => {
      if (tmpl.value == "custom") {
        varcs.forEach((varc) => {
          setAllConf("0", "0", "0", "", "", "");
        });
      } else {
        tmplS = tmpl.value.split(",");
        setAllConf(tmplS[0], tmplS[1], tmplS[2], tmplS[3], tmplS[4], tmplS[5]);
      }
      setCurConf()
    })
  );

  dataVars.forEach((dataVar) =>
    dataVar.addEventListener("change", (event) => {
      if (dataVar.getAttribute("type") == "checkbox") {
        if (dataVar.checked == false) {
          val = "";
        } else {
          val = dataVar.checked;
        }
      } else {
        val = dataVar.value;
      }
      if (dataVar.getAttribute("type") == "radio") {
        setCookie(dataVar.getAttribute("name"), val);
      } else {
        setCookie(dataVar.getAttribute("id"), val);
      }
    })
  );

  sliders.forEach((slider) =>
    slider.addEventListener("change", (event) => {
      document.getElementById(slider.dataset.target).innerHTML = slider.value;
    })
  );

  varcs.forEach((varc) =>
    varc.addEventListener("change", (event) => {
      document.getElementById("tc").checked = true;
    })
  );

  sumBtn = document.getElementById("copySumBtn");
  sumBtn.addEventListener("click", function (event) {
    var copyText = document.getElementById("sumText");

    copyText.select();
    copyText.setSelectionRange(0, 99999);
    navigator.clipboard.writeText(copyText.value);

    alert("Text Copied");
  });

  /*
  //Disabled due by HTTPS Only, Uncomment only in Production.
  newsBtn = document.getElementById("pasteNewsBtn");
  newsBtn.addEventListener("click", function (event) {
    navigator.clipboard
      .readText()
      .then(
        (clipText) => (document.getElementById("newsText").value = clipText)
      );
  });
  */

  //End Event Listener

  //Start On Load Functions
  checkCookie();
 
  //End On Load Functions

  //Start Functions Set

  function setCurConf() {
    checkedradio = document.querySelector('input[name = "tmpl"]:checked');
    if (checkedradio == "null"){
      document.querySelector('input[name = "tmpl"]').value = "1,0.5,2,true,true,"
    }else 
    document.getElementById("curConf").innerHTML = document.querySelector(
      'label[for="' + checkedradio.getAttribute("id") + '"]'
    ).innerHTML;
  }

  function setSliderVal(target, val) {
    document.getElementById(target).value = val;
    document.getElementById(target + "Val").innerHTML = val;
  }

  function setCbCond(target, val) {
    document.getElementById(target).checked = val;
  }

  function checkCookie() {
    if (typeof getCookie("tmpl") != "undefined") {
      if (getCookie("tmpl") != "custom") {
        document.querySelector('input[name = "tmpl"]').value = getCookie("tmpl");
      } else {
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
    setCurConf();
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
