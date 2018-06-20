<?php include_once '../templates/includes/header.php'; ?>

	

	<?php include_once '../templates/includes/messages.php'; ?>
	<p></p>

	<form method="POST" action="../../app/routes.php">
		
		<div class="grid-item"><h1>Área de Acesso</h1></div>

		<div class="grid-item">
			<input type="email" name="email" placeholder="Digite seu email" required/>
		</div>

		<div class="grid-item">
			<input type="password" name="senha" placeholder="Digite sua senha" required/>
		</div>

		<div class="grid-item">
			<input type="hidden" name="acao" value="login"/>
			<button type="submit" class="button">Entrar</button>
		</div>

	</form>



<?php include_once '../templates/includes/footer.php'; ?>