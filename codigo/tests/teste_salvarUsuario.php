<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$nome = "teste";
$email = "fu@gmail.com";
$senha = "123";

salvarUsuario($conexao, $nome, $email, $senha);
