<?php 

	function cadastrar_media($id_aluno, $id_professor ,$media, $semestre)
	{
		$conn = iniciarConexao();

		if($semestre == "Primeiro"){
			$sql = "INSERT INTO notas(id_aluno, id_professor, media_primeiro_semestre) VALUES(:id_aluno, :id_professor, :media)";
		}else{
			$sql = "UPDATE notas SET media_segundo_semestre = :media WHERE id_aluno = :id_aluno AND id_professor = :id_professor";
		}


		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':id_aluno', $id_aluno);
		$stmt->bindParam(':id_professor', $id_professor);
		$stmt->bindParam(':media', $media);

		if($stmt->execute())
			return true;
		else
			return false;
	}


	//Função para verificar se o aluno já teve suas notas adicionadas
	function verificar_nota($id_aluno, $id_professor)
	{
		$conn = iniciarConexao();
		$stmt = $conn->prepare("SELECT * FROM notas WHERE id_aluno = ? AND id_professor = ?");
		$stmt->bindParam(1, $id_aluno);
		$stmt->bindParam(2, $id_professor);

		if($stmt->execute() && $stmt->rowCount() > 0)
			return true;
		else
			return false;
	}

	function bloquear_cadastro($id_aluno, $id_professor)
	{
		$conn = iniciarConexao();
		$stmt = $conn->prepare("SELECT * FROM notas WHERE id_aluno = ? AND id_professor = ? AND media_primeiro_semestre <> 0 AND media_segundo_semestre <> 0");
		$stmt->bindParam(1, $id_aluno);
		$stmt->bindParam(2, $id_professor);

		if($stmt->execute() && $stmt->rowCount() > 0)
			return true;
		else
			return false;
	}

	function buscar_medias($id_aluno, $id_professor)
	{
		$conn = iniciarConexao();
		$stmt = $conn->prepare("SELECT * FROM notas WHERE id_aluno = ? AND id_professor = ?");
		$stmt->bindParam(1, $id_aluno);
		$stmt->bindParam(2, $id_professor);

		if($stmt->execute() && $stmt->rowCount() > 0){
			$notas = $stmt->fetch(PDO::FETCH_OBJ);
		}
			
		return $notas;
	}

	function gerar_boletim($id_aluno)
	{
		$conn = iniciarConexao();
		$stmt = $conn->prepare("SELECT * FROM notas WHERE id_aluno = ?");
		$stmt->bindParam(1, $id_aluno);

		if($stmt->execute() && $stmt->rowCount() > 0){
			$notas = $stmt->fetchAll(PDO::FETCH_OBJ);
		}
			
		return $notas;
	}		
