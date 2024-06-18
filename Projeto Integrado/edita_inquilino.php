<?php 

include 'conexao.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$rg = $_POST['rg'];
$cpf = $_POST['cpf'];
$celular = $_POST['celular'];
$bloco = $_POST['bloco'];
$numap = $_POST['numap'];

$query = "UPDATE cadastrocondominio SET nome='$nome', rg='$rg', cpf='$cpf', celular='$celular', bloco='$bloco', numap='$numap' WHERE id = $id";

mysqli_query($conexao, $query);

header('location:index.php?pagina=inquilino');
