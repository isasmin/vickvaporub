<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <ul>
        <li>
        <a href="formCliente.php">Cadastrar novo cliente</a>
        </li>
        <li>
            <a href="listarClientes.php">Lista de clientes cadastrados</a>
        </li>
        <li>
            <a href="formProduto.php">Cadastrar novo produto</a>
        </li>
        <li>
            <a href="listarProdutos.php">Lista de produtos cadastrados</a>
        </li>
        <li>
            <a href="listarProcessoVenda.php"> Cadastro do Processo de Venda</a></li>
    </ul>
</body>
</html>
<?php
include("conexao.php");

$sql = "SELECT * FROM paises";
$result = mysqli_query($conn, $sql);
?>

<label for="pais">Selecione seu país:</label>
<select name="pais" id="pais">
    <option value="">Selecione...</option>

    <?php
    while($linha = mysqli_fetch_array($result)){
        echo "<option value='" . $linha['id'] . "'>" . $linha['nome'] . "</option>";
    }
    ?>

</select>