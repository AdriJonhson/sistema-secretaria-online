<?php 

	/*
	*Arquivo que vai possuir funções que podem ser usadas em qualquer parte do sistema, funções 
	* que não estão relacionadas com o banco de dados
	*/

    function tratarData($data)
    {

        $dataArray = explode("-", $data);
        $novaData  = $dataArray[2] . "/" . $dataArray[1] . "/" . $dataArray[0];
        return $novaData;
        
    }

    function verificarAcesso($permissoes)
    {

		if(!isset($_SESSION['usuario_logado']))	
			header("Location: ../../index.php");

		if(!in_array($_SESSION['usuario_logado']['nv_acesso'], $permissoes))
			header("Location: ../../index.php");	
    }