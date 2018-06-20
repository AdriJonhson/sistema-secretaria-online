<?php 
include_once '../../app/connection/Connection.php';
include_once '../../app/models/Empresa.php';
include_once '../../app/funcoes.php';

	//Não permite que usário entrem na página sem fazer login
include_once '../templates/includes/header.php';

$id_empresa = filter_input(INPUT_GET, 'id');

	if(isset($id_empresa)){
		$empresa = buscar_empresa($id_empresa);
	} 

$permissoes = ['admin'];

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
<?= isset($id_empresa) ? "Editando" : "Nova empresa"  ?>
</div>

<p></p>

<div class="item9-2">
	<form method="POST" action="../../app/routes.php">

		<fieldset>
			<legend align="center"><b>Dados da empresa</b></legend>
			<br>
			<label>Instituição</label>
			<input type="text" class="input" name="instituicao" placeholder="Instituição" value="<?= isset($id_empresa) ? $empresa->instituicao : ""  ?>" required/> <br><br>

			<label>Razão social</label>
			<input type="text" class="input" name="razao_social" placeholder="Razão social" value="<?= isset($id_empresa) ? $empresa->razao_social : ""  ?>" /> <br><br>

			<label>Nome fantasia</label>
			<input type="text" class="input" name="nome_fantasia" placeholder="Nome Fantasia" value="<?= isset($id_empresa) ? $empresa->nome_fantasia : ""  ?>" /> <br><br>

			<label>CNPJ</label>
			<input type="text" class="input" name="cnpj" placeholder="CNPJ" value="<?= isset($id_empresa) ? $empresa->cnpj : ""  ?>" /> <br><br>

			<label>Especificação</label>
			<input type="text" class="input" name="especificacao" placeholder="Especificação" value="<?= isset($id_empresa) ? $empresa->especificacao : ""  ?>" required/> <br><br>

			<label>E-mail</label>
			<input type="email" class="input" name="email" placeholder="example@hefestus.com.br" value="<?= isset($id_empresa) ? $empresa->email : ""  ?>" required/> <br><br>

			<label>Telefone</label>
			<input type="text" class="input" name="telefone" placeholder="(XX) 9XXXX-XXXX" value="<?= isset($id_empresa) ? $empresa->telefone : ""  ?>" required/> <br><br>

			<label>Nome supervisor</label>
			<input type="text" class="input" name="nome_supervisor" placeholder="Nome supervisor" value="<?= isset($id_empresa) ? $empresa->nome_supervisor : ""  ?>" /> <br><br>

			<label>E-mail do supervisor</label>
			<input type="email" class="input" name="email_supervisor" placeholder="example@hefestus.com.br" value="<?= isset($id_empresa) ? $empresa->email_supervisor : ""  ?>" /> <br><br>

			<label>Observações</label>
			<input type="text" class="input" name="observacoes" placeholder="Observações" value="<?= isset($id_empresa) ? $empresa->observacoes : ""  ?>" /> <br><br>

			<label>Número de vagas</label>
			<input type="number" name="numero_vagas" value="<?= isset($id_empresa) ? $empresa->numero_vagas : ""  ?>" /> <br><br>

			<label>Escola beneficiada</label>
			<input type="text" class="input" name="escola_beneficiada" placeholder="Escola beneficiada" value="<?= isset($id_empresa) ? $empresa->escola_beneficiada : ""  ?>" /> <br><br>

			<label>Município da escola</label>
			<input type="text" class="input" name="municipio_escola" placeholder="Município da escola" value="<?= isset($id_empresa) ? $empresa->municipio_escola : ""  ?>" /> <br><br>

			<label>Nome do representante</label>
			<input type="text" class="input" name="nome_representante" placeholder="Nome do representante" value="<?= isset($id_empresa) ? $empresa->nome_representante : ""  ?>" /> <br><br>

			<label>E-mail do representante</label>
			<input type="text" class="input" name="email_representante" placeholder="exemplo@hefestus.com.br" value="<?= isset($id_empresa) ? $empresa->email_representante : ""  ?>" /> <br><br>

			<label>CPF do representante</label>
			<input type="text" class="input" name="cpf_representante" placeholder="CPF do representante" value="<?= isset($id_empresa) ? $empresa->cpf_representante : ""  ?>" /> <br><br>

			<label>RG do representante</label>
			<input type="text" class="input" name="rg_representante" placeholder="RG do representante" value="<?= isset($id_empresa) ? $empresa->rg_representante : ""  ?>" /> <br><br>

		</fieldset>

		<fieldset>
			<legend align="center"><b>Endereço</b></legend>
			<br>
			<label>CEP</label>
			<input type="text" class="input" name="cep" placeholder="CEP" required onblur="pesquisacep(this.value);" value="<?= isset($id_empresa) ? $empresa->cep : ""  ?>"> <br><br>

			<label>Rua</label>
			<input type="text" class="input" name="rua" id="rua" readonly>

			<label>Bairro</label>
			<input type="text" class="input" name="bairro" id="bairro" readonly>

			<label>Cidade</label>
			<input type="text" class="input" name="cidade" id="cidade" readonly>

			<label>Estado</label>
			<input type="text" class="input" name="estado" id="uf" readonly> <br><br>

			<label>Número</label>
			<input type="text" class="input" name="numero" value="<?= isset($id_empresa) ? $empresa->numero : ""  ?>">

			<label>Complemento</label>
			<input type="text" class="input" name="complemento" value="<?= isset($id_empresa) ? $empresa->complemento : ""  ?>"> <br><br>
		</fieldset>

		<!-- <br><input type="hidden" name="acao" value="cadastrar-empresa"> -->
		<!-- <button type="submit">Salvar</button> -->

		<input type="hidden" name="acao" value="<?= isset($id_empresa) ? "editar-empresa" : "cadastrar-empresa"  ?>">

		<input type="hidden" name="id_empresa" value="<?= $id_empresa ?>">

		<button type="submit" class="button"><?= isset($id_empresa) ? "Salvar Dados" : "Cadastrar"  ?></button>

	</form>
</div>

<script type="text/javascript" src="../assets/js/jquery-3.3.1.js"></script>
<script type="text/javascript" src="../assets/js/viacep.js"></script>

<script>
	
	


</script>
<?php include_once '../templates/includes/footer.php'; ?>