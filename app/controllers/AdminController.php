<?php 

	include_once 'Controller.php';
	include_once 'models/Admin.php';

	function cadastrarAdmin()
	{
		$nome = filter_input(INPUT_POST, 'nome');
		$email = filter_input(INPUT_POST, 'email');
		$login = filter_input(INPUT_POST, 'login');
		$senha = filter_input(INPUT_POST, 'senha');
		$senha = crypt($senha);

		if(verificarEmailAdmin($email)){

			$_SESSION['msg_erro'] = "Esse E-Mail já está em uso!";
			header("Location:../views/moderador/novo-moderador.php");

		}else{

			if(cadastrar_admin($nome, $email, $login, $senha)){
				$_SESSION['msg_success'] = "Administrador Cadastrado com sucesso";
				header("Location:../views/moderador/ver-moderadores.php");
			}else{
				$_SESSION['msg_erro'] = "Erro ao tentar cadastrar o Administrador";
				header("Location:../views/moderador/novo-moderador.php");
			}

		}
	}