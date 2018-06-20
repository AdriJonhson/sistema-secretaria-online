<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Secretária Online</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/Style.css">
</head>
<body>
	<?php include_once '../templates/includes/messages.php'; ?>
	<div class="grid-container">
  		<div class="item1" ><img class="img" src="../assets/images/Muvuruka.png"></div>
  		<div class="item2"><font color="white">Secretaria Online</font></div>
 
  			<div class="item3"><font color="white">
  				<a href="login.php" class="login"><?= isset($_SESSION['usuario_logado']) ? "" : "Login" ?></a></font>
  			</div>
  		
  		<div class="item8">
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
		</div>
	  	