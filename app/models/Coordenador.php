<?php 

	function verificarLoginCoordenador($email, $senha)
	{

		$conn = iniciarConexao();
		$stmt = $conn->prepare("SELECT * FROM coordenadores WHERE email = ?");
		$stmt->bindParam(1, $email);

		if($stmt->execute() && $stmt->rowCount() > 0){
			$row = $stmt->fetch(PDO::FETCH_OBJ);

			if(crypt($senha, $row->senha) == $row->senha){
				$_SESSION['usuario_logado']['nv_acesso'] = "coordenador";
				$_SESSION['usuario_logado']['dados'] = $row;
				return true;
			}
		}
		
	}

	function verificarEmailCoordenador($email)
	{

		$conn = iniciarConexao();
		$stmt = $conn->prepare("SELECT * FROM coordenadores WHERE email = ?");
		$stmt->bindParam(1, $email);

		if($stmt->execute() && $stmt->rowCount() > 0)
			return true;
	}

	function listarCoordenadores()
	{

		$conn = iniciarConexao();
		$stmt = $conn->prepare("SELECT * FROM coordenadores");

		if($stmt->execute() && $stmt->rowCount() > 0){
			$coordenadores = $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		return $coordenadores;

	}

	function cadastrar_coordenador($nome, $login, $email, $senha, $cpf)
	{
		$conn = iniciarConexao();
		$stmt = $conn->prepare("INSERT INTO coordenadores(nome, login, email, senha, cpf) VALUES(?,?,?,?,?)");
		
		$stmt->bindParam(1, $nome);
		$stmt->bindParam(2, $login);
		$stmt->bindParam(3, $email);
		$stmt->bindParam(4, $senha);
		$stmt->bindParam(5, $cpf);

		if($stmt->execute())
			return true;
		else
			return false;
	}

	function buscar_coordenador($id)
	{
		$conn = iniciarConexao();
		$stmt = $conn->prepare("SELECT * FROM coordenadores WHERE id = ?");
		$stmt->bindParam(1, $id);

		if($stmt->execute()){
			$coordenador = $stmt->fetch(PDO::FETCH_OBJ);
		}

		return $coordenador;
	}

	function editar_coodenador($id, $nome, $cpf, $email, $login)
	{
		$conn = iniciarConexao();
		$stmt = $conn->prepare("UPDATE coordenadores SET nome = ?, cpf = ?, email = ?, login = ? WHERE id = ?");
		$stmt->bindParam(1, $nome);
		$stmt->bindParam(2, $cpf);
		$stmt->bindParam(3, $email);
		$stmt->bindParam(4, $login);
		$stmt->bindParam(5, $id);

		if($stmt->execute())
			return true;
		else
			return false;
	}

	function excluir_coordenador($id)
	{
		$conn = iniciarConexao();
		$stmt = $conn->prepare("DELETE FROM coordenadores WHERE id = ?");
		$stmt->bindParam(1, $id);

		if($stmt->execute())
			return true;
		else
			return false;
	}