<!DOCTYPE html>
<html lang="en">

<?php
include 'header.php';
?>

<body>

  <main>
    <section class="section d-flex flex-column align-items-center justify-content-center py-4">
      <div class="col-lg-11">
        
          <div class="d-flex justify-content-center py-4">
            <a href="#" class="logo d-flex align-items-center w-auto">
              <img src="assets/img/logo.png" alt="Logo N">
              <span class="d-none d-lg-block fs-3">T5</span>
            </a>
          </div><!-- End Logo -->
          <div class="row row-cols-2">
          <div class="col-7 col-7m">
            <form method="POST" class="g-2 needs-validation" id="officeLogin" novalidate>
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title">Input News</h5>
                    </div>
                    <div class="col d-flex align-items-center justify-content-end gap-2">
                      <button type="button" id="pasteBtn" class="btn btn-dark btn-sm"><b>Paste</b></i></button>
                      <button type="button" id="submitBtn" class="btn btn-primary btn-sm"><b>Send</b><i class="bi bi-plus"></i></button>
                    </div>
                  </div>
                  <div class="fade show" id="alertMessage" role="alert"></div>
                  <div class="col-12">
                    <div class="form-floating">
                      <textarea rows="6" class="form-control" placeholder="Input Long Text" name="lt" id="longText" style="height: 100px;"></textarea>
                      <label for="longText">Long Text</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="accordion mt-3" id="accordConf">
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="accordConfHead">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseConf" aria-expanded="false" aria-controls="collapseConf">
                            <b>Settings</b>&nbsp<i>(Default)</i>
                          </button>
                        </h2>
                        <div id="collapseConf" class="accordion-collapse collapse" aria-labelledby="accordConfHead" data-bs-parent="#accordConf">
                          <div class="accordion-body">
                            <div class="row">
                              <div class="d-flex justify-content-around">
                                <div>
                                  <input class="form-check-input" type="radio" id="t1" name="t" value="satu" checked>
                                  <label class="form-check-label" for="t1">
                                    Default
                                  </label>
                                </div>
                                <div>
                                  <input class="form-check-input" type="radio" id="t2" name="t" value="dua" checked>
                                  <label class="form-check-label" for="t2">
                                    Template 2
                                  </label>
                                </div>
                                <div>
                                  <input class="form-check-input" type="radio" id="t3" name="t" value="tiga" checked>
                                  <label class="form-check-label" for="t3">
                                    Template 3
                                  </label>
                                </div>
                                <div>
                                  <input class="form-check-input" type="radio" id="t4" name="t" value="empat" checked>
                                  <label class="form-check-label" for="t4">
                                    Template 4
                                  </label>
                                </div>
                                <div>
                                  <input class="form-check-input" type="radio" id="t5" name="t" value="lima" checked>
                                  <label class="form-check-label" for="t5">
                                    Custom
                                  </label>
                                </div>
                              </div>
                            </div>
                            <div class="row mt-3">
                              <div class="col-md-8">
                                <li class="list-group-item d-flex justify-content-between">
                                  <div>
                                    <label class="form-check-label">Var 1</label>
                                  </div>
                                  <div class="d-flex align-items-center" style="width:80%;">
                                    <input type="range" name="varone" id="varOne" oninput="_var1();" data-id="varOneVal" class="form-range var" min="0" max="5" step="0.5" id="varone">
                                  </div>
                                  <div class="">
                                    <span class="badge bg-primary rounded-pill" id="varOneVal">XX</span>
                                  </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                  <div>
                                    <label class="form-check-label">Var 2</label>
                                  </div>
                                  <div class="d-flex align-items-center" style="width:80%;">
                                    <input type="range" name="vartwo" id="varTwo" oninput="_var2();" data-id="varTwoVal" class="form-range var" min="0" max="5" step="0.5" id="varone">
                                  </div>
                                  <div class="">
                                    <span class="badge bg-primary rounded-pill" id="varTwoVal">XX</span>
                                  </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                  <div>
                                    <label class="form-check-label">Var 3</label>
                                  </div>
                                  <div class="d-flex align-items-center" style="width:75%;">
                                    <input type="range" name="varthree" id="varThree" oninput="_var3();" data-id="varThreeVal" class="form-range var" min="0" max="5" step="0.5" id="varone">
                                  </div>
                                  <div class="">
                                    <span class="badge bg-primary rounded-pill" id="varThreeVal">XX</span>
                                  </div>
                                </li>
                                </ul>
                              </div>
                              <div class="col-md-4">
                                <ul class="list-group">
                                  <li class="list-group-item d-flex justify-content-around">
                                    Enable X
                                    <input class="form-check-input me-1" id="enx" name="enx" type="checkbox" value="X" aria-label="...">
                                  </li>
                                  <li class="list-group-item d-flex justify-content-around">
                                    Enable Y
                                    <input class="form-check-input me-1" id="eny" name="eny" type="checkbox" value="Y" aria-label="...">
                                  </li>
                                  <li class="list-group-item d-flex justify-content-around">
                                    Yes/No
                                    <input class="form-check-input me-1" id="enyes" name="enyes" type="checkbox" value="Yes" aria-label="...">
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 mt-3 ps-3 pe-3 d-flex justify-content-between">
                    <h6>Session ID : HH883h8hd</h6>
                    <h6>IP Address : 000.000.000.000</h6>
                    <h6>Last Request ID : 8J8W8DHW</h6>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="col-5 col-5m">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title">Summarized News</h5>
                  </div>
                  <div class="col d-flex align-items-center justify-content-end gap-2">
                    <button type="button" id="pasteBtn" class="btn btn-dark btn-sm"><b>Copy</b></i></button>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating">
                    <textarea rows="6" class="form-control" id="sumText" style="height: 100px;"></textarea>
                    <label for="sumText">Summarized</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->

  <?php
  include 'footer.php';
  ?>

</body>

</html>

<script>
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
  
  if(typeof getCookie("var1") != "undefined"){
    document.getElementById("varOneVal").innerHTML = getCookie("var1");
    document.getElementById("varTwoVal").innerHTML = getCookie("var2");
    document.getElementById("varThreeVal").innerHTML = getCookie("var3");
    document.getElementById("varOne").value = getCookie("var1");
    document.getElementById("varTwo").value = getCookie("var2");
    document.getElementById("varThree").value = getCookie("var3");
  }

  document.getElementById("enx").checked = (getCookie("cek1") === 'true');
  document.getElementById("eny").checked = (getCookie("cek2") === 'true');
  document.getElementById("enyes").checked = (getCookie("cek3") === 'true');

  $(document).ready(function() {
    $(document).on('change', '.var', function() {
      console.log($(this).val());
      $('#' + $(this).data('id')).html($(this).val());
    });
  });

  function _var1(){
    var1 = document.getElementById("varOne").value;
  }

  function _var2(){
    var2 = document.getElementById("varTwo").value;
  }

  function _var3(){
    var3 = document.getElementById("varThree").value;
  }

  function timeout() {
    setTimeout(function () {
        if(typeof var1 == "undefined"){
          var1 = getCookie("var1");
          var2 = getCookie("var2");
          var3 = getCookie("var3");
          cek1 = getCookie("cek1");
          cek2 = getCookie("cek2");
          cek3 = getCookie("cek3");
        }

        cek1 = document.getElementById("enx").checked;
        cek2 = document.getElementById("eny").checked;
        cek3 = document.getElementById("enyes").checked;

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
</script>