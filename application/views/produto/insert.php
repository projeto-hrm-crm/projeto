<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>

        <form method="post" action="/projeto/produto/cadastrar">
            Nome: <br>
            <input type="text" name="nome" placeholder="descricao do produto"><br>
            Codigo: <br>
            <input type="text" name="codigo" placeholder="codigo de barras"><br>
            DataFabricacao:<br>
            <input type="text" name="fabricacao" placeholder="dd/mm/YYYY"><br>
            DataValidade:<br>
            <input type="text" name="validate" placeholder="dd/mm/YYYY"><br>
            Lote:<br>
            <input type="text" name="lote" placeholder="somente números"><br>
            DataRebebimento:<br>
            <input type="text" name="recebimento" placeholder="dd/mm/YYYY"><br>
            <input type="submit" value="testar">
        </form>
        
    </body>
</html>