<?php

    function listarCursos()
    {

        $conn = iniciarConexao();
        $stmt = $conn->prepare("SELECT * FROM cursos ORDER BY nome ASC");
        
        if($stmt->execute() && $stmt->rowCount() > 0){
            $cursos= $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return $cursos;


    }

    function traduzirId($id_curso)
    {

        $conn = iniciarConexao();
        $stmt = $conn->prepare("SELECT nome FROM cursos WHERE id = ?");
        $stmt->bindParam(1, $id_curso);
        if($stmt->execute()){
            $curso = $stmt->fetch(PDO::FETCH_OBJ);
            return $curso->nome;
        }

    }
