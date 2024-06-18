<?php

include 'conexao.php';

$nome = $_POST['nome'];
$rg = $_POST['rg'];
$cpf = $_POST['cpf'];
$celular = $_POST['celular'];
$bloco = $_POST['bloco'];
$numap = $_POST['numap'];

$query = "INSERT INTO cadastrocondominio(nome, rg, cpf, celular, bloco, numap) VALUES('$nome', '$rg', '$cpf', '$celular', '$bloco', '$numap')";

mysqli_query($conexao, $query);

header('location:index.php?pagina=inquilino');
