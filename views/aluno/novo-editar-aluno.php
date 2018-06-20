<?php 
include_once '../../app/connection/Connection.php';
include_once '../../app/funcoes.php';
include_once '../../app/models/Curso.php';
include_once '../../app/models/Aluno.php';

	//Não permite que usário entrem na página sem fazer login
include_once '../templates/includes/header.php'; 

$permissoes = ['admin', 'coordenador'];

verificarAcesso($permissoes);

$cursos = listarCursos();

$id_aluno = filter_input(INPUT_GET, 'id');

if(isset($id_aluno)){
	$aluno = buscarAluno($id_aluno);
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
	<?= isset($id_aluno) ? "Editando" : "Novo Aluno"  ?>
</div>

<div class="item9-2">
	<form method="POST" action="../../app/routes.php">

		<fieldset>
			<legend><b>Dados Pessoais</b></legend>
			<br>
			<label>Nome Completo</label>
			<input class="input" type="text" name="nome" placeholder="Nome do Aluno" value="<?= isset($id_aluno) ? $aluno->nome : '' ?>" required /> <br><br>

			<label>RG</label>
			<input class="input" type="text" name="rg" id="rg" placeholder="RG" value="<?= isset($id_aluno) ? $aluno->rg : '' ?>"/> <br><br>

			<label>CPF</label>
			<input class="input" type="text" name="cpf" id="cpf" placeholder="CPF" value="<?= isset($id_aluno) ? $aluno->cpf : '' ?>"/> <br><br>

			<label>NIS</label>
			<input class="input" type="text" name="nis" placeholder="NIS" value="<?= isset($id_aluno) ? $aluno->nis : '' ?>"/> <br><br>

			<label>Data de Nascimento</label>
			<input class="input" type="date" name="nascimento" placeholder="Data de Nascimento" required value="<?= isset($id_aluno) ? $aluno->data_nascimento : '' ?>"/> <br><br>

			<label>Naturalidade</label>
			<input class="input" type="text" name="naturalidade" placeholder="Naturalidade" required value="<?= isset($id_aluno) ? $aluno->naturalidade : '' ?>"/> <br><br>

			<label>Telefone</label>
			<input class="input" type="text" name="telefone" placeholder="Telefone Fixo" value="<?= isset($id_aluno) ? $aluno->telefone : '' ?>"/> <br><br>


			<label>Celular</label>
			<input class="input" type="text" name="celular" placeholder="Celular" value="<?= isset($id_aluno) ? $aluno->celular : '' ?>"/> <br><br>
		</fieldset>

		<fieldset>
			<legend><b>Endereço</b></legend>
			<br>
			<label>CEP</label>
			<input class="input" type="text" name="cep" id="cep" placeholder="CEP" required onblur="pesquisacep(this.value);" value="<?= isset($id_aluno) ? $aluno->cep : '' ?>"> <br><br>

			<label>Rua</label>
			<input class="input" type="text" name="rua" id="rua" readonly>

			<label>Bairro</label>
			<input class="input" type="text" name="bairro" id="bairro" readonly>

			<label>Cidade</label>
			<input class="input" type="text" name="cidade" id="cidade" readonly>

			<label>Estado</label>
			<input class="input" type="text" name="estado" id="uf" readonly> <br><br>

			<label>Complemento</label>
			<input class="input" type="text" name="complemento" value="<?= isset($id_aluno) ? $aluno->complemento_endereco : '' ?>"> <br><br>
		</fieldset>

		<fieldset>
			<legend><b>Complementos</b></legend>

			<label>Medicamento</label>
			<input class="input" type="radio" name="medicamento" value="Sim" onclick="habilitarCampo()"
			<?= isset($id_aluno) && $aluno->medicamento == "Sim" ? "checked" : '' ?>>Sim 

			<input class="input" type="radio" name="medicamento" value="Nao" onclick="desabilitarCampo()"
			<?= isset($id_aluno) && $aluno->medicamento == "Nao" ? "checked" : '' ?>>Não

			<br><br>

			<label>Opção de Medicamento</label>
			<input class="input" type="text" name="opc_medicamento" id="opc_medic" placeholder="Opção de Medicamento" value="<?= isset($id_aluno) ? $aluno->opcao_medicamento : '' ?>"> <br><br>

			<label>Alguma Observação</label>
			<textarea name="observacao" placeholder="Obeservações">
				<?= isset($id_aluno) ? $aluno->comentario : '' ?>
			</textarea>

		</fieldset>


		<fieldset>
			<legend><b>Dados Escolares</b></legend>
			<br>

			<label>Escola de Origem</label>
			<input class="input" type="text" name="origem" required placeholder="Escola de Origem" value="<?= isset($id_aluno) ? $aluno->escola_origem : '' ?>"> <br><br>

			<label>Matrícula</label>
			<input class="input" type="text" name="matricula" id="matricula" value="<?= isset($id_aluno) ? $aluno->matricula : '' ?>" readonly> <br><br>

			<label>Curso</label>
			<select name="curso" required>
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
				</select>

			</fieldset>

			<fieldset>
				<legend><b>Dados para Acessar Boletim Online</b></legend>
				<br>

				<label>E-Mail</label>
				<input class="input" type="email" name="email" placeholder="E-Mail" value="<?= isset($id_aluno) ? $aluno->email : '' ?>"> <br><br>

				<label>Login</label>
				<input class="input" type="text" name="login" placeholder="Login" value="<?= isset($id_aluno) ? $aluno->login : '' ?>"> <br><br>


				<?php 
				if(!isset($id_aluno)){
					?>
					<label>Senha</label>
					<input class="input" type="password" name="senha" placeholder="Senha" value="<?= isset($id_aluno) ? $aluno->senha : '' ?>">
				<?php } ?>
			</fieldset>

			<?php 
			if(isset($id_aluno)){
				?>
				<input type="hidden" name="id_aluno" value="<?= $id_aluno ?>">
				<input type="hidden" name="email_old" value="<?= $aluno->email ?>">
			<?php } ?>

			<p></p>

			<input type="hidden" name="acao" id="acao" value="<?= isset($id_aluno) ? 'editar-aluno' : 'cadastrar-aluno' ?>">
			<button type="submit" class="button"><?= isset($id_aluno) ? "Salvar Alterações" : "Concluir" ?></button>

		</form>
	</div>
<script type="text/javascript" src="../assets/js/jquery-3.3.1.js"></script>
<script type="text/javascript" src="../assets/js/viacep.js"></script>
<script type="text/javascript" src="../assets/js/maskedinput class="input".js"></script>

<script>
	
	var campo_matricula = document.getElementById("matricula");
	var campo_cep = document.getElementById("cep").value;
	var acao = document.getElementById("acao").value;
	
	window.onload = initPage;

	function gerarMatricula(){
		var matricula = "";

		for(let i = 0; i  < 6; i++){
			matricula += Math.floor(Math.random() * 9 + 1) + "";
		}

		campo_matricula.value = matricula;
	}

	function initPage(){
		pesquisacep(campo_cep);

		if(acao == "cadastrar-aluno"){
			gerarMatricula();
		}
	}

	function desabilitarCampo(){
		document.getElementById("opc_medic").disabled = true;
	}

	function habilitarCampo(){
		document.getElementById("opc_medic").disabled = false;
	}

	$(function($){
		$("#cpf").mask("999.999.999-99");
		$("#rg").mask("99.999.999-9");
		$("#cep").mask("99999-999");
	});

</script>
<?php include_once '../templates/includes/footer.php'; ?>