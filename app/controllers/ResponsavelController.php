<?php 

	include_once 'models/Responsavel.php';
	include_once 'Controller.php';

	function cadastrarResponsavel()
	{

		$nome_mae = filter_input(INPUT_POST, 'nome_mae');
		$rg_mae = filter_input(INPUT_POST, 'rg_mae');
		$cpf_mae = filter_input(INPUT_POST, 'cpf_mae');
		$nome_pai = filter_input(INPUT_POST, 'nome_pai');
		$rg_pai = filter_input(INPUT_POST, 'rg_pai');
		$cpf_pai = filter_input(INPUT_POST, 'cpf_pai');
		$email = filter_input(INPUT_POST, 'email');
		$login = filter_input(INPUT_POST, 'login');
		$senha = filter_input(INPUT_POST, 'senha');
		$senha = crypt($senha);

		if(verificarEmail($email)){

			$_SESSION['msg_erro'] = "Esse E-Mail já está em uso!";
			header("Location:../views/responsavel/novo-editar-responsavel.php");

		}else{

			if(cadastrar_responsavel($nome_pai, $cpf_pai, $rg_pai, $nome_mae, $cpf_mae, $rg_mae, $email, $login, $senha)){

				$_SESSION['msg_success'] = "Responsável Cadastrado Com sucesso";
				header("Location:../views/responsavel/ver-responsaveis.php");


			}else{

				$_SESSION['msg_erro'] = "Erro ao cadastrar o responsável!";
				header("Location:../views/responsavel/novo-editar-responsavel.php");

			}


		}


	}

	function editarResponsavel()
	{

		$nome_mae = filter_input(INPUT_POST, 'nome_mae');
		$rg_mae = filter_input(INPUT_POST, 'rg_mae');
		$cpf_mae = filter_input(INPUT_POST, 'cpf_mae');
		$nome_pai = filter_input(INPUT_POST, 'nome_pai');
		$rg_pai = filter_input(INPUT_POST, 'rg_pai');
		$cpf_pai = filter_input(INPUT_POST, 'cpf_pai');
		$email = filter_input(INPUT_POST, 'email');
		$login = filter_input(INPUT_POST, 'login');
		$id = filter_input(INPUT_POST, 'id');
		$email_old = filter_input(INPUT_POST, 'email-old');

		if($email == $email_old){

			if(editar_responsavel($nome_pai, $cpf_pai, $rg_pai, $nome_mae, $cpf_mae, $rg_mae, $email, $login, $id)){
				$_SESSION['msg_success'] = "Dados alterados com sucesso";
				header("Location:../views/responsavel/ver-responsaveis.php");
			}else{
				$_SESSION['msg_erro'] = "Erro ao salvar as alterações";
				header("Location:../views/responsavel/ver-responsaveis.php");
			}

		}else{

			if(verificarEmail($email)){

				$_SESSION['msg_erro'] = "Esse E-Mail já está em uso!";
				header("Location:../views/responsavel/novo-editar-responsavel.php");

			}else{

				if(editar_responsavel($nome_pai, $cpf_pai, $rg_pai, $nome_mae, $cpf_mae, $rg_mae, $email, $login, $id)){

					$_SESSION['msg_success'] = "Dados alterados com sucesso";
					header("Location:../views/responsavel/ver-responsaveis.php");


				}else{

					$_SESSION['msg_erro'] = "Erro ao salvar as alterações";
					header("Location:../views/responsavel/ver-responsaveis.php");

				}


			}
		}
	}

	function excluirResponsavel()
	{
		$id = filter_input(INPUT_POST, 'id');

		if(excluir_responsavel($id)){
			$_SESSION['msg_success'] = "Responsável excluido com sucesso";
			header("Location:../views/responsavel/ver-responsaveis.php");
		}else{
			$_SESSION['msg_erro'] = "Erro ao excluir o responsável";
			header("Location:../views/responsavel/ver-responsaveis.php");
		}
	}

	function adicionarDependente()
	{
		$id_aluno = filter_input(INPUT_POST, 'id_aluno');
		$id_responsavel = filter_input(INPUT_POST, 'id_responsavel');

		if(adicionar_dependente($id_responsavel, $id_aluno)){
			$_SESSION['msg_success'] = "Dependente Associado";
			header("Location:../views/responsavel/ver-responsaveis.php");
		}else{
			$_SESSION['msg_erro'] = "Erro ao associar o aluno";
			header("Location:../views/responsavel/ver-responsaveis.php");
		}
	}