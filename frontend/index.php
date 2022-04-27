<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>T5</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="assets/vendor/google-fonts/google-fonts.css" rel="stylesheet">
  
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="#" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="Logo N">
                  <span class="d-none d-lg-block fs-3">T5</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">
                  <div class="pt-2">
                    <h5 class="card-title text-center pb-0 fs-4">BackOffice</h5>
                    <p class="text-center small">Insert Username and Password</p>
                  </div>
                  <div class="fade show" id="alertMessage" role="alert"></div>

                  <form method="POST" class="row g-2 needs-validation" id="officeLogin" novalidate>
                    <span id="error"></span>
                    <div class="col-12">
                      <label for="adminUsername" class="form-label">Var1</label>
                      <div class="input-group has-validation">
                        <input type="username" name="varone" class="form-control" id="varone" required>
                        <div class="invalid-feedback">1!</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <button type="submit" class="btn btn-primary w-100" id="submitBtn">Submit</button>
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

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->

  <script src="assets/vendor/jquery/jquery-3.6.0.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script>
    $(document).ready(function() {
      let loginForm = $('#officeLogin');
      let msgAlert = $('#alertMessage');

      loginForm.on('submit', function(event) {
        event.preventDefault();
        if (!loginForm[0].checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        } else {
          $.ajax({
            url: "action.php",
            method: "POST",
            data: $(this).serialize(),
            dataType: 'json',
            beforeSend: function() {
              $('#loginBtn').attr('disabled', 'disabled').html = ('Wait...');
            },
            success: function(data) {
              $('#loginBtn').attr('disabled', false);
              if (data.go != '') {
                window.location.href  = data.go
              } else {
                msgAlert.addClass(data.alert);
                msgAlert.html(data.message);
                setTimeout(function() {
                  msgAlert.removeClass(data.alert).html('');
                }, 3000);
                $('#loginBtn').html('Login');
              }
            }
          })
        }

      });

    });
  </script>

</body>

</html>