$(document).ready(() => {
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
      var email = $('input[name="email"]').val();
      e.target.value = email;
    }
    else {
      e.target.value = '';
    }
  });
});

function toggleForm(e, form) {
  e.target.checked ? form.show() : form.hide();
}
