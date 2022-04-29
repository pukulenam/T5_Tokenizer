<!DOCTYPE html>
<html lang="en">

<?php
include 'header.php';
?>

<body>

  <main class="d-flex justify-content-center align-items-center ">
    <div class="ms-1 me-1" style="width: 95%;">
      <div class="row">
        <div class="d-flex justify-content-center py-4">
          <a href="#" class="logo d-flex align-items-center w-auto">
            <img src="assets/img/logo.png" alt="Logo N">
            <span class="d-none d-lg-block fs-3">T5</span>
          </a>
        </div><!-- End Logo -->
      </div>
      <div class="row d-flex justify-content-center">
        <div class="col-lg-7">
          <form method="POST" class="g-2 needs-validation" id="officeLogin" novalidate>
            <div class="card">
              <div class="card-body d-flex flex-column">
                <div class="d-flex justify-content-between align-items-center">
                  <h5 class="card-title">Input News</h5>
                  <div class="gap-2">
                    <button type="button" id="pasteBtn" class="btn btn-dark btn-sm"><b>Paste</b></i></button>
                    <button type="button" id="submitBtn" class="btn btn-primary btn-sm"><b>Send</b><i class="bi bi-plus"></i></button>
                  </div>
                </div>
                <div class="fade show" id="alertMessage" role="alert"></div>
                <div class="col-md-12">
                  <div class="form-floating">
                    <textarea rows="5" style="height:100%;" class="form-control form-control-lg" placeholder="Input Long Text" name="lt" id="longText" style="height: 100px;"></textarea>
                    <label for="longText">Long Text</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="accordion mt-3" id="accordConf">
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="accordConfHead">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseConf" aria-expanded="false" aria-controls="collapseConf">
                          <b>Settings</b>&nbsp<i id="curConf">(Default)</i>
                        </button>
                      </h2>
                      <div id="collapseConf" class="accordion-collapse collapse" aria-labelledby="accordConfHead" data-bs-parent="#accordConf">
                        <div class="accordion-body">
                        <div class="d-flex justify-content-center">
                          <div class="gap-2">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input templ-radio" type="radio" id="t1" name="tmpl" value="1,0.5,2,checked,checked,false">
                              <label class="form-check-label text-md-start" for="t1">
                                Default
                              </label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input templ-radio" type="radio" id="t2" name="tmpl" value="2,1,1.5,false,checked,false">
                              <label class="form-check-label text-md-start" for="t2">
                                Template 2
                              </label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input templ-radio" type="radio" id="t3" name="tmpl" value="3,2,1.5,false,checked,false">
                              <label class="form-check-label text-md-start" for="t3">
                                Template 3
                              </label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input templ-radio" type="radio" id="t4" name="tmpl" value="4,1,0.5,checked,false,checked">
                              <label class="form-check-label text-md-start" for="t4">
                                Template 4
                              </label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input templ-radio" type="radio" id="tc" name="tmpl" value="C">
                              <label class="form-check-label text-md-start" for="tc">
                                Custom
                              </label>
                            </div>
                          </div>
                          </div>
                          <div class="row row-cols-md-12 g-2 mt-1">
                            <div class="col-md-8">
                              <ul class="list-group">
                                <li class="list-group-item d-flex align-items-center justify-content-between d-grid gap-1">
                                  <label class="text-sm-start">Var 1</label>
                                  <input type="range" name="varone" id="varOne" data-id="varOneVal" oninput="_var1();" class="form-range w-75 var-slide" min="0" max="5" step="0.5" value="" id="varone">
                                  <span class="badge bg-primary rounded-pill" id="varOneVal">0.0</span>
                                </li>
                                <li class="list-group-item d-flex align-items-center justify-content-between d-grid gap-1">
                                  <label class="text-sm-start">Var 1</label>
                                  <input type="range" name="vartwo" id="varTwo" data-id="varTwoVal" oninput="_var2();" class="form-range w-75 var-slide" min="0" max="5" step="0.5" value="" id="varone">
                                  <span class="badge bg-primary rounded-pill" id="varTwoVal">0.0</span>
                                </li>
                                <li class="list-group-item d-flex align-items-center justify-content-between d-grid gap-1">
                                  <label class="text-sm-start">Var 3</label>
                                  <input type="range" name="varthree" id="varThree" data-id="varThreeVal" oninput="_var3();" class="form-range w-75 var-slide" min="0" max="5" step="0.5" value="" id="varone">
                                  <span class="badge bg-primary rounded-pill" id="varThreeVal">0.0</span>
                                </li>
                              </ul>
                            </div>
                            <div class="col-md-4">
                              <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-around">
                                  Enable X
                                  <input class="form-check-input me-1" name="cbx" id="cbX" type="checkbox" value="X" aria-label="...">
                                </li>
                                <li class="list-group-item d-flex justify-content-around">
                                  Enable Y
                                  <input class="form-check-input me-1" name="cby" id="cbY" type="checkbox" value="Y" aria-label="...">
                                </li>
                                <li class="list-group-item d-flex justify-content-around">
                                  Yes/No
                                  <input class="form-check-input me-1" name="cbyn" id="cbYN" type="checkbox" value="Yes" aria-label="...">
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>  
              </div>
            </div>
          </form>
        </div>
        <div class="col-lg-5">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title">Summarized News</h5>
                <div class="gap-2">
                  <button type="button" id="copyBtn" class="btn btn-dark btn-sm"><b>Copy</b></i></button>
                </div>
              </div>
              <div class="col-12">
                <div class="form-floating">
                  <textarea rows="5" style="height:100%;" placeholder="" class="form-control  form-control-lg" id="sumText"></textarea>
                  <label for="sumText">Summarized</label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main><!-- End #main -->

  <?php
  include 'footer.php';
  ?>

</body>

</html>

<script src="script.js"></script>