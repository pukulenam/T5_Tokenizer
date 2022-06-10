$(document).ready(function () {
  //Init Event Listener
  const tmpls = document.querySelectorAll(".tmpl");
  const dataVars = document.querySelectorAll(".var");
  const sliders = document.querySelectorAll(".var-slide");
  const varcs = document.querySelectorAll(".var-c");

  tmpls.forEach((tmpl) =>
    tmpl.addEventListener("change", (event) => {
      if (tmpl.value == "custom") {
        if (checkCustConf()) {
          setAllConf(
            getCookie("varOne"),
            getCookie("varTwo"),
            getCookie("varThree"),
            getCookie("CbX"),
            getCookie("CbY"),
            getCookie("CbYN")
          );
        } else {
          setAllConf("0", "0", "0", "", "", "");
        }
      } else {
        tmplS = tmpl.value.split(",");
        setAllConf(tmplS[0], tmplS[1], tmplS[2], tmplS[3], tmplS[4], tmplS[5]);
      }
      getconfstr();
      updallslidertext();
    })
  );

  dataVars.forEach((dataVar) =>
    dataVar.addEventListener("change", (event) => {
      if (dataVar.getAttribute("type") == "checkbox") {
        val = dataVar.checked;
      } else if (dataVar.getAttribute("type") == "radio") {
        val = dataVar.getAttribute("id");
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
      updallslidertext();
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

  //Disabled due by HTTPS Only, Uncomment only in Production.
  newsBtn = document.getElementById("pasteNewsBtn");
  newsBtn.addEventListener("click", function (event) {
    navigator.clipboard
      .readText()
      .then(
        (clipText) => (document.getElementById("newsText").value = clipText)
      );
  });

  //End Event Listener

  //Start On Load Functions
  clrFormSet();
  startInit();
  generalAjax("sessioncheck");
  //End On Load Functions

  //Start Functions Set

  function clrFormSet() {
    $("#tokenizerForm")[0].reset();
    $("#sumText").val("");
  }

  function checkCurConf() {
    tmpl = getCookie("tmpl");
    if (tmpl != "") {
      document.getElementById(tmpl).click();
      if (getCookie("tmpl") != "tc") {
      } else {
        if (checkCustConf()) {
          setAllConf(
            getCookie("varOne"),
            getCookie("varTwo"),
            getCookie("varThree"),
            getCookie("CbX"),
            getCookie("CbY"),
            getCookie("CbYN")
          );
        } else {
          setAllConf("0", "0", "0", "", "", "");
        }
      }
    } else {
      document.getElementById("t1").click();
    }
  }

  function setSliderVal(target, val) {
    document.getElementById(target).value = val;
  }

  function checkCustConf() {
    if (
      getCookie("var1") != "undefined" &&
      getCookie("var2") != "undefined" &&
      getCookie("var3") != "undefined" &&
      getCookie("cbX") != "undefined" &&
      getCookie("cbY") != "undefined" &&
      getCookie("cbYN") != "undefined"
    ) {
      return 'false';
    } else {
      return 'true';
    }
  }

  function getconfstr() {
    checkedradio = document.querySelector('input[name = "tmpl"]:checked');
    document.getElementById("curConf").innerHTML = document.querySelector(
      'label[for="' + checkedradio.getAttribute("id") + '"]'
    ).innerHTML;
  }

  function setCbCond(target, val) {
    document.getElementById(target).checked = val;
  }

  function startInit() {
    checkCurConf();
  }

  function updallslidertext() {
    sliders.forEach((slider) => {
      document.getElementById(slider.dataset.target).innerHTML = slider.value;
    });
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

  function respAct(act){
    if (act == "refresh"){
      window.location.reload();
    }
  }
  //End Functions Set

  //Start Jquery AJAX Functions
  let alertMsg = $("#alertMessage");

  function generalAjax(action) {
    $.ajax({
      url: "action",
      method: "POST",
      data: {
        action: action,
      },
      dataType: "JSON",
      success: function (data) {
        if (data.error != "") {
          alertMsg.addClass(data.alert).html(data.error);
          setTimeout(function () {
            alertMsg.removeClass(data.alert).html("");
          }, 3000);
        } else {
          alertMsg.addClass(data.alert).html(data.success);
          setTimeout(function () {
            alertMsg.removeClass(data.alert).html("");
          }, 3000);
        }
        setTimeout(function () {
          respAct(data.respact);
        }, 500);
        
      },
    });
  }

  let tokenizerform = $("#tokenizerForm");
  tokenizerform.on("submit", function (event) {
    event.preventDefault();
    if (!tokenizerform[0].checkValidity()) {
      event.preventDefault();
      event.stopPropagation();
    } else {
      $.ajax({
        url: "action",
        method: "POST",
        data: new FormData(this),
        dataType: "json",
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
          $("#submitBtn").attr("disabled", true).html("Wait...");
        },
        success: function (data) {
          $("#submitBtn").attr("disabled", false).html("Send");
          if (data.error != "") {
            alertMsg.addClass(data.alert).html(data.error);
            setTimeout(function () {
              alertMsg.removeClass(data.alert).html("");
            }, 3000);
          } else {
            alertMsg.addClass(data.alert).html(data.success);
            setTimeout(function () {
              alertMsg.removeClass(data.alert).html("");
            }, 3000);
            $("#sumText").val(data.sumtext);
          }
        },
      });
    }
  });
  //End Jquery AJAX Functions
});
