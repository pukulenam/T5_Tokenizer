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
            <img src="assets/img/puknam.png" height="25" alt="Logo N" >
            <span class="d-none d-lg-block fs-3">PukulEnam's T5 - Tokenizer</span>
          </a>
        </div><!-- End Logo -->
      </div>
      <div class="row d-flex justify-content-center">
      <div class="bg-success text-light text-center fw-bold border-0 alert-dismissible align-text-center fade show" id="alertMessage" role="alert"></div>
        <div class="col-lg-7">
          <form method="POST" class="g-2 needs-validation" id="tokenizerForm" novalidate>
            <div class="card">
              <div class="card-body d-flex flex-column">
                <div class="d-flex justify-content-between align-items-center">
                  <h5 class="card-title">Input News</h5>
                  <div class="gap-2">
                    <button type="button" id="pasteNewsBtn" class="btn btn-dark btn-sm"><b>Paste</b></i></button>
                    <input type="hidden" name="action" id="tokenizerFormAction" value="newrequest" />
                    <button type="submit" id="submitBtn" class="btn btn-danger btn-sm"><b>Send</b><i class="bi bi-plus"></i></button>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating">
                    <textarea required rows="5" style="height:100%;" class="form-control form-control-lg" placeholder="Input Long Text" name="lt" id="newsText" style="height: 100px;"></textarea>
                    <label for="longText">Long Text</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="accordion mt-3" id="accordConf">
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="accordConfHead">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseConf" aria-expanded="false" aria-controls="collapseConf">
                          <b>Settings</b>&nbsp<i>(<span id="curConf">Default</span>)</i>
                        </button>
                      </h2>
                      <div id="collapseConf" class="accordion-collapse collapse" aria-labelledby="accordConfHead" data-bs-parent="#accordConf">
                        <div class="accordion-body">
                        <div class="d-flex justify-content-center">
                          <div class="gap-2">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input var tmpl" type="radio" id="t1" name="tmpl" value="128,2.5,7,true">
                              <label class="form-check-label text-md-start" for="t1">Default</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input var tmpl" type="radio" id="t2" name="tmpl" value="100,2,9,">
                              <label class="form-check-label text-md-start" for="t2">Template 2</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input var tmpl" type="radio" id="t3" name="tmpl" value="80,1,4,">
                              <label class="form-check-label text-md-start" for="t3">Template 3</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input var tmpl" type="radio" id="t4" name="tmpl" value="133,3,3,true">
                              <label class="form-check-label text-md-start" for="t4">Template 4</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input var tmpl" type="radio" id="tc" name="tmpl" value="custom">
                              <label class="form-check-label text-md-start" for="tc">Custom</label>
                            </div>
                          </div>
                          </div>
                          <div class="row row-cols-md-12 g-2 mt-1">
                            <div class="col-md-8">
                              <ul class="list-group">
                                <li class="list-group-item d-flex align-items-center justify-content-between d-grid gap-1">
                                  <label class="text-sm-start">Max Length</label>
                                  <input type="range" name="varone" id="varOne" data-target="varOneVal" class="form-range w-75 var var-c var-slide" min="50" max="150" step="1" value="">
                                  <span class="badge bg-primary rounded-pill" id="varOneVal">0</span>
                                </li>
                                <li class="list-group-item d-flex align-items-center justify-content-between d-grid gap-1">
                                  <label class="text-sm-start">Repetition Penalty</label>
                                  <input type="range" name="vartwo" id="varTwo" data-target="varTwoVal" class="form-range w-75 var var-c var-slide" min="0" max="3" step="0.5" value="">
                                  <span class="badge bg-primary rounded-pill" id="varTwoVal">0</span>
                                </li>
                                <li class="list-group-item d-flex align-items-center justify-content-between d-grid gap-1">
                                  <label class="text-sm-start">Num Beam</label>
                                  <input type="range" name="varthree" id="varThree" data-target="varThreeVal" class="form-range w-75 var var-c var-slide" min="1" max="10" step="1" value="">
                                  <span class="badge bg-primary rounded-pill" id="varThreeVal">0</span>
                                </li>
                              </ul>
                            </div>
                            <div class="col-md-4">
                              <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-around">
                                  Early Stopping
                                  <input class="form-check-input me-1 var var-c" name="cbx" id="cbX" type="checkbox" value="1" aria-label="...">
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
                <button style="display:none;" type="button" id="translateNewsBtn" class="btn btn-dark btn-sm"><b>Translate</b></i></button>
                  <button type="button" id="copySumBtn" class="btn btn-dark btn-sm"><b>Copy</b></i></button>
                </div>
              </div>
              <div class="col-12">
                <div class="form-floating">
                  <textarea rows="5" style="height:100%;" placeholder="" class="form-control form-control-lg" id="sumText"></textarea>
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