<!DOCTYPE html>
<html lang="en">

<?php
include 'header.php';
?>

<body>

  <main>
    <div class="container">

      <section class="section d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container g-2">
          <div class="row justify-content-center">
            <div class="col-lg-8 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="#" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="Logo N">
                  <span class="d-none d-lg-block fs-3">T5</span>
                </a>
              </div><!-- End Logo -->

              <div class="card col-lg-12">
                <div class="card-body">
                  <form method="POST" class="row g-2 needs-validation" id="officeLogin" novalidate>
                    <div class="fade show" id="alertMessage" role="alert"></div>

                    <div class="col-12 form-floating mt-3">
                      <textarea rows="6" class="form-control" placeholder="Input Long Text" name="lt" id="longText" style="height: 100px;"></textarea>
                      <label for="longText">Long Text</label>
                    </div>
                    <div class="col-12">
                      <div class="text-center mt-0">
                        <h3 class="card-title">Settings</h3>
                      </div>
                      <div class="row">
                        <div class="d-flex justify-content-around">
                          <div class="">
                            <input class="form-check-input" type="radio" id="t1" name="t" value="satu" checked>
                            <label class="form-check-label" for="t1">
                              Template 1
                            </label>
                          </div>
                          <div class="">
                            <input class="form-check-input" type="radio" id="t2" name="t" value="dua" checked>
                            <label class="form-check-label" for="t2">
                              Template 2
                            </label>
                          </div>
                          <div class="">
                            <input class="form-check-input" type="radio" id="t3" name="t" value="tiga" checked>
                            <label class="form-check-label" for="t3">
                              Template 3
                            </label>
                          </div>
                          <div class="">
                            <input class="form-check-input" type="radio" id="t4" name="t" value="empat" checked>
                            <label class="form-check-label" for="t4">
                              Template 4
                            </label>
                          </div>
                          <div class="">
                            <input class="form-check-input" type="radio" id="t5" name="t" value="lima" checked>
                            <label class="form-check-label" for="t5">
                              Template 5
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
                              <input type="range" name="varone" id="varOne" data-id = "varOneVal" class="form-range var" min="0" max="5" step="0.5" id="varone">
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
                              <input type="range" name="vartwo" id="varTwo" data-id = "varTwoVal" class="form-range var" min="0" max="5" step="0.5" id="varone">
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
                              <input type="range" name="varthree" id="varThree" data-id = "varThreeVal" class="form-range var" min="0" max="5" step="0.5" id="varone">
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
                              <input class="form-check-input me-1" name="enx" type="checkbox" value="X" aria-label="...">
                            </li>
                            <li class="list-group-item d-flex justify-content-around">
                              Enable Y
                              <input class="form-check-input me-1" name="eny" type="checkbox" value="Y" aria-label="...">
                            </li>
                            <li class="list-group-item d-flex justify-content-around">
                              Yes/No
                              <input class="form-check-input me-1" name="enyes" type="checkbox" value="Yes" aria-label="...">
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="col-12 form-floating mt-3">
                      <textarea rows="6" class="form-control" placeholder="Input Long Text" id="sumText" style="height: 100px;"></textarea>
                      <label for="sumText">Summarized Text</label>
                    </div>
                    <div class="col-12">
                      <div class="row gap-2">
                        <div class="col">
                          <button type="submit" class="btn btn-primary w-100" id="loginBtn">Submit</button>
                        </div>
                        <div class="col">
                          <button type="button" class="btn btn-secondary w-100" id="loginBtn">Copy</button>
                        </div>
                      </div>
                    </div>
                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <?php
  include 'footer.php';
  ?>

</body>

</html>

<script>
  $(document).ready(function() {
    $(document).on('change', '.var', function() {
      console.log($(this).val());
      $('#'+$(this).data('id')).html($(this).val());
    });
  });
</script>