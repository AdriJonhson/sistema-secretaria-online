<?php 
	include_once '../../app/connection/Connection.php';
	include_once '../../app/models/Curso.php';
	include_once '../../app/models/Atividade.php';
    include_once '../../app/funcoes.php';
    
    $cursos = listarCursos();

	//Não permite que usário entrem na página sem fazer login
	include_once '../templates/includes/header.php'; 
	
    $permissoes = ['admin', 'professor', 'coordenador'];
    verificarAcesso($permissoes);
        
    $id = filter_input(INPUT_GET, 'id');

    if(isset($id)){
        $atividade = buscarAtividade($id);
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
    <?= isset($id) ? "Atividade - ".$_SESSION['usuario_logado']['dados']->materia : "Nova Atividade" ?>
</div>
<p></p>
<div class="item9-2">
    <form action="../../app/routes.php" method="POST">

        <label for="">Curso: </label>
        <select name="curso_id" required  <?= isset($atividade) ? "disabled" : "" ?> required>
            <?php 
            foreach($cursos as $curso){ 

                if($curso['id'] == $atividade['id_curso']){
                    ?>
                    <option value="<?= $curso['id'] ?>" selected><?= $curso['nome'] ?></option>

                <?php }else{ ?>

                    <option value="<?= $curso['id'] ?>"><?= $curso['nome'] ?></option>

                <?php } } ?>
            </select>

        </br></br>

        <label for="">Enunciado da Atividade: </label>
        <textarea name="conteudo" id="" cols="30" rows="10" <?= isset($atividade) ? "disabled" : "" ?> required><?= isset($atividade) ? $atividade['conteudo'] : "" ?></textarea>

    </br></br>


    <label for="">Data de entrega</label>
    <input type="date" name="data_entrega" value="<?= isset($atividade) ? $atividade['data_entrega'] : "" ?>"  <?= isset($atividade) ? "disabled" : "" ?> required>

</br></br>

<input type="hidden" name="acao" value="cadastrar-atividade">
<input type="hidden" name="professor_id" value="<?= $_SESSION['usuario_logado']['dados']->id ?>">

<?php if(!isset($atividade)){ ?>
    <button type="submit" class="button">Concluir</button>
<?php }else{ ?>
    <a href="ver-atividades.php">Voltar</a>
<?php } ?>
</form>
</div>


<?php include_once '../templates/includes/footer.php'; ?>