<?php 

	include_once 'models/Empresa.php';
	include_once 'Controller.php';

	function cadastrarEmpresa(){
		$instituicao = filter_input(INPUT_POST, 'instituicao');
		$razao_social = filter_input(INPUT_POST, 'razao_social');
		$nome_fantasia = filter_input(INPUT_POST, 'nome_fantasia');
		$cnpj = filter_input(INPUT_POST, 'cnpj');
		$especificacao = filter_input(INPUT_POST, 'especificacao');
		$email = filter_input(INPUT_POST, 'email');
		$telefone = filter_input(INPUT_POST, 'telefone');
		$nome_supervisor = filter_input(INPUT_POST, 'nome_supervisor');
		$email_supervisor = filter_input(INPUT_POST, 'email_supervisor');
		$observacoes = filter_input(INPUT_POST, 'observacoes');
		$numero_vagas = filter_input(INPUT_POST, 'numero_vagas');
		$escola_beneficiada = filter_input(INPUT_POST, 'escola_beneficiada');
		$municipio_escola = filter_input(INPUT_POST, 'municipio_escola');
		$nome_representante = filter_input(INPUT_POST, 'nome_representante');
		$email_representante = filter_input(INPUT_POST, 'email_representante');
		$cpf_representante = filter_input(INPUT_POST, 'cpf_representante');
		$rg_representante = filter_input(INPUT_POST, 'rg_representante');
		$cep = filter_input(INPUT_POST, 'cep');
		$numero = filter_input(INPUT_POST, 'numero');
		$complemento = filter_input(INPUT_POST, 'complemento');



		if(verificarCNPJ($cnpj)){

			$_SESSION['msg_erro'] = "Esse CNPJ já está em uso!";
			header("Location:../views/empresa/cadastrar-empresa.php");

		}else{

			if(cadastrar_empresa($instituicao, $razao_social, $nome_fantasia, $cnpj, $especificacao, $email, $telefone, $nome_supervisor, $email_supervisor, $observacoes, $numero_vagas, $escola_beneficiada, $municipio_escola, $nome_representante, $email_representante, $cpf_representante, $rg_representante, $cep, $numero, $complemento)){

				$_SESSION['msg_success'] = "Empresa cadastrada com sucesso";
				header("Location:../views/empresa/ver-empresas.php");

			}else{

				$_SESSION['msg_erro'] = "Erro ao cadastrar a empresa";
				header("Location:../views/empresa/cadastrar-empresa.php");

			}
			
		}
	}

	function updateEmpresa(){
		$instituicao = filter_input(INPUT_POST, 'instituicao');
		$razao_social = filter_input(INPUT_POST, 'razao_social');
		$nome_fantasia = filter_input(INPUT_POST, 'nome_fantasia');
		$cnpj = filter_input(INPUT_POST, 'cnpj');
		$especificacao = filter_input(INPUT_POST, 'especificacao');
		$email = filter_input(INPUT_POST, 'email');
		$telefone = filter_input(INPUT_POST, 'telefone');
		$nome_supervisor = filter_input(INPUT_POST, 'nome_supervisor');
		$email_supervisor = filter_input(INPUT_POST, 'email_supervisor');
		$observacoes = filter_input(INPUT_POST, 'observacoes');
		$numero_vagas = filter_input(INPUT_POST, 'numero_vagas');
		$escola_beneficiada = filter_input(INPUT_POST, 'escola_beneficiada');
		$municipio_escola = filter_input(INPUT_POST, 'municipio_escola');
		$nome_representante = filter_input(INPUT_POST, 'nome_representante');
		$email_representante = filter_input(INPUT_POST, 'email_representante');
		$cpf_representante = filter_input(INPUT_POST, 'cpf_representante');
		$rg_representante = filter_input(INPUT_POST, 'rg_representante');
		$cep = filter_input(INPUT_POST, 'cep');
		$numero = filter_input(INPUT_POST, 'numero');
		$complemento = filter_input(INPUT_POST, 'complemento');
		$id = filter_input(INPUT_POST, 'id_empresa');

		if(update_empresa($instituicao, $razao_social, $nome_fantasia, $cnpj, $especificacao, $email, $telefone, $nome_supervisor, $email_supervisor, $observacoes, $numero_vagas, $escola_beneficiada, $municipio_escola, $nome_representante, $email_representante, $cpf_representante, $rg_representante, $cep, $numero, $complemento, $id)){

			$_SESSION['msg_success'] = "Dados Alterados com sucesso";
			header("Location:../views/empresa/ver-empresas.php");

		}else{

			$_SESSION['msg_erro'] = "Erro ao alterar os dados".print_r($stmt->errorInfo());
			header("Location:../views/empresa/ver-empresas.php");

		}	
	}

	function listarEmpresas(){
		$empresas = listar_empresa();
		return $empresas;
	}
	
	function deleteEmpresa(){
		$id = filter_input(INPUT_POST, 'id');
		
		if(excluir_empresa($id)){
			$_SESSION['msg_success'] = "Dados apagados com sucesso";
			header("Location:../views/empresa/ver-empresas.php");
		}else{
			$_SESSION['msg_erro'] = "Erro ao tentar apagar os dados da empresa";
			header("Location:../views/empresa/ver-empresas.php");
		}
	}
