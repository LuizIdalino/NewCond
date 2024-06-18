<?php 

$servidor = "localhost";
$usuario = "root";
$senha = "";
$db = "newcond";

$conexao = mysqli_connect($servidor, $usuario, $senha, $db);


$query = "SELECT * FROM cadastrocondominio";
$consulta_inquilino = mysqli_query($conexao, $query);

$query = "SELECT * FROM cadastrovisita";
$consulta_visitante = mysqli_query($conexao, $query);

			