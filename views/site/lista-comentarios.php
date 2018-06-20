<?php 
	include_once '../../app/connection/Connection.php';
	include_once '../../app/funcoes.php';
	include_once '../../app/models/Comentario.php';
	include_once '../templates/includes/header.php'; 

	$permissoes = ['admin'];

	verificarAcesso($permissoes);

	@$comentarios = listarComentarios();
?>

<style type="text/css">
.item9-1{
	grid-column: 1 / 9;  
	font-size: 30px;
	text-align: center;
	color: grey;
	font-family: Baskerville Old Face;
}
.item9-2{
	grid-column: 1 / 9;  
	font-size: 20px;
	text-align: center;
	color: grey;
	font-family: Baskerville Old Face;
}
</style>

<div class="item9-1">Comentários</div>

<div class="item9-2">
	<table border="5" width="100%" class="tablet">
		<thead>
			<tr>
				<th>Nome</th>
				<th>E-mail</th>
				<th>Comentário</th>
				<th>Ações</th>
			</tr>
		</thead>

		<tbody>
			<?php 
			if(!empty($comentarios)){ 
				foreach($comentarios as $comentario){
					?>
					<tr>
						<th><?= $comentario->nome ?></th>
						<th><?= $comentario->email ?></th>
						<th><?= $comentario->texto ?></th>
						<th>
							<form method="POST" action="../../app/routes.php">
								<input type="hidden" name="acao" value="excluir-comentario">
								<input type="hidden" name="id" value="<?= $comentario->id ?>">
								<button type="submit" onclick="return confirm('Deseja realmente apagar esse comentário?')">Excluir</button>
							</form>
						</th>
					</tr>
				<?php } }else{ ?>
					<tr>
						<th colspan="4">Nenhum Comentário</th>
					</tr>
				<?php } ?>
			</tbody>

		</table>
	</div>

<?php include_once '../templates/includes/footer.php'; ?>