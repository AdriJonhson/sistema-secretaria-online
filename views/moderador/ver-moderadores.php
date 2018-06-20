<?php 
	include_once '../../app/connection/Connection.php';
	include_once '../../app/models/Admin.php';
	include_once '../../app/funcoes.php';

	//Não permite que usário entrem na página sem fazer login
	include_once '../templates/includes/header.php'; 
	
	$permissoes = ['admin'];
    verificarAcesso($permissoes);

    $admins = listarAdmins();
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

<div class="item9-1">Administradores</div>
<div class="item9-2">
	<table border="5" width="100%" class="tablet">
		
		<thead>
			<tr>
				<th>Nome</th>
				<th>E-Mail</th>
			</tr>
		</thead>

		<tbody>
			<?php if(!empty($admins)){
				foreach($admins as $admin){
					?>
					<tr>
						<th><?= $admin->nome ?></th>
						<th><?= $admin->email ?></th>
					</tr>

				<?php } }else{ ?>
					<tr>
						<th colspan="3">Nenhum Administrador Cadastrado</th>
					</tr>
				<?php } ?>
			</tbody>

			<tfoot>
				<tr>
					<th colspan="2"><a href="novo-moderador.php">Novo Administrador</a></th>
				</tr>
			</tfoot>

		</table>
	</div>
<?php include_once '../templates/includes/footer.php'; ?>