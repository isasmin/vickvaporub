<?php
require_once "../conexao.php";
require_once "../funcoes.php";


// Executa a função
$vendas = listarVendas($conexao);


foreach ($vendas as $venda) {

    echo "id venda {$venda['idvenda']}<br>";
    echo "cliente {$venda['nome_cliente']}<br>";
    echo "data {$venda['data']}<br>";
    echo "valor total R$ " . number_format($venda['valor_total'], 2, ',', '.') . "<br>";

    echo "itens:<br>";
    if (isset($venda['itens']) && is_array($venda['itens']) && count($venda['itens']) > 0) {
        foreach ($venda['itens'] as $item) {
            echo "produto => {$item['nome_produto']} | ";
            echo "quantidade => {$item['quantidade']} | ";
            echo "unidade => R$ " . number_format($item['preco_venda'], 2, ',', '.') . " | ";
            echo "total item => R$ " . number_format($item['total_item'], 2, ',', '.') . "<br>";
        }
    } else {
        echo "item n econtrado<br>";
    }


}

mysqli_close($conexao);
?>


