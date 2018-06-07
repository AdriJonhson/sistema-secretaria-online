<nav id="menu">
	<ul>
		<li><a href="../aluno/ver-alunos.php">Alunos</a></li>
		<li><a href="../responsavel/ver-responsaveis.php">Responsáveis</a></li>
		<li><a href="#" onclick="document.formSair.submit()">Sair</a></li>
	</ul>

	<form method="POST" action="../../app/routes.php" name="formSair">
		<input type="hidden" name="acao" value="sair">
	</form>

</nav>