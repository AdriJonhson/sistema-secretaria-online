<?php 
	include_once '../../app/connection/Connection.php';
	include_once '../../app/funcoes.php';
	include_once '../templates/includes/header.php'; 
	include_once '../../app/models/Responsavel.php';

	$permissoes = ['admin', 'coordenador'];

	verificarAcesso($permissoes);
?>

<h1>Dependentes</h1>

<table border="1" cellspacing="0" width="100%">
	
	<thead>
		<tr>
			<th>Matrícula</th>
			<th>Nome</th>
			<th>Curso</th>
		</tr>
	</thead>
	
	<tfoot>
		<tr>
			<th colspan="3"><a href="adicionar-dependente.php?id=<?= $_GET['id'] ?>">Adicionar Dependente</a></th>
		</tr>
	</tfoot>

</table>



<?php include_once '../templates/includes/footer.php'; ?>