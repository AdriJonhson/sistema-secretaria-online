<?php 

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

	function listarAlunos()
	{
		$conn = iniciarConexao();
		$stmt = $conn->prepare("SELECT * FROM alunos");

		if($stmt->execute() && $stmt->rowCount() > 0){
			$alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}

		return $alunos;
	}	

	function cadastrar_aluno($id_curso, $nome, $matricula, $num_chamada, $data_nascimento, $naturalidade, $rg, $cpf, $nis, $cep, $complemento, $turno, $data_cadastro, $escola_origem, $opcao_medicamento, $medicamento, $telefone, $celular, $comentario, $login, $email, $senha)
	{

		$conn = iniciarConexao();
		$stmt = $conn->prepare("INSERT alunos(id_curso,nome,matricula,num_chamada,data_nascimento,naturalidade,rg,cpf,nis,cep,complemento_endereco,turno,data_cadastro,escola_origem,opcao_medicamento,medicamento,telefone,celular,comentario,login,email,senha) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

		$stmt->bindParam(1, $id_curso);
		$stmt->bindParam(2, $nome);
		$stmt->bindParam(3, $matricula);
		$stmt->bindParam(4, $num_chamada);
		$stmt->bindParam(5, $data_nascimento);
		$stmt->bindParam(6, $naturalidade);
		$stmt->bindParam(7, $rg);
		$stmt->bindParam(8, $cpf);
		$stmt->bindParam(9, $nis);
		$stmt->bindParam(10, $cep);
		$stmt->bindParam(11, $complemento);
		$stmt->bindParam(12, $turno);
		$stmt->bindParam(13, $data_cadastro);
		$stmt->bindParam(14, $escola_origem);
		$stmt->bindParam(15, $opcao_medicamento);
		$stmt->bindParam(16, $medicamento);
		$stmt->bindParam(17, $telefone);
		$stmt->bindParam(18, $celular);
		$stmt->bindParam(19, $comentario);
		$stmt->bindParam(20, $login);
		$stmt->bindParam(21, $email);
		$stmt->bindParam(22, $senha);

		if($stmt->execute())
			return true;
		else
			//print_r($stmt->errorInfo());
			return false;

	}

	function buscarAluno($id)
	{
		$conn = iniciarConexao();
		$stmt = $conn->prepare("SELECT * FROM alunos WHERE id = ?");
		$stmt->bindParam(1, $id);

		if($stmt->execute() && $stmt->rowCount() > 0){
			$aluno = $stmt->fetch(PDO::FETCH_OBJ);
		}

		return $aluno;
	}

	function editar_aluno($id_curso, $nome, $matricula, $num_chamada, $data_nascimento, $naturalidade, $rg, $cpf, $nis, $cep, $complemento, $turno, $escola_origem, $opcao_medicamento, $medicamento, $telefone, $celular, $comentario, $login, $email, $senha, $id_aluno)
	{

		$conn = iniciarConexao();

		$stmt = $conn->prepare("UPDATE alunos SET nome = ?, id_curso = ?, matricula = ?, num_chamada = ?, data_nascimento = ?, naturalidade = ?, rg = ?, cpf = ?, nis = ?, cep = ?, complemento_endereco = ?, turno = ?, escola_origem = ?, opcao_medicamento = ?, medicamento = ?, telefone = ?, celular = ?, comentario = ?, login = ?, email = ?, senha = ? WHERE id = ?");

		$stmt->bindParam(1, $nome);
		$stmt->bindParam(2, $id_curso);
		$stmt->bindParam(3, $matricula);
		$stmt->bindParam(4, $num_chamada);
		$stmt->bindParam(5, $data_nascimento);
		$stmt->bindParam(6, $naturalidade);
		$stmt->bindParam(7, $rg);
		$stmt->bindParam(8, $cpf);
		$stmt->bindParam(9, $nis);
		$stmt->bindParam(10, $cep);
		$stmt->bindParam(11, $complemento);
		$stmt->bindParam(12, $turno);
		$stmt->bindParam(13, $escola_origem);
		$stmt->bindParam(14, $opcao_medicamento);
		$stmt->bindParam(15, $medicamento);
		$stmt->bindParam(16, $telefone);
		$stmt->bindParam(17, $celular);
		$stmt->bindParam(18, $comentario);
		$stmt->bindParam(19, $login);
		$stmt->bindParam(20, $email);
		$stmt->bindParam(21, $senha);
		$stmt->bindParam(22, $id_aluno);

		if($stmt->execute())
			return true;
		else
			//print_r($stmt->errorInfo());
			return false;

	}

	function gerarNumeChamada($id_curso)
	{
		$conn = iniciarConexao();
		$stmt = $conn->prepare("SELECT COUNT(id) as num FROM alunos WHERE id_curso = ?");
		$stmt->bindParam(1, $id_curso);

		if($stmt->execute()){
			$num = $stmt->fetch(PDO::FETCH_OBJ);
		}

		return $num->num + 1;
	}

	function excluir_aluno($id_aluno)
	{
		$conn = iniciarConexao();
		$stmt = $conn->prepare("DELETE FROM alunos WHERE id = ?");
		$stmt->bindParam(1, $id_aluno);

		if($stmt->execute() && $stmt->rowCount() > 0)
			return true;
		else
			return false;
	}

	function buscarAlunoNome($nome)
	{
		$conn = iniciarConexao();
		$stmt = $conn->prepare("SELECT * FROM alunos WHERE nome LIKE ?");

		$nome = '%'.$nome.'%';

		$stmt->bindParam(1, $nome);

		if($stmt->execute() && $stmt->rowCount() > 0){
			$alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}

		return $alunos;
	}

	function buscarAlunoCurso($nome, $curso)
	{
		$conn = iniciarConexao();
		$stmt = $conn->prepare("SELECT * FROM alunos WHERE id_curso = ? AND nome LIKE ?");

		$nome = '%'.$nome.'%';

		$stmt->bindParam(1, $curso);
		$stmt->bindParam(2, $nome);

		if($stmt->execute() && $stmt->rowCount() > 0){
			$alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}

		return $alunos;
	}


	function listarAlunosSemResponsavel()
	{
		$conn = iniciarConexao();
		$stmt = $conn->prepare("SELECT * FROM alunos WHERE id NOT IN(SELECT id_aluno FROM responsaveis_alunos)");

		if($stmt->execute() && $stmt->rowCount() > 0){
			$alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}

		return $alunos;
	}

	function buscarAlunoCpf($cpf)
	{
		$conn = iniciarConexao();
		$stmt = $conn->prepare("SELECT * FROM alunos WHERE cpf = ? AND id NOT IN(SELECT id_aluno FROM responsaveis_alunos)");

		$stmt->bindParam(1, $cpf);

		if($stmt->execute() && $stmt->rowCount() > 0){
			$aluno = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}

		return $aluno;
	}