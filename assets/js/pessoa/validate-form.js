$(document).ready(() => {
  $("[name='nome']").on('focusout keyup', (e) => {
    validateField(e, $("[name='nome']"), $("#invalid-nome"));
  });
  $("[name='email']").on('focusout keyup', (e) => {
    validateField(e, $("[name='email']"), $("#invalid-email"));
  });
  $("[name='cpf']").on('focusout', (e) => {

    isValidCPF($("[name='cpf']").cleanVal())
      ? e.target.setCustomValidity('')
      : e.target.setCustomValidity('CPF inválido');

    validateField(e, $("[name='cpf']"), $("#invalid-cpf"));
  });
  $("[name='cnpj']").on('focusout keyup', (e) => {
    validateField(e, $("[name='cnpj']"), $("#invalid-cnpj"));
  });
  $("[name='cep']").on('focusout keyup', (e) => {
    validateField(e, $("[name='cep']"), $("#invalid-cep"));
  });
  $("[name='estado']").on('change', (e) => {
    validateField(e, $("[name='cidade']"), $("#invalid-cidade"));
  });
  $("[name='cidade']").on('focusout', (e) => {
    validateField(e, $("[name='cidade']"), $("#invalid-cidade"));
  });
  $("[name='bairro']").on('focusout keyup', (e) => {
    validateField(e, $("[name='bairro']"), $("#invalid-bairro"));
  });
  $("[name='logradouro']").on('focusout keyup', (e) => {
    validateField(e, $("[name='logradouro']"), $("#invalid-logradouro"));
  });
  $("[name='numero']").on('focusout keyup', (e) => {
    validateField(e, $("[name='numero']"), $("#invalid-numero"));
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
