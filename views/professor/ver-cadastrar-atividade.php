<?php 
	include_once '../../app/connection/Connection.php';
	include_once '../../app/models/Curso.php';
	include_once '../../app/models/Atividade.php';
    
    $cursos = listarCursos();

	//Não permite que usário entrem na página sem fazer login
	include_once '../templates/includes/header.php'; 
	
	if(!isset($_SESSION['usuario_logado']) && $_SESSION['usuario_logado']['nv_acesso'] != "professor")	
        header("Location: ../../index.php");
        
    $id = filter_input(INPUT_GET, 'id');
    $title = "";

    if(isset($id)){
        $atividade = buscarAtividade($id);
        $title = "Atividade";
    }else{
        $title = "Nova Atividade";
    }

?>

<h1><?= $title ?></h1>


<form action="../../app/routes.php" method="POST">

    <label for="">Curso: </label>
    <select name="curso_id" required  <?= isset($atividade) ? "disabled" : "" ?>>
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
    <textarea name="conteudo" id="" cols="30" rows="10" <?= isset($atividade) ? "disabled" : "" ?>><?= isset($atividade) ? $atividade['conteudo'] : "" ?></textarea>

    </br></br>


    <label for="">Data de entrega</label>
    <input type="date" name="data_entrega" value="<?= isset($atividade) ? $atividade['data_entrega'] : "" ?>"  <?= isset($atividade) ? "disabled" : "" ?>>

    </br></br>

    <input type="hidden" name="acao" value="cadastrar-atividade">
    <input type="hidden" name="professor_id" value="<?= $_SESSION['usuario_logado']['dados']->id ?>">
    
    <?php if(!isset($atividade)){ ?>
        <button type="submit">Concluir</button>
    <?php }else{ ?>
        <a href="ver-atividades.php">Voltar</a>
    <?php } ?>
</form>



<?php include_once '../templates/includes/footer.php'; ?>