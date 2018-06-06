<?php 

    include_once 'models/Atividade.php';

    function cadastrarAtividade()
	{

		$id_professor = filter_input(INPUT_POST, 'professor_id');
		$id_curso = filter_input(INPUT_POST, 'curso_id');
		$conteudo = filter_input(INPUT_POST, 'conteudo');
		$dt_entrega = filter_input(INPUT_POST, 'data_entrega');

		if(salvar($id_professor, $id_curso, $conteudo, $dt_entrega)){

            $_SESSION['msg_success'] = "Atividade lançado com sucesso";
			header("Location:../views/professor/ver-atividades.php");

        }else{

            $_SESSION['msg_error'] = "Erro ao lançar à atividade";
            header("Location:../views/professor/ver-atividades.php");
            
        }

    }

    function encerrarAtividade()
    {

        $id_atividade = filter_input(INPUT_POST, 'id');

        if(encerrar($id_atividade)){

            $_SESSION['msg_success'] = "Atividade Encerrada!";
            header("Location:../views/professor/ver-atividades.php");

        }else{

            $_SESSION['msg_error'] = "Erro ao encerrar à atividade! Tente Novamente!";
            header("Location:../views/professor/ver-atividades.php");

        }

    }
