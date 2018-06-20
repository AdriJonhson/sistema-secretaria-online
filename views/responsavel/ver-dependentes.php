<?php 
	include_once '../../app/connection/Connection.php';
	include_once '../../app/funcoes.php';
	include_once '../templates/includes/header.php'; 
	include_once '../../app/models/Responsavel.php';
	include_once '../../app/models/Aluno.php';
	include_once '../../app/models/Curso.php';

	$permissoes = ['admin', 'coordenador', 'responsavel'];

	verificarAcesso($permissoes);

	$id_responsavel = filter_input(INPUT_GET, 'id');

	if(!$id_responsavel){
		$id_responsavel = $_SESSION['usuario_logado']['dados']->id;
	}

	@$dependentes = listarDependentes($id_responsavel);

	$nivel = $_SESSION['usuario_logado']['nv_acesso'];
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


<div class="item9-1">Dependentes</div>
<div class="item9-2">
	<table border="5" width="100%" class="tablet">
		
		<thead>
			<tr>
				<th>Matrícula</th>
				<th>Nome</th>
				<th>Curso</th>
				<th>Ver Boletim</th>
			</tr>
		</thead>
		
		<tbody>
			<?php 
			if(!empty($dependentes)){
				foreach($dependentes as $dependente){
					$aluno = buscarAluno($dependente->id_aluno);
					?>
					<tr>
						<th><?= $aluno->matricula ?></th>
						<th><?= $aluno->nome ?></th>
						<th><?=	traduzirId($aluno->id_curso) ?></th>
						<th><a href="../aluno/boletim.php?id=<?= $aluno->id ?>">Ver Boletim</a></th>
					</tr>

				<?php } }else{ ?>
					<tr>
						<th colspan="4">Nenhum Dependente Associado</th>
					</tr>
				<?php } ?>
		</tbody>


		<tfoot>
			<tr>
				<?php if($nivel == "admin" || $nivel == "coordenador"){ ?>
					<th colspan="4"><a href="adicionar-dependente.php?id=<?= $id_responsavel ?>">Adicionar Dependente</a></th>
				<?php } ?>
			</tr>
		</tfoot>

	</table>
</div>


<?php include_once '../templates/includes/footer.php'; ?>