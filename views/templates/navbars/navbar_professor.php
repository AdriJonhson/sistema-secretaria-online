<nav id="menu">
	<ul>
		<li><a href="#">Adicionar Notas</a></li>
		<li><a href="#">Adicionar Atividade</a></li>
		<li><a href="#" onclick="document.formSair.submit()">Sair</a></li>
	</ul>

	<form method="POST" action="../../app/routes.php" name="formSair">
		<input type="hidden" name="acao" value="sair">
	</form>

</nav>