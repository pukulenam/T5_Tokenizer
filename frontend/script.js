$(document).ready(function () {

    function updConf (var1,var2,var3,cbx,cby,cbyn) {
        // Instantiate a slider
        var mySlider = $("varOne").slider();

            mySlider.slider('setValue', 4);
        $("#cbX").attr('checked', true);
        $("#cbY").attr('checked', true);
        $("#cbYN").attr('checked', cbyn);

    }

  $(document).on("slide", ".var-slide", function () {
    console.log($(this).val());
    $("#" + $(this).data("id")).html($(this).val());
  });

  $(document).on("change", "[name='tmpl']", function () {
    console.log($(this).val());
    updConf ($(this).val());
  });
});
