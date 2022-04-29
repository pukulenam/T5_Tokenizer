$(document).ready(function () {
  $(document).on("change", ".var-slide", function () {
    console.log($(this).val());
    $("#" + $(this).data("id")).html($(this).val());
  });
});
