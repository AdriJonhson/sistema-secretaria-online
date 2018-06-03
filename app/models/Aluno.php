<?php 

	include_once 'connection/Connection.php';

	function verificarLoginAluno($login, $senha)
	{

		$conn = iniciarConexao();
		$stmt = $conn->prepare("SELECT * FROM alunos WHERE login = ? AND senha = ?");
		$stmt->bindParam(1, $login);
		$stmt->bindParam(2, $senha);

		if($stmt->execute() && $stmt->rowCount() > 0){
			$_SESSION['usuario_logado']['nv_acesso'] = "aluno";
			$_SESSION['usuario_logado']['dados'] = $stmt->fetch(PDO::FETCH_OBJ);
			return true;
		}
		
	}