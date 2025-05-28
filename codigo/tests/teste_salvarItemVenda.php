<?php
require_once "../conexao.php";
require_once "../funcoes.php";

$idvenda = 1;
$idproduto = 3;
$quantidade = 10;

salvarItemVenda($conexao, $idvenda, $idproduto, $quantidade);
?>