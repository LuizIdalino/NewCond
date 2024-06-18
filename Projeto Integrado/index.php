<?php

# Base de dados
include 'conexao.php';

# Cabeçalho
include 'header.php';

# Conteúdo da página
if (isset($_GET['pagina'])) {
	$pagina = $_GET['pagina'];
} else {
	$pagina = 'home';
}

switch ($pagina) {
	case 'inquilino':
		include 'views/inquilino.php';
		break;
	case 'visitante':
		include 'views/visitante.php';
		break;
	case 'inserir_visitante':
		include 'views/inserir_visitante.php';
		break;
	case 'inserir_inquilino':
		include 'views/inserir_inquilino.php';
		break;
	default:
		include 'views/home.php';
		break;
}

# Rodapé
include 'footer.php';
