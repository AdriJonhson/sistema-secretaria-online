<?php 

	function verificarLoginResponsavel($email, $senha)
	{

		$conn = iniciarConexao();
		$stmt = $conn->prepare("SELECT * FROM responsaveis WHERE email = ?");
		$stmt->bindParam(1, $email);

		if($stmt->execute() && $stmt->rowCount() > 0){
			$row = $stmt->fetch(PDO::FETCH_OBJ);

			if(crypt($senha, $row->senha) == $row->senha){
				$_SESSION['usuario_logado']['nv_acesso'] = "responsavel";
				$_SESSION['usuario_logado']['dados'] = $row;
				return true;
			}
		}
		
	}

	function verificarEmailResponsavel($email)
	{

		$conn = iniciarConexao();
		$stmt = $conn->prepare("SELECT * FROM responsaveis WHERE email = ?");
		$stmt->bindParam(1, $email);

		if($stmt->execute() && $stmt->rowCount() > 0)
			return true;
	}

	function listarResponsaveis()
	{

		$conn = iniciarConexao();
		$stmt = $conn->prepare("SELECT * FROM responsaveis");

		if($stmt->execute()){
			$responsaveis = $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		return $responsaveis;
	}

	function cadastrar_responsavel($nome_pai, $cpf_pai, $rg_pai, $nome_mae, $cpf_mae, $rg_mae, $email, $login, $senha)
	{
		$conn = iniciarConexao();
		$stmt = $conn->prepare("INSERT INTO responsaveis(nome_pai, cpf_pai, rg_pai, nome_mae, cpf_mae, rg_mae, email, login, senha) VALUES(?,?,?,?,?,?,?,?,?)");

		$stmt->bindParam(1, $nome_pai);
		$stmt->bindParam(2, $cpf_pai);
		$stmt->bindParam(3, $rg_pai);
		$stmt->bindParam(4, $nome_mae);
		$stmt->bindParam(5, $cpf_mae);
		$stmt->bindParam(6, $rg_mae);
		$stmt->bindParam(7, $email);
		$stmt->bindParam(8, $login);
		$stmt->bindParam(9, $senha);

		if($stmt->execute())
			return true;
		else
			return false;	
	}

	function editar_responsavel($nome_pai, $cpf_pai, $rg_pai, $nome_mae, $cpf_mae, $rg_mae, $email, $login, $id)
	{
		$conn = iniciarConexao();
		$stmt = $conn->prepare("UPDATE responsaveis SET nome_pai = ?, cpf_pai = ?, rg_pai = ?, nome_mae = ?, cpf_mae = ?, rg_mae = ?, email = ?, login = ? WHERE id = ?");

		$stmt->bindParam(1, $nome_pai);
		$stmt->bindParam(2, $cpf_pai);
		$stmt->bindParam(3, $rg_pai);
		$stmt->bindParam(4, $nome_mae);
		$stmt->bindParam(5, $cpf_mae);
		$stmt->bindParam(6, $rg_mae);
		$stmt->bindParam(7, $email);
		$stmt->bindParam(8, $login);
		$stmt->bindParam(9, $id);

		if($stmt->execute())
			return true;
		else
			exibirErro($stmt);
			//return false;	
	}

	function excluir_responsavel($id)
	{
		$conn = iniciarConexao();
		$stmt = $conn->prepare("DELETE FROM responsaveis WHERE id = ?");
		$stmt->bindParam(1, $id);

		if($stmt->execute())
			return true;
		else
			return false;	
	}

	function buscarResponsavel($id)
	{
		$conn = iniciarConexao();
		$stmt = $conn->prepare("SELECT * FROM responsaveis WHERE id = ?");
		$stmt->bindParam(1, $id);

		if($stmt->execute() && $stmt->rowCount() > 0){
			$responsavel = $stmt->fetch(PDO::FETCH_OBJ);
		}

		return $responsavel;
	}

	function adicionar_dependente($id_responsavel, $id_aluno)
	{
		$conn = iniciarConexao();
		$stmt = $conn->prepare("INSERT INTO responsaveis_alunos(id_responsavel, id_aluno) VALUES(?,?)");
		$stmt->bindParam(1, $id_responsavel);
		$stmt->bindParam(2, $id_aluno);

		if($stmt->execute())
			return true;
		else
			return false;
	}

	function listarDependentes($id_responsavel)
	{
		$conn = iniciarConexao();
		$stmt = $conn->prepare("SELECT * FROM responsaveis_alunos WHERE id_responsavel = ?");
		$stmt->bindParam(1, $id_responsavel);

		if($stmt->execute() && $stmt->rowCount() > 0){
			$dependentes = $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		return $dependentes;
	}