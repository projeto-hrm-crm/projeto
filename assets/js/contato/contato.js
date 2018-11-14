jQuery(document).ready(function($) {

  var options = {
    valueNames: [ 'name', 'description', 'category' ],
    page: 8,
    innerWindow: 3,
    pagination: true
  };

  var featureList = new List('contatos', options);

  $('#filter-cliente').click(function() {
    featureList.filter(function(item) {
      if (item.values().category == "Cliente") {
        return true;
      } else {
        return false;
      }
    });
    return false;
  });

  $('#filter-fornecedor').click(function() {
    featureList.filter(function(item) {
      if (item.values().category == "Fornecedor") {
        return true;
      } else {
        return false;
      }
    });
    return false;
  });
  $('#filter-candidato').click(function() {
    featureList.filter(function(item) {
      if (item.values().category == "Candidato") {
        return true;
      } else {
        return false;
      }
    });
    return false;
  });
  $('#filter-funcionario').click(function() {
    featureList.filter(function(item) {
      if (item.values().category == "Funcionario") {
        return true;
      } else {
        return false;
      }
    });
    return false;
  });

  $('#filter-none').click(function() {
    featureList.filter();
    return false;
  });

});
