<?php 
include_once '../../app/connection/Connection.php';
include_once '../../app/funcoes.php';
include_once '../../app/models/Curso.php';
include_once '../../app/models/Aluno.php';

	//Não permite que usário entrem na página sem fazer login
include_once '../templates/includes/header.php'; 

$permissoes = ['admin', 'professor', 'coordenador'];

verificarAcesso($permissoes);

$cursos = listarCursos();

$id_aluno = filter_input(INPUT_GET, 'id');

if(isset($id_aluno)){
	$aluno = buscarAluno($id_aluno);
}

?>

<h1>Dados Aluno</h1>

<fieldset>
	<legend><b>Dados Pessoais</b></legend>
	<br>
	<label>Nome Completo</label>
	<input type="text" name="nome" placeholder="Nome do Aluno" value="<?= isset($id_aluno) ? $aluno->nome : '' ?>" disabled /> <br><br>

	<label>RG</label>
	<input type="text" name="rg" placeholder="RG" value="<?= isset($id_aluno) ? $aluno->rg : '' ?>" disabled/> <br><br>

	<label>CPF</label>
	<input type="text" name="cpf" placeholder="CPF" value="<?= isset($id_aluno) ? $aluno->cpf : '' ?>" disabled/> <br><br>

	<label>NIS</label>
	<input type="text" name="nis" placeholder="NIS" value="<?= isset($id_aluno) ? $aluno->nis : '' ?>" disabled/> <br><br>

	<label>Data de Nascimento</label>
	<input type="date" name="nascimento" placeholder="Data de Nascimento" disabled value="<?= isset($id_aluno) ? $aluno->data_nascimento : '' ?>"/> <br><br>

	<label>Naturalidade</label>
	<input type="text" name="naturalidade" placeholder="Naturalidade" disabled value="<?= isset($id_aluno) ? $aluno->naturalidade : '' ?>"/> <br><br>

	<label>Telefone</label>
	<input type="text" name="telefone" placeholder="Telefone Fixo" value="<?= isset($id_aluno) ? $aluno->telefone : '' ?>"/> <br><br>


	<label>Celular</label>
	<input type="text" name="celular" placeholder="Celular" value="<?= isset($id_aluno) ? $aluno->celular : '' ?>"/> <br><br>
</fieldset>

<fieldset>
	<legend><b>Endereço</b></legend>
	<br>
	<label>CEP</label>
	<input type="text" name="cep" id="cep" placeholder="CEP" onblur="pesquisacep(this.value);" value="<?= isset($id_aluno) ? $aluno->cep : '' ?>"> <br><br>

	<label>Rua</label>
	<input type="text" name="rua" id="rua" readonly disabled>

	<label>Bairro</label>
	<input type="text" name="bairro" id="bairro" readonly disabled>

	<label>Cidade</label>
	<input type="text" name="cidade" id="cidade" readonly disabled>

	<label>Estado</label>
	<input type="text" name="estado" id="uf" readonly disabled> <br><br>

	<label>Complemento</label>
	<input type="text" name="complemento" value="<?= isset($id_aluno) ? $aluno->complemento_endereco : '' ?>" disabled> <br><br>
</fieldset>

<fieldset>
	<legend><b>Complementos</b></legend>

	<label>Medicamento</label>
	<input type="radio" name="medicamento" value="Sim" <?= isset($id_aluno) && $aluno->medicamento == "Sim" ? "checked" : '' ?> disabled>Sim 
	<input type="radio" name="medicamento" value="Nao" <?= isset($id_aluno) && $aluno->medicamento == "Nao" ? "checked" : '' ?> disabled>Não

	<br><br>

	<label>Opção de Medicamento</label>
	<input type="text" name="opc_medicamento" disabled placeholder="Opção de Medicamento" value="<?= isset($id_aluno) ? $aluno->opcao_medicamento : '' ?>"> <br><br>

	<label>Alguma Observação</label>
	<textarea name="observacao" placeholder="Obeservações" disabled>
		<?= isset($id_aluno) ? $aluno->comentario : '' ?>
	</textarea>

</fieldset>


<fieldset>
	<legend><b>Dados Escolares</b></legend>
	<br>

	<label>Escola de Origem</label>
	<input type="text" name="origem" disabled placeholder="Escola de Origem" value="<?= isset($id_aluno) ? $aluno->escola_origem : '' ?>"> <br><br>

	<label>Matrícula</label>
	<input type="text" name="matricula" id="matricula" value="<?= isset($id_aluno) ? $aluno->matricula : '' ?>"> <br><br>

	<label>Curso</label>
	<select name="curso" disabled>
		<option value="">Selecione o Curso</option>
		<?php 
		foreach($cursos as $curso){ 

			if($curso['id'] == $aluno->id_curso){
				?>
				<option value="<?= $curso['id'] ?>" selected><?= $curso['nome'] ?></option>

			<?php }else{ ?>

				<option value="<?= $curso['id'] ?>"><?= $curso['nome'] ?></option>

			<?php } } ?>
		</select>

		<label>Turno</label>
		<select name="turno" disabled>
			<option value="Integral">Integral</option>
			<option value="Manhã">Manhã</option>
			<option value="Tarde">Tarde</option>
			<option value="Integral">Integral</option>
		</select><br><br>

		<label>Número da Chamada</label>
		<input type="text" value="<?= isset($id_aluno) ? $aluno->num_chamada : '' ?>" disabled>


	</fieldset>

	<fieldset>
		<legend><b>Dados para Acessar Boletim Online</b></legend>
		<br>

		<label>E-Mail</label>
		<input type="email" name="email" placeholder="E-Mail" value="<?= isset($id_aluno) ? $aluno->email : '' ?>" disabled> <br><br>

		<label>Login</label>
		<input type="text" name="login" placeholder="Login" value="<?= isset($id_aluno) ? $aluno->login : '' ?>" disabled> <br><br>

	</fieldset>


<script type="text/javascript" src="../assets/js/jquery-3.3.1.js"></script>
<script type="text/javascript" src="../assets/js/viacep.js"></script>

<script type="text/javascript" >
	
	var campo_cep = document.getElementById("cep").value;

	window.onload = initPage;

	function initPage(){
		pesquisacep(campo_cep);
	}
	
</script>
<?php include_once '../templates/includes/footer.php'; ?>