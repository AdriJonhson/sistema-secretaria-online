<?php 
	include_once '../../app/connection/Connection.php';
	include_once '../../app/models/Professor.php';
	include_once '../../app/funcoes.php';
	$id_professor = filter_input(INPUT_GET, 'id');

	if(isset($id_professor)){
		$professor = buscar($id_professor);
	}

	//Não permite que usário entrem na página sem fazer login
	include_once '../templates/includes/header.php';

	$permissoes = ['admin', 'professor', 'coordenador'];

	verificarAcesso($permissoes);
?>




<?php include_once '../templates/includes/footer.php'; ?>