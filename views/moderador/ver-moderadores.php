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

<h1>Administradores</h1>

<table border="1" cellspacing="0" width="100%">
	
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

<?php include_once '../templates/includes/footer.php'; ?>