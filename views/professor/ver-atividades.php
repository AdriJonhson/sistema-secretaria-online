<?php 
	include_once '../../app/connection/Connection.php';
    include_once '../../app/models/Atividade.php';
    include_once '../../app/models/Curso.php';
    include_once '../../app/funcoes.php';

	include_once '../templates/includes/header.php'; 
    
    //Verifica se o usuário está logado e se possui o nível de acesso necessário
    $permissoes = ['admin', 'professor', 'coordenador'];
    verificarAcesso($permissoes);

    $atividades = listarAtividadesAtivas($_SESSION['usuario_logado']['dados']->id);
        
?>

<h1>Atividades Em Andamento</h1>

<a href="diario-atividades.php">Ver Diário</a>

<p></p>

<table border="1" cellspacing="0" width="100%">

    <thead>
        <tr>
            <th>Curso</th>
            <th>Data da Entrega</th>
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
                    <td align="center"><a href="#" onclick="encerrarAtividade()">Encerrar</a> | <a href="ver-cadastrar-atividade.php?id=<?= $atividade['id'] ?>">Ver Mais</a></td>
                </tr>

                <form method="POST" action="../../app/routes.php" id="formEncerrar">
                    <input type="hidden" name="acao" value="encerrar-atividade">
                    <input type="hidden" name="id" value="<?= $atividade['id'] ?>">
                </form>

        <?php } }else{  ?>
            
                <tr>
                    <th colspan="3" align="center">Nenhuma Atividade Cadastrada</th>
                </tr>

         <?php } ?>   
    </tbody>

    <tfoot>
        <tr>
            <td align="center" colspan="3"><a href="ver-cadastrar-atividade.php">Lançar Atividade</a></td>
        </tr>
    </tfoot>


</table>


<script type="text/javascript">
    
    function encerrarAtividade()
    {
        var go = confirm("Deseja realmente encerrar essa atividade?");

        if(go){ 
            document.getElementById("formEncerrar").submit();
        }
    }


</script>

<?php include_once '../templates/includes/footer.php'; ?>