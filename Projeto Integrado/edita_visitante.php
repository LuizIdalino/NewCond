<?php
include 'conexao.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$rg = $_POST['rg'];
$placaveiculo = $_POST['placaveiculo'];
$id_cadastrocondominio = $_POST['id_cadastrocondominio'];

$query = "UPDATE cadastrovisita SET nome='$nome', rg='$rg', placaveiculo='$placaveiculo', id_cadastrocondominio='$id_cadastrocondominio' WHERE id = $id";

mysqli_query($conexao, $query);

header('location:index.php?pagina=visitante');
?>
