jQuery( document ).ready(function() {
  var numero1, numero2, accion, simbolo, control;
  resetCalculator();
  jQuery("#calculadora button").click(function(e) {
    if(control === 0 ) {
      control = 1;
      if (jQuery(this).html() != '.') {
        jQuery("#calculadora > div").empty();
        numero1 = "";
      } else numero1 = "0";
      jQuery("#calculadora button[data-accion]:not(#calculadora button[data-accion=calculate])").prop("disabled",false);
    }
    if(jQuery(this).data("accion") && jQuery(this).data("accion") === 'calculate') {
      calculateResult(numero1, accion, numero2);
      resetCalculator();
    } else {
      if(jQuery(this).data("accion")) {
        control = 2;
        accion = jQuery(this).data("accion");
        simbolo = jQuery(this).html();
        numero2 = "0";
        jQuery("#calculadora button[data-accion=calculate],#calculadora button:nth-of-type(10)").prop("disabled",false);
        jQuery("#calculadora button[data-accion]:not(#calculadora button[data-accion=calculate]),#calculadora button:nth-of-type(11)").prop("disabled",true);
      } else {
        if (control == 1) {
          numero1 = numero1 + jQuery(this).html();
          if(numero1 != "") jQuery("#calculadora button:nth-of-type(11)").prop("disabled",false);
        } else if (control == 2) {
          if(numero2 == "0" && jQuery(this).html() != '.') numero2 = jQuery(this).html();
          else numero2 = numero2 + jQuery(this).html();
          if(numero2 != "") jQuery("#calculadora button:nth-of-type(11)").prop("disabled",false);
        }
        if(jQuery(this).html() == '.') jQuery("#calculadora button:nth-of-type(10)").prop("disabled",true);
      }
      jQuery("#calculadora > div").html(numero1+simbolo+numero2);
    }
  });

  function resetCalculator() {
    numero1 = "";
    numero2 = "";
    accion = "";
    simbolo = "";
    control = 0;
    jQuery("#calculadora button[data-accion],#calculadora button:nth-of-type(11)").prop("disabled",true);
  }

  function calculateResult(numero1, accion, numero2) {
    jQuery.ajax({
      method: "GET",
      url: endpoints[accion]+numero1+"/"+numero2
    }).done(function(data) {
      jQuery("#calculadora > div").html(data.result);
    }).fail(function() {
      jQuery("#calculadora > div").html("ERROR");
    });
  }
});
