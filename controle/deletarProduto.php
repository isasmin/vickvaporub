<?php
    require_once "./conexao.php";

    $id = $_GET['id'];
    
    // DELETE FROM produto WHERE idproduto = 3;
    $sql = "DELETE FROM tb_produto WHERE idproduto = $id;";

    mysqli_query($conexao, $sql);

    header("Location: ../public/listarProduto.php");
?>