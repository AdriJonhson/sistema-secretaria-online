<?php 
	include_once '../../app/connection/Connection.php';
	include_once '../../app/funcoes.php';
	include_once '../templates/includes/header.php'; 
	include_once '../../app/models/Responsavel.php';
	include_once '../../app/models/Aluno.php';
	include_once '../../app/models/Curso.php';

	$permissoes = ['admin', 'coordenador'];

	verificarAcesso($permissoes);

	$id_responsavel = filter_input(INPUT_GET, 'id');

	$cursos = listarCursos();

	if(isset($_POST['btnProcurar'])){
		
		$cpf = filter_input(INPUT_POST, 'cpf');

		@$alunos = buscarAlunoCpf($cpf);

		$msg = "Nenhum Aluno Encontrado";

	}else{
		@$alunos = listarAlunosSemResponsavel();
		$msg = "Nenhum Aluno Encontrado";
	}

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
.item9-3{
	grid-column: 1 / 9;  
}
</style>

<div class="item9-1">Associar Aluno</div>

<div class="item9-3">
	<form method="POST" action="">
		<input type="text" name="cpf" placeholder="Digite o CPF do aluno" size="50px" required>
		<button type="submit" name="btnProcurar" class="button">Procurar</button>
	</form>
</div>

<p></p>

<div class="item9-2">
	<table border="5" width="100%" class="tablet">
		
		<thead>
			<tr>
				<th>Matrícula</th>
				<th>Nome</th>
				<th>Curso</th>
				<th>CPF</th>
				<th>Associar</th>
			</tr>
		</thead>

		<tbody>
			<?php 
				if(!empty($alunos)){
					foreach($alunos as $aluno){
			?>
				<tr>
					<td align="center"><?= $aluno['matricula'] ?></td>
					<td align="center"><?= $aluno['nome'] ?></td>
					<td align="center"><?= traduzirId($aluno['id_curso']) ?></td>
					<td align="center"><?= $aluno['cpf'] ?></td>
					<td align="center">
						<form method="POST" action="../../app/routes.php">
							<input type="hidden" name="acao" value="associar-dependente">
							<input type="hidden" name="id_aluno" value="<?= $aluno['id'] ?>">
							<input type="hidden" name="id_responsavel" value="<?= $id_responsavel ?>">
							<button type="submit" onclick="return confirm('Deseja Realemnte associar: <?= $aluno['nome'] ?>?')">Associar</button>
						</form>
					</td>
				</tr>
			<?php } }else{ ?>

				<tr>
					<th colspan="5"><?= $msg ?></th>
				</tr>

			<?php } ?>
		</tbody>

	</table>
</div>

<?php include_once '../templates/includes/footer.php'; ?>