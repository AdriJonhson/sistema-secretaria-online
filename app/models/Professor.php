<?php 

	include_once 'connection/Connection.php';

	function verificarLoginProfessor($email, $senha)
	{

		$conn = iniciarConexao();
		$stmt = $conn->prepare("SELECT * FROM professores WHERE email = ? AND senha = ?");
		$stmt->bindParam(1, $email);
		$stmt->bindParam(2, $senha);

		if($stmt->execute() && $stmt->rowCount() > 0){
			$_SESSION['usuario_logado']['nv_acesso'] = "professor";
			$_SESSION['usuario_logado']['dados'] = $stmt->fetch(PDO::FETCH_OBJ);
			return true;
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