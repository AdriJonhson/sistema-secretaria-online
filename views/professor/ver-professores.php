<?php 
	//Não permite que usário entrem na página sem fazer login
	include_once '../templates/includes/header.php'; 
	
	if(!isset($_SESSION['usuario_logado']))	
		header("Location: ../../index.php");

?>

<h1>Professores</h1>

<table border="1" width="100%" cellspacing="0">
	
	<thead>
		<tr>
			<th>#</th>
			<th>Nome</th>
			<th>Matéria</th>
			<th>E-Mail</th>
			<th>Ações</th>
		</tr>
	</thead>

	<tbody>
		
	</tbody>

	<tfoot>
		<tr>
			<th colspan="5" align="center"><a href="cadastrar-professor.php">Cadastrar Professor</a></th>
		</tr>
	</tfoot>


</table>


<?php include_once '../templates/includes/footer.php'; ?>