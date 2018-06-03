<?php 

	session_start();

	include_once 'controllers/Controller.php';
	include_once 'controllers/ProfessorController.php';

	$acao = filter_input(INPUT_POST, 'acao');

	switch ($acao) {
		case 'login':
			
			$email = filter_input(INPUT_POST, 'email');
			$senha = filter_input(INPUT_POST, 'senha');

			verificarLogin($email, $senha);
			
		break;

		case 'cadastrar-professor':

			cadastrarProfessor();


		break;

		case 'sair':

			session_destroy();
			header("Location: ../views/site/home.php");

		break;
		
		default:
			header("Location: ../index.php");
			break;
	}