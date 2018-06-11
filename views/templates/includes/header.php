<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Secretária Online</title>
	<style type="text/css">
		#menu ul {
			padding:0px;
			margin:0px;
			background-color:#EDEDED;
			list-style:none;
		}

		#menu ul li { display: inline; }

		#menu ul li a {
			padding: 2px 10px;
			display: inline-block;

			/* visual do link */
			background-color:#EDEDED;
			color: #333;
			text-decoration: none;
			border-bottom:3px solid #EDEDED;
		}

		#menu ul li a:hover {
			background-color:#D6D6D6;
			color: #6D6D6D;
			border-bottom:3px solid #EA0000;
		}
	</style>
	
</head>
<body>
	<?php include_once '../templates/includes/messages.php'; ?>

	<?php 
		switch (@$_SESSION['usuario_logado']['nv_acesso']) {
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