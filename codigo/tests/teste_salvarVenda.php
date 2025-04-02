<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    $idcliente = 1; //existe o cliente com id 3?
    $idproduto = 1; //existe o produto com id 1?
    $valor_total = 25.50;
    $data = "2025-03-27";

    salvarVenda($conexao, $idcliente, $idproduto, $valor_total, $data);
?>