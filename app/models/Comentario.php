<?php

	function salvar_comentario($nome, $email, $texto)
	{

		$conn = iniciarConexao();
		$stmt = $conn->prepare("INSERT INTO comentarios(nome, email, texto) VALUES(?,?,?)");
		$stmt->bindParam(1, $nome);
		$stmt->bindParam(2, $email);
		$stmt->bindParam(3, $texto);

		if($stmt->execute())
			return true;
		else
			return false;

	}

	function listarComentarios()
	{

		$conn = iniciarConexao();
		$stmt = $conn->prepare("SELECT * FROM comentarios");

		if($stmt->execute() && $stmt->rowCount() > 0){
			$comentarios = $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		return $comentarios;
	}

	function excluir_comentario($id)
	{

		$conn = iniciarConexao();
		$stmt = $conn->prepare("DELETE FROM comentarios WHERE id = ?");
		$stmt->bindParam(1, $id);

		if($stmt->execute())
			return true;
		else
			return false;
	}