<?php
require_once "conexao.php";

$nome = $_POST['nome'];
$tipo = $_POST['tipo'];
$preco_compra = $_POST['preco_compra'];
$quantidade = $_POST['quantidade'];



$sql = "INSERT INTO tb_produto (nome, tipo, preco_compra, quantidade) VALUES ('$nome', '$tipo', '$preco_compra', '$quantidade')";

mysqli_query($conexao, $sql);
?>