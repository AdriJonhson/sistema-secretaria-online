<?php 

	//Esse arquivo recebe métodos gerais
	include_once 'models/Admin.php';
	include_once 'models/Aluno.php';
	include_once 'models/Coordenador.php';
	include_once 'models/Professor.php';
	include_once 'models/Responsavel.php';

	function verificarLogin()
	{
		$email = filter_input(INPUT_POST, 'email');
		$senha = filter_input(INPUT_POST, 'senha');

		if(verificarLoginAdmin($email, $senha) || verificarLoginAluno($email, $senha) || verificarLoginCoordenador($email, $senha) || verificarLoginProfessor($email, $senha) ||
			verificarLoginResponsavel($email, $senha)){

			header("Location: ../views/site/dashboard.php");

		}else{

			$_SESSION['msg_erro'] = "Login ou Senha inválidos";

			header("Location: ../views/site/login.php");
		}
	}

	function verificarEmail($email)
	{

		if(verificarEmailAdmin($email) || verificarEmailAluno($email) || verificarEmailCoordenador($email) || verificarEmailProfessor($email) || verificarEmailResponsavel($email)){
			return true;
		}

	}
