<?php include_once '../templates/includes/header.php'; ?>
	<?php isset($_SESSION['usuario_logado']) ? header("Location: dashboard.php") : "" ?>
    <h1>Secretária Online</h1>
    <a href="login.php">Login</a>
    <a href="sobre.php">Sobre</a>
<?php include_once '../templates/includes/footer.php'; ?>