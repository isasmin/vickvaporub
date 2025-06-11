<?php
require_once "../funcoes.php";
require_once "../conexao.php";

$idcliente = $_POST["idcliente"];
$valor_total = $_POST["valor"];
$data = $_POST["data"];
$produtos = $_POST["produto"];
$id_venda = salvarVenda($conexao, $idcliente, $valor_total, $data);

for ($i = 0; $i < count($produtos); $i++) {
    $id_produto = $produtos[$i][0];
    $quantidade = $produtos[$i][1];

    if ($id_produto && $quantidade) {
        salvarItemVenda($conexao, $id_venda, $id_produto, $quantidade);
    }
}

echo "<h3>Itens da venda cadastrados:</h3><pre>";
print_r(listarItemVenda($conexao));
echo "</pre>";
