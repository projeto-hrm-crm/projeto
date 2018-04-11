$(document).ready(() => {
  $("[name='nome']").on('focusout keyup', (e) => {
    validateField(e, $("[name='nome']"), $("#nome-feedback"));
  });

  $("[name='cpf']").on('focusout', (e) => {

    isValidCPF($("[name='cpf']").cleanVal())
      ? e.target.setCustomValidity('')
      : e.target.setCustomValidity('invalid');

    validateField(e, $("[name='cpf']"), $("#cpf-feedback"));
  });
});

function validateField(e, input, feedback) {
  if(e.target.checkValidity()) {
    input.removeClass('is-invalid').addClass('is-valid');
    feedback.hide();
  }
  else {
    input.removeClass('is-valid').addClass('is-invalid');
    feedback.show();
  }
}

function isValidCPF(strCPF) {
  var Soma;
  var Resto;
  Soma = 0;
  if (strCPF == "00000000000") return false;

  for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
  Resto = (Soma * 10) % 11;

  if ((Resto == 10) || (Resto == 11))  Resto = 0;
  if (Resto != parseInt(strCPF.substring(9, 10)) ) return false;

  Soma = 0;
  for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
  Resto = (Soma * 10) % 11;

  if ((Resto == 10) || (Resto == 11))  Resto = 0;
  if (Resto != parseInt(strCPF.substring(10, 11) ) ) return false;
  return true;
}
