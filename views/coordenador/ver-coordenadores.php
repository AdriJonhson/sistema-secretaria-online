<?php 
	include_once '../../app/connection/Connection.php';
	include_once '../../app/funcoes.php';
	include_once '../templates/includes/header.php'; 
	include_once '../../app/models/Coordenador.php';

	$permissoes = ['admin'];

	verificarAcesso($permissoes);

	$coordenadores = listarCoordenadores();
?>

<h1>Coordenadores</h1>

<table border="1" cellspacing="0" width="100%">
	
	<thead>
		<tr>
			<th>Nome</th>
			<th>CPF</th>
			<th>E-Mail</th>
			<th>Ações</th>
		</tr>
	</thead>

	<tbody>
		
		<?php 
			if(!empty($coordenadores)){
				foreach($coordenadores as $coordenador){
		?>	
			<tr>
				<th><?= $coordenador->nome ?></th>
				<th><?= $coordenador->cpf ?></th>
				<th><?= $coordenador->email ?></th>
				<th>
					<a href="novo-editar-coordenador.php?id=<?= $coordenador->id ?>">Editar</a> | 
					<form method="POST" action="../../app/routes.php">
						<input type="hidden" name="acao" value="excluir-coordenador">
						<input type="hidden" name="id" value="<?= $coordenador->id ?>">
						<button type="submit" onclick="return confirm('Deseja Realmente excluir esse coordenador?')">Excluir</button>
					</form>
				</th>
			</tr>

		<?php } }else{ ?>
			<tr>
				<th colspan="4">Nenhum Coordenador Cadastrado</th>
			</tr>
		<?php } ?>
	</tbody>

	<tfoot>
		<tr>
			<th colspan="4"><a href="novo-editar-coordenador.php">Novo Coordenador</a></th>
		</tr>
	</tfoot>
	
</table>

<?php include_once '../templates/includes/footer.php'; ?>