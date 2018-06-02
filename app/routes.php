<?php 

	session_start();

	include_once 'controllers/AdminController.php';
	include_once 'controllers/AlunoController.php';
	include_once 'controllers/CoordenadorController.php';
	include_once 'controllers/ProfessorController.php';
	include_once 'controllers/ResponsavelController.php';


	$acao = filter_input(INPUT_POST, 'acao');

	switch ($acao) {
		case 'login':
			
			$login = filter_input(INPUT_POST, 'login');
			$senha = filter_input(INPUT_POST, 'senha');

			if(verificarLoginAdmin($login, $senha) || verificarLoginAluno($login, $senha) || verificarLoginCoordenador($login, $senha) || verificarLoginProfessor($login, $senha) ||
				verificarLoginResponsavel($login, $senha)){

				header("Location: ../views/site/dashboard.php");

			}else{

				$_SESSION['msg_erro'] = "Login ou Senha inválidos";

				header("Location: ../views/site/login.php");
			}

		break;

		case 'sair':

			session_destroy();
			header("Location: ../views/site/home.php");

		break;
		
		default:
			header("Location: ../index.php");
			break;
	}