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

<h1><?= isset($coordenador) ? "Editando..." : "Novo Coordenador" ?></h1>

<form method="POST" action="../../app/routes.php">
	<label>Nome</label>
	<input type="text" name="nome" required value="<?= isset($coordenador) ? $coordenador->nome : "" ?>">
	<br><br>

	<label>CPF</label>
	<input type="text" name="cpf" required value="<?= isset($coordenador) ? $coordenador->cpf : "" ?>">
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

	<button><?= isset($coordenador) ? "Salvar Alterações" : "Cadastrar" ?></button>
</form>

<?php include_once '../templates/includes/footer.php'; ?>