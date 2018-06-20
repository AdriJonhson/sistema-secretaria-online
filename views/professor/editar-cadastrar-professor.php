<?php 
	include_once '../../app/connection/Connection.php';
	include_once '../../app/models/Professor.php';
	include_once '../../app/funcoes.php';
	$id_professor = filter_input(INPUT_GET, 'id');

	if(isset($id_professor)){
		$professor = buscar($id_professor);
	}

	//Não permite que usário entrem na página sem fazer login
	include_once '../templates/includes/header.php'; 
	
	$permissoes = ['admin', 'professor', 'coordenador'];
    verificarAcesso($permissoes);

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
<?= isset($id_professor) ? "Editando" : "Novo Professor"  ?>
</div>

<div class="item9-2">
	<form method="POST" action="../../app/routes.php">

		<input type="text" class="input" name="nome" placeholder="Nome Completo" value="<?= isset($id_professor) ? $professor->nome : ""  ?>"/> <br/><br/>

		<input type="text" class="input" name="cpf" class="cpf" placeholder="CPF" value="<?= isset($id_professor) ? $professor->cpf : ""  ?>"/> <br/><br/>

		<input type="text" class="input" name="materia" placeholder="Matéria que leciona" value="<?= isset($id_professor) ? $professor->materia : ""  ?>"/> <br/><br/>

		<input type="email" class="input" name="email" placeholder="E-Mail" value="<?= isset($id_professor) ? $professor->email : ""  ?>"/> <br/><br/>

		<input type="text" class="input" name="login" placeholder="Login" value="<?= isset($id_professor) ? $professor->login : ""  ?>"/> <br/><br/>

		<?php if(!isset($id_professor)){ ?>
			<input type="password" class="input" name="senha" placeholder="Senha" value="<?= isset($id_professor) ? $professor->senha : ""  ?>"/> <br/><br/>
		<?php } ?>

		<input type="hidden" class="input" name="id" value="<?= isset($id_professor) ? $professor->id : ""  ?>">

		<input type="hidden" class="input" name="acao" value="<?= isset($id_professor) ? "editar-professor" : "cadastrar-professor"  ?>">

		<button class="button" type="submit"><?= isset($id_professor) ? "Salvar Dados" : "Cadastrar"  ?></button>

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