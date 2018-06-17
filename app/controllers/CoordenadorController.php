<?php 

	include_once 'models/Coordenador.php';
	include_once 'Controller.php';

	function cadastrarCoordenador()
	{
		$nome = filter_input(INPUT_POST, 'nome');
		$email = filter_input(INPUT_POST, 'email');
		$cpf = filter_input(INPUT_POST, 'cpf');
		$login = filter_input(INPUT_POST, 'login');
		$senha = filter_input(INPUT_POST, 'senha');
		$senha = crypt($senha);

		if(verificarEmail($email)){
			$_SESSION['msg_erro'] = "Esse E-Mail já está em uso!";
			header("Location:../views/coordenador/novo-editar-coordenador.php");
		}else{

			if(cadastrar_coordenador($nome, $login, $email, $senha, $cpf)){
				$_SESSION['msg_success'] = "Coordenador cadastrado com sucesso";
				header("Location:../views/coordenador/ver-coordenadores.php");
			}else{
				$_SESSION['msg_erro'] = "Erro ao cadastrar o coordenador, Tente Novamente";
				header("Location:../views/coordenador/novo-editar-coordenador.php");
			}

		}
	}

	function editarCoordenador()
	{
		$nome = filter_input(INPUT_POST, 'nome');
		$email = filter_input(INPUT_POST, 'email');
		$cpf = filter_input(INPUT_POST, 'cpf');
		$login = filter_input(INPUT_POST, 'login');
		$id = filter_input(INPUT_POST, 'id');
		$emaiL_old = filter_input(INPUT_POST, 'email_old');

		if($email == $emaiL_old){

			if(editar_coodenador($id, $nome, $cpf, $email, $login)){
				$_SESSION['msg_success'] = "Dados Alterados com sucesso";
				header("Location:../views/coordenador/ver-coordenadores.php");
			}else{
				$_SESSION['msg_erro'] = "Erro ao alterar os dados do coordenador, Tente Novamente";
				header("Location:../views/coordenador/novo-editar-coordenador.php");
			}

		}else{
			if(verificarEmail($email)){
				$_SESSION['msg_erro'] = "Esse E-Mail já está em uso!";
				header("Location:../views/coordenador/novo-editar-coordenador.php");
			}else{

				if(editar_coodenador($id, $nome, $cpf, $email, $login)){
					$_SESSION['msg_success'] = "Dados Alterados com sucesso";
					header("Location:../views/coordenador/ver-coordenadores.php");
				}else{
					$_SESSION['msg_erro'] = "Erro ao alterar os dados do coordenador, Tente Novamente";
					header("Location:../views/coordenador/novo-editar-coordenador.php");
				}

			}
		}

	}

	function excluirCoordenador()
	{
		$id = filter_input(INPUT_POST, 'id');

		if(excluir_coordenador($id)){
			$_SESSION['msg_success'] = "Coodenador excluido com sucesso";
			header("Location:../views/coordenador/ver-coordenadores.php");
		}else{
			$_SESSION['msg_erro'] = "Erro ao excluir o coordenador, Tente Novamente";
			header("Location:../views/coordenador/novo-editar-coordenador.php");
		}
	}