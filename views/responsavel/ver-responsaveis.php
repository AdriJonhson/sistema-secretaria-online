<?php 
	include_once '../../app/connection/Connection.php';
	include_once '../../app/funcoes.php';
	include_once '../templates/includes/header.php'; 
	include_once '../../app/models/Responsavel.php';

	$permissoes = ['admin', 'coordenador'];

	verificarAcesso($permissoes);

	$responsaveis = listarResponsaveis();
?>

<h1>Responsáveis</h1>

<table border="1" width="100%" cellspacing="0">
	
	<thead>
		<tr>
			<th>Nome Mãe</th>
			<th>CPF Mãe</th>
			<th>Nome Pai</th>
			<th>CPF Pai</th>
			<th>Ações</th>
		</tr>
	</thead>

	<tbody>
		<?php if(!empty($responsaveis)){
			foreach($responsaveis as $responsavel){
		?>
			<tr>
				<th><?= ($responsavel->nome_mae != null) ? $responsavel->nome_mae : " - " ?></th>
				<th><?= ($responsavel->cpf_mae != null) ? $responsavel->cpf_mae : " - " ?></th>
				<th><?= ($responsavel->nome_pai != null) ? $responsavel->nome_pai : " - " ?></th>
				<th><?= ($responsavel->cpf_pai != null) ? $responsavel->cpf_pai : " - " ?></th>
				<th>
					<a href="ver-dependentes.php?id=<?= $responsavel->id ?>">Ver Dependentes |</a>
					<a href="novo-editar-responsavel.php?id=<?= $responsavel->id ?>">Editar |</a>
					<form method="POST" action="../../app/routes.php">
						<input type="hidden" name="id" value="<?= $responsavel->id ?>">
						<input type="hidden" name="acao" value="excluir-responsavel">
						<button type="submit" onclick="return confirm('Deseja realmente apagar esse responsável?')">Excluir</button>
					</form>
				</th>
			</tr>

		<?php } }else{ ?>
			<tr>
				<th colspan="5">Nenhum Responsável Cadastrado</th>
			</tr>
		<?php } ?>
	</tbody>

	<tfoot>
		<tr>
			<th colspan="5"><a href="novo-editar-responsavel.php">Cadastrar Responsável</a></th>
		</tr>
	</tfoot>


</table>

<?php include_once '../templates/includes/footer.php'; ?>