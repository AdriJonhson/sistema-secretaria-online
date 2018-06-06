<?php 

	/*Arquivo que vai possuir funções que podem ser usadas em qualquer parte do sistema, funções 
	* que não estão relacionadas com o banco de dados
	*/

    function tratarData($data){

        $dataArray = explode("-", $data);
        $novaData  = $dataArray[2] . "/" . $dataArray[1] . "/" . $dataArray[0];
        return $novaData;
        
    }