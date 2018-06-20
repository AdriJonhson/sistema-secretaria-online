<nav id="menu">
	<ul>
		<li><a href="../aluno/boletim.php">Ver Boletim</a></li>
		<li><a href="../professor/atividades.php">Ver Atividades</a></li>
		<li><a href="#" onclick="document.formSair.submit()">Sair</a></li>
	</ul>

	<form method="POST" action="../../app/routes.php" name="formSair">
		<input type="hidden" name="acao" value="sair">
	</form>

</nav>