<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  
  <!-- Vendor JS Files -->

  <script src="assets/vendor/jquery/jquery-3.6.0.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js" integrity="sha256-/H4YS+7aYb9kJ5OKhFYPUjSJdrtV6AeyJOtTkw6X72o=" crossorigin="anonymous"></script>

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