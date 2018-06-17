<?php 

	session_start();

	include_once 'controllers/Controller.php';
	include_once 'controllers/ProfessorController.php';
	include_once 'controllers/AtividadeController.php';
	include_once 'controllers/AlunoController.php';
	include_once 'controllers/NotaController.php';
	include_once 'connection/Connection.php';

	$acao = filter_input(INPUT_POST, 'acao');

	switch ($acao) {
		case 'login':		
			verificarLogin();	
		break;

		case 'cadastrar-professor':
			cadastrarProfessor();
		break;

		case 'cadastrar-atividade':
			cadastrarAtividade();
		break;

		case 'editar-professor':
			updateProfessor();
		break;

		case 'encerrar-atividade':
			encerrarAtividade();
		break;

		case 'apagar-professor':
			deleteProfessor();
		break;

		case 'cadastrar-aluno':
			cadastrarAluno();
		break;

		case 'editar-aluno':
			editarAluno();
		break;

		case 'apagar-aluno':
			excluirAluno();
		break;

		case 'cadastrar-nota':
			cadastrarMedia();
		break;

		case 'sair':
			session_destroy();
			header("Location: ../views/site/home.php");
		break;
		
		default:
			header("Location: ../index.php");
			break;
	}