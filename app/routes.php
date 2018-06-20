<?php 

	session_start();

	include_once 'controllers/Controller.php';
	include_once 'controllers/ProfessorController.php';
	include_once 'controllers/AtividadeController.php';
	include_once 'controllers/AlunoController.php';
	include_once 'controllers/NotaController.php';
	include_once 'controllers/AdminController.php';
	include_once 'controllers/CoordenadorController.php';
	include_once 'controllers/ResponsavelController.php';
	include_once 'controllers/ComentarioController.php';
	include_once 'controllers/EmpresaController.php';
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

		case 'cadastrar-coordenador':
			cadastrarCoordenador();
		break;

		case 'editar-coordenador':
			editarCoordenador();
		break;

		case 'excluir-coordenador':
			excluirCoordenador();
		break;

		case 'cadastrar-admin':
			cadastrarAdmin();
		break;

		case 'cadastrar-responsavel':
			cadastrarResponsavel();
		break;

		case 'editar-responsavel':
			editarResponsavel();
		break;

		case 'excluir-responsavel':
			excluirResponsavel();
		break;

		case 'associar-dependente':
			adicionarDependente();
		break;

		case 'salvar-comentario':
			salvarComentario();
		break;

		case 'excluir-comentario':
			excluirComentario();
		break;

		case 'cadastrar-empresa':
			cadastrarEmpresa();
		break;

		case 'editar-empresa':
			updateEmpresa();
		break;

		case 'apagar-empresa':
			deleteEmpresa();
		break;	

		case 'sair':
			session_destroy();
			header("Location: ../views/site/home.php");
		break;
		
		default:
			header("Location: ../index.php");
			break;
	}