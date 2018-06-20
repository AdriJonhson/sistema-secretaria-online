<?php 
	include_once '../../app/connection/Connection.php';
	include_once '../../app/funcoes.php';
	include_once '../templates/includes/header.php'; 
	include_once '../../app/models/Responsavel.php';

	$permissoes = ['admin', 'coordenador'];

	verificarAcesso($permissoes);

	$id_responsavel = filter_input(INPUT_GET, 'id');

	if(isset($id_responsavel)){
		$responsavel = buscarResponsavel($id_responsavel);
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
<?= isset($responsavel) ? "Editando..." : "Cadastro Responsável" ?>
</div>

<p></p>
<div class="item9-2">
	<form method="POST" action="../../app/routes.php">

		<label>Nome Mãe</label>
		<input type="text" class="input" name="nome_mae"  value="<?= isset($responsavel) ? $responsavel->nome_mae : "" ?>">
		<br><br>

		<label>CPF Mãe</label>
		<input type="text" name="cpf_mae" class="cpf input" value="<?= isset($responsavel) ? $responsavel->cpf_mae : "" ?>">
		<br><br>

		<label>RG Mãe</label>
		<input type="text" name="rg_mae" class="rg input" value="<?= isset($responsavel) ? $responsavel->rg_mae : "" ?>">
		<br><br>

		<label>Nome Pai</label>
		<input type="text" class="input" name="nome_pai"  value="<?= isset($responsavel) ? $responsavel->nome_pai : "" ?>">
		<br><br>

		<label>CPF Pai</label>
		<input type="text" name="cpf_pai" class="cpf input" value="<?= isset($responsavel) ? $responsavel->cpf_pai : "" ?>">
		<br><br>

		<label>RG Pai</label>
		<input type="text" name="rg_pai" class="rg input" value="<?= isset($responsavel) ? $responsavel->rg_pai : "" ?>">
		<br><br>

		<b><i>Dados Usados Para Acessar a Secretária Online</i></b>
		<br><br>

		<label>E-Mail</label>
		<input type="email"  class="input" name="email" required value="<?= isset($responsavel) ? $responsavel->email : "" ?>">
		<br><br>

		<label>Login</label>
		<input type="text" class="input" name="login" required value="<?= isset($responsavel) ? $responsavel->login : "" ?>">
		<br><br>

		<?php if(!isset($responsavel)){ ?>
			<label>Senha</label>
			<input type="password" name="senha" class="input">
			<br><br>
		<?php } ?>

		<?php if(isset($responsavel)){ ?>
			<input type="hidden" name="email-old" value="<?= $responsavel->email ?>">
			<input type="hidden" name="id" value="<?= $responsavel->id ?>">
		<?php } ?>

		<input type="hidden" name="acao" value="<?= isset($responsavel) ? "editar-responsavel" : "cadastrar-responsavel" ?>">
		<button type="submit" class="button"><?= isset($responsavel) ? "Salvar Alterações" : "Cadastrar" ?></button>

	</form>
</div>
<script type="text/javascript" src="../assets/js/jquery-3.3.1.js"></script>
<script type="text/javascript" src="../assets/js/maskedinput.js"></script>

<script type="text/javascript">
	$(function($){
		$(".cpf").mask("999.999.999-99");
		$(".rg").mask("99.999.999-9");
	});
</script>

<?php include_once '../templates/includes/footer.php'; ?>