<?php 

#	function verificarLoginAluno($email, $senha)
#	{
#		$conn = iniciarConexao();
#		$stmt = $conn->prepare("SELECT * FROM alunos WHERE email = ?");
#		$stmt->bindParam(1, $email);
#
#		if($stmt->execute() && $stmt->rowCount() > 0){
#			$row = $stmt->fetch(PDO::FETCH_OBJ);
#
#			if(crypt($senha, $row->senha) == $row->senha){
#				$_SESSION['usuario_logado']['nv_acesso'] = "aluno";
#				$_SESSION['usuario_logado']['dados'] = $row;
#				return true;
#			}
#		}
#		
#	}

#	function verificarEmailAluno($email)
#	{
#		$conn = iniciarConexao();
#		$stmt = $conn->prepare("SELECT * FROM alunos WHERE email = ?");
#		$stmt->bindParam(1, $email);

#		if($stmt->execute() && $stmt->rowCount() > 0)
#			return true;
#	}

	function cadastrar_empresa($instituicao, $razao_social, $nome_fantasia, $cnpj, $especificacao, $email, $telefone, $nome_supervisor, $email_supervisor, $observacoes, $numero_vagas, $escola_beneficiada, $municipio_escola, $nome_representante, $email_representante, $cpf_representante, $rg_representante, $cep, $numero, $complemento){

		//Criptografando a senha
		// $senha = crypt($senha);

		$conn = iniciarConexao();
		
		$stmt = $conn->prepare("INSERT INTO empresas(instituicao, razao_social, nome_fantasia, cnpj, especificacao, email, telefone, nome_supervisor, email_supervisor, observacoes, numero_vagas, escola_beneficiada, municipio_escola, nome_representante, email_representante, cpf_representante, rg_representante, cep, numero, complemento) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

		$stmt->bindParam(1, $instituicao);
		$stmt->bindParam(2, $razao_social);
		$stmt->bindParam(3, $nome_fantasia);
		$stmt->bindParam(4, $cnpj);
		$stmt->bindParam(5, $especificacao);
		$stmt->bindParam(6, $email);
		$stmt->bindParam(7, $telefone);
		$stmt->bindParam(8, $nome_supervisor);
		$stmt->bindParam(9, $email_supervisor);
		$stmt->bindParam(10, $observacoes);
		$stmt->bindParam(11, $numero_vagas);
		$stmt->bindParam(12, $escola_beneficiada);
		$stmt->bindParam(13, $municipio_escola);
		$stmt->bindParam(14, $nome_representante);
		$stmt->bindParam(15, $email_representante);
		$stmt->bindParam(16, $cpf_representante);
		$stmt->bindParam(17, $rg_representante);
		$stmt->bindParam(18, $cep);
		$stmt->bindParam(19, $numero);
		$stmt->bindParam(20, $complemento);

		if($stmt->execute()){
			return true;
		}else{
			//print_r($stmt->errorInfo());
			return false;
		}
	}

	function update_empresa($instituicao, $razao_social, $nome_fantasia, $cnpj, $especificacao, $email, $telefone, $nome_supervisor, $email_supervisor, $observacoes, $numero_vagas, $escola_beneficiada, $municipio_escola, $nome_representante, $email_representante, $cpf_representante, $rg_representante, $cep, $numero, $complemento, $id){

		//Criptografando a senha
		// $senha = crypt($senha);

		$conn = iniciarConexao();
		
		$stmt = $conn->prepare("UPDATE empresas SET instituicao = ?, razao_social = ?, nome_fantasia = ?, cnpj = ?, especificacao = ?, email = ?, telefone = ?, nome_supervisor = ?, email_supervisor = ?, observacoes = ?, numero_vagas = ?, escola_beneficiada = ?, municipio_escola = ?, nome_representante = ?, email_representante = ?, cpf_representante = ?, rg_representante = ?, cep = ?, numero = ?, complemento = ? WHERE id = ?");

		$stmt->bindParam(1, $instituicao);
		$stmt->bindParam(2, $razao_social);
		$stmt->bindParam(3, $nome_fantasia);
		$stmt->bindParam(4, $cnpj);
		$stmt->bindParam(5, $especificacao);
		$stmt->bindParam(6, $email);
		$stmt->bindParam(7, $telefone);
		$stmt->bindParam(8, $nome_supervisor);
		$stmt->bindParam(9, $email_supervisor);
		$stmt->bindParam(10, $observacoes);
		$stmt->bindParam(11, $numero_vagas);
		$stmt->bindParam(12, $escola_beneficiada);
		$stmt->bindParam(13, $municipio_escola);
		$stmt->bindParam(14, $nome_representante);
		$stmt->bindParam(15, $email_representante);
		$stmt->bindParam(16, $cpf_representante);
		$stmt->bindParam(17, $rg_representante);
		$stmt->bindParam(18, $cep);
		$stmt->bindParam(19, $numero);
		$stmt->bindParam(20, $complemento);
		$stmt->bindParam(21, $id);


		if($stmt->execute())
			return true;
		else
			print_r($stmt->errorInfo());
			//return false;
	}

	function excluir_empresa($id){
		$conn = iniciarConexao();
		$stmt = $conn->prepare("DELETE FROM empresas WHERE id = ?");
		$stmt->bindParam(1, $id);

		if($stmt->execute() && $stmt->rowCount() > 0){
			return true;
		}

	}

	function listar_empresa(){
		$conn = iniciarConexao();
		$stmt = $conn->prepare("SELECT * FROM empresas");

		if($stmt->execute() && $stmt->rowCount() > 0){
			$empresas = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}

		return $empresas;
	}

	function buscar_empresa($id){
		$conn = iniciarConexao();
		$stmt = $conn->prepare("SELECT * FROM empresas WHERE id = ?");
		$stmt->bindParam(1, $id);

		if($stmt->execute() && $stmt->rowCount() > 0){
			$empresa = $stmt->fetch(PDO::FETCH_OBJ);
		}

		return $empresa;
	}

	function verificarCNPJ($cnpj){
		$conn = iniciarConexao();
		$stmt = $conn->prepare("SELECT * FROM empresas WHERE cnpj = ?");
		$stmt->bindParam(1, $cnpj);

		if($stmt->execute() && $stmt->rowCount() > 0)
			return true;
	}