<?php include_once '../templates/navbars/header.php'; ?>

<?php 
	//Não permite que usário entrem na página sem fazer login
	if(!isset($_SESSION['usuario_logado']))	
		header("Location: ../../index.php");
?>

<h1>DashBoard</h1>

<?= $_SESSION['usuario_logado']['dados']->nome; ?>

<form method="POST" action="../../app/routes.php">
	<input type="hidden" name="acao" value="sair">
	<button type="submit">Sair</button>
</form>

<?php include_once '../templates/navbars/footer.php'; ?>