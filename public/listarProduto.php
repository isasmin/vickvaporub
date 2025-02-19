
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"> <!-- Define o conjunto de caracteres da página -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Torna o site responsivo em dispositivos móveis -->
    <title>Document</title>


</head>

<body class="listar">
    <h2>Lista de Produtos</h2> <!-- Título da página -->

    <!-- Tabela para exibir a lista de produtos -->
    <table>
        <thead>
            <tr>
                <th scope="col">#</th> <!-- Coluna para o ID do produto -->
                <th scope="col">Nome</th> <!-- Coluna para o nome do produto -->
                <th scope="col">Tipo</th> <!-- Coluna para o tipo produto do produto -->
                <th scope="col">Preço de Compra</th> <!-- Coluna para o preco do produto -->
                <th scope="col">Quantidade</th> <!-- Coluna para a quantidade do produto -->
            </tr>
        </thead>
        <?php
        // Conecta ao banco de dados para recuperar dos produtos
        require_once "../controle/conexao.php";

        // Consulta SQL para selecionar todos os produtos
        $sql = "SELECT * FROM tb_produto";
        $id = 0;
        // Executa a consulta
        $resultados = mysqli_query($conexao, $sql);
        
        // Loop para processar cada linha de resultado
        while ($linha = mysqli_fetch_array($resultados)) {
            $id = $linha['idproduto']; // Obtém o ID do produto
            $nome = $linha['nome']; // Obtém o nome do produto
            $tipo = $linha['tipo']; // Obtém o tipo do produto
            $preco_compra = $linha['preco_compra']; // Obtém o preco do produto
            $quantidade = $linha['quantidade']; // Obtém a quantidade do produto

        
            // Exibe os dados do produto na tabela
            echo "<tbody>";
            echo "<tr>";
            echo "<th scope='row'>$id</th>"; // Exibe o ID do produto 
            echo "<td>$nome</td>"; // Exibe o nome do produto
            echo "<td>$tipo</td>"; // Exibe o tipo do produto
            echo "<td>$preco_compra</td>"; // Exibe o preco do produto
            echo "<td>$preco_compra</td>"; // Exibe o preco do produto
            // Link para apagar o protudo
            echo "<td><a href='../controle/deletarProduto.php?id=$id' class='btn btn-danger'>Apagar</a></td>";
            // Link para editar os dados do produto
            echo "<td><a href='formProduto.php?id=$id'>Editar</a></td>";
            echo "</tr>";
            echo "</tbody>";
        }
        ?>
    </table>
    
    <!-- Link para voltar à página inicial -->
    <a href="index.php" class="btn btn-secondary float-start">Voltar para Início</a>
</body>
        
</html>
