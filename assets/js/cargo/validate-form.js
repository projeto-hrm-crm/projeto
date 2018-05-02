$(document).ready(() => {
  $("[name='nome']").on('focusout keyup', (e) => {
    validateField(e, $("[name='nome']"), $("#invalid-nome"));
  });
  $("[name='descricao']").on('focusout keyup', (e) => {
    validateField(e, $("[name='descricao']"), $("#invalid-descricao"));
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
