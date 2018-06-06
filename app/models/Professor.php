<?php 

	function verificarLoginProfessor($email, $senha)
	{

		$conn = iniciarConexao();
		$stmt = $conn->prepare("SELECT * FROM professores WHERE email = ?");
		$stmt->bindParam(1, $email);

		if($stmt->execute() && $stmt->rowCount() > 0){
			$row = $stmt->fetch(PDO::FETCH_OBJ);

			if(crypt($senha, $row->senha) == $row->senha){
				$_SESSION['usuario_logado']['nv_acesso'] = "professor";
				$_SESSION['usuario_logado']['dados'] = $row;
				return true;
			}
		}
		
	}

	function verificarEmailProfessor($email)
	{

		$conn = iniciarConexao();
		$stmt = $conn->prepare("SELECT * FROM professores WHERE email = ?");
		$stmt->bindParam(1, $email);

		if($stmt->execute() && $stmt->rowCount() > 0)
			return true;
	}


	function cadastrar($nome, $materia, $login, $email, $senha, $cpf)
	{

		//Criptografando a senha
		$senha = crypt($senha);

		$conn = iniciarConexao();
		
		$stmt = $conn->prepare("INSERT INTO professores(nome, materia, login, email, senha, cpf) VALUES(?, ?, ?, ?, ?, ?)");

		$stmt->bindParam(1, $nome);
		$stmt->bindParam(2, $materia);
		$stmt->bindParam(3, $login);
		$stmt->bindParam(4, $email);
		$stmt->bindParam(5, $senha);
		$stmt->bindParam(6, $cpf);

		if($stmt->execute())
			return true;
		else
			//print_r($stmt->errorInfo());
			return false;
	}

	function update($nome, $materia, $login, $email, $senha, $cpf, $id)
	{

		//Criptografando a senha
		$senha = crypt($senha);

		$conn = iniciarConexao();
		
		$stmt = $conn->prepare("UPDATE professores SET nome = ?, materia = ?, login = ?, email = ?, senha = ?, cpf = ? WHERE id = ?");

		$stmt->bindParam(1, $nome);
		$stmt->bindParam(2, $materia);
		$stmt->bindParam(3, $login);
		$stmt->bindParam(4, $email);
		$stmt->bindParam(5, $senha);
		$stmt->bindParam(6, $cpf);
		$stmt->bindParam(7, $id);

		if($stmt->execute())
			return true;
		else
			//print_r($stmt->errorInfo());
			return false;
	}

	function excluir($id)
	{
		$conn = iniciarConexao();
		$stmt = $conn->prepare("DELETE FROM professores WHERE id = ?");
		$stmt->bindParam(1, $id);

		if($stmt->execute() && $stmt->rowCount() > 0){
			return true;
		}

	}

	function listar()
	{
		$conn = iniciarConexao();
		$stmt = $conn->prepare("SELECT * FROM professores");

		if($stmt->execute() && $stmt->rowCount() > 0){
			$professores = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}

		return $professores;
	}

	function buscar($id)
	{
		$conn = iniciarConexao();
		$stmt = $conn->prepare("SELECT * FROM professores WHERE id = ?");
		$stmt->bindParam(1, $id);

		if($stmt->execute() && $stmt->rowCount() > 0){
			$professor = $stmt->fetch(PDO::FETCH_OBJ);
		}

		return $professor;
	}
