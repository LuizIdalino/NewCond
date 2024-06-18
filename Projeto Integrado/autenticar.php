<?php
session_start();
include_once 'conexao.php';

$id = $_POST['id'];
$senha = $_POST['password'];

$query = "SELECT * FROM loginusuario WHERE id = '$id' AND senha = '$senha'";
$resultado = mysqli_query($conexao, $query);

if (mysqli_num_rows($resultado) == 1) {
    $_SESSION['id'] = $id;
    header('Location: index.php?pagina=visitante');
} else {
    echo "Usuário ou senha inválidos!";
}
?>
