<?php 
	include_once '../../app/connection/Connection.php';
    include_once '../../app/models/Atividade.php';
    include_once '../../app/models/Curso.php';
    include_once '../../app/funcoes.php';

	include_once '../templates/includes/header.php'; 
    
    //Verifica se o usuário está logado e se possui o nível de acesso necessário
    if(!isset($_SESSION['usuario_logado']) && $_SESSION['usuario_logado']['nv_acesso'] != "professor")	
		header("Location: ../../index.php");

    $atividades = listarAtividades($_SESSION['usuario_logado']['dados']->id);
        
?>

<h1>Atividades</h1>

<table border="1" cellspacing="0" width="100%">

    <thead>
        <tr>
            <th>Curso</th>
            <th>Data da Entrega</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($atividades as $atividade){ ?>
            
            <tr>
                <td align="center"><?= traduzirId($atividade['id_curso']) ?></td>
                <td align="center"><?= tratarData($atividade['data_entrega']) ?></td>
                <td align="center"><a href="#">Encerrar</a> | <a href="ver-cadastrar-atividade.php?id=<?= $atividade['id'] ?>">Ver Mais</a></td>
            </tr>

        <?php } ?>
    </tbody>

    <tfoot>
        <tr>
            <td align="center" colspan="3"><a href="ver-cadastrar-atividade.php">Lançar Atividade</a></td>
        </tr>
    </tfoot>


</table>


<?php include_once '../templates/includes/footer.php'; ?>