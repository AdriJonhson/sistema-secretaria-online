<?php 

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
			header("Location:../views/professor/editar-cadastrar-professor.php");

		}else{

			if(cadastrar($nome, $materia, $login, $email, $senha, $cpf)){

				$_SESSION['msg_success'] = "Professor cadastrado com sucesso";
				header("Location:../views/professor/ver-professores.php");

			}else{

				$_SESSION['msg_erro'] = "Erro ao cadastrar o professor";
				header("Location:../views/professor/editar-cadastrar-professor.php");

			}
			
		}
	}

	function updateProfessor()
	{
		$nome = filter_input(INPUT_POST, 'nome');
		$materia = filter_input(INPUT_POST, 'materia');
		$login = filter_input(INPUT_POST, 'login');
		$email = filter_input(INPUT_POST, 'email');
		$senha = filter_input(INPUT_POST, 'senha');
		$cpf = filter_input(INPUT_POST, 'cpf');
		$id = filter_input(INPUT_POST, 'id');


		if(update($nome, $materia, $login, $email, $senha, $cpf, $id)){

			$_SESSION['msg_success'] = "Dados Alterados com sucesso";
			header("Location:../views/professor/ver-professores.php");

		}else{

			$_SESSION['msg_erro'] = "Erro ao alterar os dados";
			header("Location:../views/professor/ver-professores.php");

		}	
	}

	function listarProfessores()
	{
		$professores = listar();
		return $professores;
	}
	
	function deleteProfessor()
	{
		$id = filter_input(INPUT_POST, 'id');
		
		if(excluir($id)){
			$_SESSION['msg_success'] = "Dados apagados com sucesso";
			header("Location:../views/professor/ver-professores.php");
		}else{
			$_SESSION['msg_erro'] = "Erro ao tentar apagar os dados do professor";
			header("Location:../views/professor/ver-professores.php");
		}
	}
