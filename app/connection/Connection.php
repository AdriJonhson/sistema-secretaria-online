<?php 

	function iniciarConexao()
	{
	    $dsn  = 'mysql:host=localhost;dbname=db_secretaria;charset=utf8';
	    $user = 'root';
	    $pass = '';

	    try{
	        $conn = new PDO($dsn, $user, $pass);
	        return $conn;
	    }catch(PDOException $ex){
	        echo 'Erro: '.$ex->getMessage();
	    }
	}


	function exibirErro($stmt){
		print_r($stmt->errorInfo());	
	}