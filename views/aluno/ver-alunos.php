<?php 
	include_once '../../app/connection/Connection.php';
	include_once '../../app/funcoes.php';
	include_once '../../app/models/Aluno.php';
	include_once '../../app/models/Curso.php';

	//Não permite que usário entrem na página sem fazer login
	include_once '../templates/includes/header.php'; 

	$permissoes = ['admin', 'professor', 'coordenador'];

	verificarAcesso($permissoes);

	$cursos = listarCursos();

	if(isset($_POST['btnProcurar'])){
		
		$nome = filter_input(INPUT_POST, 'nome');
		$curso = filter_input(INPUT_POST, 'curso');

		if($curso != 0){
			@$alunos = buscarAlunoCurso($nome, $curso);
		}else{
			@$alunos = buscarAlunoNome($nome);
		}

		$msg = "Nenhum Aluno Encontrado";

	}else{
		$alunos = listarAlunos();
		$msg = "Nenhum Aluno Cadastrado";
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

<div class="item9-1">Alunos</div>

<p></p>

<div class="item9-3">
	<form method="POST" action="">
		<input type="text" name="nome" placeholder="Nome Do Aluno" size="50px">

		<select name="curso">
			<option value="">Selecione um Curso(Não é obrigatório)</option>
			<?php foreach($cursos as $curso){ ?>
				<option value="<?= $curso['id'] ?>"><?= $curso['nome'] ?></option>
			<?php } ?>
		</select>

		<button type="submit" name="btnProcurar" class="button">Procurar</button>
	</form>
</div>

<p></p>


<div class="item9-2">
	<table border="5" width="100%" class="tablet">

		<thead>
			<tr>
				<th width="15%">Matrícula</th>
				<th>Nome</th>
				<th>Curso</th>
				<th>Turno</th>
				<th>Ações</th>
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
						<td align="center"><?= $aluno['turno'] ?></td>
						<td align="center" width="30%">
							<?= ($_SESSION['usuario_logado']['nv_acesso'] != "professor") ? "<a href='dados-aluno.php?id=".$aluno['id']."'>Ver Mais</a> |" : "" ?>

							<?= ($_SESSION['usuario_logado']['nv_acesso'] == "professor") ? "<a href='../professor/cadastrar-notas.php?id=".$aluno['id']."'>Adicionar Nota</a> " : "" ?>

							<?= ($_SESSION['usuario_logado']['nv_acesso'] == "professor") ? "| <a href='../aluno/ver-nota.php?id=".$aluno['id']."'>Ver Notas</a> " : "" ?>


							<?= ($_SESSION['usuario_logado']['nv_acesso'] != "professor") ? " <a href='boletim.php?id=".$aluno['id']."'>Boletim |</a>" : "" ?>

							<?= ($_SESSION['usuario_logado']['nv_acesso'] != "professor") ? "<a href='novo-editar-aluno.php?id=".$aluno['id']."'>Editar</a> |" : "" ?>

							<?php if($_SESSION['usuario_logado']['nv_acesso'] != "professor"){ ?>
								<form method="POST" action="../../app/routes.php" id="formDelete">
									<input type="hidden" name="acao" value="apagar-aluno">
									<input type="hidden" name="id" value="<?= $aluno['id'] ?>">
									<input type="submit" value="Excluir">
								</form>
							<?php } ?>
						</td>
					</tr>

				<?php } }else{ ?>

					<tr>
						<th colspan="5"><?= $msg ?></th>
					</tr>

				<?php } ?>
			</tbody>

			<tfoot>
				<tr>
					<?php if($_SESSION['usuario_logado']['nv_acesso'] == "admin" || $_SESSION['usuario_logado']['nv_acesso'] == "coordenador"){ ?>
						<td align="center" colspan="5"><a href="novo-editar-aluno.php">Novo Aluno</a></td>

					<?php } ?>
				</tr>
			</tfoot>


		</table>
	</div>
<?php include_once '../templates/includes/footer.php'; ?>