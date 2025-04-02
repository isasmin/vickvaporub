<?php
require_once "../conexao.php";
require_once "../funcoes.php";

echo "<pre>";
$vendas = listarVendas($conexao);

foreach ($vendas as $venda) {
    echo "id venda: {$venda['idvenda']}<br>";
    echo "cliente: {$venda['nome_cliente']}<br>";
    echo "produto: {$venda['nome_produto']}<br>";
    echo "data da venda: {$venda['data']}<br>";
}
echo "</pre>";
?>

