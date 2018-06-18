<?php 
	include_once '../../app/connection/Connection.php';
	include_once '../../app/models/Admin.php';
	include_once '../../app/funcoes.php';

	//Não permite que usário entrem na página sem fazer login
	include_once '../templates/includes/header.php'; 
	
	$permissoes = ['admin'];
    verificarAcesso($permissoes);

    $admins = listarAdmins();
?>

<h1>Novo Administrador</h1>

<form method="POST" action="../../app/routes.php">
	<label>Nome</label>
	<input type="text" name="nome" required>
	<br><br>

	<label>E-Mail</label>
	<input type="email" name="email" required>
	<br><br>

	<label>Login</label>
	<input type="text" name="login" required>
	<br><br>

	<label>Senha</label>
	<input type="password" name="senha" required>
	<br><br>

	<input type="hidden" name="acao" value="cadastrar-admin">
	<button type="submit">Cadastrar</button>
</form>

<?php include_once '../templates/includes/footer.php'; ?>