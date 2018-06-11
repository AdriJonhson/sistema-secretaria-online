<?php 
include_once '../../app/connection/Connection.php';
include_once '../../app/funcoes.php';
include_once '../../app/models/Curso.php';

	//Não permite que usário entrem na página sem fazer login
include_once '../templates/includes/header.php'; 

$permissoes = ['admin', 'professor', 'coordenador'];

verificarAcesso($permissoes);

$cursos = listarCursos();
?>

<h1>Novo Aluno</h1>

<form method="POST" action="../../app/routes.php">

	<fieldset>
		<legend><b>Dados Pessoais</b></legend>
		<br>
		<label>Nome Completo</label>
		<input type="text" name="nome" placeholder="Nome do Aluno" required /> <br><br>

		<label>RG</label>
		<input type="text" name="rg" placeholder="RG" /> <br><br>

		<label>CPF</label>
		<input type="text" name="cpf" placeholder="CPF" /> <br><br>

		<label>NIS</label>
		<input type="text" name="nis" placeholder="NIS" /> <br><br>

		<label>Data de Nascimento</label>
		<input type="date" name="nascimento" placeholder="Data de Nascimento" required/> <br><br>

		<label>Naturalidade</label>
		<input type="text" name="naturalidade" placeholder="Naturalidade" required/> <br><br>


		<label>Telefone</label>
		<input type="text" name="telefone" placeholder="Telefone Fixo" /> <br><br>


		<label>Celular</label>
		<input type="text" name="celular" placeholder="Celular" /> <br><br>
	</fieldset>

	<fieldset>
		<legend><b>Endereço</b></legend>
		<br>
		<label>CEP</label>
		<input type="text" name="cep" placeholder="CEP" required onblur="pesquisacep(this.value);"> <br><br>

		<label>Rua</label>
		<input type="text" name="rua" id="rua" readonly>

		<label>Bairro</label>
		<input type="text" name="bairro" id="bairro" readonly>

		<label>Cidade</label>
		<input type="text" name="cidade" id="cidade" readonly>

		<label>Estado</label>
		<input type="text" name="estado" id="uf" readonly> <br><br>

		<label>Número</label>
		<input type="text" name="num">

		<label>Complemento</label>
		<input type="text" name="complemento"> <br><br>
	</fieldset>

	<fieldset>
		<legend><b>Complementos</b></legend>

		<label>Medicamento</label>
		<input type="text" name="medicamento" placeholder="Medicamento"> <br><br>

		<label>Opção de Medicamento</label>
		<input type="text" name="opc_medicamento" placeholder="Opção de Medicamento"> <br><br>

		<label>Alguma Observação</label>
		<textarea name="obsevacao" placeholder="Obeservações"></textarea>

	</fieldset>


	<fieldset>
		<legend><b>Dados Escolares</b></legend>
		<br>

		<label>Escola de Origem</label>
		<input type="text" name="origem" required placeholder="Escola de Origem"> <br><br>

		<label>Matrícula</label>
		<input type="text" name="matricula" id="matricula" readonly> <br><br>

		<label>Curso</label>
		<select name="curso" required>
			<option value="">Selecione o Curso</option>
			<?php foreach($cursos as $curso){ ?>
				<option value="<?= $curso['id'] ?>"><?= $curso['nome'] ?></option>
			<?php } ?>
		</select>

		<label>Turno</label>
		<select name="tuno" required>
			<option value="">Selecione o turno</option>
			<option value="Manhã">Manhã</option>
			<option value="Tarde">Tarde</option>
			<option value="Integral">Integral</option>
		</select>

	</fieldset>

	<fieldset>
		<legend><b>Dados para Acessar Boletim Online</b></legend>
		<br>

		<label>E-Mail</label>
		<input type="email" name="email" placeholder="E-Mail"> <br><br>

		<label>Login</label>
		<input type="text" name="login" placeholder="Login"> <br><br>

		<label>Senha</label>
		<input type="password" name="senha" placeholder="Senha">
	</fieldset>

	<input type="hidden" name="acao" value="cadastrar-aluno">
	<button type="submit">Salvar</button>

</form>

<script type="text/javascript" src="../assets/js/jquery-3.3.1.js"></script>
<script type="text/javascript" src="../assets/js/viacep.js"></script>

<script>
	
	


</script>
<?php include_once '../templates/includes/footer.php'; ?>