$(document).ready(() => {
  $("[name='nome']").on('focusout keyup', (e) => {
    validateField(e, $("[name='nome']"), $("#invalid-nome"));
  });
  $("[name='email']").on('focusout keyup', (e) => {
    validateField(e, $("[name='email']"), $("#invalid-email"));
  });
  $("[name='razao_social']").on('focusout keyup', (e) => {
    validateField(e, $("[name='razao_social']"), $("#invalid-razao_social"));
  });
  $("[name='cnpj']").on('focusout keyup', (e) => {
    validateField(e, $("[name='cnpj']"), $("#invalid-cnpj"));
  });
  $("[name='telefone']").on('focusout keyup', (e) => {
    validateField(e, $("[name='telefone']"), $("#invalid-telefone"));
  });

  $("[name='estado']").on('focusout keyup', (e) => {
    validateField(e, $("[name='estado']"), $("#invalid-estado"));
  });
  $("[name='cidade']").on('focusout keyup', (e) => {
    validateField(e, $("[name='cidade']"), $("#invalid-cidade"));
  });
  $("[name='numero']").on('focusout keyup', (e) => {
    validateField(e, $("[name='numero']"), $("#invalid-numero"));
  });
  $("[name='bairro']").on('focusout keyup', (e) => {
    validateField(e, $("[name='bairro']"), $("#invalid-bairro"));
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
