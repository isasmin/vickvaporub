<?php

function deletarCliente($conexao, $idcliente) {
    $sql = "DELETE FROM tb_cliente WHERE idcliente = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idcliente);
    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    
    return $funcionou; //true ou false
};

function listarClientes($conexao) {
    $sql = "SELECT * FROM tb_cliente";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $lista_clientes = [];
    while ($cliente = mysqli_fetch_assoc($resultado)) {
        $lista_clientes[] = $cliente;
    }

    mysqli_stmt_close($comando);
    return $lista_clientes;
};

function salvarCliente($conexao, $nome, $cpf, $endereco) {
    $sql = "INSERT INTO tb_cliente (nome, cpf, endereco) VALUES (?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'sss', $nome, $cpf, $endereco);
    
    mysqli_stmt_execute($comando);
    
    $idcliente = mysqli_stmt_insert_id($comando);
    //retorna o valor do id que acabou de ser inserido

    mysqli_stmt_close($comando);

    return $idcliente;
};

function editarCliente($conexao, $nome, $cpf, $endereco, $idcliente) {
    $sql = "UPDATE tb_cliente SET nome=?, cpf=?, endereco=? WHERE idcliente=?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'sssi', $nome, $cpf, $endereco, $idcliente);
    
    $funcionou = mysqli_stmt_execute($comando);
    
    mysqli_stmt_close($comando);
    return $funcionou; // funcionou é verdadeiro ou falso p ver se funcionou ou nao , ja que é true or false da pra fazer um if
};

function deletarProduto($conexao, $idproduto) {    
    $sql = "DELETE FROM tb_produto WHERE idproduto = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idproduto);
    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    
    return $funcionou; //true ou false};
};

function listarProdutos($conexao) {
    $sql = "SELECT * FROM tb_produto";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_execute($comando); 
    $resultado = mysqli_stmt_get_result($comando);

    $lista_produtos = [];
    while ($produto = mysqli_fetch_assoc($resultado)){
        $lista_produtos[] = $produto;
    }

    mysqli_stmt_close($comando);
    return $lista_produtos;
};


function salvarProduto($conexao, $nome, $tipo, $preco_compra, $preco_venda, $margem_lucro, $quantidade) {
    $sql = "INSERT INTO tb_produto (nome, tipo, preco_compra, preco_venda, margem_lucro, quantidade) VALUES (?, ?, ?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'ssdddi', $nome, $tipo, $preco_compra, $preco_venda, $margem_lucro, $quantidade);
    
    $funcionou = mysqli_stmt_execute($comando);
    
    mysqli_stmt_close($comando);
    return $funcionou;
};


function editarProduto($conexao, $nome, $tipo, $preco_compra, $preco_venda, $margem_lucro, $quantidade) {   
    $sql = "UPDATE tb_produto SET nome=?, tipo=?, preco_compra=?, preco_venda=?, margem_lucro= ?, quantidade=? WHERE idproduto=?";
    $comando = mysqli_prepare($conexao, $sql);
        
    mysqli_stmt_bind_param($comando, 'ssdddii', $nome, $tipo, $preco_compra, $preco_venda, $margem_lucro, $quantidade, $idproduto);
        
    $funcionou = mysqli_stmt_execute($comando);
        
    mysqli_stmt_close($comando);
    return $funcionou;
};

//desafio
function salvarUsuario($conexao, $nome, $email, $senha) {
    $sql = "INSERT INTO tb_usuario (nome, email, senha) VALUES (?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($comando, 'sss', $nome, $email, $senha_hash);

    $funcionou = mysqli_stmt_execute($comando);

   mysqli_stmt_close($comando);
    return $funcionou;
};
 
function salvarVenda($conexao, $idcliente, $valor_total, $data) {
    $sql = "INSERT INTO tb_venda (idcliente, valor_total, data) VALUES (?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'ids', $idcliente, $valor_total, $data);

    $funcionou = mysqli_stmt_execute($comando);

    // retorna o valor do id que acabou de ser inserido
    $idvenda = mysqli_stmt_insert_id($comando);
    
    mysqli_stmt_close($comando);
    
    return $idvenda;
};

function salvarItemVenda($conexao, $id_venda, $id_produto, $quantidade) {
    $sql = "INSERT INTO tb_item_venda (idvenda, idproduto, quantidade) VALUES (?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'iid', $id_venda, $id_produto, $quantidade);

    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);

    return $funcionou;
}







// retornar uma variável com todos os dados do cliente
function pesquisarClienteId($conexao, $idcliente) {
    $sql = "SELECT * FROM tb_cliente WHERE idcliente = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idcliente);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $cliente = mysqli_fetch_assoc($resultado);

    mysqli_stmt_close($comando);
    return $cliente;
};

// retornar uma variável com todos os dados do produto
function pesquisarProdutoId($conexao, $idproduto) {
    $sql = "SELECT * FROM tb_produto WHERE idproduto = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idproduto);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $produto = mysqli_fetch_assoc($resultado);

    mysqli_stmt_close($comando);
    return $produto;
};

//mostrar o nome do cliente ao invés do id
//mostrar o nome do produto ao invés do id

function listarVendas($conexao) {
    $sql = "SELECT * FROM tb_venda";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $lista_vendas = [];
    while ($venda = mysqli_fetch_assoc($resultado)) {
       
        $id_cliente = $venda['idcliente'];
        $cliente = pesquisarClienteId($conexao, $id_cliente);
        $nome_cliente = $cliente['nome'];

        $venda['nome_cliente'] = $nome_cliente;

        
        $id_venda = $venda['idvenda'];
        $itens = listarItemVenda($conexao, $id_venda);

        $venda['itens'] = $itens;

        $lista_vendas[] = $venda;
    }

    mysqli_stmt_close($comando);
    return $lista_vendas;
};
 
function listarItemVenda($conexao) {
    $sql = "SELECT * FROM tb_item_venda";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_execute($comando); 
    $resultado = mysqli_stmt_get_result($comando);

    $lista_item_venda = [];
    while ($item_venda= mysqli_fetch_assoc($resultado)){
        $lista_item_venda[] = $item_venda;
    }

    mysqli_stmt_close($comando);
    return $lista_item_venda;
};

?>

 <!-- tb_venda -->
 <!-- idvenda INT  -->
 <!-- idcliente INT (estrangeira) -->
 <!-- valor_total DECIMAL -->
 <!-- data deletarCliente -->


 <!-- tb_item_venda (tabela n:n de tb_venda e tb_produto) -->
 <!-- idvenda INT (estrangeira) -->
 <!-- idproduto INT (estrangeira) -->
 <!-- quantidade DECIMAL -->

 <!-- tb_produto -->
 <!-- idproduto INT -->
 <!-- nome -->
 <!-- tipo -->
 <!-- preco_compra -->
 <!-- preco_venda -->
 <!-- margem_lucro -->
 <!-- quantidade -->
