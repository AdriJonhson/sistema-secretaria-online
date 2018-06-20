<?php 
	include_once '../../app/connection/Connection.php';
	include_once '../../app/models/Professor.php';
	include_once '../../app/models/Aluno.php';
	include_once '../../app/models/Nota.php';
	include_once '../../app/funcoes.php';
	include_once '../templates/includes/header.php';

	include_once '../templates/includes/header.php'; 

	$permissoes = ['admin', 'coordenador', 'aluno', 'responsavel'];

	verificarAcesso($permissoes);


	if(!isset($id_aluno) && $_SESSION['usuario_logado']['nv_acesso'] == "aluno"){
		$id_aluno = $_SESSION['usuario_logado']['dados']->id;
	}else{
		$id_aluno = filter_input(INPUT_GET, 'id');
	}

	@$notas = gerar_boletim($id_aluno);

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

<div class="item9-1">Boletim</div>

<div class="item9-2">
	<table border="5" width="100%" class="tablet">
		<thead>
			<tr>
				<th>Matéria</th>
				<th>Média Primeiro Semestre</th>
				<th>Média Segundo Semestre</th>
			</tr>
		</thead>

		<tbody>
			
			<?php 
				if(!empty($notas)){
					foreach($notas as $nota){ 
			?>
				<tr>
					<th><?= buscar($nota->id_professor)->materia ?></th>
					<th><?= $nota->media_primeiro_semestre ?></th>
					<th><?= $nota->media_segundo_semestre != null ? $nota->media_segundo_semestre : "-" ?></th>
				</tr>	
			<?php } }else{ ?>
				<tr>
					<th colspan="3">Nenhum Nota Adicionada</th>
				</tr>
			<?php } ?>
		</tbody>

		<tfoot>
			<tr>
				<th colspan="3"><a href="../site/dashboard.php">Voltar</a></th>
			</tr>
		</tfoot>
	</table>
</div>

<?php include_once '../templates/includes/footer.php'; ?>