jQuery(document).ready(function($) {

  var options = {
    valueNames: [ 'fornecedores', 'funcionarios', 'clientes', 'candidatos', 'todos']
  };

  var featureList = new List('contatos-lambda', options);

  $('#filtro-todos').click(function() {
    featureList.filter(function(item) {
      if (item.values().category == "Todos") {
        return true;
      } else {
        return false;
      }
    });
    return false;
  });

  $('#filtro-clientes').click(function() {
    featureList.filter(function(item) {
      if (item.values().category == "Clientes") {
        return true;
      } else {
        return false;
      }
    });
    return false;
  });
  $('#filtro-funcionarios').click(function() {
    featureList.filter(function(item) {
      if (item.values().category == "Funcionarios") {
        return true;
      } else {
        return false;
      }
    });
    return false;
  });
  $('#filtro-candidatos').click(function() {
    featureList.filter(function(item) {
      if (item.values().category == "Candidatos") {
        return true;
      } else {
        return false;
      }
    });
    return false;
  });
  $('#filtro-fornecedoress').click(function() {
    featureList.filter(function(item) {
      if (item.values().category == "Fornecedores") {
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
