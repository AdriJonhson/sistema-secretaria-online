<?php 
	include_once '../../app/connection/Connection.php';
	include_once '../../app/models/Professor.php';
	$id_professor = filter_input(INPUT_GET, 'id');

	if(isset($id_professor)){
		$professor = buscar($id_professor);
	}

	//Não permite que usário entrem na página sem fazer login
	include_once '../templates/includes/header.php'; 
	
	if(!isset($_SESSION['usuario_logado']))	
		header("Location: ../../index.php");

?>




<?php include_once '../templates/includes/footer.php'; ?>