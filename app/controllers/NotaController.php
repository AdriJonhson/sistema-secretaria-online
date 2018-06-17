<?php 

	include_once 'models/Nota.php';
	include_once 'Controller.php';

	function cadastrarMedia()
	{

		$id_aluno = filter_input(INPUT_POST, 'id_aluno');
		$id_professor = filter_input(INPUT_POST, 'id_professor');
		$semestre = filter_input(INPUT_POST, 'semestre');
		$media = filter_input(INPUT_POST, 'media');

		if(cadastrar_media($id_aluno, $id_professor, $media, $semestre)){

			$_SESSION['msg_success'] = "Nota Adicionada com sucesso";
			header("Location:../views/aluno/ver-alunos.php");

		}else{

			$_SESSION['msg_erro'] = "Erro ao adicionar a nota";
			header("Location:../views/aluno/ver-alunos.php");	

		}


	}