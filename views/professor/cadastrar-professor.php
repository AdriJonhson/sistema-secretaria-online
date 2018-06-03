<?php 
	//Não permite que usário entrem na página sem fazer login
	include_once '../templates/includes/header.php'; 
	
	if(!isset($_SESSION['usuario_logado']))	
		header("Location: ../../index.php");

?>

<h1>Novo Professor</h1>

<form method="POST" action="../../app/routes.php">
	
	<input type="text" name="nome" placeholder="Nome Completo" /> <br/><br/>
	
	<input type="text" name="cpf" placeholder="CPF" /> <br/><br/>

	<input type="text" name="materia" placeholder="Matéria que leciona" /> <br/><br/>

	<input type="email" name="email" placeholder="E-Mail" /> <br/><br/>

	<input type="text" name="login" placeholder="Login" /> <br/><br/>

	<input type="password" name="senha" placeholder="Senha" /> <br/><br/>

	<input type="hidden" name="acao" value="cadastrar-professor">

	<button type="submit">Cadastrar</button>

</form>

<?php include_once '../templates/includes/footer.php'; ?>