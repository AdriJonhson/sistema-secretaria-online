<?php include_once '../templates/navbars/header.php'; ?>

	<h1>Área de Acesso</h1>

	<?php include_once '../templates/includes/messages.php'; ?>
	<p></p>

	<form method="POST" action="../../app/routes.php">
		
		<input type="text" name="login" placeholder="Digite sua matricula" required/>
		<input type="password" name="senha" placeholder="Digite sua senha" required/>
		<input type="hidden" name="acao" value="login"/>
		<button type="submit">Entrar</button>

	</form>



<?php include_once '../templates/navbars/footer.php'; ?>