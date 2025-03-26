<?php

require_once "../conexao.php";
require_once "../funcoes.php";


$nome = "agua tonica";
$tipo = "alimento";
$preco_compra = "3";
$preco_venda = "10";
$margem_lucro = "7"
$quantidade = "9";

salvarProduto($conexao, $nome, $tipo, $preco_compra, $preco_venda, $margem_lucro, $quantidade);


