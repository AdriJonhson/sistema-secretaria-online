<?php include_once '../templates/includes/header.php'; ?>
	<?php isset($_SESSION['usuario_logado']) ? header("Location: dashboard.php") : "" ?>
	<div class="item9-1">Bem-Vindo à Secretaria Online</div>
	<a href="sobre.php">Sobre</a>
<?php include_once '../templates/includes/footer.php'; ?>