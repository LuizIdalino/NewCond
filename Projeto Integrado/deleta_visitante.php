<?php

include 'conexao.php';

$id = $_GET['id'];

$query = "DELETE FROM cadastrovisita WHERE id = $id";

mysqli_query($conexao, $query);

header('location:index.php?pagina=visitante');
