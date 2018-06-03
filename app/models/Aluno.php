<?php 

	include_once 'connection/Connection.php';

	function verificarLoginAluno($email, $senha)
	{

		$conn = iniciarConexao();
		$stmt = $conn->prepare("SELECT * FROM alunos WHERE email = ?");
		$stmt->bindParam(1, $email);

		if($stmt->execute() && $stmt->rowCount() > 0){
			$row = $stmt->fetch(PDO::FETCH_OBJ);

			if(crypt($senha, $row->senha) == $row->senha){
				$_SESSION['usuario_logado']['nv_acesso'] = "aluno";
				$_SESSION['usuario_logado']['dados'] = $row;
				return true;
			}
		}
		
	}

	function verificarEmailAluno($email)
	{

		$conn = iniciarConexao();
		$stmt = $conn->prepare("SELECT * FROM alunos WHERE email = ?");
		$stmt->bindParam(1, $email);

		if($stmt->execute() && $stmt->rowCount() > 0)
			return true;
	}