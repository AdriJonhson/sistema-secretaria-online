<?php 
	//Não permite que usário entrem na página sem fazer login
	include_once '../templates/includes/header.php'; 
	
	if(!isset($_SESSION['usuario_logado']))	
		header("Location: ../../index.php");


	switch ($_SESSION['usuario_logado']['nv_acesso']) {
		case 'admin':
			include_once '../templates/navbars/navbar_admin.php'; 
		break;

		case 'aluno':
			include_once '../templates/navbars/navbar_aluno.php'; 
		break;

		case 'professor':
			include_once '../templates/navbars/navbar_professor.php'; 
		break;

		case 'coordenador':
			include_once '../templates/navbars/navbar_coordenador.php'; 
		break;

		case 'responsavel':
			include_once '../templates/navbars/navbar_responsavel.php'; 
		break;
	}
?>




<h1>DashBoard</h1>




<?php include_once '../templates/includes/footer.php'; ?>