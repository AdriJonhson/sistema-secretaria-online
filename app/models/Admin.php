<?php

	function verificarLoginAdmin($email, $senha)
	{

		$conn = iniciarConexao();
		$stmt = $conn->prepare("SELECT * FROM administradores WHERE email = ?");
		$stmt->bindParam(1, $email);
		error_log("SELECT * FROM administradores WHERE email = '$email'");

		if($stmt->execute() && $stmt->rowCount() > 0){

			$row = $stmt->fetch(PDO::FETCH_OBJ);
			error_log("senha= ".$senha. " hash bcrypt= " .$row->senha);

			if(password_verify($senha, $row->senha)){
				$_SESSION['usuario_logado']['nv_acesso'] = "admin";
				$_SESSION['usuario_logado']['dados'] = $row;
				return true;
			}

		}

	}

	function verificarEmailAdmin($email)
	{

		$conn = iniciarConexao();
		$stmt = $conn->prepare("SELECT * FROM administradores WHERE email = ?");
		$stmt->bindParam(1, $email);

		if($stmt->execute() && $stmt->rowCount() > 0)
			return true;
	}

	function listarAdmins()
	{
		$conn = iniciarConexao();
		$stmt = $conn->prepare("SELECT * FROM administradores");

		if($stmt->execute()){
			$admins = $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		return $admins;
	}

	function cadastrar_admin($nome, $email, $login, $senha)
	{
		$conn = iniciarConexao();
		$stmt = $conn->prepare("INSERT INTO administradores(nome, email, login, senha) VALUES(?, ?, ?, ?)");

		$senha = password_hash($senha, PASSWORD_BCRYPT);

		$stmt->bindParam(1, $nome);
		$stmt->bindParam(2, $email);
		$stmt->bindParam(3, $login);
		$stmt->bindParam(4, $senha);

		if($stmt->execute())
			return true;
		else
			return false;
	}