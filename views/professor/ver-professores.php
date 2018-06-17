<?php 
	include_once '../../app/connection/Connection.php';
	include_once '../../app/models/Professor.php';
	include_once '../../app/funcoes.php';
	$professores = listar();

	//Não permite que usário entrem na página sem fazer login
	include_once '../templates/includes/header.php'; 
	
	$permissoes = ['admin', 'coordenador'];
    verificarAcesso($permissoes);


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
		
		<?php foreach($professores as $professor){ ?>
				
			<tr>
				<td align="center"><?= $professor['id']?></td>
				<td align="center"><?= $professor['nome']?></td>
				<td align="center"><?= $professor['materia']?></td>
				<td align="center"><?= $professor['email']?></td>
				<td align="center">
					<a href="editar-cadastrar-professor.php?id=<?= $professor['id']?>">Editar</a> | 
					<form method="POST" action="../../app/routes.php" id="formDelete">
						<input type="hidden" name="acao" value="apagar-professor">
						<input type="hidden" name="id" value="<?= $professor['id']?>">
						<input type="submit" value="Excluir">
					</form>
				</td>
			</tr>

		<?php } ?>
	</tbody>

	<tfoot>
		<tr>
			<th colspan="5" align="center"><a href="editar-cadastrar-professor.php">Cadastrar Professor</a></th>
		</tr>
	</tfoot>


</table>

<script type="text/javascript">
	
	function confirmDelete(){

		var msg = confirm("Realmente deseja apagar os dados desse professor?");

		if(msg){
			document.getElementById("formDelete").submit();
		}
	}


</script>
<?php include_once '../templates/includes/footer.php'; ?>