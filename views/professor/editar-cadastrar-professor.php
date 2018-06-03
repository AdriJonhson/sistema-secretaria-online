<?php 
	include_once '../../app/connection/Connection.php';
	include_once '../../app/models/Professor.php';
	$id_professor = filter_input(INPUT_GET, 'id');

	if(isset($id_professor)){
		$professor = buscar($id_professor);
	}

	//Não permite que usário entrem na página sem fazer login
	include_once '../templates/includes/header.php'; 
	
	if(!isset($_SESSION['usuario_logado']))	
		header("Location: ../../index.php");

?>

<h1><?= isset($id_professor) ? "Editando" : "Novo Professor"  ?></h1>

<form method="POST" action="../../app/routes.php">
	
	<input type="text" name="nome" placeholder="Nome Completo" value="<?= isset($id_professor) ? $professor->nome : ""  ?>"/> <br/><br/>
	
	<input type="text" name="cpf" placeholder="CPF" value="<?= isset($id_professor) ? $professor->cpf : ""  ?>"/> <br/><br/>

	<input type="text" name="materia" placeholder="Matéria que leciona" value="<?= isset($id_professor) ? $professor->materia : ""  ?>"/> <br/><br/>

	<input type="email" name="email" placeholder="E-Mail" value="<?= isset($id_professor) ? $professor->email : ""  ?>"/> <br/><br/>

	<input type="text" name="login" placeholder="Login" value="<?= isset($id_professor) ? $professor->login : ""  ?>"/> <br/><br/>

	<input type="password" name="senha" placeholder="Senha" value="<?= isset($id_professor) ? $professor->senha : ""  ?>"/> <br/><br/>

	<input type="hidden" name="id" value="<?= isset($id_professor) ? $professor->id : ""  ?>">
	
	<input type="hidden" name="acao" value="<?= isset($id_professor) ? "editar-professor" : "cadastrar-professor"  ?>">

	<button type="submit"><?= isset($id_professor) ? "Salvar Dados" : "Cadastrar"  ?></button>

</form>

<?php include_once '../templates/includes/footer.php'; ?>