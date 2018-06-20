<?php 
	include_once '../../app/connection/Connection.php';
	include_once '../../app/models/Professor.php';
	include_once '../../app/models/Aluno.php';
	include_once '../../app/models/Curso.php';
	include_once '../../app/models/Nota.php';
	include_once '../../app/funcoes.php';
	include_once '../templates/includes/header.php';

	$permissoes = ['admin', 'professor', 'coordenador'];

	verificarAcesso($permissoes);

	$id_professor = $_SESSION['usuario_logado']['dados']->id;
	$id_aluno = filter_input(INPUT_GET, 'id');
	$aluno = buscarAluno($id_aluno);

	if(verificar_nota($id_aluno, $id_professor)){
		$semestre = "Segundo";
	}else{
		$semestre = "Primeiro";
	}

	$bloquear_cadastro = bloquear_cadastro($id_aluno, $id_professor);

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

<div class="item9-1">Adicionar Nota</div>
<p></p>
<div class="item9-2">
<form method="POST" action="../../app/routes.php">
	<label><b>Matéria</b></label>
	<input type="text" value="<?= $_SESSION['usuario_logado']['dados']->materia ?>" readonly>
	<br><br>

	<label><b>Aluno</b></label>
	<input type="text" name="" value="<?= $aluno->nome ?>" readonly>
	<br><br>

	<label><b>Curso</b></label>
	<input type="text" name="" value="<?= traduzirId($aluno->id_curso) ?>" readonly>
	<br><br>

	<label><b>Semestre</b></label>
	<input type="text" name="semestre" readonly value="<?= $semestre ?>">
	<br><br>

	<label><b>Primeira Nota</b></label>
	<input type="number" name="nota1" id="nota1" min="0" max="10" required step="any">
	<br><br>

	<label><b>Segunda Nota</b></label>
	<input type="number" name="nota2" id="nota2" min="0" max="10" required step="any" onkeyup ="calcularMedia()" >
	<br><br>

	<label><b>Média</b></label>
	<input type="number" name="media" id="media" step="any" readonly>
	
	<input type="hidden" name="acao" value="cadastrar-nota">	
	<input type="hidden" name="id_aluno" value="<?= $aluno->id ?>">
	<input type="hidden" name="id_professor" value="<?= $id_professor ?>">
	<button type="submit" <?= ($bloquear_cadastro) ? "disabled" : "" ?> class="button">Concluir</button>

	<?php if($bloquear_cadastro){ ?>
		<p></p>
		<label><i><strong>Esse aluno já possui suas médias preenchidas</strong></i></label>
	<?php } ?>
</form>
</div>

<script>

	function calcularMedia(){
		var nota_um = document.getElementById("nota1").value;
		var nota_dois = document.getElementById("nota2").value;
		var campo_media = document.getElementById("media");

		var media = (parseFloat(nota_um) + parseFloat(nota_dois))/2;
		campo_media.value = media;
	}

</script>

<?php include_once '../templates/includes/footer.php'; ?>