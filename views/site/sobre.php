<?php include_once '../templates/includes/header.php'; ?>
    
    <h1>Sobre</h1>
    <a href="home.php">Voltar</a>
    <h2>Deixe alguma sugestão de como podemos melhorar</h2>    
    <form method="POST" action="../../app/routes.php">

    	<label>Nome: </label>
    	<input type="text" name="nome">
    	<br><br>

    	<label>E-Mail: </label>
    	<input type="email" name="email">
    	<br><br>

    	<label>Seu Comentário: </label>
    	<textarea name="comentario" rows="10" cols="25">    		
    	</textarea>
    	<br><br>

    	<input type="hidden" name="acao" value="salvar-comentario">
    	<button type="submit">Enviar</button>

    </form>

<?php include_once '../templates/includes/footer.php'; ?>