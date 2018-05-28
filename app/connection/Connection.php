<?php 
function iniciarConexao(){
    $dsn  = 'mysql:host=localhost;dbname=db_secretaria';
    $user = 'root';
    $pass = '';

    try{
        $conn = new PDO($dsn, $user, $pass);
        return $conn;
    }catch(PDOException $ex){
        echo 'Erro: '.$ex->getMessage();
    }
}
