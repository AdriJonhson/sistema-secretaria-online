<?php 

	session_start();

	include_once 'controllers/Controller.php';

	$acao = filter_input(INPUT_POST, 'acao');

	switch ($acao) {
		case 'login':
			
			$login = filter_input(INPUT_POST, 'login');
			$senha = filter_input(INPUT_POST, 'senha');

			verificarLogin($login, $senha);
			
		break;

		case 'sair':

			session_destroy();
			header("Location: ../views/site/home.php");

		break;
		
		default:
			header("Location: ../index.php");
			break;
	}