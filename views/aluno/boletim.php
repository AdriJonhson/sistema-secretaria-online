<?php 
	include_once '../../app/connection/Connection.php';
	include_once '../../app/models/Professor.php';
	include_once '../../app/models/Aluno.php';
	include_once '../../app/models/Nota.php';
	include_once '../../app/funcoes.php';
	include_once '../templates/includes/header.php';

	include_once '../templates/includes/header.php'; 

	$permissoes = ['admin', 'coordenador', 'aluno'];

	verificarAcesso($permissoes);


	if(!isset($id_aluno) && $_SESSION['usuario_logado']['nv_acesso'] == "aluno"){
		$id_aluno = $_SESSION['usuario_logado']['dados']->id;
	}else{
		$id_aluno = filter_input(INPUT_GET, 'id');
	}

	$notas = gerar_boletim($id_aluno);

?>

<h1>Boletim</h1>


<table border="1" cellspacing="0" width="100%">
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
</table>








<?php include_once '../templates/includes/footer.php'; ?>