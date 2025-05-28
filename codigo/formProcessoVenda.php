
<?php
require_once "conexao.php";
require_once "funcoes.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro da Venda</title>
</head>
<body>
    <h3>Cadastro da Venda</h3>
    <form action="salvarVenda.php" method="get">

         <label for="cliente" class="form-label">Cliente</label>
         <select name="cliente">
             <?php
                  
                require_once "conexao.php";
                
                    $sql = "SELECT idcliente, nome FROM cliente";
                    $resultados = mysqli_query($conexao, $sql);

                    // Loop para listar todos os clientes
                    while ($linha = mysqli_fetch_array($resultados)) {
                        $id2 = $linha['idcliente'];
                        $nome = $linha['nome'];

                        if ($id2 == $cliente) {
                            $selecionado = 'selected';
                        } else {
                            $selecionado = '';
                        }

                        echo "<option value='$id2' $selecionado>$nome</option>";
                    }
                    ?>
                </select>
            </div><br>


        Data: <input type='date' name='data'><br><br>

    <?php
    $lista_produtos = listarProdutos($conexao);

    foreach($lista_produtos as $produto){
        $nome = $produto['nome'];
        $id = $produto ['idproduto'];

        echo "<input type='checkbox' name='produto[]' value='$id'> $nome";
        echo "<input type='text' name='?'><br>";

    }   
   
    ?>

    <input type="submit" value="enviar">

</body>
</html>



