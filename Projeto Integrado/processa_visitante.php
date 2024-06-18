<?php
include 'conexao.php';

$nome = $_POST['nome'];
$rg = $_POST['rg'];
$placaveiculo = $_POST['placaveiculo'];
$id_cadastrocondominio = $_POST['id_cadastrocondominio'];

$query = "INSERT INTO cadastrovisita (nome, rg, placaveiculo, id_cadastrocondominio, datahora)
          VALUES ('$nome', '$rg', '$placaveiculo', '$id_cadastrocondominio', NOW())";

mysqli_query($conexao, $query);

header('location:index.php?pagina=visitante');
