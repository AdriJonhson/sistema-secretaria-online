<?php 
	include_once '../../app/connection/Connection.php';
    include_once '../../app/models/Atividade.php';
    include_once '../../app/models/Professor.php';
    include_once '../../app/funcoes.php';

	include_once '../templates/includes/header.php'; 
    
    //Verifica se o usuário está logado e se possui o nível de acesso necessário
    $permissoes = ['admin', 'professor', 'coordenador', 'aluno'];
    verificarAcesso($permissoes);

    $id_curso = $_SESSION['usuario_logado']['dados']->id_curso;

    $atividades = listarAtividadesCurso($id_curso); 

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

<div class="item9-1">Atividades</div>
<div class="item9-2">
	<table border="5" width="100%" class="tablet">
		<thead>
			<tr>
				<th>Matéria</th>
				<th>Conteúdo</th>
				<th>Data de Entrega</th>
				<th>Status</th>
			</tr>
		</thead>

		<tbody>
			<?php 
			if(!empty($atividades)){ 
				foreach($atividades as $atividade){
					?>	
					<tr>
						<th><?= buscar($atividade->id_professor)->materia ?></th>
						<th><?= $atividade->conteudo ?></th>
						<th><?= tratarData($atividade->data_entrega) ?></th>
						<th><?= $atividade->status ?></th>
					</tr>

				<?php } }else{ ?>
					<tr>
						<th colspan="4">Nenhum Atividade</th>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>

<?php include_once '../templates/includes/footer.php'; ?>