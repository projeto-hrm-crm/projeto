<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    View Fornecedores

    <?php foreach ($fornecedores as $fornecedor): ?>
      <?php echo $fornecedor->nome ?><br>
    <?php endforeach ?>

  </body>
</html>
