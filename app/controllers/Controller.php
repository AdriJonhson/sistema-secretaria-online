<?php 

	//Esse arquivo recebe métodos gerais
	include_once 'models/Admin.php';
	include_once 'models/Aluno.php';
	include_once 'models/Coordenador.php';
	include_once 'models/Professor.php';
	include_once 'models/Responsavel.php';

	function verificarLogin($login, $senha)
	{
		if(verificarLoginAdmin($login, $senha) || verificarLoginAluno($login, $senha) || verificarLoginCoordenador($login, $senha) || verificarLoginProfessor($login, $senha) ||
			verificarLoginResponsavel($login, $senha)){

			header("Location: ../views/site/dashboard.php");

		}else{

			$_SESSION['msg_erro'] = "Login ou Senha inválidos";

			header("Location: ../views/site/login.php");
		}
	}
	