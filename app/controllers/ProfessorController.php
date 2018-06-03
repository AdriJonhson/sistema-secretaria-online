<?php 

	include_once 'connection/Connection.php';
	include_once 'models/Professor.php';
	include_once 'Controller.php';

	function cadastrarProfessor()
	{
		$nome = filter_input(INPUT_POST, 'nome');
		$materia = filter_input(INPUT_POST, 'materia');
		$login = filter_input(INPUT_POST, 'login');
		$email = filter_input(INPUT_POST, 'email');
		$senha = filter_input(INPUT_POST, 'senha');
		$cpf = filter_input(INPUT_POST, 'cpf');

		if(verificarEmail($email)){

			$_SESSION['msg_erro'] = "Esse E-Mail já está em uso!";
			header("Location:../views/professor/cadastrar-professor.php");

		}else{

			if(cadastrar($nome, $materia, $login, $email, $senha, $cpf)){

				$_SESSION['msg_success'] = "Professor cadastrado com sucesso";
				header("Location:../views/professor/ver-professores.php");

			}else{

				$_SESSION['msg_erro'] = "Erro ao cadastrar o professor";
				header("Location:../views/professor/cadastrar-professor.php");

			}
			
		}
	}
	