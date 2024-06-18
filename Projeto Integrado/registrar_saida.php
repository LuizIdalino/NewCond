<?php
include 'conexao.php';

$id = $_POST['id'];
$datahora_saida = date('Y-m-d H:i:s');

$query = "UPDATE cadastrovisita SET datahora_saida = '$datahora_saida' WHERE id = $id";

mysqli_query($conexao, $query);

header('location: index.php?pagina=visitante');
?>
