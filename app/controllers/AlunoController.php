<?php

	include_once 'models/Aluno.php';
	include_once 'Controller.php';


	function cadastrarAluno()
	{

		$nome = filter_input(INPUT_POST, 'nome');
		$rg = filter_input(INPUT_POST, 'rg');
		$cpf = filter_input(INPUT_POST, 'cpf');
		$nis = filter_input(INPUT_POST, 'nis');
		$data_nascimento = filter_input(INPUT_POST, 'nascimento');
		$naturalidade = filter_input(INPUT_POST, 'naturalidade');
		$telefone = filter_input(INPUT_POST, 'telefone');
		$celular = filter_input(INPUT_POST, 'celular');
		$cep = filter_input(INPUT_POST, 'cep');
		$num = filter_input(INPUT_POST, 'num');
		$complemento = filter_input(INPUT_POST, 'complemento');
		$data_cadastro = date('Y-m-d');
		$medicamento = filter_input(INPUT_POST, 'medicamento');
		$opc_medicamento = filter_input(INPUT_POST, 'opc_medicamento');
		$observacao = filter_input(INPUT_POST, 'observacao');
		$escola_origem = filter_input(INPUT_POST, 'origem');
		$matricula = filter_input(INPUT_POST, 'matricula');
		$curso = filter_input(INPUT_POST, 'curso');
		$turno  = filter_input(INPUT_POST, 'turno');
		$email = filter_input(INPUT_POST, 'email');
		$login = filter_input(INPUT_POST, 'login');
		$senha = password_hash($senha, PASSWORD_BCRYPT);

		$num = gerarNumeChamada($curso);
		$turno = "Integral";

		if(verificarEmail($email)){

			$_SESSION['msg_erro'] = "Esse E-Mail já está em uso!";
			header("Location:../views/aluno/novo-editar-aluno.php");

		}else{
			$insert = cadastrar_aluno($curso, $nome, $matricula, $num, $data_nascimento, $naturalidade, $rg, $cpf, $nis, $cep, $complemento, $turno, $data_cadastro, $escola_origem, $opc_medicamento,$medicamento, $telefone, $celular, $observacao, $login, $email, $senha);

			if($insert){

				$_SESSION['msg_success'] = "Aluno registrado com sucesso";
				header("Location:../views/aluno/ver-alunos.php");

			}else{

				$_SESSION['msg_erro'] = "Erro ao cadastrar o aluno";
				header("Location:../views/aluno/ver-alunos.php");

			}
		}
	}

	function editarAluno()
	{
		$nome = filter_input(INPUT_POST, 'nome');
		$rg = filter_input(INPUT_POST, 'rg');
		$cpf = filter_input(INPUT_POST, 'cpf');
		$nis = filter_input(INPUT_POST, 'nis');
		$data_nascimento = filter_input(INPUT_POST, 'nascimento');
		$naturalidade = filter_input(INPUT_POST, 'naturalidade');
		$telefone = filter_input(INPUT_POST, 'telefone');
		$celular = filter_input(INPUT_POST, 'celular');
		$cep = filter_input(INPUT_POST, 'cep');
		$num = filter_input(INPUT_POST, 'num');
		$complemento = filter_input(INPUT_POST, 'complemento');
		$medicamento = filter_input(INPUT_POST, 'medicamento');
		$opc_medicamento = filter_input(INPUT_POST, 'opc_medicamento');
		$observacao = filter_input(INPUT_POST, 'observacao');
		$escola_origem = filter_input(INPUT_POST, 'origem');
		$matricula = filter_input(INPUT_POST, 'matricula');
		$curso = filter_input(INPUT_POST, 'curso');
		$turno  = filter_input(INPUT_POST, 'turno');
		$email = filter_input(INPUT_POST, 'email');
		$login = filter_input(INPUT_POST, 'login');
		@$senha = crypt(filter_input(INPUT_POST, 'senha'));
		$id_aluno  = filter_input(INPUT_POST, 'id_aluno');
		$email_old = filter_input(INPUT_POST, 'email_old');

		$num = 1;
		$turno = "Integral";

		if($email_old == $email){

			$update = editar_aluno($curso, $nome, $matricula, $num, $data_nascimento, $naturalidade, $rg, $cpf, $nis, $cep, $complemento, $turno, $escola_origem, $opc_medicamento,$medicamento, $telefone, $celular, $observacao, $login, $email, $senha, $id_aluno);

			if($update){

				$_SESSION['msg_success'] = "Dados alterados com sucesso";
				header("Location:../views/aluno/ver-alunos.php");

			}else{

				$_SESSION['msg_erro'] = "Erro ao alterar os dados";
				header("Location:../views/aluno/ver-alunos.php");

			}

		}else{

			if(verificarEmail($email)){

				$_SESSION['msg_erro'] = "Esse E-Mail já está em uso!";
				header("Location:../views/aluno/ver-alunos.php");

			}else{

				$update = editar_aluno($curso, $nome, $matricula, $num, $data_nascimento, $naturalidade, $rg, $cpf, $nis, $cep, $complemento, $turno, $escola_origem, $opc_medicamento,$medicamento, $telefone, $celular, $observacao, $login, $email, $senha, $id_aluno);

				if($update){

					$_SESSION['msg_success'] = "Dados alterados com sucesso";
					header("Location:../views/aluno/ver-alunos.php");

				}else{

					$_SESSION['msg_erro'] = "Erro ao alterar os dados";
					header("Location:../views/aluno/ver-alunos.php");

				}
			}
		}
	}

	function excluirAluno()
	{
		$id = filter_input(INPUT_POST, 'id');


		if(excluir_aluno($id)){
			$_SESSION['msg_success'] = "Dados apagados com sucesso";
			header("Location:../views/aluno/ver-alunos.php");
		}else{
			$_SESSION['msg_erro'] = "Erro ao apagar os dados";
			header("Location:../views/aluno/ver-alunos.php");
		}

	}
