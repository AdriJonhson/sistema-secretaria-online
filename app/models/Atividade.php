<?php 

    function salvar($id_professor, $id_curso, $conteudo, $data_entrega)
    {
        $conn = iniciarConexao();
        $stmt = $conn->prepare("INSERT INTO atividades(id_professor, id_curso, data_entrega, conteudo) VALUES(?,?,?,?)");
        $stmt->bindParam(1, $id_professor);
        $stmt->bindParam(2, $id_curso);
        $stmt->bindParam(3, $data_entrega);
        $stmt->bindParam(4, $conteudo);
        
        if($stmt->execute())
            return true;
        else
            return false;
    }
  
    function listarAtividadesAtivas($id_professor)
    {
        $conn = iniciarConexao();
        $stmt = $conn->prepare("SELECT * FROM atividades WHERE id_professor = ? AND status = 'Andamento'");
        $stmt->bindParam(1, $id_professor);
        
        if($stmt->execute()){
            $atividades = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return $atividades;
    }

    function listarAtividades($id_professor)
    {
        $conn = iniciarConexao();
        $stmt = $conn->prepare("SELECT * FROM atividades WHERE id_professor = ?");
        $stmt->bindParam(1, $id_professor);
        
        if($stmt->execute()){
            $atividades = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return $atividades;
    }

    function listarAtividadesCurso($id_curso)
    {
        $conn = iniciarConexao();
        $stmt = $conn->prepare("SELECT * FROM atividades WHERE id_curso = ?");
        $stmt->bindParam(1, $id_curso);


        if($stmt->execute()){
            $atividades = $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        return $atividades;
    }

    function buscarAtividade($id_atividade)
    {

        $conn = iniciarConexao();
        $stmt = $conn->prepare("SELECT * FROM atividades WHERE id = ?");
        $stmt->bindParam(1, $id_atividade);

        if($stmt->execute()){
            $atividade = $stmt->fetch(PDO::FETCH_ASSOC);
        }

        return $atividade;
    }

    function encerrar($id_atividade)
    {

        $conn = iniciarConexao();
        $stmt = $conn->prepare("UPDATE atividades SET status = 'Concluída' WHERE id = ?");
        $stmt->bindParam(1, $id_atividade);

        if($stmt->execute())
            return true;
        else
            return false;

    }