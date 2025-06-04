
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

             <?php
             
             $sql = "SELECT idcliente, nome FROM tb_cliente";
             $resultados = mysqli_query($conexao, $sql);
             
             ?>
             
             <label for="cliente">Selecione o cliente</label>
             <select name="pais" id="pais">
                 <option value="">Selecione...</option>

                 <?php
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
