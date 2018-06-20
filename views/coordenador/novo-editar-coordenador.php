<?php 
	include_once '../../app/connection/Connection.php';
	include_once '../../app/funcoes.php';
	include_once '../../app/models/Coordenador.php';
	include_once '../templates/includes/header.php'; 

	$permissoes = ['admin'];

	verificarAcesso($permissoes);

	$id_coordenador = filter_input(INPUT_GET, 'id');

	if(isset($id_coordenador)){
		$coordenador = buscar_coordenador($id_coordenador);
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
</style>


<div class="item9-1">
	<?= isset($coordenador) ? "Editando..." : "Novo Coordenador" ?>
</div>	

<div class="item9-2">
	<form method="POST" action="../../app/routes.php">
		<label>Nome</label>
		<input type="text" name="nome" required value="<?= isset($coordenador) ? $coordenador->nome : "" ?>">
		<br><br>

		<label>CPF</label>
		<input type="text" name="cpf" class="cpf" required value="<?= isset($coordenador) ? $coordenador->cpf : "" ?>">
		<br><br>

		<label>E-Mail</label>
		<input type="email" name="email" required value="<?= isset($coordenador) ? $coordenador->email : "" ?>">
		<br><br>

		<label>Login</label>
		<input type="text" name="login" required value="<?= isset($coordenador) ? $coordenador->login : "" ?>">
		<br><br>

		<?php if(!isset($coordenador)){ ?>
			<label>Senha</label>
			<input type="password" name="senha" required >
			<br><br>
		<?php } ?>

		
		<input type="hidden" name="acao" value="<?= isset($coordenador) ? "editar-coordenador" : "cadastrar-coordenador" ?>">

		<?php if(isset($coordenador)){ ?>
			<input type="hidden" name="id" value="<?= $coordenador->id ?>">
			<input type="hidden" name="email_old" value="<?= $coordenador->email ?>">
		<?php } ?>

		<button class="button"><?= isset($coordenador) ? "Salvar Alterações" : "Cadastrar" ?></button>
	</form>
</div>

<script type="text/javascript" src="../assets/js/jquery-3.3.1.js"></script>
<script type="text/javascript" src="../assets/js/maskedinput.js"></script>

<script type="text/javascript">
	$(function($){
		$(".cpf").mask("999.999.999-99");
	});
</script>

<?php include_once '../templates/includes/footer.php'; ?>