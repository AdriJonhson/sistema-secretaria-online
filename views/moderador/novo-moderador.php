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

<style type="text/css">
.item9-1{
	grid-column: 1 / 9;  
	font-size: 30px;
	text-align: center;
	color: grey;
	font-family: Baskerville Old Face;
}
.item9-2{
	grid-column: 1 / 9;  
	font-size: 20px;
	text-align: center;
	color: grey;
	font-family: Baskerville Old Face;
}
</style>

<div class="item9-1">Novo Administrador</div>

<p></p>

<div class="item9-2">
	<form method="POST" action="../../app/routes.php">
		<label>Nome</label>
		<input class="input" type="text" name="nome" required>
		<br><br>

		<label>E-Mail</label>
		<input class="input" type="email" name="email" required>
		<br><br>

		<label>Login</label>
		<input class="input" type="text" name="login" required>
		<br><br>

		<label>Senha</label>
		<input class="input" type="password" name="senha" required>
		<br><br>

		<input type="hidden" name="acao" value="cadastrar-admin">
		<button type="submit" class="button">Cadastrar</button>
	</form>
</div>
<?php include_once '../templates/includes/footer.php'; ?>