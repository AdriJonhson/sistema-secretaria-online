<?php 
	include_once '../../app/connection/Connection.php';
	include_once '../../app/funcoes.php';
	include_once '../../app/models/Empresa.php';

	//Não permite que usário entrem na página sem fazer login
	include_once '../templates/includes/header.php'; 

	$permissoes = ['admin'];

	verificarAcesso($permissoes);

	$empresas = listar_empresa();
	// $cursos = listarCursos();

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

<div class="item9-1">Empresas</div>

<div class="item9-2">
	<table border="5" width="100%" class="tablet">

		<thead>
			<tr>
				<th>Instituição</th>
				<th>Razão social</th>
				<th>Nome fantasia</th>
				<th>CNPJ</th>
				<th>E-mail</th>
				<th>Telefone</th>
				<th>Nome do supervisor</th>
				<th>E-mail do supervisor</th>
				<th>Número de vagas</th>
				<th>Ações</th>
			</tr>
		</thead>


		<tbody>
			<?php 
			if(!empty($empresas)){
				foreach($empresas as $empresa){
					?>

					<tr>
						<td align="center"><?= $empresa['instituicao'] ?></td>
						<td align="center"><?= $empresa['razao_social'] ?></td>
						<td align="center"><?= $empresa['nome_fantasia'] ?></td>
						<td align="center"><?= $empresa['cnpj'] ?></td>
						<td align="center"><?= $empresa['email'] ?></td>
						<td align="center"><?= $empresa['telefone'] ?></td>
						<td align="center"><?= $empresa['nome_supervisor'] ?></td>
						<td align="center"><?= $empresa['email_supervisor'] ?></td>
						<td align="center"><?= $empresa['numero_vagas'] ?></td>
						<td align="center" width="30%">
							<?= ($_SESSION['usuario_logado']['nv_acesso'] = "admin") ? "<a href='cadastrar-empresa.php?id=".$empresa['id']."'>Editar</a> |" : "" ?>
							<form method="POST" action="../../app/routes.php" id="formDelete">
								<input type="hidden" name="acao" value="apagar-empresa">
								<input type="hidden" name="id" value="<?= $empresa['id']?>">
								<input type="submit" value="Excluir">
							</form>
						</td>
					</tr>

				<?php } }else{ ?>

					<tr>
						<th colspan="10">Nenhuma empresa cadastrada</th>
					</tr>

				<?php } ?>
			</tbody>

			<tfoot>
				<tr>
					<?php if($_SESSION['usuario_logado']['nv_acesso'] == "admin"){ ?>
						<td align="center" colspan="10"><a href="cadastrar-empresa.php">Nova empresa</a></td>
					<?php } ?>
				</tr>
			</tfoot>
			
		</table>
	</div>

<?php include_once '../templates/includes/footer.php'; ?>