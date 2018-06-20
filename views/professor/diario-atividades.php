<?php 
	include_once '../../app/connection/Connection.php';
    include_once '../../app/models/Atividade.php';
    include_once '../../app/models/Curso.php';
    include_once '../../app/funcoes.php';

	include_once '../templates/includes/header.php'; 
    
    //Verifica se o usuário está logado e se possui o nível de acesso necessário
    $permissoes = ['admin', 'professor', 'coordenador'];
    verificarAcesso($permissoes);

    $atividades = listarAtividades($_SESSION['usuario_logado']['dados']->id);
        
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


<div class="item9-1">Diário</div>

<p></p>
<div class="item9-2">
    <table border="5" width="100%" class="tablet">

        <thead>
            <tr>
                <th>Curso</th>
                <th>Data da Entrega</th>
                <th>Situação</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            <?php 
            if(!empty($atividades)){
                foreach($atividades as $atividade){ 
                    ?>

                    <tr>
                        <td align="center"><?= traduzirId($atividade['id_curso']) ?></td>
                        <td align="center"><?= tratarData($atividade['data_entrega']) ?></td>
                        <td align="center"><?= $atividade['status'] ?></td>
                        <td align="center"><a href="ver-cadastrar-atividade.php?id=<?= $atividade['id'] ?>">Ver Mais</a></td>
                    </tr>

                <?php } }else{  ?>

                    <tr>
                        <th colspan="3" align="center">Nenhuma Atividade Cadastrada</th>
                    </tr>

                <?php } ?>   
            </tbody>
    
            <tfoot>
                <tr>
                    <th colspan="4">
                        <a href="ver-atividades.php">Voltar</a>
                    </th>
                </tr>
            </tfoot>

        </table>
    </div>

<?php include_once '../templates/includes/footer.php'; ?>