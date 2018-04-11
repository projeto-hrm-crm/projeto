$(document).ready(() => {
  $("[name='cpf']")         .mask('000.000.000-00', {reverse:false});
  $("[name='cnpj']")        .mask('00.000.000/0000-00', {reverse:false});
  $("[name='nascimento']")  .mask('00-00-0000', {reverse:false});
  $("[name='telefone']")    .mask('(00) 00000-0000', {reverse:false});
  $("[name='cep']")         .mask('00000-000', {reverse:false});

  $('#ck-pf').change((e) => {
    $('.pj-form').hide();
    $('.pf-form').show();
  });
  $('#ck-pj').change((e) => {
    $('.pf-form').hide();
    $('.pj-form').show();
  });
  $('#ck-user').change((e) => {
    toggleForm(e, $('.user-form'));
  });

  $('#use-email').change((e) => {
    if(e.target.checked) {
      var email_value = $("[name='email']").val();
      $("[name='login']").val(email_value);
      $("[name='login']").prop('disabled', true);
    }
    else {
      $("[name='login']").val('');
      $("[name='login']").prop('disabled', false);
    }
  });
});

function toggleForm(e, form) {
  e.target.checked ? form.show() : form.hide();
}
