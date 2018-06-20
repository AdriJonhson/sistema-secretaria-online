<?php 
	include_once '../../app/connection/Connection.php';
	include_once '../../app/models/Professor.php';
	include_once '../../app/models/Aluno.php';
	include_once '../../app/models/Curso.php';
	include_once '../../app/models/Nota.php';
	include_once '../../app/funcoes.php';
	include_once '../templates/includes/header.php';

	include_once '../templates/includes/header.php'; 

	$permissoes = ['admin', 'professor', 'coordenador'];

	verificarAcesso($permissoes);


	$id_professor = $_SESSION['usuario_logado']['dados']->id;
	$id_aluno = filter_input(INPUT_GET, 'id');
	$aluno = buscarAluno($id_aluno);

	@$notas = buscar_medias($id_aluno, $id_professor);
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

<div class="item9-1">Notas</div>

<div class="item9-2">
	<label><b>Matéria</b></label>
	<input type="text" value="<?= $_SESSION['usuario_logado']['dados']->materia ?>" readonly>
	<br><br>

	<label><b>Aluno</b></label>
	<input type="text" name="" value="<?= $aluno->nome ?>" readonly>
	<br><br>

	<label><b>Curso</b></label>
	<input type="text" name="" value="<?= traduzirId($aluno->id_curso) ?>" readonly>
	<br><br>

	<label><b>Média Primeiro Semestre: </b></label>
	<label><?= (isset($notas) && $notas->media_primeiro_semestre != null) ? $notas->media_primeiro_semestre : "<i><u>Sem Média</u></i>" ?></label>
	<br><br>

	<label><b>Média Segundo Semestre: </b></label>
		<label><?= (isset($notas) && $notas->media_segundo_semestre != null) ? $notas->media_segundo_semestre : "<i><u>Sem Média</u></i>" ?></label>
	<br><br>

	
	<a href="ver-alunos.php">Voltar</a>
	<br><br>
</div>

<?php include_once '../templates/includes/footer.php'; ?>