<?php 

	include_once 'connection/Connection.php';

	function verificarLoginResponsavel($email, $senha)
	{

		$conn = iniciarConexao();
		$stmt = $conn->prepare("SELECT * FROM responsaveis WHERE email = ? AND senha = ?");
		$stmt->bindParam(1, $email);
		$stmt->bindParam(2, $senha);

		if($stmt->execute() && $stmt->rowCount() > 0){
			$_SESSION['usuario_logado']['nv_acesso'] = "responsavel";
			$_SESSION['usuario_logado']['dados'] = $stmt->fetch(PDO::FETCH_OBJ);
			return true;
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