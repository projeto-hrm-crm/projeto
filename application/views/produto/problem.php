<html>
<head>
<title>My Form</title>
</head>
<body>

<h3>Temos um probleminha aqui!</h3>

<p>
    <?php
        echo anchor('produto/view/cadastro','try again');
        echo $msg;
    ?>
</p>
    

</body>
</html>