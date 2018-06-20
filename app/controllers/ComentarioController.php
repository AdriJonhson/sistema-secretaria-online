<?php 

	include_once 'models/Comentario.php';

	function salvarComentario()
	{
		$nome = filter_input(INPUT_POST, 'nome');
		$email = filter_input(INPUT_POST, 'email');
		$comentario = filter_input(INPUT_POST, 'comentario');

		if(salvar_comentario($nome, $email, $comentario)){
			$_SESSION['msg_success'] = "Obrigado pelo comentário!";
			header("Location: ../views/site/home.php");
		}else{	
			$_SESSION['msg_erro'] = "Erro ao enviar o comentário, Tente Novamente!";
			header("Location: ../views/site/home.php");
		}
	}

	function excluirComentario()
	{

		$id = filter_input(INPUT_POST, 'id');

		if(excluir_comentario($id)){
			$_SESSION['msg_success'] = "Comentário Removido";
			header("Location: ../views/site/lista-comentarios.php");
		}else{
			$_SESSION['msg_erro'] = "Erro ao remover o comentário";
			header("Location: ../views/site/lista-comentarios.php");	
		}

	}